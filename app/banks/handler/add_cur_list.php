<?php

	require_once("../../includes/db.inc");
	require_once("../../includes/functions.php");

	$marked = $_POST['marked'];
	$id = get_bank_id();

	foreach($marked as $mark)
	{
		$mark = sanitize($mark);
	 	$query=$connection->query("INSERT INTO currencies_personal (currency_id,bank_id) VALUES ('{$mark}','{$id}')");
		if($query)
		{
			//echo "inserted";
		}
		else
		{
			//echo "Could not update your currency list";
		}
	}
	echo "inserted";

?>