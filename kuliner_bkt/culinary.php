<?php
require 'connect.php';
/* $querysearch= ($conn, "SELECT row_to_json(fc) 
				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(culinary_place.geom)::json As geometry , row_to_json((SELECT l 
				FROM (SELECT culinary_place.name,ST_X(ST_Centroid(culinary_place.geom)) 
				AS lon, ST_Y(ST_CENTROID(culinary_place.geom)) As lat) As l )) As properties 
				FROM culinary_place As culinary_place  
				) As f ) As fc ";
*/
$querysearch="SELECT ST_AsGeoJSON(culinary_place.geom) as geom ,culinary_place.name, st_X(ST_Centroid(culinary_place.geom)) as lng, ST_Y(st_Centroid(culinary_place.geom)) as lat from culinary_place";

$result=mysqli_query($conn, $querysearch);
// var_dump($result);
// die();
$hasil = array(
	'type'	=> 'FeatureCollection',
	'features' => array()
	);
while($isinya =mysqli_fetch_assoc($result)){
	$features = array(
		'type'=>'Feature',
		'geometry'=> json_decode($isinya['geom']),

		'properties'=>array(
	
		'name'=>$isinya['name'],
		'lat'=>$isinya['lat'],
		'lng'=>$isinya['lng']
		)
	);
	array_push($hasil['features'],$features);
}
echo json_encode($hasil);
	// while($data=mysqli_fetch_array($hasil))
	//{
	//	$load=$data['row_to_json'];
	//}
	//echo $load;
	?>