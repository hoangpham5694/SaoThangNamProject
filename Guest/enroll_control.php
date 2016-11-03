 <?php include("../Connect/connection.php"); ?>

<?php 
$date= date("Y-m-d");

$name = $_POST['name'];
echo $name;
$email= $_POST['email'];
$phone= $_POST['phone'];
$address= $_POST['address'];
$nameprogram= $_POST['nameprogram'];
$studyat= $_POST['studyat'];
$school= $_POST['school'];
$class= $_POST['class'];
$dateofbird = $_POST['dateofbird'];
$required= $_POST['required'];
//echo $name. ' - '.$email. ' - '.$phone;
$sqlEnroll = "Insert into enroll(Name,DateOfBird,Address,NameProgram,StudyAt,Email,Phone,SchoolName,ClassName,Required,Date) value ('".$name."','".$dateofbird."','".$address."','".$nameprogram."','".$studyat. "','".$email."' ,'".$phone."','".$school."','".$class."', '".$required."','".$date. "')" ;
//echo $sqlEnroll;
if (mysqli_query($conn, $sqlEnroll)) {
	echo "<div class='alert alert-success' role='alert'>Đăng ký thành công</div>";
	
		//exit(header("Location: list.php"));
} else {
	echo "Error adding record: " . mysqli_error($conn);
}
?>
<br>
<a href="index.php" >Quay lại trang chủ</a>