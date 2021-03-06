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
	
	public function rtv_Table($type){
			$out  = "";
			$titre= '<tr>';
			$titre_trt= false;
            
			foreach($this->data as $key => $element){              
				$out .= '<tr>';
				foreach($element as $subkey => $subelement){
                        if($titre_trt==false){
                            $titre .= '<th id="'.$subkey.'">'.$subkey.'</th>';	
                        }
                        $out .= '<td id="'.$subkey.'">'.$subelement.'</td>' ;
				}
				if($titre_trt==false){
					$titre.= $this->titresActions();
				}
				$titre_trt= true;
                $out .= $this->actions($element);		
			}
			$out = '<table id="'.$this->table.'" class="table table-striped">'.$titre.$out.'</table>';
			return $out;
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
