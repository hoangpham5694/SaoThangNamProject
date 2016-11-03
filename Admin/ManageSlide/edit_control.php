<?php
include '../../Connect/connection.php';
$id= $_POST['id'];

$postid = $_POST['postid'];

$allowshow=$_POST['allowshow'];
$sql = "update slide set PostId = ".$postid.",AllowShow=".$allowshow." where Id= ".$id;
if (mysqli_query($conn, $sql)){
	echo "Sửa thành công";
	$temp= "Location: index.php";
	echo $temp;
	echo $id;
	header($temp);
}else{
	echo "Error adding record: " . mysqli_error($conn);
}
?>