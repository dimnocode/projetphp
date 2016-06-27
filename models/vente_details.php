<?php

class vente_details extends Model{       
    
    var $id;
    var $table = "vente_details";
    var $PK = "idvente";
    var $data;
    
    function vente_details_create($livreid,$prix_unitaire,$quantite,$idvente){
    	$sql= "call vente_details_create (".$livreid.",".$prix_unitaire.",".$quantite.",".$idvente.");";
    	$connection = parent::getConnection(); 
    	$connection->query($sql);
    	$res = $connection->query('select LAST_INSERT_ID() as newid;');
    	if ($res->rowCount() == 1) {
    		return $res->fetch(PDO::FETCH_ASSOC)['newid'];
    	} else {
    		return 0;
    	}  		
    }

}

?>