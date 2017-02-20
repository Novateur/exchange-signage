<?php
	require_once("../../includes/db.inc");
	require_once("../../includes/functions.php");

	$currency = sanitize($_POST['currency']);
	$buy = sanitize($_POST['buy']);
	$sell = sanitize($_POST['sell']);
	$date = date("d/m/Y");
	$time = date("h:i:s A");
	$id = get_bank_id();

	$query=$connection->query("INSERT INTO rates(currency_id,buy,sell,date1,time1,bank_id) 
	VALUES ('{$currency}','{$buy}','{$sell}','{$date}','{$time}','{$id}')");
	if($query)
	{
		echo "inserted";
	}
	else
	{
		echo "Could not update the exchange rate";
	}
?>