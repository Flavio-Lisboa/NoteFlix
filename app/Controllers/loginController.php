<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\UserDB;

class LoginController extends Controller {

    public function index() {
        $this->view('login');
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $dataLogin = [
            'email' =>  $email,
            'password' => $password,
        ];

        $get = new UserDB();
        $get->getAll($dataLogin);
    }
}