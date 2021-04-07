<?php

namespace App\Controllers;

use Core\Controller;

class RateMoviesController extends Controller {

    public function index() {
        $this->view('rateMovies');
    }
}