<?php

namespace App\Controllers;

use Core\Controller;

class LoginController extends Controller {

    public function index() {
        $this->view('login');
    }

}