<?php
session_start();
require_once("db.inc");

function sanitize($input)
{
	$my_input=htmlspecialchars(addslashes(trim($input)));
	return $my_input;
}
function sanitize_content($input)
{
	$my_input = strip_tags(addslashes(trim($input)));
	return $my_input;
}

function get_time_interval_sm($date){
	$mydate=date("Y-m-d h:i:s");
	$theDiff="";
	$datetime1 = date_create($date);
	$datetime2 = date_create($mydate);
	$interval = date_diff($datetime1, $datetime2);
	$min = $interval->format('%i');
	$sec = $interval->format('%s');
	$hour = $interval->format('%h');
	$mon = $interval->format('%m');
	$day = $interval->format('%d');
	$year = $interval->format('%y');
	if($interval->format('%i%h%d%m%y')=="00000"){
		if($sec<10){
			return "just now";
		}
		else{
			return $sec." seconds ago ";
		}
	}
	else if($interval->format('%h%d%m%y')=="0000"){
		if($min==1){
			return $min." minute ago";
		}
		else{
			return $min." minutes ago";
		}
	}
	else if($interval->format('%d%m%y')=="000"){
		if($hour==1){
			return $hour." hour ago";
		}
		else{
			return $hour." hours ago";
		}
	}
	else if($interval->format('%m%y')=="00"){
		if($day==1){
			return "Yesterday";
		}
		else if($day < 7){
			return $day." days ago";
		}
		else if($day==7){
			return "1 week ago";
		}
		else if($day < 14){
			$rem_day = $day-7;
			return "1 week ".$rem_day." days ago";
		}
		else if($day==14){
			return "2 weeks ago";
		}
		else if($day<21){
			$rem_day = $day-14;
			return "2 weeks ".$rem_day." days ago";
		}
		else if($day==21){
			return "3 weeks ago";
		}
		else{
			$rem_day = $day-21;
			return "3 weeks ".$rem_day." days ago";
		}
	}
	else if($interval->format('%y')=="0"){
		if($mon==1){
			return $mon." month ago";
		}
		else{
			return $mon." months ago";
		}
	}
	else{
		if($year==1){
			return $year." year";
		}
		else{
			return $year." years ago";
		}
	}
}

function get_all_currencies()
{
	global $connection;
	$id = get_bank_id();
	$sql = "SELECT * FROM currencies WHERE id IN (SELECT currency_id FROM currencies_personal WHERE bank_id = '{$id}')";
	$query = $connection->query($sql);
	if($query->rowCount() > 0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		echo "<option value=''>--Choose currency--</option>";
		foreach($query as $r)
		{
			echo "<option value='{$r['id']}'>{$r['cur_name']}({$r['cur_ab']})</option>";
		}
	}
	else
	{
		echo "<option value=''>--Choose currency--</option>";
	}
}


function get_rates()
{
	global $connection;
	$sql = "SELECT * FROM rates";
	$query = $connection->query($sql);
	if($query->rowCount() > 0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		echo "
		<div class='col-md-12'>
			<table id='grid-basic' class='table table-condensed table-hover table-striped' style='font-size:14px'>
	                        <thead>
	                          <tr>
	                              <th data-column-id='currency_id'>Currency</th>
	                              <th data-column-id='buy'>Buy</th>
	                              <th data-column-id='sell'>Sell</th>
	                              <th data-column-id='date1'>Date</th>
	                              <th data-column-id='time1'>Time</th>
	                              <th data-column-id='link' data-formatter='link' data-sortable='false'>Delete</th>
	                          </tr>
	                        </thead>

	        <tbody>";
			foreach($query as $r)
			{
				            echo "<tr id='{$r['id']}'>
	                              <td>".show_currency_name($r['currency_id'])."</td>
	                              <td>&#8358;{$r['buy']}</td>
	                              <td>&#8358;{$r['sell']}</td>
	                              <td>{$r['date1']}</td>
	                              <td>{$r['time1']}</td>
	                              <td><button type='button' class='btn btn-danger' onclick=\"delete_rates({$r['id']})\"><i class='ion-trash-b'></i></button></td>
	                          </tr>";
			}
			echo "</tbody>";
			echo "</table>
		</div>";
	}

}

