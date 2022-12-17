<?php

class Tache{
    private int $id;   
    public string $nom;
    private int $liste;
    private bool $coche;

    function __construct( string $nom, int $liste, int $id = -1, $coche=false){
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

    public function get_liste() : int{
        return $this->liste;
    }

    public function set_id($id) {
        $this->id=$id;
    }

    public function set_nom($nom) {
        $this->nom=$nom;
    }

}