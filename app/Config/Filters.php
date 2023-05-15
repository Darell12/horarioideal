<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'Session' => \App\Filters\SessionFilter::class,
        'Accion' => \App\Filters\AccionRequeridaFilter::class
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     */
    public array $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don’t expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [
        'Session' => [
            'before' => [
                "/principal",
                "/",
                "/perfil/(:num)",
                "/perfil",
                '/ver_roles',
                '/ver_asignaturas', 
                '/ver_acciones', 
                '/ver_aulas',
                '/ver_franjas',
                '/ver_grados',
                '/ver_permisos',
                '/ver_horarios',
                '/ver_detalle',
                '/ver_estudiantes',
                '/ver_usuarios',
                '/eliminados_roles',
                '/eliminados_asignaturas',
                '/eliminados_acciones',
                '/eliminados_aulas',
                '/eliminados_franjas',
                '/eliminados_grados', 
                '/eliminados_permisos', 
                '/eliminados_horarios_enc', 
                '/roles_insertar', 
                '/asignaturas_insertar', 
                '/acciones_insertar', 
                '/franjas_insertar', 
                '/aulas_insertar', 
                '/permisos_insertar', 
                '/grados_insertar', 
                '/horario_enc_insertar', 
            ],
        ],
        'Accion' => [
            'before' => [
                "/principal",
                "/",
                "/perfil/(:num)",
                "/perfil",
                '/ver_roles',
                '/ver_asignaturas', 
                '/ver_acciones', 
                '/ver_aulas',
                '/ver_franjas',
                '/ver_grados',
                '/ver_permisos',
                '/ver_horarios',
                '/ver_detalle',
                '/ver_estudiantes',
                '/ver_usuarios',
                '/eliminados_roles',
                '/eliminados_asignaturas',
                '/eliminados_acciones',
                '/eliminados_aulas',
                '/eliminados_franjas',
                '/eliminados_grados', 
                '/eliminados_permisos', 
                '/eliminados_horarios_enc', 
                '/roles_insertar', 
                '/asignaturas_insertar', 
                '/acciones_insertar', 
                '/franjas_insertar', 
                '/aulas_insertar', 
                '/permisos_insertar', 
                '/grados_insertar', 
                '/horario_enc_insertar', 
            ],
        ]
    ];
}
