<?php
	class delcouncil_crud{
		public function __construct(){
			$GLOBALS['m'] = new MongoClient();
   			$GLOBALS['db'] = $GLOBALS['m']->bitsmun;
		}
	
		public function add_council($val){
			$value = array(
  				"council" => $val
  			);
			$collection = $GLOBALS['db']->delCouncil;
			
			$collection->insert($value);
		}

		public function remove_council($val){
			$collection = $GLOBALS['db']->delCouncil;
			$collection->remove(array(
  				"council" => $val
  			));
	
		}
		
		public function update_council($val,$newVal){
			$collection = $GLOBALS['db']->delCouncil;
			$collection->update(array("council"=>$val),array("council"=>$newVal));
		}
	
		public function get_council(){
			$collection = $GLOBALS['db']->delCouncil;
			$cursor = $collection->find();
			$i = 0;
			$con_array = array();
			foreach($cursor as $doc){
				$con_array[$i] =  $doc['council'];
				$i = $i + 1;
			}
			return $con_array;		
		}
	}
?>
