<?php

namespace Gsb\models;

use App\Database;

class LoginModel{

    // Déclartion des variables privées
    private $db;
    
    // CONSTRUCTEUR
    public function __construct(){
        $this->db = new Database();
    }

   // LES FONCTIONS
    public function getIDUser($user_login){
        return $this->db->query("SELECT * FROM visiteur WHERE login=?",[$user_login])->fetch();
    }



    // EPREUVES E5

    public function getDateConnexion($idVisiteur){
        return $this->db->query("SELECT date_connexion FROM visiteur WHERE id=?",[$idVisiteur])->fetch();

    }  
    
    public function newDateConnexion($idVisiteur,$date){
        $this->db->query("UPDATE visiteur SET date_connexion = '$date' WHERE id=?",[$idVisiteur]);
    }
}