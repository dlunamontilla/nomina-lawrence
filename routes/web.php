<?php

use DLRoute\Requests\DLRoute;
use DLUnire\Controllers\HomeController;


DLRoute::get('/', [HomeController::class, 'home']);

