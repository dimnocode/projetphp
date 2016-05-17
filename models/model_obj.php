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
			PDO::MYSQL_ATTR_INIT_COMMAND    => "SET NAMES utf8", PDO::ATTR_EMULATE_PREPARES => false
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
             if (gettype($val) == "integer"){
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
		//$select->setFetchMode(PDO::FETCH_OBJ);
            
		//$this->data = new stdClass();
			$this->data = $select->fetchAll(PDO::FETCH_CLASS, get_class($this));

		} catch ( Exception $e ) {
		  echo 'Une erreur est survenue lors de la récupération des créateurs';
		}
	}
	
	public function rtv_Table(){
	
			
			$out  = "";
			
			$titre= '<tr>';
			$titre_trt= false;
			var_dump($this->data);
			foreach($this->data as $key => $element){
                
				$out .= '<tr>';
                echo "<br>";
                echo "<br>";
                var_dump($element);
				foreach($element as $subkey => $subelement){
                    
					if($titre_trt==false){
						$titre .= '<th>'.$subkey.'</th>';	
					}
					echo "<br>";
                    echo "<br>";
                    var_dump($subelement);
					$out .= '<td>'.$subelement.'</td>' ;
				}
				if($titre_trt==false){
					$titre.= '<th>Mod</th><th>Action</th></tr>';
				}
				$titre_trt= true;
				$out .= '<td>'.$element->utilisateur.'</td></tr>';
			}
			$out = '<table>'.$titre.$out.'</table>';
			

			return $out;

	}
	
	static function load($name){
		require ($name.'.php');
		return new $name();
	}
	

}



?>