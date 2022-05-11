<?php

namespace Gsb\controllers;

use Gsb\models\FichesModel;

class ValiderControlleur extends Controlleur{
    
    // Déclartion des variables
    private $model;

    // CONSTRUCTEUR
    public function __construct(){
        $this->model = new FichesModel;
    }

    // Fonctions privées

    
    // Fonction publique
    public function valider(){
        $id=$_SESSION['id'];
        $mois=date("Ym");
        $lesFrais=$_POST['lesFrais'];

        if($this->model->lesQteFraisValides($lesFrais)==true){
            $this->model->majFraisForfait($id, $mois, $lesFrais);
        }else{
            echo"Les valeurs doivents etre numériques!";
        }
        $this->render('valider');
    }
    
    // public function index(){
    //     $this->render('valider');
    // }
}