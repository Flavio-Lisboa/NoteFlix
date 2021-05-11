<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Note;
use Core\Request;
use Core\Session;

class RateMoviesController extends Controller {

    public function __construct() {
        $this->session = Session::getInstance();
    }

    public function index(Request $request) {
        if($this->session->get('user')) {
            if ($request->isMethod('get')) {
                $this->view('rateMovies');
            } else {
                $moviename = $request->post('movieName');
                $note = preg_replace("/\s+/", "", $request->post('note'));
                $description = $request->post('description');

                $user = $this->session->get('user');

                $data = [
                    'movie_name' => $moviename,
                    'movie_note' => $note,
                    'movie_description' => $description,
                    'id_user' =>  $user['id_user'],
                ];

                $record = new Note();
                $error = $record->record($data);

                if($error == true) {
                    $this->redirect('\myRatings');
                } else {
                    $this->redirect('\rateMovies');
                }
            }
        } else {
            $this->redirect('/login');
        }
    }   
}        
