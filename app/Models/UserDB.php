<?php 

namespace App\Models;

use Core\Database;

class UserDB {
    private $table = "users";

    public function getAll() {
        $db = Database::getInstance();
        return $db->getList($this->table, '*');
    }

    public function login($email, $password) {
        $db = Database::getInstance();
        
        if (!empty($email) and !empty($password)) {
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            $data = $db->getList($this->table, '*', ['email_user' => $email]);
            
            $user = $data[0];
            if (isset($user['id_user'])) {
                $password = md5($password);
                if ($password == $user['password_user']) {
                    unset($user['password_user']);
                    return $user;
                }           
            }
        }
        return false; 
    }

    public function record($data) {
        $db = Database::getInstance();
        
        if (!empty($data['email_user']) and !empty($data['name_user']) and !empty($data['password_user'])) {
            if (filter_var($data['email_user'], FILTER_VALIDATE_EMAIL)) {
                $emailList = $db->getList($this->table, '*', ['email_user' => $data['email_user']]);

                foreach($emailList as $db) {
                    $email = $db['email_user'];
                }
                if ($data['email_user'] != $email) {
                    if (strlen($data['name_user']) < 60) {
                        if (strlen($data['name_user']) > 3) {
                            if (strlen($data['password_user']) > 7) {
                                if (strlen($data['password_user']) < 16) {
                                    $data['password_user'] = md5($data['password_user']);
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
}







                       
