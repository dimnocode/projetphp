<?php

class utilisateur extends Model{
    
    private $utilisateur;
    private $code;
    private $nom;
    private $prenom;
    private $admin;
    private $actif;
    
    var $id;
    var $table = "utilisateurs";	
	var $PK = "utilisateur";
	var $data; 
    
    
    public function modif($element){
        return "<td><input type=\"submit\" value=\"Mod\"></td>";
    }
    
    public function action($element){        
        
        if($element->actif == 1){
            $checked = "checked";
        }else{
            $checked = "";  
        }
        return "<td><input type=\"checkbox\" id=\"actif\" name=\"actif\" value=\"actif\"" .$checked." ></td>";

    }
    
    public function getID($element){
		return $element->utilisateur;
	}
    
    static function auth($UTILISATEUR, $CODE){
		//$utilisateurs=Model::load("utilisateurs");
    	$utilisateurs = new utilisateur;    	
		$utilisateurs->read('code, actif',array('utilisateur' => $UTILISATEUR ));
		if(count($utilisateurs->data) >0 && $utilisateurs->data[0]->code==$CODE && $utilisateurs->data[0]->actif==1){
			return true;
		}else{
			return false;
		}
	}

	static function admin(){
		if (isset($_SESSION['UTILISATEUR'])){
			$utilisateurs=Model::load("utilisateurs");
			$utilisateurs->read('admin',array('utilisateur' => $UTILISATEUR ));
			if(count($utilisateurs->data) >0 && $utilisateurs->data[0]->admin==1){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}

	}
    
    function utilisateur_activ($Utilisateur){
		$sql= "call utilisateur_activ ('".$Utilisateur."') ";
		parent::getConnection()->query($sql);
	}

	function utilisateur_desactiv($Utilisateur){
		$sql= "call utilisateur_desactiv ('".$Utilisateur."') ";
		parent::getConnection()->query($sql);
	}
    
    function utilisateur_create($Utilisateur){
		$sql= "call utilisateur_create ('".$Utilisateur."') ";
		parent::getConnection()->query($sql);
	}
    
    function utilisateur_update($Utilisateur){
		$sql= "call utilisateur_update ('".$Utilisateur."') ";
		parent::getConnection()->query($sql);
	}
}

?>
