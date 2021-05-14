<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Note;
use Core\Session;
use Core\Request;

class EditNotesController extends Controller {

    private $session;

    public function __construct() {
        $this->session = Session::getInstance();
    }

    public function index(Request $request) {
        if ($request->isMethod('get')) {
            $this->view('editNotes');
        } else {
            $value = $request->post('btn1');

            $get = new Note;
            $content = $get->getEditNote($value);
            
            if($content) {
                $this->session->set('noteData', $content);
                $this->view('editNotes', ['content' => $content]);
            }
        }
    }

    public function update(Request $request) {
        if ($request->isMethod('get')) {
            $this->view('register');
        } else {
            $moviename = $request->post('movieName');
            $note = preg_replace("/\s+/", "", $request->post('note'));
            $description = $request->post('description');

            $user = $this->session->get('user');

            $idNote = $this->session->get('noteData');

            $data = [
                'id_note' => $idNote[0]['id_note'],
                'movie_name' => $moviename,
                'movie_note' => $note,
                'movie_description' => $description,
                'id_user' =>  $user['id_user'],
            ];

            $update = new Note;
            $error = $update->updateNotes($data);

            if($error == true) {
                $this->redirect('\myRatings');
            } else {
                $this->redirect('\myRatings');
            }
        }
    }
}