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
         return "<td><button type=\"button\" class=\"btn btn-primary btn-xs\">...</button></td>";
    }
    
    public function action($element){        
        
        if($element->actif == 1){
            $checked = "checked";
        }else{
            $checked = "";  
        }
        return "<td><form class=\"form-inline\"><input type=\"number\" class=\"form-control input-sm\" id=\"nbarticle\" name=\"nbarticle\" value=\"1\" min=\"1\" max=\"100\"> 
                <input id=\"btajout\" type=\"button\" class=\"btn btn-warning btn-xs\" value=\"Ajouter au panier\"></form></td>";

    }
    
    


    function livre_activ($livre){
        echo $livre;
		$sql= "call livre_activ ('".$livre."') ";
		parent::getConnection()->query($sql);
	}

	function livre_desactiv($livre){
		$sql= "call livre_desactiv ('".$livre."') ";
		parent::getConnection()->query($sql);
	}
    
    function livre_create($livre){
		$sql= "call livre_create ('".$livre['titre']."', '".$livre['auteur']."', ".$livre['prix_unitaire'].", ".$livre['actif'].")";
		parent::getConnection()->query($sql);
	}
    
    function livre_update($livre){
		$sql= "call livre_update ('".$livre."') ";
		parent::getConnection()->query($sql);
	}
    
}
?>
