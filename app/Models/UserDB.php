<?php 

namespace App\Models;

use Core\Database;

include 'User.php';

class UserDB {
    private $table = "users";

    public function getAll() {
        $db = Database::getInstance();
        return $db->getList($this->table, '*', 'email_user = ?');
    }

    public function record($data, $error) {
        $db = Database::getInstance();

        if (!empty($data['email_user']) and !empty($data['name_user']) and !empty($data['password_user'])) {
            if(filter_var($data['email_user'], FILTER_VALIDATE_EMAIL)) {
                if (strlen($data['name_user']) < 60) {
                    if (strlen($data['name_user']) > 3) {
                        if (strlen($data['password_user']) > 7) {
                            if (strlen($data['password_user']) < 16) {
                                $data['password_user'] = md5($data['password_user']);
                                $db->insert($this->table, $data);
                                header('location: \login');
                            } else {
                                header('location: \register');
                            }
                        } else {
                            header('location: \register');
                        }
                    } else {
                        header('location: \register');
                    }
                } else {
                    header('location: \register');
                }
            } else {
                header('location: \register');
            }
        } else {
            $error['emailError'] = "Todos os campos devem estar preenchidos!";
            header('location: \register');
        }
    }
}








