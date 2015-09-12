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
    		<h1>Applicant Information</h1>
	 <p class="lead"><br></p>
        <p class="lead">Please Select the Position You would Like To Apply For In International Press<br></p>
	</div>        
	<div class="row">
		  			<div class="col-lg-6">
			<form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
	
	<?php
		$infom = new info_crud();
		$info = $infom->read($username);
		foreach($info as $doc){
			echo "<div class='form-group'><label class='control-label col-sm-4' for='username'>User Name</label><div class='col-sm-12'><label class='control-label col-sm-4' for='username'>".$_GET['username']."</label></div></div>";
			echo "<div class='form-group'><label class='control-label col-sm-4' for='username'>Committee</label><div class='col-sm-12'><label class='control-label col-sm-4' for='username'>".$_GET['committee']."</label></div></div>";
			//echo "<div class='form-group'><label class='control-label col-sm-4' for='essay".$i."'>". $list[$i] ."</label><div class='col-sm-12'><textarea class='form-control execexp' name='essay".$i."' rows='20' id='essay".$i."' placeholder='Write your answer here' required>".$variable."</textarea></div></div>";
			//echo "<div class='form-group'><label class='control-label col-sm-4' for='essay".$i."'>". $list[$i] ."</label><div class='col-sm-12'><textarea class='form-control execexp' name='essay".$i."' rows='20' id='essay".$i."' placeholder='Write your answer here' required>".$variable."</textarea></div></div>";

		}
		
			
	?>  
  </form>
  </div>   
  </div>
</div></div>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->


</body>
</html>

