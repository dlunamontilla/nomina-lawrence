<?php
use DLRoute\Requests\DLRoute;
use DLUnire\Controllers\Admin\EmployeeController;
use DLUnire\Controllers\Admin\RolesController;
use DLUnire\Controllers\Admin\UsersController;
use Framework\Auth\AuthBase;

$auth = AuthBase::get_instance();

/**
 * Cuando el usuario se ha loggeado
 */
$auth->logged(function () {
    DLRoute::post('/user/create', [UsersController::class, 'create']);
    DLRoute::get('/user/get', [UsersController::class, 'get']);

    DLRoute::get('/user/get/{page}/{rows}', [UsersController::class, 'paginate'])->filter_by_type([
        "page" => "integer",
        "rows" => "integer"
    ]);


    # Registro de nuevos empleados.
    DLRoute::post('/employee/create', [EmployeeController::class, 'create']);

    # Consulta de empleados registrados
    DLRoute::get('/employee/get', [EmployeeController::class, 'get']);
    
    # Consulta de empleados con paginado:
    DLRoute::get('/employee/{page}/{rows}', [EmployeeController::class, 'paginate'])->filter_by_type([
        "page" => "integer",
        "rows" => "integer"
    ]);
    
    DLRoute::post('/roles/create', [RolesController::class, 'create']);
    
    DLRoute::get('/roles/get', [RolesController::class, 'get']);
    DLRoute::get('/roles/{page}/{rows}', [RolesController::class, 'paginate'])->filter_by_type([
        "page" => "integer",
        "rows" => "integer"
    ]);
});

