<?php

namespace App;
use PDO;

class Database{

    private $dsn="mysql:dbname=gsb;host=localhost";
    private $login="root";
    private $password="root";
    private $pdo;

    public function __construct(){
        
        $this->pdo = new PDO($this->dsn,$this->login,$this->password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        $this->pdo->query("SET CHARACTER SET utf8");
    }

    public function query($query,$params=[]){
        if($params){
            $req=$this->pdo->prepare($query);
            $req->execute($params);
        }
        else{
            $req=$this->pdo->query($query);
        }   
        return $req;
    }
}
