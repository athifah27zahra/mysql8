<?php
include ('../inc/connect.php');
$id = $_POST['id'];
$name = $_POST['name'];


$sql = mysqli_query($conn, "insert into culinary (id, name) values ('$id', '$name')");


if ($sql){
	header("location:../?page=jenisculinary");
}else{
	echo 'error';
}

?>