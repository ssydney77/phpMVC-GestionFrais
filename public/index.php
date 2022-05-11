<?php
session_start();
require("../vendor/autoload.php");

use Gsb\controllers\AccueilControlleur;
use Gsb\controllers\AjouterControlleur;
use Gsb\controllers\ConnexionControlleur;
use Gsb\controllers\DeconnexionControlleur;
use Gsb\controllers\ElementsControlleur;
use Gsb\controllers\EtatFraisControlleur;
use Gsb\controllers\FichesControlleur;
use Gsb\controllers\InfoControlleur;
use Gsb\controllers\ListeMoisControlleur;
use Gsb\controllers\LoginControlleur;
use Gsb\controllers\sControlleur;
use Gsb\controllers\SupprimerControlleur;
use Gsb\controllers\ValiderControlleur;

$url=($_GET['url'])??null;

if(isset($_SESSION['token'])){
    $jeton=true;
}else{
    $jeton=false;
}

if($url=='connexion'){
    $verif = new LoginControlleur;
    $info = new InfoControlleur;
    $verif->verif();
    $info->user_info();
}
elseif($url=='mon-espace' && $jeton){
    $accueil = new AccueilControlleur;
    $accueil->index();
}
elseif($url=='mon-espace/saisie-fiche-de-frais' && $jeton){
    $fiche = new FichesControlleur;
    $fiche->verification();
    $fiche->index();
}
elseif($url=='mon-espace/saisie-fiche-de-frais/valider-frais-forfait' && $jeton){
    $valider = new ValiderControlleur;
    $valider->valider();
}
elseif($url=='mon-espace/saisie-fiche-de-frais/supprimer' && $jeton){
    $suppr = new SupprimerControlleur;
    $suppr->supprimer();
}
elseif($url=='mon-espace/saisie-fiche-de-frais/ajouter-hors-forfait' && $jeton){
    $ajouter = new AjouterControlleur;
    $ajouter->ajouter();
}
elseif($url=='mon-espace/mes-fiches-de-frais' && $jeton){
    $listeMois = new ListeMoisControlleur;
    $listeMois->index();
}
elseif($url=='mon-espace/mes-fiches-de-frais/afficher-fiches' && $jeton){
    $etatFrais = new EtatFraisControlleur;
    $etatFrais->index();
}
elseif($url=='deconnecter' && $jeton){
    $deco = new DeconnexionControlleur;
    $deco->deconnecter();
}
else{
    $connexion = new ConnexionControlleur;
    $connexion->index();
}