<?php

class Tache{
    protected int $id;   
    protected string $nom;
    protected int $liste;
    protected bool $isCoche;

    function __construct( string $nom, int $liste, int $id = -1, $isCoche=false){
        $this->id=$id;
        $this->nom=$nom;
        $this->liste=$liste;
        $this->isCoche=$isCoche;
    }

    public function get_id() : int{
        return $this->id;
    }

    public function get_nom() : string{
        return $this->nom;
    }

    public function get_isCoche() : bool{
        return $this->isCoche;
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