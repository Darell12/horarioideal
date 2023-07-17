<?php
use PHPUnit\Framework\TestCase;

class InsertarTest extends TestCase
{
    public function testInsertar()
    {
        // Arrange
        $mockedRequest = $this->createMock(Request::class);
        $mockedUsuario = $this->createMock(Usuario::class);

        $mockedRequest->method('getPost')
            ->will($this->returnCallback([$this, 'getMockedPostValue']));
        $mockedRequest->method('getVar')
            ->will($this->returnCallback([$this, 'getMockedVarValue']));

        $mockedUsuario->expects($this->once())
            ->method('save');
        $mockedUsuario->expects($this->once())
            ->method('getInsertID')
            ->willReturn(123);

        $sut = new MyClass($mockedRequest, $mockedUsuario);

        // Act
        $result = $sut->insertar();

        // Assert
        $this->assertEquals(json_encode(123), $result);
    }

    public function getMockedPostValue($key)
    {
        // Mocking the values returned by $this->request->getPost()
        // Replace with appropriate values for your test case
        $postValues = [
            'tp' => 1,
            'tipo_documento' => '123',
            'n_documento' => '456',
            'primer_nombre' => 'John',
            'segundo_nombre' => 'Doe',
            'apellido_p' => 'Smith',
            'apellido_s' => 'Johnson',
            'perfil' => 'admin',
            'email' => 'john.doe@example.com',
            'contraseña' => 'password',
            'id_rol' => 789,
            'direccionX' => '123 Street',
        ];

        return $postValues[$key];
    }

    public function getMockedVarValue($key)
    {
        // Mocking the values returned by $this->request->getVar()
        // Replace with appropriate values for your test case
        $varValues = [
            'contraseña' => 'password',
        ];

        return $varValues[$key];
    }
}