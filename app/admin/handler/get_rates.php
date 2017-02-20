<?php

	require_once("../../includes/db.inc");
	require_once("../../includes/functions.php");

		
	$sql_pag = "SELECT COUNT(*) FROM rates";
	$totalpage=$connection->query($sql_pag);
	$totalpage->setFetchMode(PDO::FETCH_ASSOC);
	foreach($totalpage as $t)
	{
		$totalpage1=array_shift($t);
	}
	$limit=10;
	$page=$_GET['page'];
	if($page)
	{
		$start=($page-1) * $limit;
	}
	else
	{
		$start=0;
	}
	$sql = "SELECT * FROM rates LIMIT $start,$limit";
	$query = $connection->query($sql);
	if($query->rowCount() > 0)
	{
		$query->setFetchMode(PDO::FETCH_ASSOC);
		echo "<table id='grid-basic' class='table table-condensed table-hover table-striped'>
                        <thead>
                          <tr>
                              <th data-field='id'>Currency</th>
                              <th data-field='id'>Buy</th>
                              <th data-field='price'>Sell</th>
                              <th data-field='price'>Date</th>
                              <th data-field='price'>Delete</th>
                          </tr>
                        </thead>

        <tbody>";
		foreach($query as $r)
		{
			            echo "<tr>
                              <td>{$r['currency_id']}</td>
                              <td>{$r['buy']}</td>
                              <td>{$r['sell']}</td>
                              <td>{$r['date1']}</td>
                              <td><button type='button' class='btn btn-danger' onclick=\"delete_rate({$r['id']})\"><i class='ion-ios-trash'></i></button></td>
                          </tr>";
		}
		echo "</tbody>";
		echo "</table>";
		echo "</form>";
						echo"<div class='row'>";
							echo "<div class='col s12'>";
								echo "<div align='center'id='paginate1'>";																
									$previous=$page-1;
									$next=$page+1;
									$total_num_pages=ceil($totalpage1/$limit);
									if($total_num_pages>1)
									{
										echo "Page {$page} of {$total_num_pages} pages<br/>";
										if($previous>=1)
										{
											echo "<a href='#{$previous}' onclick=\"paginate_city({$previous})\" data-role='button'>Previous</a> ";
										}
										for($i=1;$i<=$total_num_pages;$i++)
										{
											if($i==$page)
											{
												echo "<button type='button'>{$i}</button> ";
											}
											else
											{
												echo "<a href='#{$i}' onclick=\"paginate_city({$i})\" data-role='button'>{$i}</a> ";
											}
										}									
										if($next<=$total_num_pages)
										{
											echo "<a href='#{$next}' onclick=\"paginate_city({$next})\" data-role='button'>Next</a>";
										}
									}
								echo "</div>";
							echo "</div>";
						echo "</div>";
	}
	else
	{
		echo "<div align='center'><h5>No more designs to fetch</h5></div>";
	}

?>