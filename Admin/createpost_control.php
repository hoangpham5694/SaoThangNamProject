<?php
 include("../Connect/connection.php");
$title = $_POST['title'];
$cate = $_POST['category'];
$date = date("Y-m-d");
$description = $_POST['description'];
echo $date;
$sumary = $_POST['summary'];
//$_SESSION['user'] =1;
session_start();
if(isset($_SESSION['user'])){
    echo "sesssion not null";
    $user= $_SESSION['user'];
$userpost= $user['Id'];
}

$imageUrl= "/upload/PostImage/default.jpg";
$ishighlight=$_POST['ishighlight'];
echo $ishighlight;
$sql = "Insert into post(Title,Description,Content,DatePost,UserPostId,ImageUrl,CategoryId,IsHightLight) value ('".$title."','".$description."','".$sumary."','".$date."',".$userpost. ", '".$imageUrl."',".$cate.",".$ishighlight. ")" ;
//echo $sql;
if (mysqli_query($conn, $sql)) {
	echo "<h2>Thêm thành công</h2>";
	
		exit(header("Location: list.php"));
} else {
	echo "Error adding record: " . mysqli_error($conn);
}
?>