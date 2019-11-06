<?php
include ('../inc/connect.php');
$id = $_POST['id'];
$culinary = $_POST['culinary'];

$sqldel = "delete from detail_culinary where id_culinary_place='$id'";

// $tes=mysqli_query($conn, $sqldel);
$delete = mysqli_query($conn, $sqldel);

$countl = count($culinary);
if($countl > 0){
	$sqll   = "insert into detail_culinary (id_culinary_place, id_culinary, price) VALUES ";
	for( $i=0; $i < $countl; $i++ ){
		$harga = $_POST['harga'.$culinary[$i]];
		$sqll .= "('{$id}','{$culinary[$i]}','{$harga}')";
		$sqll .= ",";
	}
	$sqll = rtrim($sqll,",");
	$insert = mysqli_query($conn, $sqll);
}
if (($insert||$countl==0) && $delete){
	//echo 'ok';
	header("location:../?page=formlfas&id=$id");
}
else{
	echo 'error';
	//header("location:../?page=detailculinary&id=$id");
}

?>