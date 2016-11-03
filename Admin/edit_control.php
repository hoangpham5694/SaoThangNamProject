<?php
include '../Connect/connection.php';
$id= $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$cate = $_POST['category'];
$sumary = $_POST['summary'];
$ishighlight=$_POST['ishighlight'];
$sql = "update post set Title = '".$title."',Description='".$description."',CategoryId=".$cate.",Content='".$sumary."',IsHightLight=".$ishighlight." where Id= ".$id;
if (mysqli_query($conn, $sql)){
	echo "Sửa thành công";
	$temp= "Location: detail.php?id=".$id."";
	echo $temp;
	echo $id;
	header($temp);
}else{
	echo "Error adding record: " . mysqli_error($conn);
}
?>