function get_rates_bank()
{
	global $connection;
	$id = get_bank_id();
	$sql = "SELECT * FROM rates WHERE bank_id='{$id}'";
	$query = $connection->query($sql);
	if($query->rowCount() > 0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		echo "
		<div class='col-md-12'>
			<table id='grid-basic' class='table table-condensed table-hover table-striped' style='font-size:14px'>
	                        <thead>
	                          <tr>
	                              <th data-column-id='currency_id'>Currency</th>
	                              <th data-column-id='buy'>Buy</th>
	                              <th data-column-id='sell'>Sell</th>
	                              <th data-column-id='date1'>Date</th>
	                              <th data-column-id='time1'>Time</th>
	                              <th data-column-id='link' data-formatter='link' data-sortable='false'>Delete</th>
	                          </tr>
	                        </thead>

	        <tbody>";
			foreach($query as $r)
			{
				            echo "<tr id='{$r['id']}'>
	                              <td>".show_currency_name($r['currency_id'])."</td>
	                              <td>&#8358;{$r['buy']}</td>
	                              <td>&#8358;{$r['sell']}</td>
	                              <td>{$r['date1']}</td>
	                              <td>{$r['time1']}</td>
	                              <td><button type='button' class='btn btn-danger' onclick=\"delete_rates({$r['id']})\"><i class='ion-trash-b'></i></button></td>
	                          </tr>";
			}
			echo "</tbody>";
			echo "</table>
		</div>";
	}

}

function get_banks()
{
	global $connection;
	$sql = "SELECT * FROM banks";
	$query = $connection->query($sql);
	if($query->rowCount() > 0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		echo "
		<div class='col-md-12'>
			<table id='bank_table' class='table table-condensed table-hover table-striped' style='font-size:14px'>
	                        <thead>
	                          <tr>
	                              <th data-column-id='name'>Bank Name</th>
	                              <th data-column-id='buy'>Phone number</th>
	                              <th data-column-id='sell'>Bank Email</th>
	                              <th data-column-id='link' data-formatter='link' data-sortable='false'>Delete</th>
	                          </tr>
	                        </thead>

	        <tbody>";
			foreach($query as $r)
			{
				            echo "<tr id='{$r['id']}'>
	                              <td>{$r['name']}</td>
	                              <td>{$r['phone']}</td>
	                              <td>{$r['email']}</td>
	                              <td><button type='button' class='btn btn-danger' onclick=\"delete_bank({$r['id']})\"><i class='ion-trash-b'></i></button></td>
	                          </tr>";
			}
			echo "</tbody>";
			echo "</table>
		</div>";
	}

}

