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
        return "<td><form action=\"\" method=\"post\"> <input type=\"hidden\"  name=\"id\" value=\"".$element->utilisateur."\"> <input type=\"submit\" value=\"Mod\"></form></td>";
    }
    
    public function action($element){        
        
        if($element->actif == 1){
            $checked = "checked";
        }else{
            $checked = "";  
        }
        return "<td><form action=\"\" method=\"get\"> <input type=\"hidden\"  name=\"id\" value=\"".$element->utilisateur."\"> <input type=\"checkbox\" id=\"actif\" name=\"actif\" value=\"actif\"" .$checked." > </form></td>";

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
    
	function print_table() {
		$out  = "";
			
		$titre= '<tr>';
		$titre_trt= false;
		//var_dump($this->data);
	
		foreach($this->data as $key => $element){
			 
			$out .= '<tr>';
			//echo "<br>";
			//echo "<br>";
	
			//var_dump($element);
			foreach($element as $subkey => $subelement){
				if ($subkey != 'actif') {
					if($titre_trt==false){
						$titre .= '<th>'.$subkey.'</th>';
					}
					//echo "<br>";
					//echo "<br>";
					//var_dump($subelement);
					$out .= '<td>'.$subelement.'</td>' ;
				}
			}
			if($titre_trt==false){
				$titre.= '<th>Mod</th><th>Actif</th></tr>';
			}
			$titre_trt= true;
			$out .= $this->modif($element);
			$out .= $this->action($element);
	
			//				if($type == "utilisateur"){
			//                  $out .= '<td>'.$element->utilisateur.'</td></tr>';
			//                }
			//
			//                if($type == "livre"){
			//                  $out .= '<td>'.$element->LivreID.'</td></tr>';
			//                }
	
		}
		$out = '<table id="'.$this->table.'">'.$titre.$out.'</table>';
			
	
		return $out;
	}
    
}

?>
