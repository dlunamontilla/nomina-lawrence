<?php

namespace DLUnire\Controllers;
use Framework\Config\Controller;

class HomeController extends Controller {

    public function home(): string {

        return view('home', [
            "token" => $this->get_token_app()
        ]);
    }
}