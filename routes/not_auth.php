<?php
use DLRoute\Requests\DLRoute;
use DLUnire\Controllers\Auth\AuthController;
use Framework\Auth\AuthBase;

/**
 * Autenticador de usuarios
 * 
 * @var AuthBase $auth
 */
$auth = AuthBase::get_instance();

$auth->not_logged(function () {
    DLRoute::post('/login', [AuthController::class, 'auth']);
});

