<?php

use DLRoute\Requests\DLRoute;
use DLUnire\Controllers\HomeController;


DLRoute::get('/', [HomeController::class, 'home']);

// DLRoute::post('/password/{password}', [TestController::class, 'index']);
// DLRoute::post('/login', [TestController::class, 'auth']);


// DLRoute::post('/google/test', [TestController::class, 'recaptcha']);