<?php
sleep(1);
require_once("./crud.php");
$pubid = $_POST['pubid'];
$sid = $_POST['sid'];
//list($pubid,$sid) = split('[|]', $temp);
$var = (new crud)->statusUpdate($pubid,$sid);
	sleep(0.5);
echo $var;
?>
