<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\NoteDB;
use Core\Request;
use Core\Session;

class RateMoviesController extends Controller {

    public function __construct() {
        $this->session = Session::getInstance();
    }

    public function index() {
        $this->view('rateMovies');
    }

    public function insertNote(Request $request) {
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

            $record = new NoteDB();
            $error = $record->record($data);

            if($error == true) {
                $this->redirect('\myRatings');
            } else {
                $this->redirect('\rateMovies');
            }
        }
    }
}