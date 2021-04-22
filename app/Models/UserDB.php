<?php 

namespace App\Models;

use Core\Database;

class UserDB {
    private $table = "users";

    public function getAll() {
        $db = Database::getInstance();
        return $db->getList($this->table, '*');
    }

    public function login($dataLogin) {
        $db = Database::getInstance();
        
        if (!empty($dataLogin['email_user']) and !empty($dataLogin['password_user'])) {
            if (filter_var($dataLogin['email_user'], FILTER_VALIDATE_EMAIL)) {
                $dataLogin['password_user'] = md5($dataLogin['password_user']);
                $userDataLogin = $db->getList($this->table, '*', ['email_user' => $dataLogin['email_user']]);
                foreach($userDataLogin as $db) {
                    $password = $db['password_user'];
                }
                if ($dataLogin['password_user'] == $password) {
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







                       
