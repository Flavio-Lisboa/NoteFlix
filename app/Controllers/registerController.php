<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\User;
use Core\Request;
use Core\Session;

class RegisterController extends Controller {

    private $session;

    public function __construct() {
        $this->session = Session::getInstance();
    }

    public function index(Request $request) {
        if ($request->isMethod('get')) {
            $user = $this->session->get('user');
            
            if($user) {
                $this->view('rateMovies');
            } else {
                $this->view('register');
            }
        } else {
            $email = preg_replace("/\s+/", "", $request->post('email'));
            $name = preg_replace("/\s+/", "", $request->post('username'));
            $password = preg_replace("/\s+/", "", $request->post('password'));

            $data = [
                'email_user' => $email,
                'name_user' => $name,
                'password_user' => $password,
            ];

            $record = new User();
            $newUser = $record->record($data);

            $newUser ? $this->redirect('login') : $this->view('register');
        }
    }
}

