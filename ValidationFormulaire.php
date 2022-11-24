<?php

class Validation {
    static function val_form($mailAdress,$mdp) {
        if (!isset($mailAdress)||$mailAdress=="") {
            $dataVueEreur[] ="pas d'adress mail'";
            throw new Exception('pas d\'email');
        }
        if (!isset($age)||$age=="") {
            $dataVueEreur[] ="pas de mot de passe ";
            throw new Exception('pas de mot de passe');
        }
    }
} 
?>