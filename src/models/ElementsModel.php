<?php

namespace Gsb\models;
use App\Database;

class ElementsModel{
    
    // Déclartion des variables privées
    private $db;
    
    // CONSTRUCTEUR
    public function __construct(){
        $this->db = new Database();
    }

    // LES FONCTIONS
    public function getLesFraisForfait(){
        return $this->db->query("SELECT id,libelle FROM fraisforfait")->fetchAll();
    }
}