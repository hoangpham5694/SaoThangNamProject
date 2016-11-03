<?php
 include("../../Connect/connection.php");
$postid = $_POST['postid'];

$allowshow=$_POST['allowshow'];
$imageUrl= "/upload/SlideImage/default.jpg";
//echo $ishighlight;
$sql = "Insert into slide(PostId,AllowShow,SlideImageUrl) value (".$postid.",".$allowshow.",'".$imageUrl."')" ;
echo $sql;
if (mysqli_query($conn, $sql)) {
	echo "<h2>Thêm thành công</h2>";
	
		exit(header("Location: index.php"));
} else {
	echo "Error adding record: " . mysqli_error($conn);
}
?>