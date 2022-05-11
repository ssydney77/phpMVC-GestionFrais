<?php

namespace Gsb\controllers;

use Gsb\models\FichesModel;

class SupprimerControlleur extends Controlleur{
    
    // Déclartion des variables
    private $model;

    // CONSTRUCTEUR
    public function __construct(){
        $this->model = new FichesModel;
    }

    // Fonctions privées


    // Fonction publique
    public function supprimer(){

        $idFrais=$_POST['idFrais'];

        $this->model->supprimerFraisHorsForfait($idFrais);

        $this->render('supprimerFrais');
    }
}