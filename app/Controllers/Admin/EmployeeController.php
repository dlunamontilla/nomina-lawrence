<?php

namespace DLUnire\Controllers\Admin;
use DLUnire\Models\Admin\Employee;
use Framework\Auth\AuthBase;
use Framework\Config\Controller;
use Framework\Errors\DLErrors;

class EmployeeController extends Controller {

    /**
     * Crea un nuevo empleado
     *
     * @return array
     */
    public function create(): array {
        /**
         * Autenticador
         * 
         * @var AuthBase $authbase
         */
        $authbase = AuthBase::get_instance();

        /**
         * Datos del usuario que inició sesión
         * 
         * @var array $auth
         */
        $auth = $authbase->get_session_value('auth');

        /**
         * Tabla de empleados
         * 
         * @var Employee $employee
         */
        $employee = new Employee();

        /**
         * Indica si efectivamente se han guardados los empleados
         * 
         * @var boolean $saved
         */
        $saved = Employee::create([
            "employee_uuid" => $this->get_app_uuid(),
            "employee_name" => $employee->get_required('name'),
            "employee_lastname" => $employee->get_required('lastname'),
            "employee_date_of_birth" => $employee->get_required('date_of_birth'),
            "employee_document" => $employee->get_integer('document'),
            "employee_document_type" => $employee->get_required('type'),
            "employee_email" => $employee->get_email('email'),
            "employee_address" => $employee->get_input('address'),
            "users_id" => $auth['users_id']
        ]);

        if (!$saved) {
            DLErrors::message("Se produjo un problema para registrar nuevo empleado", 500);
        }

        return [
            "status" => $saved,
            "success" => "Nuevo empleado creado"
        ];
    }

    /**
     * Devuelve una lista de empleados
     *
     * @return array
     */
    public function get(): array {
        new Employee();
        return Employee::get();
    }

    /**
     * Devuelve una lista de empleados por página
     *
     * @param object $params Parámetros de la petición
     * @return array
     */
    public function paginate(object $params): array {
        new Employee();
        return Employee::paginate($params->page, $params->rows);
    }
}