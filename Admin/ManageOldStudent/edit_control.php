<?php
include '../../Connect/connection.php';
$id= $_POST['id'];

$name = $_POST['name'];
$content = $_POST['content'];
$allowshow=$_POST['allowshow'];
$sql = "update oldstudent set Name = '".$name."',Content='".$content."',AllowShow=".$allowshow." where Id= ".$id;
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