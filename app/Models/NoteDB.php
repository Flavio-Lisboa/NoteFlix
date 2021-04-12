<?php 

namespace App\Models;

use Core\Database;

class NoteDB {
    private $table = "notes";

    public function getAll() {
        $db = Database::getInstance();
        return $db->getList($this->table, '*');
    }

    public function record($data) {
        $db = Database::getInstance();

        if (!empty($data['movie_name']) and !empty($data['movie_note']) and !empty($data['movie_description'])) {
            if (strlen($data['movie_name']) < 31) {
                if (strlen($data['movie_note']) < 3) {
                    if (strlen($data['movie_description']) > 4) {
                        if (strlen($data['movie_description']) < 101) {
                            $db->insert($this->table, $data);
                            header('location: \myRatings');
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
}



         
