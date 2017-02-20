<?php
	
	require_once("../../includes/db.inc");
	require_once("../../includes/functions.php");
	
	$id=sanitize($_POST['id']);
	
	$sql = "SELECT logo FROM currencies WHERE id={$id}";
	$query = $connection->query($sql);
	if($query->rowCount()>0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $r)
		{
			unlink("../../logos/{$r['logo']}");
			$sql="DELETE FROM currencies_personal WHERE currency_id={$id}";
			$query = $connection->query($sql);
			if($query)
			{
				echo "deleted";
			}
			else
			{
				echo "error";
			}
		}
	}
	else
	{
		echo "Couldn't fetch logo";
	}


?>