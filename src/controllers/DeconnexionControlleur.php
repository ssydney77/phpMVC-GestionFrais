<?php

namespace Gsb\controllers;

class DeconnexionControlleur{
    public function deconnecter(){
        unset($_SESSION['token']);
        session_destroy();
        header('Location:./');
    }
}