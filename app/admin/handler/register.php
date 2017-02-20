<?php

	require_once("../../includes/db.inc");
	require_once("../../includes/functions.php");

	$name = sanitize($_POST['name']);
	$phone = sanitize($_POST['phone']);
	$email = sanitize($_POST['email']);
	$password = sha1(md5($_POST['password']));

	$query=$connection->exec("INSERT INTO banks(name, phone, email, password) VALUES ('{$name}', '{$phone}', '{$email}', '{$password}')");
	if($query)
	{
		$_SESSION['bank'] = $email;
		echo "inserted";

	}
	else
	{
		echo "Error";
	}

?>