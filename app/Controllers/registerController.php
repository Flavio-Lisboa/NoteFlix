<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\UserDB;

class RegisterController extends Controller {

    public function index() {
        $this->view('register');
    }

    public function insert() {
        $email = preg_replace("/\s+/", "", $_POST["email"]);
        $name = preg_replace("/\s+/", "", $_POST["username"]);
        $password = preg_replace("/\s+/", "", $_POST["password"]);
       
        $data = [
            'email_user' => $email,
            'name_user' => $name,
            'password_user' => $password,
        ];

        $error = [
            'emailError' => '',
            'nameError' => '',
            'passwordError' => '',
        ];
    
        $record = new UserDB();
        $record->record($data, $error);

        $this->view('register', $error);
    }
}

