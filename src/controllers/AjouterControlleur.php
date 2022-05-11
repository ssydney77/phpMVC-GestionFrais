<?php

namespace Gsb\controllers;

use Gsb\models\FichesModel;

class AjouterControlleur extends Controlleur{
    
    // Déclartion des variables
    private $model;

    // CONSTRUCTEUR
    public function __construct(){
        $this->model = new FichesModel;
    }

    // Fonctions privées


    // Fonction publique
    public function ajouter(){

        $id=$_SESSION['id'];
        $mois=date("Ym");
        $dateFrais=$_POST['dateFrais'];
        $libelle=$_POST['libelle'];
        $montant=$_POST['montant'];

        $verif=$this->model->valideInfosFrais($dateFrais,$libelle,$montant);

        if($verif){
            $this->model->ajoutFraisHorsForfait($id,$mois,$libelle,$dateFrais,$montant);
            $this->render('ajouter');
        }else{
            $this->render('erreurHorsForfait');
        }
    }
}