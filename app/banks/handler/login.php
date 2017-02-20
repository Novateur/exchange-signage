<?php
	ob_start();
	require_once("../../includes/db.inc");
	require_once("../../includes/functions.php");
	
	$email=sanitize($_POST['email']);
	$password=sha1(md5($_POST['password']));
	
	
	$sql="SELECT * FROM banks WHERE email='{$email}' AND password='{$password}'";
	$query = $connection->query($sql);
	if($query->rowCount()==1)
	{
		$_SESSION['bank']=$email;
		echo "found";
	}
	else
	{
		echo "error";
	}
?>