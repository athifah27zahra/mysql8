<?php
include ('../inc/connect.php');

$id	= $_POST['id'];
$name = $_POST['name'];

$sql  = "update culinary set name='$name' where id=$id";
$insert = mysqli_query($conn, $sql);

if ($insert){
	header("location:../?page=jenisculinary");
}else{
	echo 'error';
}
?>