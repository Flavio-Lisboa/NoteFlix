<?php 

namespace App\Models;

use Core\Database;
use App\Models\UserDB;
use Core\Session;

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
                                    return true;
                                } else {
                                    return false;
                                }               
                            } else {
                                return false;
                            }
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getAll() {
        $db = Database::getInstance();
        $session = Session::getInstance();
        $user = $session->get('user');

        return $db->getList($this->table, '*', ['id_user' => $user['id_user']]);
    }
}




