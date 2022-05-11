<?php

namespace Gsb\controllers;
use Gsb\models\ElementsModel;

class ElementsControlleur{
    
    // Déclartion des variables
    private $model;

    // CONSTRUCTEUR
    public function __construct(){
        $this->model = new ElementsModel;
    }

    // Fonctions privées
    private function getBddElements(){
        return $this->model->getLesFraisForfait();
    }
    // Fonction publique

    public function FraisForfait(){
                
        $elements=$this->getBddElements();

        foreach ($elements as $les_elements) {
            echo $les_elements->libelle."<br>";
        }

        // return $elements;
    }    
}
