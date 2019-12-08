<?php
session_start();
    error_reporting (E_ALL & ~E_WARNING & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
include_once "connection.php";

if(isset($_POST['lid'])){

	$lid=$_POST['lid'];
	$pass=$_POST['pass'];
	$sql="select Username from signup where Name='".$lid."' AND password='".$pass."'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==1){
		$row=mysqli_fetch_assoc($result);
		$_SESSION['Name']=$row['cust_name'];
		header("Location:log.html");
	}
	else{
		echo "unsuccessful";
		exit();
	}
}


?>
