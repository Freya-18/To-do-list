<?php

class Visiteur
{
    private $mailAdress;
    private $password;
    private $id;

    public function _construct($nom, $mailAdress){
        $this->nom=$nom;
        $this->mailAdress=$mailAdress;
    }

function get_data() : string
{
    return "Mon modèle ne fait rien";
}

}
?> 