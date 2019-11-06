<?php
include('connect.php');
$latit=$_GET['lat'];
$longi=$_GET['lng'];
$rad=$_GET['rad'];


// $querysearch="SELECT id, name, 
// 	st_x(st_centroid(geom)) as lng,st_y(st_centroid(geom)) as lat,
// 	st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1), culinary_place.geom) as jarak 
// 	FROM culinary_place where st_distance_sphere(ST_GeomFromText('POINT(".$longi." ".$latit.")',-1),
// 	 culinary_place.geom) <= ".$rad."	
// 			 "; 

$querysearch = "SELECT id, name, geom, ST_Y(ST_CENTROID(geom)) as lat, ST_X(ST_CENTROID(geom)) as lng,
				st_distance_sphere(ST_GeomFromText('POINT($latit $longi)', 4326), 
				ST_GeomFromText(concat('POINT(',ST_Y(ST_CENTROID(geom)),' ',ST_X(ST_Centroid(geom)),')'), 4326)) as jarak
                FROM culinary_place
				HAVING jarak <= $rad";

$result=mysqli_query($conn, $querysearch);
while($row = mysqli_fetch_array($result))
	{
		  $id=$row['id'];
		  $name=$row['name'];
		  $longitude=$row['lng'];
		  $latitude=$row['lat'];
		  $jarak=$row['jarak'];
		  $dataarray[]=array('id'=>$id,'name'=>$name,
		  'longitude'=>$longitude,'latitude'=>$latitude, 'jarak'=>$jarak);
	}
echo json_encode ($dataarray);
?>
