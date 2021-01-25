<!DOCTYPE html>
<html>
<head>
	<title>User Management</title>
</head>
<style type="text/css">
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
#iil{
	position: fixed;
	top:0px;
	left: 0px;
	height:20%;
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
</style>
<body>
	<img src="iil.jpg" id="iil">
	<img src="kds.png" id="kds">
	<p>Developed by Kittu Data Science</p>
<h1 style="margin-left: 507px;margin-top: 200px;">Power BI Dashboard</h1>
<h1 style="margin-left: 525px;">User Management</h1><br>
    <div id="div1">   
	 <form action="useraddin.php"><button id="add" class="btngrp" style="margin-left: 445px;">Add</button> </form>
	 <form action="useredit.php">	<button id="edit" class="btngrp" >Edit</button> </form>
	 <form action="userdelete.php">	<button id="delete" class="btngrp">Delete</button> </form>
	</div>
</body>
</html>