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
        echo $livre;
		$sql= "call livre_activ ('".$livre."') ";
		parent::getConnection()->query($sql);
	}

	function livre_desactiv($livre){
		$sql= "call livre_desactiv ('".$livre."') ";
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
