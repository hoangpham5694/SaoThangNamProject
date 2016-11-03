<?php include("../Connect/connection.php");?>
<?php
$date = date("Y-m-d");
$name= $_POST['name'];
$content= $_POST['content'];
//$postId = $_POST['postid'];
$sql = "Insert into message(Name,Content) value ('".$name."','".$content."')" ;
//echo $sql;
if (mysqli_query($conn, $sql)) {
	echo "Đăng bình luận thành công";
	
		//exit(header("Location: list.php"));
} else {
	echo "Error adding record: " . mysqli_error($conn);
}
?>