<?php 
class execEssayAnsTemp_crud{	
	public function __construct(){
		$GLOBALS['m'] = new MongoClient();
   		$GLOBALS['db'] = $GLOBALS['m']->bitsmun;
	}

	public function insert($username,$essay1,$essay2,$essay3){
		$collection = $GLOBALS['db']->execEssayAnsTemp;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		if($cursor->count() == 0){ 		
			$document = array(
				"username" => $username,
		      	 	"Essay1" => $essay1, 
		       		"Essay2" => $essay2,
				"Essay3" => $essay3
			);
		  	$collection->insert($document);
		  	
		}
		else{
			$collection->update(array('username' => $username), array(
	      	 	"username" => $username,
		      	"Essay1" => $essay1, 
		       	"Essay2" => $essay2, 
			"Essay3" => $essay3
		    ));	
		}
		$message = "Data saved successfully";
		        echo "<script type='text/javascript'>alert('$message');</script>";
	}


	public function read($username){
		$collection = $GLOBALS['db']->execEssayAnsTemp;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		return $cursor;
	}		
	
};


?>
