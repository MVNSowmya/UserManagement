<?php
$serverName="SOWMYAV";
$connectionInfo=array("Database"=>"projectfile","UID"=>"sa", "PWD"=>"venkatasowmya");
$conn = sqlsrv_connect($serverName,$connectionInfo);
if($conn){
	//echo "Connection established.";
}
else{
	echo "Connection could not be established.";
	die(print_r(sqlsrv_errors(),true));
}

?>