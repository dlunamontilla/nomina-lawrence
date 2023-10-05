<?php

namespace DLUnire\Controllers\Admin;

use DLUnire\Models\Users;
use Framework\Config\Controller;

/**
 * Permite interactuar con los usuarios del sistema
 */
class UsersController extends Controller {

    /**
     * Crea un nuevo usuario
     *
     * @return array
     */
    public function create(): array {
        /**
         * Tabla de usuarios de la base de datos.
         * 
         * @var Users $users
         */
        $users = new Users();

        /**
         * Indica si se ha guardado
         * 
         * @var boolean $saved
         */
        $saved = Users::create([
            "users_name" => $users->get_required('users_name'),
            "users_lastname" => $users->get_input('users_lastname'),
            "status" => $users->get_integer('status'),
            "username" => $users->get_required('username'),
            "password" => $this->get_password_hash(
                $users->get_input('password')
            ),
            "email" => $users->get_email('email')
        ]);

        return [
            "saved" => $saved
        ];
    }

    /**
     * Devuelve una lista de usuarios
     *
     * @return array
     */
    public function get(): array {
        new Users;
        return Users::get();
    }

    /**
     * Devuelve una lista de usuarios con paginación incluida.
     *
     * @param object $param Parámetros
     * @return array
     */
    public function paginate(object $param): array {
        new Users();
        return Users::paginate($param->page, $param->rows);
    }
}