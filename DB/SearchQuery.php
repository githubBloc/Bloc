<?php

// Change this to home coordinate
	$homeCoordinate = array("47.6097", "122.3331"); //seattle long & lati
	// Max distance in miles
	$distance = 24;

		$what = trim(strtolower($_POST['SearchQuery']));
		$where = trim(strtolower($_POST['SearchNear']));

		if(!empty($what) || !empty($where)) {
			// Connect to database
			$pdo = new PDO('mysql:host=localhost;dbname=Bloc;charset=utf8', 'root', 'Thebest');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql_where = array();
			$sql_order = array();

			$sql_where[] = 'Y(Location) between :lon1 and :lon2';
			$sql_where[] = 'X(Location) between :lat1 and :lat2';
			if(!empty($what)) {
				$sql_where[] = 'match(
				Business_Name,
				Categories,
				Tags,
				About_Company)
				against (:what)';
//				$sql_order[] = 'match(Tags) against (:what) desc';
//				$sql_order[] = 'match(Categories) against (:what) desc';
//				$sql_order[] = 'match(Business_Name) against (:what) desc';
//				$sql_order[] = 'match(About_Company) against (:what) desc';
			}
			if(!empty($where)) {
				$sql_where[] = 'match(
					Address,City,Zip_Code
				) against (:where)';
//				$sql_order[] = 'match(
//					Address,City,Zip_Code
//				) against (:where) desc';
			}
			$sql_order[] = 'BizType';
			$sql_order[] = 'ClickTrueRate desc';
			$sql_order[] = 'distance';

			// Prepare SQL
			$sql =
				sprintf('SELECT *,

				X(Location) AS Latitude,
				Y(Location) AS Longitude,
				-- Formula to find distance
				3956 * 2 * ASIN(SQRT( POWER(SIN((:mylat - X(Location)) *  pi()/180 / 2), 2) +COS(:mylat * pi()/180) * COS(X(Location) * pi()/180) * POWER(SIN((:mylon - Y(Location)) * pi()/180 / 2), 2) ))
			as distance
 				FROM `BizInfo` t1 WHERE
				%s
				order by
					%s
				limit 10				',
					join(' and ', $sql_where),
					join(', ', $sql_order)
				);

			$stmt = $pdo->prepare($sql);

			$mylat = $homeCoordinate[0];
			$mylon = $homeCoordinate[1];
			$dist = $distance;
			$lon1 = $mylon-$dist/abs(cos(deg2rad($mylat))*69);
			$lon2 = $mylon+$dist/abs(cos(deg2rad($mylat))*69);
			$lat1 = $mylat-($dist/69);
			$lat2 = $mylat+($dist/69);

			if (!empty($what))
				$stmt->bindValue('what', $what);
			if (!empty($where))
				$stmt->bindValue('where', $where);
			$stmt->bindValue('mylat', $mylat);
			$stmt->bindValue('mylon', $mylon);
			$stmt->bindValue('dist', $dist); // 24 mile max
			$stmt->bindValue('lon1', $lon1);
			$stmt->bindValue('lon2', $lon2);
			$stmt->bindValue('lat1', $lat1);
			$stmt->bindValue('lat2', $lat2); 

			//$t1 = microtime(true);
			$stmt->execute();
			//$t2 = microtime(true);
			$rows = $stmt->fetchAll();
			
			$json = json_encode($rows);
			
			print_r($rows);
			
						
	}



//
//		return View::make('search', array(
//			'rows' => isset($rows) ? $rows : null,
//			'what' => $what,
//			'where' => $where,
//			//'t' => isset($t2) ? ($t2 - $t1) : null,
//			'homeCoordinate' => $this->homeCoordinate
//		));





















/*$db = mysql_connect("localhost","Eugene","12345") or die("could not connect to a database");
mysql_select_db("Bloc",$db)or die("Could not select a database");


$results = mysql_query("SELECT id, BizType, Business_Name, Address, Phone_Number, City, State, Zip_Code, Tags FROM BizInfo WHERE (Business_Name LIKE '%$Search_Query%' OR Categories LIKE '%$Search_Query%' OR Tags LIKE '%$Search_Query%' OR About_Company LIKE '%$Search_Query%') AND City LIKE '%$Search_Near%'") or die(mysql_error());


$counter =1;
while($row = mysql_fetch_array($results))
{
 $id = $row['id'];
if($row['BizType']=="Premium")
{		
$Logo = mysql_query("SELECT LogoPic FROM PremiumPictures WHERE BizId = '$id'");
$LogoPath = mysql_fetch_array($Logo);
}
	if($row['BizType']=="Basic")
	{		
	$Logo = mysql_query("SELECT LogoPic FROM BasicPictures WHERE BizId='$id'");
	$LogoPath = mysql_fetch_array($Logo);
	}
		if($row['BizType']=="Free")
		{		
		$Logo = mysql_query("SELECT LogoPic FROM FreePictures WHERE BizId = '$id'");
		$LogoPath = mysql_fetch_array($Logo);
		}
		
echo "<div class='Result_Box'>
    	<a href='".$row['BizType']."Profile.php?id=".$row['id']."'><div id='Logo'><img src='".$LogoPath["LogoPic"]."'></div></a>
        <h1>".$counter.".".ucwords($row['Business_Name'])."</h1>
        <h2><span id=Address>".$row['Address']." ". ucwords($row['City'])." ".$row['State']." ".$row['Zip_code']."</span><br/>".$row['Phone_Number']."</h2>
        <ul>
        	<li><a href='#'>Coffee,</a></li><li><a href='#'>Tea,</a></li><li><a href='#'>Bakeries,</a></li><li><a href='#'>Sandwiches,</a></li><li><a href='#'>Pasrties,</a></li>
        </ul>        
</div>";	
	
	$counter++;
	}

mysql_close($db);<?php */
?>

