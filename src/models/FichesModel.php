<?php

namespace Gsb\models;

use App\Database;

class FichesModel{

    // Déclartion des variables privées
    private $db;
    
    // CONSTRUCTEUR
    public function __construct(){
        $this->db = new Database();
    }

    // LES FONCTIONS
    public function getFraisForfait(string $idVisiteur, string $mois)
    {
        return $this->db->query("SELECT fraisforfait.id as idfrais, fraisforfait.libelle as libelle, lignefraisforfait.quantite as quantite
                                 FROM lignefraisforfait
                                 INNER JOIN fraisforfait
		                         ON fraisforfait.id = lignefraisforfait.idfraisforfait
		                         WHERE lignefraisforfait.idvisiteur =? AND lignefraisforfait.mois=?
		                         ORDER BY lignefraisforfait.idfraisforfait", [$idVisiteur, $mois]);
    }

    public function getFraisHorsForfait(string $idVisiteur, string $mois)
    {
        return $this->db->query('SELECT * FROM lignefraishorsforfait
                                WHERE lignefraishorsforfait.idvisiteur =?
		                        AND lignefraishorsforfait.mois = ?', [$idVisiteur, $mois]);
    }

    public function getMoisDisponibles(string $idVisiteur)
    {
        return $this->db->query('SELECT mois from  fichefrais where idvisiteur=? order by mois desc', [$idVisiteur]);
    }

    public function getInfosFicheFrais(string $idVisiteur, string $mois){
        return $this->db->query("SELECT ficheFrais.idEtat as idEtat, ficheFrais.dateModif as dateModif, ficheFrais.nbJustificatifs as nbJustificatifs, ficheFrais.montantValide as montantValide, etat.libelle as libEtat 
                                FROM  fichefrais 
                                INNER JOIN Etat on ficheFrais.idEtat = Etat.id 
                                WHERE fichefrais.idvisiteur =? AND fichefrais.mois =?",[$idVisiteur,$mois]);
    }

    public function estPremierFraisMois($idVisiteur,$mois){
		$ok = false;
		$res = $this->db->query("SELECT count(*) as nblignesfrais FROM fichefrais WHERE fichefrais.mois = ? AND fichefrais.idvisiteur = ?", [$mois, $idVisiteur]);
		$laLigne = $res->fetch();
		if($laLigne->nblignesfrais == 0){
			$ok = true;
		}
		return $ok;
	}

    public function creeNouvellesLignesFrais($idVisiteur,$mois){
		$dernierMois = $this->dernierMoisSaisi($idVisiteur)->fetchColumn();
        if($dernierMois!=null){
            $laDerniereFiche = $this->getInfosFicheFrais($idVisiteur,$dernierMois)->fetch();
            if($laDerniereFiche->idEtat=='CR'){
                $this->majEtatFicheFrais($idVisiteur, $dernierMois,'CL');
            }
        }
        $this->db->query("INSERT INTO fichefrais(`idvisiteur`,`mois`,`nbJustificatifs`,`montantValide`,`dateModif`,`idEtat`) values('$idVisiteur','$mois',0,0,now(),'CR')");
		$lesIdFrais = $this->getLesIdFrais();
		foreach($lesIdFrais as $uneLigneIdFrais){
			$unIdFrais = $uneLigneIdFrais->idfrais;
            $this->db->query("INSERT INTO lignefraisforfait(`idvisiteur`,`mois`,`idFraisForfait`,`quantite`) 
			values('$idVisiteur','$mois','$unIdFrais',0)");
		}
	}

    public function dernierMoisSaisi($idVisiteur){
        return $this->db->query("SELECT max(mois) as dernierMois FROM fichefrais WHERE fichefrais.idvisiteur = ?", [$idVisiteur]);
	}

    public function majEtatFicheFrais($idVisiteur,$mois,$etat){
        return $this->db->query("UPDATE ficheFrais SET idEtat = '$etat', dateModif = now() 
		WHERE fichefrais.idvisiteur =? AND fichefrais.mois = ?", [$idVisiteur, $mois]);
	}

    public function getLesIdFrais(){
        return $this->db->query("SELECT fraisforfait.id as idfrais FROM fraisforfait ORDER BY fraisforfait.id");
	}

    function estEntierPositif($valeur) {
        return preg_match("/[^0-9]/", $valeur) == 0;
        
    }

    function estTableauEntiers($tabEntiers) {
        $ok = true;
        foreach($tabEntiers as $unEntier){
            if(!$this->estEntierPositif($unEntier)){
                 $ok=false; 
            }
        }
        return $ok;
    }

    function lesQteFraisValides($lesFrais){
        return $this->estTableauEntiers($lesFrais);
    }

    public function majFraisForfait($idVisiteur, $mois, $lesFrais){
		$lesCles = array_keys($lesFrais);
		foreach($lesCles as $unIdFrais){
			$qte = $lesFrais[$unIdFrais];
            $this->db->query("UPDATE lignefraisforfait SET lignefraisforfait.quantite = $qte
			WHERE lignefraisforfait.idvisiteur = '$idVisiteur' AND lignefraisforfait.mois = '$mois'
			AND lignefraisforfait.idfraisforfait = '$unIdFrais'");
		}
	}

    public function ajoutFraisHorsForfait($idVisiteur,$mois,$libelle,$dateFrais,$montant){
        $this->db->query("INSERT INTO lignefraishorsforfait (`id`, `idVisiteur`, `mois`, `libelle`, `date`, `montant`) VALUES (null,'$idVisiteur','$mois','$libelle','$dateFrais','$montant')");
        $ok=true;
        return $ok;
    }
    
    function valideInfosFrais($dateFrais,$libelle,$montant){
        $ok=true;
        if($dateFrais==""){
            $ok=false;
        }
        else{
            if($this->estDatevalide($dateFrais)){
                $ok=false;
            }	
            else{
                if($this->estDateDepassee($dateFrais)){
                    $ok=false;
                }			
            }
        }
        if($libelle == ""){
            $ok=false;
        }
        if($montant == ""){
            $ok=false;
        }
        else
            if( !is_numeric($montant) ){
                $ok=false;
            }
        return $ok;
    }
    function estDateDepassee($dateTestee){
        $dateActuelle=date("d/m/Y");
        @list($jour,$mois,$annee) = explode('/',$dateActuelle);
        $annee--;
        $AnPasse = $annee.$mois.$jour;
        @list($jourTeste,$moisTeste,$anneeTeste) = explode('/',$dateTestee);
        return ($anneeTeste.$moisTeste.$jourTeste < $AnPasse); 
    }

    function estDateValide($date){
        $tabDate = explode('/',$date);
        $dateOK = true;
        if (count($tabDate) != 3) {
            $dateOK = false;
        }
        else {
            if (!estTableauEntiers($tabDate)) {
                $dateOK = false;
            }
            else {
                if (!checkdate($tabDate[1], $tabDate[0], $tabDate[2])) {
                    $dateOK = false;
                }
            }
        }
        return $dateOK;
    }

    public function supprimerFraisHorsForfait($idFrais){
        $this->db->query("DELETE FROM lignefraishorsforfait WHERE lignefraishorsforfait.id =$idFrais");
	}


}