<?php

namespace DLUnire\Controllers\Admin;
use DLUnire\Models\Admin\Roles;
use Framework\Config\Controller;
use Framework\Errors\DLErrors;

class RolesController extends Controller {

    public function create() {
        $roles = new Roles();

        /**
         * Indicador de si se ha guardado en la base de datos
         * 
         * @var boolean $saved
         */
        $saved = Roles::create([
            "roles_name" => $roles->get_required('name'),
            "roles_description" => $roles->get_input('description')
        ]);

        if (!$saved) {
            DLErrors::message("No se ha guardado", 500);
        }

        return [
            "status" => true,
            "success" => "Se ha creado nuevo rol de usuario"
        ];
    }

    public function get(): array {
        new Roles();
        return Roles::get();
    }

    public function paginate(object $params): array {
        new Roles();
        return Roles::paginate($params->page, $params->rows);
    }
}