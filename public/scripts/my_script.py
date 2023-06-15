# mi_script.py

import sys

def procesar_datos(parametro1, parametro2):
    # Realizar alguna operación con los datos recibidos
    resultado = int(parametro1) + int(parametro2)
    return resultado

# Obtener los argumentos de línea de comandos enviados desde PHP
parametro1 = sys.argv[1]
parametro2 = sys.argv[2]

# Llamar a la función para procesar los datos y obtener el resultado
resultado = procesar_datos(parametro1, parametro2)

# Imprimir el resultado para que sea capturado por PHP
print(resultado)
