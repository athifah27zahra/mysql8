<?php

require 'connect.php';
$district_id = $_GET['district_id'];

$q = "SELECT culinary_place.id as id, culinary_place.name as name, st_x(st_centroid(culinary_place.geom)) as longitude, 
st_y(st_centroid(culinary_place.geom)) as latitude from culinary_place, district WHERE 
st_contains(district.geom, st_centroid(culinary_place.geom)) and district.id= '$district_id'";

$querysearch=mysqli_query($conn, $q);
while($row = mysqli_fetch_assoc($querysearch))
	$data[]=$row;

echo json_encode($data);
?>