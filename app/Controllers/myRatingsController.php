<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\NoteDB;

class MyRatingsController extends Controller {

    public function index() {
        $getNotes = new NoteDB;
        $allNotes = $getNotes->getAll();
        
        $content = [
            'allNotes' => $allNotes,
        ];
        
        $this->view('myRatings', $content);
    }
}