<?php 

namespace App\Models;

use Core\Database;
use Core\Session;

class Note {
    private $table = "notes";

    public function record($data) {
        $db = Database::getInstance();

        if (!empty($data['movie_name']) and !empty($data['movie_note']) and !empty($data['movie_description'])) {
            if (strlen($data['movie_name']) < 31 && strlen($data['movie_note']) < 3 && $data['movie_note'] < 11) {
                if ($data['movie_note'] > 0 && strlen($data['movie_description']) > 4 && strlen($data['movie_description']) < 501) {
                    $db->insert($this->table, $data);
                    return true;       
                }
            }
        }

        return false;
    }

    public function getAll() {
        $db = Database::getInstance();
        $session = Session::getInstance();
        $user = $session->get('user');

        return $db->getList($this->table, '*', ['id_user' => $user['id_user']]);
    }

    public function deleteNotes($value) {
        $db = Database::getInstance();

        return $db->delete($this->table, ['id_note' => $value]);
    }

    public function getEditNote($value) {
        $db = Database::getInstance();
        
        return $db->getList($this->table, '*', ['id_note' => $value]);
    }

    public function updateNotes($data) {
        $db = Database::getInstance();

        if(!empty($data['id_note']) && !empty($data['movie_name']) && !empty($data['movie_note']) && !empty($data['movie_description']) && !empty($data['id_user'])) {
            if (strlen($data['movie_name']) < 31 && strlen($data['movie_note']) < 3 && $data['movie_note'] < 11) {
                if ($data['movie_note'] > 0 && strlen($data['movie_description']) > 4 && strlen($data['movie_description']) < 501) {
                    $db->update($this->table, $data, ['id_note' => $data['id_user']]);
                    return true;
                }
            }
        }

        return false;
    }
}




