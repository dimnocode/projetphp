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
         return "<td><input type=\"submit\" value=\"Mod\"></td>";
    }
    
    public function action($element){        
        
        if($element->actif == 1){
            $checked = "checked";
        }else{
            $checked = "";  
        }
        return "<td><input type=\"checkbox\" id=\"actif\" name=\"actif\" value=\"actif\" " .$checked." ></td>";

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
    
}
?>
