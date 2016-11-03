<?php
include '../../Connect/connection.php';

?>
<?php
function getExtension($str) {
	$i = strrpos($str,".");
	if (!$i) {
		return "";
	}
	$l = strlen($str) - $i;
	$ext = substr($str,$i+1,$l);
	return $ext;
}

$target_dir =  "../../upload/Achievement/";
$id= $_POST['id'];
echo $id;
$filename = stripslashes($_FILES['fileToUpload']['name']);
//Lấy phần mở rộng của file
$extension = getExtension($filename);
$extension = strtolower($extension);
$target_file = $target_dir . $id.'.'.$extension;
echo $target_file;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "file already exists.";
    unlink($target_file);
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 20000000) {
	echo $_FILES["fileToUpload"]["size"];
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	echo $target_file;
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    	$sql = "UPDATE achievement SET ImageURL='/upload/Achievement/".$id.'.'.$extension."' WHERE Id=".$id;
    	//echo $sql;
    	if (mysqli_query($conn, $sql)) {
    		echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    		header('Location: index.php');
    		die();
    	} else {
    		echo "Error updating record: " . mysqli_error($conn);
    	}
    	mysqli_close($conn);   	
    
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>