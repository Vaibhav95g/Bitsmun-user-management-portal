  <!DOCTYPE HTML>
<html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<!-- Latest compiled and minified CSS -->
<script src="http://code.jquery.com/jquery-2.1.4.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<!-- Custom styles for this template -->
   <style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
// define variables and set to empty values
$nameErr = "";
$name =  $poc = $pnm =  $address = $region = $pt = $tt = $mp = $exp = $nmi = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])) {
		$nameErr = "Domain ID is required";
	} else {
		$name = test_input($_POST["name"]);
	}
  
	$poc = test_input($_POST["poc"]);
	$pnm = test_input($_POST["pnm"]);
	$address = test_input($_POST["address"]);
	$region = test_input($_POST["region"]);
	$pt = test_input($_POST["pt"]);
	$q1 = test_input($_POST["q1"]);

	$q2 = array();
	$i = 0;
	if (!empty($_POST["q2a"])){
		$q2[$i] = test_input($_POST["q2a"]);
		$i = $i + 1;
	}
	if (!empty($_POST["q2b"])){
		$q2[$i] = test_input($_POST["q2b"]);
		$i = $i + 1;
	}


	
	$q3 = test_input($_POST["q3"]);
	$q4 = test_input($_POST["q4"]);
	$q5 = array();
	$j = 0;
	if (!empty($_POST["q5a"])){
		$q5[$j] = test_input($_POST["q5a"]);
		$j = $j + 1;
	}
	if (!empty($_POST["q5b"])){
		$q5[$j] = test_input($_POST["q5b"]);
		$j = $j + 1;
	}
	if (!empty($_POST["q5c"])){
		$q5[$j] = test_input($_POST["q5c"]);
		$j = $j + 1;
	}

	$nmi = test_input($_POST["nmi"]);

	
	

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

 <div class="container">

   	<div class="starter-template">
   	<h1></h1>
	<div class="jumbotron">  	
    		<h1>Company Survey Form</h1>
        <p class="lead">Use this form to enter the information about companies<br></p>
        </div>
		</div><!-- /starter-template class -->
		<div class="form-signin">
			<form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
		<div class="form-group">
    <label class="control-label col-sm-4" for="name">Company Name:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Company Name">
      <span class="error"><?php echo $nameErr;?></span>
    </div>
  </div>

	<div class="form-group">
    <label class="control-label col-sm-4" for="poc">Person of contact:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="poc" name="poc" placeholder="Enter Person of Contact Name">
    </div>
  </div>


	<div class="form-group">
    <label class="control-label col-sm-4" for="pnm">Phone Number:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="pnm" name="pnm" placeholder="Enter Phone Number">
    </div>
  </div>

	
	<div class="form-group">
    <label class="control-label col-sm-4" for="address">Address:</label>
    <div class="col-sm-6">
      <textarea input type="text" rows="2" class="form-control" id="address" name="address" placeholder="Enter Address"></textarea>
    </div>
  </div>
	
	<div class="form-group">
    <label class="control-label col-sm-4" for="region">Region:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="region" name="region" placeholder="Enter Region">
    </div>
  </div>


	<div class="form-group">
    <label class="control-label col-sm-4" for="pt">Product Type:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="pt" name="pt" placeholder="Enter Product Type">
    </div>
  </div>


  	<div class="form-group">
    <label class="control-label col-sm-4" for="q1">Question1: Which corridor the goods generally move(procurement and supply)?</label>
    <div class="col-sm-6">
      <textarea input type="text" class="form-control" rows="2" id="q1" name="q1" placeholder="Answer question 1"></textarea>
    </div>
  </div>

  	<div class="form-group">
    <label class="control-label col-sm-4" for="q2">Question2: Transport Type</label>
    <div class="col-sm-6">
      <input type='checkbox' runat='server' id="q2a" name="q2a" value="Ad_Hoc">Ad-hoc
      <p></p>
      <input type='checkbox' runat='server' id="q2b" name="q2b" value="Tender">Tender
    </div>
  </div>

  	<div class="form-group">
    <label class="control-label col-sm-4" for="q3">Question3: truck kaha se lagwate hai</label>
    <div class="col-sm-6">
      <textarea input type="text" rows="2" class="form-control" id="q3" name="q3" placeholder="Answer the question 3"></textarea>
    </div>
  </div>

	<div class="form-group">
    <label class="control-label col-sm-4" for="q4">Question4: Problems in existing services</label>
    <div class="col-sm-6">
      <textarea input type="text" rows="2" class="form-control" id="q4" name="q4" placeholder="Answer question 4"></textarea>
    </div>
  </div>
	
	<div class="form-group">
    <label class="control-label col-sm-4" for="q5">Question5: Problem Validation:</label>
    <div class="col-sm-6">
      <input type='checkbox' runat='server' id="q5a" name="q5a" value="Availability">Availability
      <p></p>
      <input type='checkbox' runat='server' id="q5b" name="q5b" value="Reliability">Reliability
      <p></p>
      <input type='checkbox' runat='server' id="q5c" name="q5c" value="Cost">Cost
    </div>
  </div>
	
	<div class="form-group">
    <label class="control-label col-sm-4" for="nmi">New Market Insight:</label>
    <div class="col-sm-6">
      <textarea input type="text" rows="2" class="form-control" id="nmi" name="nmi" placeholder="Enter New Market Insight"></textarea>
    </div>
  </div>
	
	
   <div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-8">
      <button type="submit" class="btn btn-lg btn-primary" name="submit" value="Submit">Submit</button>
    </div>
  </div>
  </form>
  </div>   
  </div> <!-- end container -->
</form>
</div></div>


<?php
if((empty($nameErr))&&(!empty($name))){
	 $m = new MongoClient();
	$db = $m->surveyData;
	$collection = $db->createCollection("companySurveyData");
	$document = array(
	        "companyName" => $name,
		"personOfContact" => $poc,
		"phoneNumberMobile" => $pnm,
		"address" => $address,
		"region" => $region,
		"productType" => $pt,
		"Question1" => $q1,
		"Question2" => $q2,
		"Question3" => $q3,
		"Question4" => $q4,
		"Question5" => $q5,
		"newMarketInsights" => $nmi,
	        
	   );
	$collection->insert($document);
	$message = "Data inserted successfully";
echo "<script type='text/javascript'>alert('$message');</script>";
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
