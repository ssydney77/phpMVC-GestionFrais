<?php

namespace Gsb\models;

use App\Database;

class InfoModel{
    
    // Déclartion des variables privées
    private $db;
    
    // CONSTRUCTEUR
    public function __construct(){
        $this->db = new Database();
    }

    // LES FONCTIONS
    public function getInfo($user_login){
        return $this->db->query("SELECT id,nom,prenom FROM visiteur WHERE login=?",[$user_login])->fetchAll();
    }
}