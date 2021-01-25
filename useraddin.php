<?php 
require('connection.php');
if(isset($_REQUEST['add'])){
$username = $_REQUEST['username'];
$emailid = $_REQUEST['emailid'];
$manager = $_REQUEST['manager'];
$userid=substr($emailid,0,-14);
   if(isset($_REQUEST['ahTrade'])){
   	$value = $_REQUEST['ahTrade'];
   	$sql = "insert into dimUsers (UserName,eMailId,UserId,Segment,Manager,isActive) values('$username','$emailid','$userid','$value','$manager','Y')";
    $stmt = sqlsrv_query( $conn, $sql);
    if( $stmt === false ) {
       die( print_r( sqlsrv_errors(), true));
    }
   }

   if(isset($_REQUEST['contractmanufacturing'])){
   	$value = $_REQUEST['contractmanufacturing'];
   	$sql = "insert into dimUsers (UserName,eMailId,UserId,Segment,Manager,isActive) values('$username','$emailid','$userid','$value','$manager','Y')";
    $stmt = sqlsrv_query( $conn, $sql);
    if( $stmt === false ) {
       die( print_r( sqlsrv_errors(), true));
    }
   }

   if(isset($_REQUEST['exports'])){
   	$value = $_REQUEST['exports'];
   	$sql = "insert into dimUsers (UserName,eMailId,UserId,Segment,Manager,isActive) values('$username','$emailid','$userid','$value','$manager','Y')";
    $stmt = sqlsrv_query( $conn, $sql);
    if( $stmt === false ) {
       die( print_r( sqlsrv_errors(), true));
    }
   }

   if(isset($_REQUEST['hhTrade'])){
   	$value = $_REQUEST['hhTrade'];
   	$sql = "insert into dimUsers (UserName,eMailId,UserId,Segment,Manager,isActive) values('$username','$emailid','$userid','$value','$manager','Y')";
    $stmt = sqlsrv_query( $conn, $sql);
    if( $stmt === false ) {
       die( print_r( sqlsrv_errors(), true));
    }
   }

   if(isset($_REQUEST['institutions'])){
   	$value = $_REQUEST['institutions'];
   	$sql = "insert into dimUsers (UserName,eMailId,UserId,Segment,Manager,isActive) values('$username','$emailid','$userid','$value','$manager','Y')";
    $stmt = sqlsrv_query( $conn, $sql);
    if( $stmt === false ) {
       die( print_r( sqlsrv_errors(), true));
    }
   }
   echo '<script>alert("User Added Successfully");window.location="usermanagement.php";</script>';

}


?>
<html>
	<head>
		<title>New User Add In</title>
	<style type="text/css">
		#form{
	margin-left: 400px;
	border:1px solid grey;
	border-radius: 5px;
	width:450px;
	padding: 25px;
	height: 350px;
	background-color: white;
}

		h1{
			margin-left:525px;
			
		}
		body{
			font-family: serif;
			padding: 5px;
			background-color: #b3e8ff;
		}
		.btngrp{
  background-color: blue; 
  border: 1px solid blue; 
  color: white; 
  padding: 10px 50px;
  margin-right: 5px;
  cursor: pointer; 
  float: left; 
  font-size: 16px;
}
.btngrp:after {
  content: "";
  clear: both;
  display: table;
}
.btngrp:hover {
  background-color: white;
  color: blue;
}
input{
	border:none;
	border-bottom: 1px solid grey;
}
[type=text],[type=email]{
	width: 50%;
	margin-left: 50px;
}
#email{
	margin-left: 0px;
}
select{
margin-left: 70px;
width: 25%;
}
#kds{
  position: fixed;
  bottom: 0px;
  right: 0px;
  height:6%;
}
p{
  position: fixed;
  bottom: -10px;
  right: 45px;
}
#iil{
  position: fixed;
  top:0px;
  left: 0px;
  height:20%;
}
	</style>
	<script type="text/javascript">
		function f(){
            var a = document.getElementById("yn");
            var b = a.options[a.selectedIndex].value;
            if(b == "Y"){
            	document.getElementById("ahTrade").checked = true;
            	document.getElementById("cm").checked = true;
            	document.getElementById("exports").checked = true;
            	document.getElementById("hhTrade").checked = true;
            	document.getElementById("institutions").checked = true;
            }
            else{
            	document.getElementById("ahTrade").checked = false;
            	document.getElementById("cm").checked =false;
            	document.getElementById("exports").checked = false;
            	document.getElementById("hhTrade").checked = false;
            	document.getElementById("institutions").checked = false;
            }
		}
	
	function ynf(){
        if(document.getElementById('ahTrade').checked == false || document.getElementById("cm").checked == false || document.getElementById("exports").checked == false || document.getElementById("hhTrade").checked == false || document.getElementById("institutions").checked == false){
        	document.getElementById('yn').selectedIndex = 2;
        }
	}	
	</script>
	
</head>
<body >
	<img src="iil.jpg" id="iil">
  <img src="kds.png" id="kds">
  <p>Developed by Kittu Data Science</p><br><br>
	<h1>User Management</h1><br>
	
	<form method="post" id="form">
		<label for="username">User Name</label>
		<input type="text" name="username" id="username" placeholder="Enter Name" value="<?php if(isset($u)){echo $u;} ?>"> <br><br>
		<label for="emailid">EMailID</label>&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="email" name="emailid" id="emailid" placeholder="Enter email" pattern="[a-z0-9._%+-]+@indimmune.com$" title="Must end with @indimmune.com" value="<?php if(isset($e)){echo $e;} ?>"> <br><br>
		<label for="manager">Manager</label>
		<select name="manager" id="yn" onchange="f()">
			<option value="">Select</option>
			<option value="Y"<?php if(isset($m)){if($m == 'Y'){echo 'selected="selected"';}} ?>>Yes</option>
			<option value="N"<?php if(isset($m)){if($m == 'N'){echo 'selected="selected"';}} ?>>No</option>
		</select> <br><br>
		<label for="segment">Choose Segment</label><br><br>
		<input type="checkbox" name="ahTrade" id="ahTrade" value="AH - Trade"<?php if(isset($s1)){echo 'checked="checked"';}?> onclick="ynf()">AH - Trade<br>
		<input type="checkbox" name="contractmanufacturing" id="cm" value="Contract Manufacturing"<?php if(isset($s2)){echo 'checked="checked"';}?> onclick="ynf()">Contract Manufacturing<br>
		<input type="checkbox" name="exports" id="exports" value="Exports"<?php if(isset($s3)){echo 'checked="checked"';}?> onclick="ynf()">Exports<br>
		<input type="checkbox" name="hhTrade" id="hhTrade" value="HH - Trade"<?php if(isset($s4)){echo 'checked="checked"';}?> onclick="ynf()">HH - Trade<br>
		<input type="checkbox" name="institutions" id="institutions" value="Institutions"<?php if(isset($s5)){echo 'checked="checked"';}?> onclick="ynf()">Institutions<br><br>
		<button type="submit" name="add" class="btngrp">Add</button>
		<button type="reset" name="clear" class="btngrp">Clear</button>
		<button type="button" name="cancel" class="btngrp" onclick="window.location.href='usermanagement.php'">Cancel</button>
		<br><br><br><br><br>
	</form>

</body>
</html>