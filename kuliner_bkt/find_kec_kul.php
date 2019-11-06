<?php
require 'connect.php';
$kecamatan_id = $_GET['district'];
$querysearch	= "SELECT 
 culinary_place.id, 
 culinary_place.name,
 culinary_place.geom, 
 st_x(st_centroid(culinary_place.geom)) as longitude, 
 st_y(st_centroid(culinary_place.geom)) as latitude 
 from culinary_place, district 
 WHERE st_contains(district.geom, st_centroid(culinary_place.geom)) and district.id= '$kecamatan_id'"; 

$tes=mysqli_query($conn, $querysearch);
while($row = myqli_fetch_assoc($tes))
	$data[]=$row;
echo $_GET['jsoncallback'].''.json_encode($data).'';

?>