<?php

namespace Gsb\controllers;

use Gsb\models\FichesModel;

class EtatFraisControlleur extends Controlleur{

    // Déclartion des variables privées
    private $model;

    // CONSTRUCTEUR
    public function __construct(){
        $this->model = new FichesModel;
    }
    
    public function index()
    {
        $mois = $_POST['mois_selec'];
        $numAnnee = substr($mois, 0, 4);
        $numMois = substr($mois, 4, 2);
        $id = $_SESSION['id'];
        
        $lesMois = $this->model->getMoisDisponibles($id)->fetchAll();
        $fraisForfait = $this->model->getFraisForfait($id,$mois)->fetchAll();
        $fraisHorsForfait = $this->model->getFraisHorsForfait($id,$mois)->fetchAll();
        $info = $this->model->getInfosFicheFrais($id,$mois)->fetchAll();

        $this->render('etatFrais', compact('mois', 'numAnnee', 'numMois', 'lesMois','fraisForfait','fraisHorsForfait','info'));
    }
}