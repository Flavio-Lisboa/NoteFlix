<?php 

namespace App\Models;

use Core\Database;
use App\Models\UserDB;

session_start();

class NoteDB {
    private $table = "notes";

    public function record($data) {
        $db = Database::getInstance();

        if (!empty($data['movie_name']) and !empty($data['movie_note']) and !empty($data['movie_description'])) {
            if (strlen($data['movie_name']) < 31) {
                if (strlen($data['movie_note']) < 3) {
                    if ($data['movie_note'] < 11) {
                        if ($data['movie_note'] > 0) {
                            if (strlen($data['movie_description']) > 4) {
                                if (strlen($data['movie_description']) < 501) {
                                    $db->insert($this->table, $data);
                                    header('location: \myRatings');
                                } else {
                                    header('location: \login');
                                }               
                            } else {
                                header('location: \rateMovies');
                            }
                        } else {
                            header('location: \rateMovies');
                        }
                    } else {
                        header('location: \rateMovies');
                    }
                } else {
                    header('location: \rateMovies');
                }
            } else {
                header('location: \rateMovies');
            }
        } else {
            header('location: \rateMovies');
        }
    }

    public function getAll() {
        $db = Database::getInstance();
        return $db->getList($this->table, '*', ['id_user' => 1]);
    }
}




