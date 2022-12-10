<?php

class Tache{
    private int $id;   
    private string $nom;
    private int $liste;
    private bool $coche;

    function _constructeur(int $id, string $nom, int $liste, $coche=false){
        $this->id=$id;
        $this->nom=$nom;
        $this->liste=$liste;
        $this->choche=$coche;
    }

    public function get_id() : int{
        return $this->id;
    }

    public function get_nom() : string{
        return $this->nom;
    }

    public function get_coche() : bool{
        return $this->coche;
    }

    public function set_id($id) {
        $this->id=$id;
    }

    public function set_nom($nom) {
        $this->nom=$nom;
    }

}