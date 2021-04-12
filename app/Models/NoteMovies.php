<?php

class NoteMovies {
    private $id_note;
    private $movieName;
    private $note;
    private $description;

    public function __construct($id_note, $movieName, $note, $description) {
        $this->id_note = $id_note;
        $this->movieName = $movieName;
        $this->Note = $note;
        $this->Description = $description;
    }

    public function setId($id_note) {
        $this->id_note = $id_note;
    }

    public function getId() {
        return $this->id_note;
    }

    public function setMovieName($movieName) {
        $this->movieName = $movieName;
    }

    public function getMovieName() {
        return $this->movieName;
    }

    public function setNote($note) {
        $this->note = $note;
    }

    public function getNote() {
        return $this->note;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDescription() {
        return $this->description;
    }
}