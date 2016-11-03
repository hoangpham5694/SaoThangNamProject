<?php
 include("../../Connect/connection.php");
$name = $_POST['name'];
$content = $_POST['content'];
$allowshow=$_POST['allowshow'];
$imageUrl= "/upload/OldStudent/default.jpg";
//echo $ishighlight;
$sql = "Insert into oldstudent(Name,Content,ImageUrl, AllowShow) value ('".$name."','".$content."','".$imageUrl."',".$allowshow.")" ;
echo $sql;
if (mysqli_query($conn, $sql)) {
	echo "<h2>Thêm thành công</h2>";
	
		exit(header("Location: index.php"));
} else {
	echo "Error adding record: " . mysqli_error($conn);
}
?>