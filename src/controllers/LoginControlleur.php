<?php
namespace Gsb\controllers;
use Gsb\models\LoginModel;

class LoginControlleur{
    
    // Déclartion des variables
    private $model;

    // CONSTRUCTEUR
    public function __construct(){
        $this->model = new LoginModel;
    }

    // Fonctions privées
    private function getBddID($login){
        return $this->model->getIDUser($login);
    }

    private function getBddDateConnexion($id){
        return $this->model->getDateConnexion($id);
    }

    // Fonction publique
    public function verif(){
        
        $user_login=$_POST['login'];
        $user_mdp=$_POST['mdp'];
        
        $ID=$this->getBddID($user_login);
        
        if($ID){
            $mdpHash=$ID->mdp;
            if (password_verify($user_mdp,$mdpHash)){
                // RECUPERER LA DATE DE CONNEXION

                // $idVisiteur=$_SESSION['id'];

                // date_default_timezone_set('Europe/Paris');
                // $date=date('Y-m-d h:i:s');

                // $dateco = $this->getBddDateConnexion($idVisiteur);
                // var_dump($dateco);
                
                // $_SESSION['dernierDateConnexion']=$dateco->date_connexion;
                // echo $_SESSION['dernierDateConnexion'];
                // $newdate = $this->model->newDateConnexion($idVisiteur,$date);

                $_SESSION['token']='ok';
                header("Location:mon-espace");
            }else{
                header("Location:./");
            }   
        }else{
            echo"Identifiant incorrect";
            header("Location:./");
        }
    }
    

}