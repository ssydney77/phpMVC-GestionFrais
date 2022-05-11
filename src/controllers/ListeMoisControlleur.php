<?php

namespace Gsb\controllers;

use Gsb\models\FichesModel;

class ListeMoisControlleur extends Controlleur{

    // Déclartion des variables privées
    private $model;

    // CONSTRUCTEUR
    public function __construct(){
        $this->model = new FichesModel;
    }

    public function index()
    {
        $mois = date("Ym");
        $numAnnee = substr($mois, 0, 4);
        $numMois = substr($mois, 4, 2);
        $id = $_SESSION['id'];

        $lesMois = $this->model->getMoisDisponibles($id)->fetchAll();
        
        $this->render('listeMois', compact('mois', 'numAnnee', 'numMois', 'lesMois'));
    }
}