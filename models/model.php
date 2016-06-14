<?php
class Model{
	Public $table;
	private $connection;
	
	function __construct() {
		
		try {

		  $dns = 'mysql:host=127.0.0.1;dbname=ventelivres';
		  $utilisateur = "root";
		  $motDePasse = '';
		 
		  // Options de connection
		  $options = array(
			PDO::MYSQL_ATTR_INIT_COMMAND    => "SET NAMES utf8"
		  );
		 
		  // Initialisation de la connection
		  $this->connection = new PDO( $dns, $utilisateur, $motDePasse, $options );
		} catch ( Exception $e ) {
		  echo "Connection à MySQL impossible : ", $e->getMessage();
		  die();
		}
	}
	
	public function list($fields=null,$search=null){
		if($fields==null){
			$fields = '*';
		}
		if ($search== null){
			$sql= 'SELECT '.$fields.' from '.$this->table ;
		}
		else{
         $sql='';
         foreach($search as $key => $val) {
            if (isset($key)) {
                if ($sql!='') {
                    $sql .=' and ';
                }
             if (gettype($val) != "string"){
                $sql .=$key." = ".$val;
            }else {
                 $sql .=$key." like '%".$val."%'";
             }
            
            }
         }
			$sql= 'SELECT '.$fields.' from '.$this->table .'  where '.$sql;
            //echo $sql;
		}
      
		
		
		try {
		  // On envois la requète
		  $select = $this->connection->query($sql);
		  // On indique que nous utiliserons les résultats en tant qu'objet
		$select->setFetchMode(PDO::FETCH_OBJ);
            
		$this->data = new stdClass();
			$this->data = $select->fetchAll();

		} catch ( Exception $e ) {
		  echo 'Une erreur est survenue lors de la récupération des créateurs';
		}
	}
	
	public function rtv_Table(){
	
			
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
	
	public function read($fields=null, $post=null){
	
		if($fields==null){
			$fields = '*';
		}
	
	
	
		$test='';
		foreach($post as $key => $val)
		{
			if($test!=''){
				$test.=' and';
			} else {
				$test.=' where';
			}
			$test.=" upper(".$key.") like upper('%".$val."%') ";
		}
	
		if ($this->id== null){
	
			$sql= 'SELECT '.$fields.' from '.$this->table.$test;
		}
	
		//else{
		//	$sql= 'SELECT '.$fields.' from '.$this->table .'  where '.$this->PK.' = '.$this->id ;
		//}
	
	
		try {
			// On envois la requète
			$select = $this->connection->query($sql);
			//echo $sql;
			// On indique que nous utiliserons les résultats en tant qu'objet
			$select->setFetchMode(PDO::FETCH_OBJ);
			$this->data = new stdClass();
			$this->data = $select->fetchAll();
	
		} catch ( Exception $e ) {
			echo 'Une erreur est survenue lors de la récupération des créateurs';
		}
	
	}
	
	
	static function load($name){
		require ($name.'.php');
		return new $name();
	}
    
    public function getConnection() {
        return $this->connection;
    }
	

}



?>
