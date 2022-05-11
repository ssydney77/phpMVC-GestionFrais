<?php

namespace Gsb\controllers;
use Gsb\models\InfoModel;

class InfoControlleur{
    
    // Déclartion des variables privées
    private $model;

    // CONSTRUCTEUR
    public function __construct(){
        $this->model = new InfoModel;
    }

    // Fonction privée
    private function getBddInfo($login){
        return $this->model->getInfo($login);
    }

    // Fonction publique
    public function user_info(){

        $user_login=$_POST['login'];
        $info=$this->getBddInfo($user_login);
		
        foreach ($info as $user_information) {
            $_SESSION['id']=$user_information->id;
            $_SESSION['nom']=$user_information->nom;
            $_SESSION['prenom']=$user_information->prenom;
        }
    }    
}