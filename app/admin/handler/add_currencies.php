<?php
	require_once("../../includes/db.inc");
	require_once("../../includes/functions.php");

	$cur_name = sanitize($_POST['cur_name']);
	$cur_ab = sanitize($_POST['cur_ab']);
	$tmp_file2=$_FILES['file']['tmp_name'];
	$target_file2=basename($_FILES['file']['name']);
	$size=$_FILES['file']['size'];
	$type=$_FILES['file']['type'];
	$extension=strtolower(substr($target_file2,strpos($target_file2,'.')+1));
	
	$rename = rand(0,1000000)."LOGO".rand(0,1000000).".".$extension;
	
	if($extension=="jpeg" || $extension=="jpg" || $extension=="png" && $size<=5000000)
	{
		$upload_dir2="../../logos";
		$db_upload=move_uploaded_file($tmp_file2, $upload_dir2."/".$rename);
		$query=$connection->query("INSERT INTO currencies(cur_name,cur_ab,logo) 
		VALUES ('{$cur_name}','{$cur_ab}','{$rename}')");
		if($query)
		{
			echo "inserted";
		}
		else
		{
			echo "Could not add the currency";
		}
	}
	else
	{
		echo "Your file must be in jpg/jpeg/png format and must be less than 5MB";
	}
?>