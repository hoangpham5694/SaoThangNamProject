
<?php
 include("../../Connect/connection.php");
 $id= $_POST['id'];
 $name= $_POST['name'];
 $allowShow= $_POST['allowshow'];
 $sql = "Update achievement set Name='".$name."',AllowShow=".$allowShow." where Id=".$id;
 if (mysqli_query($conn, $sql)) {
 	echo "sửa thành công";
 	header('Location: index.php');
 }else{
 	echo "Lỗi khi sửa thông tin";
 	echo "Error deleting record: " . mysqli_error($conn);
 }

?>