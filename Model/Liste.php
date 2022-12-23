<?php

class Liste
{
    protected  $id ;
    protected  $nom;
    protected  $privee;
    protected $proprietaire;
    protected $taches = array();

    public function __construct($nom, $proprietaire= -1, $privee = 1, $id = -1){
        $this->nom=$nom;
        $this->id=$id;
        $this->proprietaire=$proprietaire;
        $this->privee=$privee;
    }

    public function get_id() : int {
        return $this->id;
    }

    public function get_nom() : string {
        return $this->nom;
    }
    
    public function get_privee() : int {
        return $this->privee;
    }

    public function get_proprietaire() : int {
        return $this->proprietaire;
    }

    public function set_id($id) {
        $this->id=$id;
    }

    public function set_nom($nom) {
        $this->nom=$nom;
    }

    public function set_proprietaire($proprietaire){
        $this->proprietaire=$proprietaire;
    }

    public function addTache($tache) {
        $this->taches[] = $tache;
    }

    public function removeTache($tache) {
        unset($this->taches[array_search($tache, $taches)]);
    }

}