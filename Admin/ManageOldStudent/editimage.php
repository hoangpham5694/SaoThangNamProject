<!DOCTYPE HTML>
<html lang="en">
<?php include("../../Connect/connection.php");?>
<head>


	<meta name="author" content="GallerySoft.info" />
    <?php include  $_SERVER['DOCUMENT_ROOT']."/Admin/Include/import.php";?>
	<title>Thay đổi anh Slide</title>
</head>

<body>
<?php //echo($_SERVER['DOCUMENT_ROOT'])?>
<?php include  $_SERVER['DOCUMENT_ROOT']."/Admin/Include/header.php";?>
<div class="">
	
</div>

<div id="container">
<?php include '../Include/menuleft.php';?>
<div id="conten" class="col-lg-10 col-md-9 col-sm-9 col-xs-12 container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading">Thay đổi ảnh</div>
      <div class="panel-body">
      <?php 
      $id=0;
      if(isset($_GET['id'])){
      	$id=$_GET['id'];
      }
$sql = "select * from oldstudent where id=".$id;
//echo $sql;
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_assoc($result);
?>
		<form method="post" action="upload.php"  enctype="multipart/form-data">
		 <input type="text" name="id" hidden="true" readonly="readonly" value="<?php echo $id;?>" />
		<table style="width: 70%" >
			<tr>
				<td>Hình ảnh cũ:</td>
				<td><img style="width:200px;height:200px" alt="image" src="<?php echo $row['ImageUrl']?>"> </td>
			</tr>
						<tr>
				<td>Hình ảnh mới: </td>
				<td><input type="file" class="btn btn-default" name="fileToUpload" id="fileToUpload"></td>
			</tr>
									<tr>
				<td></td>
				<td></td>
			</tr>
		</table>
		<input class="btn btn-success btn-lg " type="submit" value="Upload Image" name="submit">
		</form>
		<?php }?>

</div>
    </div>
</div >

</div>


</body>
</html>