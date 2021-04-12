<?php

class User {
    private $id_user;
    private $email;
    private $name;
    private $password;

    public function __construct($id_user, $email, $name, $password) {
        $this->id_user = $id_user;
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
    }

    public function setId($id_user) {
        $this->id_user = $id_user;
    }

    public function getId() {
        return $this->id_user;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getPassword() {
        return $this->password;
    }
}