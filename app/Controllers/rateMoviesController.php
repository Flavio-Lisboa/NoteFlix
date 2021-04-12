<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\NoteDB;

class RateMoviesController extends Controller {

    public function index() {
        $this->view('rateMovies');
    }

    public function insertNote() {
        $moviename = preg_replace("/\s+/", "", $_POST["movieName"]);
        $note = preg_replace("/\s+/", "", $_POST["note"]);
        $description = preg_replace("/\s+/", "", $_POST["description"]);
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