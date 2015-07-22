<?php

// UserCake authentication
require_once("../models/config.php");
require_once("./committee_crud.php");
require_once("./info_crud.php");
require_once("./ipEssayAns_crud.php");
require_once("./crud.php");

// Request method: GET
$ajax = checkRequestMode("get");

if (!securePage(__FILE__)){
    apiReturnError($ajax);
}


setReferralPage(getAbsoluteDocumentPath(__FILE__));

// Admin page
?>
<!DOCTYPE html>
<html lang="en">
  <?php
  	echo renderAccountPageHeader(array("#SITE_ROOT#" => SITE_ROOT, "#SITE_TITLE#" => SITE_TITLE, "#PAGE_TITLE#" => "Admin Dashboard"));
  ?>
<head>
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css">
  
<!-- include jquery library -->
<script src="http://code.jquery.com/jquery-2.1.4.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>

<script>
function callthis(arg,arg1,arg2){
	//  alert(arg);
       $.post("dashboardAjax.php",
        {
         pubid: arg1,
         sid: arg2
        },
      
        function(data,status){
        	//var myObj = $.parseJSON(data);
        	document.getElementById(arg).innerHTML = data;
        	if(data=="Enabled"){
        		document.getElementById(arg).classList.remove('btn-danger');
        		document.getElementById(arg).classList.add('btn-success');
        	}else{
        		document.getElementById(arg).classList.remove('btn-success');
        		document.getElementById(arg).classList.add('btn-danger');
					}
        	 
        });
    //    $("#".concat(arg)).remove
}

</script>
<?php
	$committee = new committee_crud();
	//$committee->add_committee("International Press");
	//$committee->add_committee("Executive Booard");
	//$committee->add_committee("Delegates");
?>
  <body>    
    <div id="wrapper">

      <!-- Sidebar -->
        <?php
            echo renderMenu("dashboard-admin");
        ?>

     <div id="page-wrapper">
	  	<div class="row">
          <div id='display-alerts' class="col-lg-12">
          
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <h1>Dashboard <small>User Overview</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>
            
              <h2 class="sub-header">Section title</h2>
          <div class="table-responsive">
            <table id ="usertable" class="table table-striped">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Phone No.</th>
                  <th>Email ID</th>
		  <th>Institute</th>
                  <th>Status</th>
		  <th>View</th>		
                </tr>
              </thead>
              <tbody>
              <?php
              	$show = new info_crud();
              	$info = $show->readGeneral();
              	foreach($info as $doc){
			$status = (new ipEssayAns_crud())->readStatus($doc['username']);
			if($status){
			      		echo "<tr>
				  <td>".$doc['username']."</td>
				  <td>".$doc['name']."</td>
				  <td>".$doc['countryCode'] . $doc['phoneNumber']."</td>;
				  <td>".$doc['email']."</td>;
				  <td>".$doc['institute']."</td>;
				  <td>".$doc['institute']."</td>;
				  <td>".$doc['institute']."</td>";
			      	$arg1=$doc['username'];
			      	$arg2=$doc['name'];
			      	$arg = $arg1.$arg2;
			      	//if($doc['name']=="Enabled") $btnclass = 'btn-success';
			      	//else $btnclass = 'btn-danger';
		  		//						echo "<td><button class='btn $btnclass' name='submit' id=".$arg." onclick=" . "callthis('$arg','$arg1','$arg2');>".$doc['status']."</button></td> ";	              
				echo "</tr>";
			}
              	}
              ?>                
              </tbody>
            </table>    
            </div>
          </div>
          
          <div class="row">
          <div id='widget-users' class="col-lg-12">          

          </div>
        </div><!-- /.row -->
		
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->
    
    <script src="../js/raphael/2.1.0/raphael-min.js"></script>
    <script src="../js/morris/morris-0.4.3.js"></script>
    <script src="../js/morris/chart-data-morris.js"></script>
    <script>
       /* $(document).ready(function() {          
          alertWidget('display-alerts');
          
          // Initialize the transactions tablesorter
          $('#transactions .table').tablesorter({
              debug: false
          });
          
        });*/
	$(document).ready( function () {
    $('#usertable').DataTable();
} );      
    </script>
  </body>
</html>
