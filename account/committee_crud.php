<?php
	class committee_crud{
		public function __construct(){
			$GLOBALS['m'] = new MongoClient();
   			$GLOBALS['db'] = $GLOBALS['m']->bitsmun;
		}
	
		public function add_committee($val){
			$value = array(
  				"committee" => $val
  			);
			$collection = $GLOBALS['db']->committees;
			
			$collection->insert($value);
		}

		public function remove_committee($val){
			$collection = $GLOBALS['db']->committees;
			$collection->remove(array(
  				"committee" => $val
  			));
	
		}
		
		public function update_committee($val,$newVal){
			$collection = $GLOBALS['db']->committees;
			$collection->update(array("committee"=>$val),array("committee"=>$newVal));
		}
	
		public function get_committee(){
			$collection = $GLOBALS['db']->committees;
			$cursor = $collection->find();
			$i = 0;
			$comm_array = array();
			foreach($cursor as $doc){
				$comm_array[$i] =  $doc['committees'];
				$i = $i + 1;
			}
			return $comm_array;		
		}
	}
?>
