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
    
	public function titresActions(){
		return '<th>Modifier</th><th>Ajout panier</th></tr>';
	}
    
    public function actions($element){        
        
        if($element->actif == 1){
            $checked = "checked";
            $panier = "<form class=\"form-inline\"><input type=\"number\" class=\"form-control input-sm\" id=\"nbarticle\" name=\"nbarticle\" value=\"1\" min=\"1\" max=\"100\"> 
                <input id=\"btAjoutPanier\" type=\"button\" class=\"btn btn-warning btn-xs\" value=\"Ajouter au panier\"></form>";
        }else{ 
            $checked = "";
            $panier = "<span class=\"label label-danger\">Indisponible</span>";
        }
        
        
        return "<td>
        			<button type=\"button\" id=\"modif\" class=\"btn btn-primary btn-xs\">...</button>
        		</td>
        		<td>".$panier."</td>";

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
		$sql= "call livre_update (".$livre['LivreID'].", '".$livre['titre']."', '".$livre['auteur']."', ".$livre['prix_unitaire'].", ".$livre['actif'].")";
		parent::getConnection()->query($sql);
	}
    
    function livre_find($livre){
        $con = parent::getConnection();
        $stmt = $con->prepare("call livre_find ('".$livre['LivreID']."') "); 
        $stmt->execute(); 
        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));       
	}
    
}
?>
