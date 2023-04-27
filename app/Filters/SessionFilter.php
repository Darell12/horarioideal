<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class SessionFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session('logged_in') == 'true') {
            return redirect()->to(base_url('iniciarSesion'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}