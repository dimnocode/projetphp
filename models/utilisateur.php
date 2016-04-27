<?php

class utilisateur {
    
    private $utilisateur;
    private $code;
    private $nom;
    private $prenom;
    private $admin;
    private $actif;
    
    public function getUtilisateur(){
		return $this->utilisateur;
	}

	public function setUtilisateur($utilisateur){
		$this->utilisateur = $utilisateur;
	}

	public function getCode(){
		return $this->code;
	}

	public function setCode($code){
		$this->code = $code;
	}

	public function getNom(){
		return $this->nom;
	}

	public function setNom($nom){
		$this->nom = $nom;
	}

	public function getPrenom(){
		return $this->prenom;
	}

	public function setPrenom($prenom){
		$this->prenom = $prenom;
	}

	public function getAdmin(){
		return $this->admin;
	}

	public function setAdmin($admin){
		$this->admin = $admin;
	}

	public function getActif(){
		return $this->actif;
	}

	public function setActif($actif){
		$this->actif = $actif;
	}
    
    
    
}

?>