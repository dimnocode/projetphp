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
        
        if($element->actif == 1){
            $checked = "checked";
        }else{
            $checked = "";  
        }
        return "<td><form action=\"\" method=\"get\"> <input type=\"hidden\"  name=\"id\" value=\"".$element->LivreID."\"> <input type=\"checkbox\" id=\"actif\" name=\"actif\" value=\"actif\" " .$checked." > </form></td>";

    }
    


    function livre_activ($livre){
		$sql= "call livre_activ ('".$livre."') ";
		parent::getConnection()->query($sql);
	}

	function livre_desactiv($livre){
		$sql= "call livre_desactiv ('".$livre."') ";
		parent::getConnection()->query($sql);
	}

}
?>