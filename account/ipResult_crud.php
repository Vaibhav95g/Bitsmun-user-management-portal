<?php 
class ipResult_crud{	
	public function __construct(){
		$GLOBALS['m'] = new MongoClient();
   		$GLOBALS['db'] = $GLOBALS['m']->bitsmun;
	}

	public function insert($username,$pos,$result){
		$collection = $GLOBALS['db']->ipResult;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		if($cursor->count() == 0){ 		
			$document = array(
				"username" => $username,
				"position" => $pos,
		      	 	"result" => $result 
			);
		  	$collection->insert($document);
		}
		else{
			$collection->update(array('username' => $username), array(
	      	 	"username" => $username,
			"position" => $pos,
		    	"result" => $result 
		    ));	
		}
		$message = "Data inserted successfully";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}


	public function read($username){
		$collection = $GLOBALS['db']->ipResult;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		return $cursor;
	}

	public function readGeneral(){
		$collection = $GLOBALS['db']->ipResult;
		$cursor = $collection->find();
		return $cursor;
	}

	public function readStatus($username){
		$collection = $GLOBALS['db']->ipResult;
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
