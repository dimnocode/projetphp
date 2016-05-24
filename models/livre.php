<?php

class livre extends Model {
    
    private $LivreID;
    private $titre;
    private $auteur;
    private $prix_unitaire;
    private $actif;

    var $table = "livres";	
	var $PK = "LivreID";
	var $data ;
    
    public function modif($element){
         return "<td><form action=\"modlivres.php\" method=\"post\"> <input type=\"hidden\"  name=\"id\" value=\"".$element->LivreID."\"> <input type=\"submit\" value=\"Mod\"></form></td>";
    }
    
    public function action($element){        
        
        return "<td><form action=\"\" method=\"post\"> <input type=\"hidden\"  name=\"id\" value=\"".$element->LivreID."\"> <input type=\"number\" name=\"qte\" min=\"1\" max=\"10\" value=\"1\"> 
        <input type=\"submit\" value=\"Ajouter\"> </form></td>";
    }


    public function getLivreID(){
		return $this->LivreID;
	}

	public function setLivreID($LivreID){
		$this->LivreID = $LivreID;
	}

	public function getTitre(){
		return $this->titre;
	}

	public function setTitre($titre){
		$this->titre = $titre;
	}

	public function getAuteur(){
		return $this->auteur;
	}

	public function setAuteur($auteur){
		$this->auteur = $auteur;
	}

	public function getPrix_unitaire(){
		return $this->prix_unitaire;
	}

	public function setPrix_unitaire($prix_unitaire){
		$this->prix_unitaire = $prix_unitaire;
	}

	public function isActif(){
		return $this->actif;
	}

	public function setActif($actif){
		$this->actif = $actif;
	}
}
?>