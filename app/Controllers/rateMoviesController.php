<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\NoteDB;

class RateMoviesController extends Controller {

    public function index() {
        $this->view('rateMovies');
    }

    public function insertNote() {
        if ($request->isMethod('get')) {
            $this->view('rateMovies');
        } else {
            $moviename = preg_replace("/\s+/", "", $request->post('movieName'));
            $note = preg_replace("/\s+/", "", $request->post('note'));
            $description = preg_replace("/\s+/", "", $request->post('description'));
            $idUser = 2;

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