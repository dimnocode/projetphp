<?php

class vente_details{
    
    private $idvente_detail;
    private $quantite;
    private $prix_unitaire;
    private $vente_idvente;
    private $livres_LivreID;
    
    public function getIdvente_detail(){
		return $this->idvente_detail;
	}

	public function setIdvente_detail($idvente_detail){
		$this->idvente_detail = $idvente_detail;
	}

	public function getQuantite(){
		return $this->quantite;
	}

	public function setQuantite($quantite){
		$this->quantite = $quantite;
	}

	public function getPrix_unitaire(){
		return $this->prix_unitaire;
	}

	public function setPrix_unitaire($prix_unitaire){
		$this->prix_unitaire = $prix_unitaire;
	}

	public function getVente_idvente(){
		return $this->vente_idvente;
	}

	public function setVente_idvente($vente_idvente){
		$this->vente_idvente = $vente_idvente;
	}

	public function getLivres_LivreID(){
		return $this->livres_LivreID;
	}

	public function setLivres_LivreID($livres_LivreID){
		$this->livres_LivreID = $livres_LivreID;
	}
    
}








?>