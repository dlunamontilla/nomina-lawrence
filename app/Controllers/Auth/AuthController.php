<?php

namespace DLUnire\Controllers\Auth;

use DLUnire\Models\Users;
use Framework\Config\Controller;

/**
 * Permite iniciar sesión de usuario
 * 
 * @var string
 */
final class AuthController extends Controller {


    /**
     * Inicias sesión de usuario
     *
     * @return array
     */
    public function auth(): array {

        /**
         * Tabla de usuarios
         * 
         * @var Users $users
         */
        $users = new Users();

        $users->capture_credentials();

        return [
            "status" => true,
            "success" => "Has iniciado sesión"
        ];
    }
   
}