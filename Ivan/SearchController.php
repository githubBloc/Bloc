<?php

class SearchController extends BaseController {

	// Change this to home coordinate
	protected $homeCoordinate = [47.606131, -122.331807];
	// Max distance in miles
	protected $distance = 24;

	protected $layout = 'layouts.master';

	public function showSearch()
	{
		$what = trim(Input::get('what'));
		$where = trim(Input::get('where'));

		if(!empty($what) || !empty($where)) {
			// Connect to database
			$pdo = new PDO('mysql:host=localhost;dbname=bizinfo;charset=utf8', 'bizinfo', 'bizinfo');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql_where = [];
			$sql_order = [];

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

			$mylat = $this->homeCoordinate[0];
			$mylon = $this->homeCoordinate[1];
			$dist = $this->distance;
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

			$t1 = microtime(true);
			$stmt->execute();
			$t2 = microtime(true);
			$rows = $stmt->fetchAll();
		}


		return View::make('search', array(
			'rows' => isset($rows) ? $rows : null,
			'what' => $what,
			'where' => $where,
			't' => isset($t2) ? ($t2 - $t1) : null,
			'homeCoordinate' => $this->homeCoordinate
		));
	}

}
