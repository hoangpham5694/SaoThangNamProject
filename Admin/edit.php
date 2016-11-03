<!DOCTYPE HTML>
<html lang="en">
<?php include("../Connect/connection.php");?>

<head>


	<meta name="author" content="GallerySoft.info" />
    <?php include  $_SERVER['DOCUMENT_ROOT']."/Admin/Include/import.php";?>
    <script  src="/ckeditor/ckeditor.js" ></script>
 
	<title>Sửa bài viết</title>
</head>

<body>
<?php //echo($_SERVER['DOCUMENT_ROOT'])?>
<?php include  $_SERVER['DOCUMENT_ROOT']."/Admin/Include/header.php";?>
<div class="">
	
</div>

<div id="container">
<?php include 'Include/menuleft.php';?>
<div id="conten" class="col-lg-10 col-md-9 col-sm-9 col-xs-12 container-fluid">
    <div class="panel panel-default main">
      <div class="panel-heading">Sửa bài viết</div>
      <div class="panel-body">
      <?php 
      $id= $_GET['id'];
      $sql="select * from post where Id = ".$id;
      $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
      	$row1= mysqli_fetch_assoc($result);
      	?>
      	<?php //echo $row1['Title']?>
      	<form action="edit_control.php" method="post" class="form-horizontal" >
      	<input type="text" value="<?php echo $id?>" hidden="true" name="id">
      		 	
      		<input type="text" placeholder="Tiêu đề" value='<?php echo $row1['Title']?>' required="required" max="200"  maxlength="200" name="title" class="form-control"> 
      			<input type="text" placeholder="Tóm tắt nội dung" value='<?php echo $row1['Description']?>' required="required" max="200"  maxlength="200" name="description" class="form-control"> 
      	
      			<select name="category" class="btn btn-default dropdown-toggle" required="required">
      		<!-- 	<option   selected="selected">---Thể loại---</option> -->
      			
     <?php 	$sql = "SELECT *FROM categories";
	$result = mysqli_query($conn,$sql);
	//echo $sql;
	
	?>	<?php while($row= mysqli_fetch_assoc($result)){?>
	<?php if($row['Id']==$row1['CategoryId']){?>
	<option value="<?php echo $row['Id'];?>" selected="selected"  > <?php echo $row['CateName'];?></option>
		<?php 
	}else{?>
		<option value="<?php echo $row['Id'];?>" > <?php echo $row['CateName'];?></option>
		<?php 
	}
	?>
		
		
<?php }?>
  			
  			</select>
  
      			<textarea id="summary" name="summary"  ><?php echo $row1['Content']?></textarea>
 <script>CKEDITOR.replace('summary'); </script>
 
 <div class="radio">
 <label>
 <input type="radio" name="ishighlight" value="0" <?php if($row1['IsHightLight'] == 0){ echo "checked='checked'";}?>  > Bài bình thường <br>
 </label>
 </div>
 
<div class="radio">
 <label>  <input type="radio" name="ishighlight" value="1" <?php if($row1['IsHightLight'] == 1){ echo "checked='checked'";}?> > Bài tiêu điểm <br>
 </label>
</div>
  
 
 				<input type="submit" class="btn btn-default" value="Sửa Bài viết"> 
  				
      		</form>
      	<?php
      	
      }else {
      	echo '<div class="alert alert-warning" role="alert">Bào viết không tồn tại</div>';
      }
      ?>
      		
      </div>
    </div>
</div >

</div>

</body>
 	
</html>
    		