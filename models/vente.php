<?php

class vente extends Model{       
    
    var $id;
    var $table = "ventes";
    var $PK = "idvente";
    var $data;
    
    function vente_create($utilisateur){
    	$sql= "call vente_create ('".$utilisateur."');";
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