<?php 
require('connection.php');
if(isset($_REQUEST['show'])){
	$email = $_REQUEST['email'];
	$sql = "select * from dimUsers where eMailId = '$email'";
	$stmt = sqlsrv_query($conn,$sql, array(), array( "Scrollable" => 'static' ));
	if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
   }
   $row_count = sqlsrv_num_rows($stmt);
   if($row_count == 0){
    echo "<script>alert('User not found');window.location='usermanagement.php';</script>";
   }
   else{
$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC );
$u = $row['UserName'];
$e = $row['eMailId'];
$m = $row['Manager'];
$s = $row['Segment'];
    if($s == 'AH - Trade'){$s1 = 'AH - Trade';}
    elseif ($s == 'Contract Manufacturing'){$s2 = 'Contract Manufacturing';}
    elseif ($s == 'Exports'){$s3 = 'Exports';}
    elseif ($s == 'HH - TRADE'){$s4 = 'HH - Trade';}
    elseif($s == 'Institutions'){$s5 = 'Institutions';}
    else{}
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC )) {
		
    $s = $row['Segment'];
    if($s == 'AH - Trade'){$s1 = 'AH - Trade';}
    elseif ($s == 'Contract Manufacturing'){$s2 = 'Contract Manufacturing';}
    elseif ($s == 'Exports'){$s3 = 'Exports';}
    elseif ($s == 'HH - Trade'){$s4 = 'HH - Trade';}
    elseif($s == 'Institutions'){$s5 = 'Institutions';}
    else{}
}
}
}
if(isset($_REQUEST['delete'])){
	
  
$emailid = $_REQUEST['emailid'];
$sql = "delete from dimUsers where eMailId='$emailid'";
$stmt = sqlsrv_query($conn,$sql);
	if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
   }
  
   echo '<script>alert("User Deleted Successfully");window.location="usermanagement.php";</script>';

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete User</title>
	<style type="text/css">
		#form{
	margin-left: 400px;
	border:1px solid grey;
	border-radius: 5px;
	width:450px;
	height: 450px;
	padding: 25px;
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
	
</head>
<body>
  <img src="iil.jpg" id="iil">
  <img src="kds.png" id="kds">
  <p>Developed by Kittu Data Science</p>
	<h1>User Management</h1><br>
      <form method="post" id="form" action="userdelete.php"><br><br>
      <input type="email" name="email" id="email" placeholder="Enter email" >
    <button type="submit" name="show" class="btngrp" id="show" style="margin-left: 275px;margin-top: -30px; ">Show</button>
    <br><br><br>
    <label for="username">User Name</label>
    <input type="text" name="username" id="username" placeholder="Enter Name" value="<?php if(isset($u)){echo $u;} ?>" disabled> <br><br>
    <label for="emailid">EMailID</label>&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="email" name="emailid" id="emailid" placeholder="Enter email" pattern="[a-z0-9._%+-]+@indimmune.com$" title="Must end with @indimmune.com" value="<?php if(isset($e)){echo $e;} ?>" readonly> <br><br>
    <label for="manager">Manager</label>
    <select name="manager" id="yn" disabled>
      <option value="">Select</option>
      <option value="Y"<?php if(isset($m)){if($m == 'Y'){echo 'selected="selected"';}} ?>>Yes</option>
      <option value="N"<?php if(isset($m)){if($m == 'N'){echo 'selected="selected"';}} ?>>No</option>
    </select> <br><br>
    <label for="segment">Choose Segment</label><br><br>
    <input type="checkbox" name="ahTrade" id="ahTrade" value="AH - Trade"<?php if(isset($s1)){echo 'checked="checked"';}?> disabled>AH - Trade<br>
    <input type="checkbox" name="contractmanufacturing" id="cm" value="Contract Manufacturing"<?php if(isset($s2)){echo 'checked="checked"';}?> disabled>Contract Manufacturing<br>
    <input type="checkbox" name="exports" id="exports" value="Exports"<?php if(isset($s3)){echo 'checked="checked"';}?> disabled>Exports<br>
    <input type="checkbox" name="hhTrade" id="hhTrade" value="HH - Trade"<?php if(isset($s4)){echo 'checked="checked"';}?> disabled>HH - Trade<br>
    <input type="checkbox" name="institutions" id="institutions" value="Institutions"<?php if(isset($s5)){echo 'checked="checked"';}?> disabled>Institutions<br><br>
    <button type="submit" name="delete" class="btngrp" style="margin-left: 75px;">Delete</button>
    <button type="button" name="cancel" class="btngrp" onclick="window.location.href='usermanagement.php'">Cancel</button>
  </form>
</body>
</html>