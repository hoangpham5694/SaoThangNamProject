 <?php include("../Connect/connection.php"); ?>
<?php 
$date= date("Y-m-d");
$code= $_POST['code'];
$name = $_POST['name'];
$email= $_POST['email'];
$facebook= $_POST['facebook'];
$phone= $_POST['phone'];
$required= $_POST['required'];
$sqlContact = "Insert into contact(Name,StudentNumber,Email,Facebook,Phone,Required,Date) value ('".$name."','".$code."','".$email."','".$facebook."','".$phone. "', '".$required."','".$date. "')" ;
//echo $sqlContact;
if (mysqli_query($conn, $sqlContact)) {
	echo "<h2>Gởi thành công</h2>";
	
		//exit(header("Location: list.php"));
} else {
	echo "Error adding record: " . mysqli_error($conn);
}
?>