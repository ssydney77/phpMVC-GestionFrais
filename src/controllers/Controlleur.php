<?php 

namespace Gsb\controllers;

use Gsb\models\LoginModel;

abstract class Controlleur{

    // Déclartion des variables
    private $model;

    // CONSTRUCTEUR
    public function __construct(){
        $this->model = new LoginModel;
        // $this->getBddDateConnexion();
    }

    // Fonctions privées
    private function getBddDateConnexion($login){
        return $this->model->getDateConnexion($login);
    }

    public function render(string $vue, array $data = []){

        ob_start();

       extract($data);
        
        include("../src/views/$vue.php");

        $contenu=ob_get_clean();

        include("../src/views/template/template.php");


    }
} 