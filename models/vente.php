<?php

class ventes {
    
    private $id;
    private $datevente;
    private $etat;
    private $utilisateurs_utilisateur;
    
    	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getDatevente(){
		return $this->datevente;
	}

	public function setDatevente($datevente){
		$this->datevente = $datevente;
	}

	public function getEtat(){
		return $this->etat;
	}

	public function setEtat($etat){
		$this->etat = $etat;
	}

	public function getUtilisateurs_utilisateur(){
		return $this->utilisateurs_utilisateur;
	}

	public function setUtilisateurs_utilisateur($utilisateurs_utilisateur){
		$this->utilisateurs_utilisateur = $utilisateurs_utilisateur;
	}

}

?>