<?php

namespace Gsb\controllers;

use Gsb\models\FichesModel;

class FichesControlleur extends Controlleur{

    // Déclartion des variables privées
    private $model;

    // CONSTRUCTEUR
    public function __construct(){
        $this->model = new FichesModel;
    }
    
    // FONCTIONS PUBLIC
    public function verification(){
        $mois = date("Ym");
        $id = $_SESSION['id'];

        $premierFraisMois = $this->model->estPremierFraisMois($id,$mois);

        if($premierFraisMois == true){
            $this->model->creeNouvellesLignesFrais($id,$mois);
        }
    }

    public function index()
    {
        $mois = date("Ym");
        $numAnnee = substr($mois, 0, 4);
        $numMois = substr($mois, 4, 2);
        $id = $_SESSION['id'];

        $fraisForfait = $this->model->getFraisForfait($id,$mois)->fetchAll();

        $fraisHorsForfait = $this->model->getFraisHorsForfait($id,$mois)->fetchAll();

        $this->render('listeFrais', compact('mois', 'numAnnee', 'numMois', 'fraisForfait', 'fraisHorsForfait'));
    }
}