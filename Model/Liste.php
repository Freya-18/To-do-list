<?php

class Liste
{
    private  $id ;
    private  $nom;
    private  $privee;
    private $taches = array();

    public function __construct( $nom,  $id = -1, $privee = -1){
        $this->nom=$nom;
        $this->id=$id;
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

    public function set_id($id) {
        $this->id=$id;
    }

    public function set_nom($nom) {
        $this->nom=$nom;
    }

    public function addTache($tache) {
        $this->taches[] = $tache;
    }

    public function removeTache($tache) {
        unset($this->taches[array_search($tache, $taches)]);
    }

}