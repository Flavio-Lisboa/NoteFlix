<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\NoteDB;
use Core\Request;

class RateMoviesController extends Controller {

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
            $idUser = 1;

            $data = [
                'movie_name' => $moviename,
                'movie_note' => $note,
                'movie_description' => $description,
                'id_user' =>  $idUser,
            ];

            $record = new NoteDB();
            $error = $record->record($data);
        }
    }
}