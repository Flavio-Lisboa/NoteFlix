<?php

namespace App\Controllers;

use Core\Controller;

class MyRatingsController extends Controller {

    public function index() {
        $this->view('myRatings');
    }
}