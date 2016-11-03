<?php
include '../../Connect/connection.php';
if(isset($_POST['name'])){
	$name = $_POST['name'];
        $allowshow = $_POST['allowshow'];
        $imageUrl = "/upload/Achievement/default.jpg";
$sql = "Insert into achievement(Name,AllowShow,ImageUrl) value ('".$name."',".$allowshow.",'".$imageUrl."')" ;
echo $sql;
if (mysqli_query($conn, $sql)) {
	echo "<h2>Thêm thành công</h2>";
	
		header("Location: index.php");
} else {
	echo "Error adding record: " . mysqli_error($conn);
}
}else{
	echo "Error";
}



?>