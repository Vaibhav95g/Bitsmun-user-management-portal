<?php
require_once("../models/config.php");
require_once("./widget.php");
//Request method: GET
/*
$ajax = checkRequestMode("get");

if (!securePage(__FILE__)){
    apiReturnError($ajax);
}
*/
require_once("./execessay_crud.php");
require_once("./execEssayAns_crud.php");
require_once("./execEssayAnsTemp_crud.php");
require_once("./info_crud.php");

setReferralPage(getAbsoluteDocumentPath(__FILE__));

?>
 <!DOCTYPE html>
<html lang="en">
  <?php
  	echo renderAccountPageHeader(array("#SITE_ROOT#" => SITE_ROOT, "#SITE_TITLE#" => SITE_TITLE, "#PAGE_TITLE#" => "Edit Form"));
  ?>
<body>

<?php
$username = "vaibhav";
// define variables and set to empty values
$essay1 = $essay2 = $essay3 =  $submit = "";
$essay = new execessay_crud();
//$essay->add_essay("Write your First Question Here");
//$essay->add_essay("Write your Second Question Here");
//$essay->add_essay("Write your Third Question Here");
$list = $essay->get_essay();

$readTemp = new execEssayAnsTemp_crud();
$read = new execEssayAns_crud();
$cursorAns = $read->read($username);
$cursorAnsTemp = $readTemp->read($username);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $essay1 = test_input($_POST["essay0"]);
   $essay2 = test_input($_POST["essay1"]);
   $essay3 = test_input($_POST["essay2"]); 
   $submit = test_input($_POST["submit"]);
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

  <div id="wrapper">

      <!-- Sidebar -->
        <?php
          echo renderMenu("edit_publisher");
        ?>  

      	<div id="page-wrapper">
	  			<div class="row">
          	<div id='display-alerts' class="col-lg-12">

          	</div>
        	</div>
		<div class="jumbotron">
    		<h1>Step 2 | Essay</h1>
	 <p class="lead"><br></p>
        <p class="lead">Please Select the Position You would Like To Apply For In International Press<br></p>
	</div>        
	<div class="row">
		  			<div class="col-lg-6">
			<form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
	
	<?php
		$info = new info_crud();
		$status = $info->readStatus($username);
		if($status){
			$variable = "";
			if($cursorAns->count() == 0){
				for($i = 0; $i < count($list); $i++){
					$j = $i + 1;
					$temp = "Essay" . $j;
					foreach($cursorAnsTemp as $doc){
						$variable = $doc[$temp];
					}
					//echo "<script type='text/javascript'>alert('$variable');</script>";	
					echo "<div class='form-group'><label class='control-label col-sm-4' for='essay".$i."'>". $list[$i] ."</label><div class='col-sm-12'><textarea class='form-control execexp' name='essay".$i."' rows='20' id='essay".$i."' placeholder='Write your answer here' required>".$variable."</textarea></div></div>";
				}
				echo "<div class='form-group'><div class='col-sm-offset-4 col-sm-8'><button type='submit' class='btn btn-lg btn-primary' id = 'save' name='submit' value='save'>Save</button>";
				echo " <button type='submit' class='btn btn-lg btn-success' id = 'submit' name='submit' value='submit' onclick='return confirm('Are you sure?');'>Submit</button>";
				echo "</div></div>";	
			}
			else if($cursorAns->count() != 0){
				for($i = 0; $i < count($list); $i++){
					$j = $i + 1;
					$temp = "Essay" . $j;
					foreach($cursorAns as $doc){
						$variable = $doc[$temp];
					}
					//echo "<script type='text/javascript'>alert('$variable');</script>";	
					echo "<div class='form-group'><label class='control-label col-sm-4' for='essay".$i."'>". $list[$i] ."</label><div class='col-sm-12'><textarea class='form-control execexp' name='essay".$i."' rows='20' id='essay".$i."' placeholder='Write your answer here' required readonly>".$variable."</textarea></div></div>";
				}
			}
		}else{
			echo "<div class='form-group'><label class='control-label col-sm-12' for=''>PLEASE FIRST FILL YOUR GENERAL INFORMATION FORM IN ORDER TO PROCEED:</label><div class='col-sm-8'>";
		}
	?>  
  </form>
  </div>   
  </div>
</div></div>


<?php
if((!empty($essay1))&&(!empty($essay2))&&(!empty($essay3))&&($submit == "submit")){	 
	$crud = new execEssayAns_crud();
	$crud->insert($username,$essay1,$essay2,$essay3);
	$location = htmlspecialchars($_SERVER['PHP_SELF']);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$location.'">';
exit; 
}
if((!empty($essay1))&&(!empty($essay2))&&($submit == "save")){	 
	$crud = new execEssayAnsTemp_crud();
	$crud->insert($username,$essay1,$essay2,$essay3);
	$location = htmlspecialchars($_SERVER['PHP_SELF']);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$location.'">';
exit; 
}



?>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->


</body>
</html>

