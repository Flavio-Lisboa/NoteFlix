<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\UserDB;
use Core\Request;

class LoginController extends Controller {

    public function index(Request $request) {

        if ($request->isMethod('get')) {
            $this->view('login');
        } else {
            $email = preg_replace("/\s+/", "", $request->post('email'));
            $password = preg_replace("/\s+/", "", $request->post('password'));

            $dataLogin = [
                'email_user' =>  $email,
                'password_user' => $password,
            ];

            $userLogin = new UserDB();
            $releaseAccess = $userLogin->login($dataLogin);

            $releaseAccess ? $this->redirect('rateMovies') : $this->view('login');
        }     
    }
}
