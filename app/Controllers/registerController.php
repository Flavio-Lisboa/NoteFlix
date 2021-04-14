<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\UserDB;
use Core\Request;

class RegisterController extends Controller {

    public function index() {
        $this->view('register');
    }

    public function insert(Request $request) {
        if ($request->isMethod('get')) {
            $this->view('register');
        } else {
            $email = preg_replace("/\s+/", "", $request->post('email'));
            $name = preg_replace("/\s+/", "", $request->post('username'));
            $password = preg_replace("/\s+/", "", $request->post('password'));

            $data = [
                'email_user' => $email,
                'name_user' => $name,
                'password_user' => $password,
            ];

            $record = new UserDB();
            $record->record($data);
        }
    }
}

