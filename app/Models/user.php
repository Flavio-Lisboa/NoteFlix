<?php

class User {
    private $id_user;
    private $email;
    private $name;
    private $password;

    public function setId($id_user) {
        $this->id_user = $id_user;
        return $this->id_user;
    }
}