function get_search($from,$to)
{
	global $connection;
	$sql = "SELECT * FROM rates WHERE date1 BETWEEN '{$from}' AND '{$to}'";
	$query = $connection->query($sql);
	if($query->rowCount() > 0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		echo "<table id='grid-basic' class='table table-condensed table-hover table-striped' style='font-size:14px'>
                        <thead>
                          <tr>
                              <th data-column-id='currency_id'>Currency</th>
                              <th data-column-id='buy'>Buy</th>
                              <th data-column-id='sell'>Sell</th>
                              <th data-column-id='date1'>Date</th>
                              <th data-column-id='time1'>Time</th>
                              <th data-column-id='link' data-formatter='link' data-sortable='false'>Delete</th>
                          </tr>
                        </thead>

        <tbody>";
		foreach($query as $r)
		{
			            echo "<tr id='{$r['id']}'>
                              <td>".show_currency_name($r['currency_id'])."</td>
                              <td>&#8358;{$r['buy']}</td>
                              <td>&#8358;{$r['sell']}</td>
                              <td>{$r['date1']}</td>
                              <td>{$r['time1']}</td>
                              <td><button type='button' class='btn btn-danger' onclick=\"delete_rates({$r['id']})\"><i class='ion-trash-b'></i></button></td>
                          </tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
	else
	{
		echo "<div class='alert alert-danger'><h3>Record not found</h3></div>";
	}

}

function get_search_bank($from,$to)
{
	global $connection;
	$id = get_bank_id();
	$sql = "SELECT * FROM rates WHERE date1 BETWEEN '{$from}' AND '{$to}' AND bank_id = '{$id}'";
	$query = $connection->query($sql);
	if($query->rowCount() > 0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		echo "<table id='grid-basic' class='table table-condensed table-hover table-striped' style='font-size:14px'>
                        <thead>
                          <tr>
                              <th data-column-id='currency_id'>Currency</th>
                              <th data-column-id='buy'>Buy</th>
                              <th data-column-id='sell'>Sell</th>
                              <th data-column-id='date1'>Date</th>
                              <th data-column-id='time1'>Time</th>
                              <th data-column-id='link' data-formatter='link' data-sortable='false'>Delete</th>
                          </tr>
                        </thead>

        <tbody>";
		foreach($query as $r)
		{
			            echo "<tr id='{$r['id']}'>
                              <td>".show_currency_name($r['currency_id'])."</td>
                              <td>&#8358;{$r['buy']}</td>
                              <td>&#8358;{$r['sell']}</td>
                              <td>{$r['date1']}</td>
                              <td>{$r['time1']}</td>
                              <td><button type='button' class='btn btn-danger' onclick=\"delete_rates({$r['id']})\"><i class='ion-trash-b'></i></button></td>
                          </tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
	else
	{
		echo "<div class='alert alert-danger'><h3>Record not found</h3></div>";
	}

}

function get_currencies()
{
	global $connection;
	$sql = "SELECT * FROM currencies";
	$query = $connection->query($sql);
	if($query->rowCount() > 0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		echo "<table id='grid-basic' class='table table-condensed table-hover table-striped' style='font-size:14px'>
                        <thead>
                          <tr>
                              <th data-column-id='currency_id'>Currency Name</th>
                              <th data-column-id='buy'>Currency Abbreviation</th>
                              <th data-column-id='sell'>Logo</th>
                              <th data-column-id='link' data-formatter='link' data-sortable='false'>Delete</th>
                          </tr>
                        </thead>

        <tbody>";
		foreach($query as $r)
		{
			            echo "<tr id='{$r['id']}'>
                              <td>{$r['cur_name']}</td>
                              <td>{$r['cur_ab']}</td>
                              <td><img src='../logos/{$r['logo']}' class='img-rounded' width='70' height='70'/></td>
                              <td><button type='button' class='btn btn-danger' onclick=\"delete_currencies({$r['id']})\"><i class='ion-trash-b'></i></button></td>
                          </tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
	else
	{
		echo "<div class='alert alert-danger'><h3>No record found</h3></div>";
	}
}

function get_currencies_bank()
{
	global $connection;
	$id = get_bank_id();
	$sql = "SELECT * FROM currencies WHERE id IN (SELECT currency_id FROM currencies_personal WHERE bank_id = '{$id}')";
	$query = $connection->query($sql);
	if($query->rowCount() > 0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		echo "<table id='grid-basic' class='table table-condensed table-hover table-striped' style='font-size:14px'>
                        <thead>
                          <tr>
                              <th data-column-id='currency_id'>Currency Name</th>
                              <th data-column-id='buy'>Currency Abbreviation</th>
                              <th data-column-id='sell'>Logo</th>
                              <th data-column-id='link' data-formatter='link' data-sortable='false'>Delete</th>
                          </tr>
                        </thead>

        <tbody>";
		foreach($query as $r)
		{
			            echo "<tr id='{$r['id']}'>
                              <td>{$r['cur_name']}</td>
                              <td>{$r['cur_ab']}</td>
                              <td><img src='../logos/{$r['logo']}' class='img-rounded' width='50' height='50'/></td>
                              <td><button type='button' class='btn btn-danger' onclick=\"delete_currencies_personal({$r['id']})\"><i class='ion-trash-b'></i></button></td>
                          </tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
	else
	{
		echo "<div class='alert alert-danger'><h3>No record found</h3></div>";
	}
}

function get_currencies_to_list()
{
	global $connection;
	$id = get_bank_id();
	$sql = "SELECT * FROM currencies WHERE id NOT IN (SELECT currency_id FROM currencies_personal WHERE bank_id = '{$id}')";
	$query = $connection->query($sql);
	if($query->rowCount() > 0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		echo "<form method='post' id='mark_all_form'>
		<button type='submit' class='btn btn-success' style='display:none' id='submit_btn'>Add to list</button><br/><br/>
		<table id='grid-basic' class='table table-condensed table-hover table-striped' style='font-size:14px'>
                        <thead>
                          	<tr>
                          	<th data-column-id='currency_id'><input type='checkbox' onclick=\"mark_all(this)\"/> Mark all</th>
                              	<th data-column-id='currency_id'>Currency Name</th>
                              	<th data-column-id='buy'>Currency Abbreviation</th>
                              	<th data-column-id='sell'>Logo</th>
                            </tr>
                        </thead>

        <tbody>";
		foreach($query as $r)
		{
			            echo "<tr id='{$r['id']}'>
			            	  <td><input type='checkbox' value='{$r['id']}' name='marked[]' class='all_checkbox' onclick=\"mark_ind(this)\"/></td>
                              <td>{$r['cur_name']}</td>
                              <td>{$r['cur_ab']}</td>
                              <td><img src='../logos/{$r['logo']}' class='img-rounded' width='30' height='30'/></td>
                          </tr>";
		}
		echo "</tbody>";
		echo "</table>";
		echo "</form>";
	}
	else
	{
		echo "<div class='alert alert-danger'><h3>No record found</h3></div>";
	}
}

function show_rates()
{
	global $connection;
	$id = get_bank_id();
	$sql = "SELECT * FROM currencies ";
	$query = $connection->query($sql);
	if($query->rowCount() > 0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach($query as $a)
		{

			$second_sql = "SELECT * FROM rates WHERE currency_id={$a['id']} AND bank_id='{$id}' ORDER BY id DESC LIMIT 0,1";
			$second_query = $connection->query($second_sql);
			if($second_query->rowCount() > 0)
			{
				$second_query->setFetchMode(PDO::FETCH_ASSOC);
				foreach($second_query as $r)
				{
					echo "<div class='row'>
                        <div class='panel col-md-4'>
	                        <div class='padder' style='background: black;font-size: 78px;font-weight: 600;border-radius: 35px;'>
	                          <img src='logos/{$a['logo']}'style='width: 180px;'>
	                            <span style='color: white;'>{$a['cur_ab']}</span>
	                        </div>
                        </div> 
                        
                        <div class='panel col-md-4'>
	                        <div class='padder' style='background: black;font-size: 117px;font-weight: 600; text-align: right;border-radius: 35px;'>
	                            <span style='color: white; '>{$r['buy']}</span>
	                        </div>
                        </div> 
                        
                        <div class='panel col-md-4'>
	                        <div class='padder' style='background: black;font-size: 117px;font-weight: 600; text-align: right;border-radius: 35px;'>
	                            <span style='color: white;'>{$r['sell']}</span>
	                        </div>
                        </div>     
                    </div>";
					//echo $a['cur_ab']." ".$r['buy']." {$r['sell']}<br/>";
				}
			}
		}
	}
}

function show_currency_name($id)
{
	global $connection;
	$sql = "SELECT * FROM currencies WHERE id={$id}";
	$query = $connection->query($sql);
	if($query->rowCount() > 0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach ($query as $r) 
		{
			return $r['cur_name']." ({$r['cur_ab']})";
		}
	}
	else
	{
		return "Currency not found";
	}
}

function get_bank_id()
{
	global $connection;
	$sql = "SELECT id FROM banks WHERE email='{$_SESSION['bank']}'";
	$query = $connection->query($sql);
	if($query->rowCount() > 0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach ($query as $r) 
		{
			return $r['id'];
		}
	}
	else
	{
		return false;
	}
}

function get_bank_name()
{
	global $connection;
	$sql = "SELECT name FROM banks WHERE email='{$_SESSION['bank']}'";
	$query = $connection->query($sql);
	if($query->rowCount() > 0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		foreach ($query as $r) 
		{
			return $r['name'];
		}
	}
	else
	{
		return false;
	}
}

?>