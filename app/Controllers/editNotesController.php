<?php

namespace App\Controllers;

use Core\Controller;

class EditNotesController extends Controller {

    public function index() {
        $this->view('editNotes');
    }
}