	<?php
/*

UserFrosting Version: 0.2.2
By Alex Weissman
Copyright (c) 2014

Based on the UserCake user management system, v2.0.2.
Copyright (c) 2009-2012

UserFrosting, like UserCake, is 100% free and open-source.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the 'Software'), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING require_once("../models/config.php");
	require_once("./crud.php");
	require_once("./widget.php");BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

*/

require_once("../models/config.php");
	require_once("./crud.php");
	require_once("./widget.php");

// Request method: GET
$ajax = checkRequestMode("get");

if (!securePage(__FILE__)){
    apiReturnError($ajax);
}

setReferralPage(getAbsoluteDocumentPath(__FILE__));

?>

<!DOCTYPE html>
<html lang="en">
  <?php
  	echo renderAccountPageHeader(array("#SITE_ROOT#" => SITE_ROOT, "#SITE_TITLE#" => SITE_TITLE, "#PAGE_TITLE#" => "Dashboard"));
  ?>
<head>
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css">
  
<!-- include jquery library -->
<script src="http://code.jquery.com/jquery-2.1.4.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>

<script>
function callthis(arg, arg1,arg2,status){
	//  alert(arg);

	var a = $.ajax({
  url: 'dashboardAjax.php',
  type: 'POST',
  data: { pubid: arg1,
  				sid: arg2},
  beforeSend: function(){
  							
  							document.getElementById(arg).innerHTML = "Loading...";
  							var old = document.getElementById(arg);
								var old_class = old.className.split(' ')[1];
  							if(old_class=="btn-danger"){
								document.getElementById(arg).classList.remove('btn-danger');
        				document.getElementById(arg).classList.add('btn-warning');
        			}else if(old_class=="btn-success"){
        				document.getElementById(arg).classList.remove('btn-success');
        				document.getElementById(arg).classList.add('btn-warning');
							}	
              },
  success: function(data) {
     					document.getElementById(arg).innerHTML = data;
 		       		document.getElementById(arg).classList.remove('btn-warning');
							if(data=="Enabled"){
        				document.getElementById(arg).classList.add('btn-success');
        			}else{
        				document.getElementById(arg).classList.add('btn-danger');
							}	
						},
	complete: function(){
							var data2 = document.getElementById(arg).innerHTML;
							var old = document.getElementById(arg);
							var old_class = old.className.split(' ')[1];
							if(data2=="Enabled" && old_class=="btn-danger"){
								document.getElementById(arg).classList.remove('btn-danger');
        				document.getElementById(arg).classList.add('btn-success');
        			}else if(data2=="Disabled" && old_class=="btn-success"){
        				document.getElementById(arg).classList.remove('btn-success');
        				document.getElementById(arg).classList.add('btn-danger');
							}	
						}   		
});
}
</script>
</head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
        <?php
          echo renderMenu("dashboard");
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
            <table id ="mahtable" class="table table-striped">
              <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Secondary ID</th>
                  <th>Website</th>
                  <th>Widget(s)</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
              <?php
              	$show = new crud();
              	$info = $show->readForm2($_SESSION['username']);
              	$i = 1;
              	foreach($info as $doc){
              		echo "<tr>
              		<td>".$i++."</td>
                  <td>".$doc['sid']."</td>
                  <td>".$doc['website']."</td>";
                  $cursor = $show->readWidgets($_SESSION['username'],$doc['sid']);
              	foreach($cursor as $doc2){
              		$x = 0;
              		echo "<td>";
              		for($x = 0;$x < count($doc2['widget']);$x++){
              				echo $doc2['widget'][$x]. " ";	
              		}
              			echo "</td>";
              	}
/*              $arg1=$doc['pubid'];
              	$arg2=$doc['sid'];
              	$arg = $arg1.$arg2;
              	$arg3 = $doc['status'];
              	if($doc['status']=="Enabled") $btnclass = 'btn-success';
              	else $btnclass = 'btn-danger';
  								echo "<td><button class='btn $btnclass' name='submit' id=".$arg." onclick=" . "callthis('$arg','$arg1','$arg2','$arg3');>".$doc['status']."</button></td> ";	              
*/							echo "<td>".$doc['status']."</td>";
                echo "</tr>";
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
	
	<script>
	$(document).ready( function () {
    $('#mahtable').DataTable();
} );
</script>
  </body>
</html>


