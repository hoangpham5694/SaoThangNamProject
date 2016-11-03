<?php
include '../../Connect/connection.php';
if(isset($_POST['catename'])){
	$name = $_POST['catename'];
$sql = "Insert into categories(CateName) value ('".$name."')" ;
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