<?php 
class delResult_crud{	
	public function __construct(){
		$GLOBALS['m'] = new MongoClient();
   		$GLOBALS['db'] = $GLOBALS['m']->bitsmun;
	}

	public function insert($username,$council,$country,$result){
		$collection = $GLOBALS['db']->delResult;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		if($cursor->count() == 0){ 		
			$document = array(
				"username" => $username,
				"council" => $council,
				"country" => $country,
		      	 	"result" => $result 
			);
		  	$collection->insert($document);
		}
		else{
			$collection->update(array('username' => $username), array(
	      	 	"username" => $username,
			"council" => $council,
			"country" => $country,		    	
			"result" => $result 
		    ));	
		}
		$message = "Data inserted successfully";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}


	public function read($username){
		$collection = $GLOBALS['db']->delResult;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		return $cursor;
	}

	public function readGeneral(){
		$collection = $GLOBALS['db']->delResult;
		$cursor = $collection->find();
		return $cursor;
	}

	public function readStatus($username){
		$collection = $GLOBALS['db']->delResult;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		$status = false;
		if($cursor->count() != 0){
			$status = true;
		}
		return $status;
	}		
	
};


?>
