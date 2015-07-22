<?php 
class execResult_crud{	
	public function __construct(){
		$GLOBALS['m'] = new MongoClient();
   		$GLOBALS['db'] = $GLOBALS['m']->bitsmun;
	}

	public function insert($username,$result){
		$collection = $GLOBALS['db']->execResult;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		if($cursor->count() == 0){ 		
			$document = array(
				"username" => $username,
		      	 	"result" => $result 
			);
		  	$collection->insert($document);
		}
		else{
			$collection->update(array('username' => $username), array(
	      	 	"username" => $username,
		    	"result" => $result 
		    ));	
		}
		$message = "Data inserted successfully";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}


	public function read($username){
		$collection = $GLOBALS['db']->execResult;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		return $cursor;
	}

	public function readGeneral(){
		$collection = $GLOBALS['db']->execResult;
		$cursor = $collection->find();
		return $cursor;
	}

	public function readStatus($username){
		$collection = $GLOBALS['db']->execResult;
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
