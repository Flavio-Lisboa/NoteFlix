<?php

namespace App\Controllers;

use Core\Controller;

class RegisterController extends Controller {

    public function index() {
        $this->view('register');
    }

}