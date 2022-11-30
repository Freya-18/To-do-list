<?php

class Liste
{
    private int $id;
    private string $nom;
    private Tache $lesTaches ;

    public function _construct($nom, $id){
        $this->nom=$nom;
        $this->id=$id;
    }

    public function get_id() : int {
        return $this->id;
    }

    public function get_nom() : int {
        return $this->nom;
    }
}