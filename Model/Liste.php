<?php

class Liste
{
    private int $id;
    private string $nom;
    private bool $privee;

    public function _construct($nom, $id, $privee){
        $this->nom=$nom;
        $this->id=$id;
        $this->privee=$privee;
    }

    public function get_id() : int {
        return $this->id;
    }

    public function get_nom() : int {
        return $this->nom;
    }
    
    public function get_privee() : int {
        return $this->privee;
    }

    public function set_id($id) {
        $this->id=$id;
    }

    public function set_nom($nom) {
        $this->nom=$nom;
    }
}