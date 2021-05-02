<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\NoteDB;
use Core\Session;

class MyRatingsController extends Controller {

    private $session;

    public function __construct() {
        $this->session = Session::getInstance();
    }

    public function index() {
        $getNotes = new NoteDB;
        $allNotes = $getNotes->getAll();

        $user = $this->session->get('user');
        
        $content = [
            'allNotes' => $allNotes,
            'user' => $user,
        ];
        
        $this->view('myRatings', $content);
    }
}