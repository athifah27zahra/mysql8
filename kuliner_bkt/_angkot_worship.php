<?php
    include("connect.php");
    @$id = $_GET['id'];

    $querysearch= "SELECT detail_worship_place.id_worship_place,angkot.id,angkot.route_color,
    detail_worship_place.id_angkot,worship_place.name,worship_place.address,worship_place.id,detail_worship_place.lat,
    detail_worship_place.lng,detail_worship_place.description, ST_X(ST_Centroid(worship_place.geom)) AS longitude, 
    ST_Y(ST_CENTROID(worship_place.geom)) As latitude FROM detail_worship_place left join angkot on 
    detail_worship_place.id_angkot=angkot.id left join worship_place on detail_worship_place.id_worship_place=worship_place.id 
    where worship_place.id='$id'";
    
    $result= mysqli_query($conn, $querysearch);
    // $hasil = array(
	// 	'type'	=> 'FeatureCollection',
	// 	'features' => array()
	// 	);
	// while ($isinya = mysqli_fetch_assoc($result)) {
	// 	$features = array(
	// 		'type' => 'Feature',
	// 		'geometry' => json_decode($isinya['geom']),
	// 		// 'geometry_point'=>json_decode($isinya['center']),
	// 		'properties' => array(
	// 			'id_angkot' => $isinya['id_angkot'],
	// 			'id' => $isinya['id'],
	// 			'id' => $isinya['id'],
    //             'name' => $isinya['name'],
    //             'address' => $isinya['address'],
	// 			'lat' => $isinya['lat'],
	// 			'lng' => $isinya['lng'],
    //             'description' => $isinya['description'],
    //             'route_color' => $isinya['route_color'],
	// 			'latitude' => $isinya['latitude'],
	// 			'longitude' => $isinya['longitude'])
	// 		);
	// 	array_push($hasil['features'], $features);
	// }
    // echo json_encode($hasil);
    
        while($baris = mysqli_fetch_array($result))
            {
                $id_angkot=$baris['id_angkot'];
                $id=$baris['id'];
                // $id=$baris['id'];
                $name=$baris['name'];
                $address=$baris['address'];
                $lat=$baris['lat'];
                $lng=$baris['lng'];
                $description=$baris['description'];
                $route_color=$baris['route_color'];
                $latitude=$baris['latitude'];
                $longitude=$baris['longitude'];

                $dataarray[]=array('id_angkot'=>$id_angkot,
                'id'=>$id,
                'id'=>$id,
                'name'=>$name,
                'address'=>$address,
                'lat'=>$lat,
                'lng'=>$lng,
                'description'=>$description,
                'route_color'=>$route_color,
                "latitude"=>$latitude,
                "longitude"=>$longitude);
            }
            echo json_encode ($dataarray);
?>