<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\UserDB;
use Core\Request;
use Core\Session;

class LoginController extends Controller {

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
                $this->view('login');
            }
        } else {
            $email = preg_replace("/\s+/", "", $request->post('email'));
            $password = preg_replace("/\s+/", "", $request->post('password'));

            $userLogin = new UserDB();
            $user = $userLogin->login($email, $password);

            if($user) {
                $this->session->set('user', $user);
                $this->redirect('rateMovies');
            } 

            $this->view('login');
        }     
    }

    public function logout() {
        $this->session->destroy();
        $this->redirect('\login');
    }
}
