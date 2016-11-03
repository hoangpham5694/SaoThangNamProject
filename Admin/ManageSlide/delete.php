<!DOCTYPE HTML>
<html lang="en">
<?php include("../../Connect/connection.php");?>
<head>


	<meta name="author" content="GallerySoft.info" />
    <?php include  $_SERVER['DOCUMENT_ROOT']."/Admin/Include/import.php";?>
	<title>Xóa slide</title>
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
      <div class="panel-heading">Xóa slide</div>
      <div class="panel-body">
      <?php if(isset($_POST['listdelete'])){?>
      
      <div class="alert alert-danger">
 <h4> <strong>Bạn chắc chắn muốn xóa các slide này?</strong></h4>
</div>
      <?php 
      	$list = $_POST['listdelete'];
      	$_SESSION['listdeletecate'] = $list;
      	foreach ($list as $item => $item_value  ){
      		//echo $item_value;
      		$sql = "SELECT p.Title, s.Id, s.SlideImageUrl FROM slide s inner join post p on s.PostId=p.Id  WHERE s.Id =".$item_value;
      		//echo $sql;
                $result = mysqli_query($conn,$sql);
      		$row= mysqli_fetch_assoc($result);
      		//echo $row["Title"];
      		
      		?>
      		<p class="panel-body">
                    <img src="<?=$row['SlideImageUrl']?>" style="width: 120px;height: 80px" >
      		<?php 
      		echo $row["Title"];?>
      		</p>
      		

      		
      		
      	<?php 
      		
      	}
}else{
	echo '<div class="alert alert-warning" role="alert">Chưa chọn bài viết để xóa</div>';
}
      //	for($i =0 ;$i< $len;$i++ ){
      //		echo $list[$i];
      //	}
      ?>
      <form action="delete.php" method="post">
      <button class="btn btn-danger" type="submit" name="btnyes">OK</button>
      <a href="index.php"><button class="btn btn-primary" type="button" name="btnno">Cancel</button></a>
      </form>
      </div>
      
      <?php 
      	if(isset($_POST['btnyes'])){
      		$list = $_SESSION['listdeletecate'];
      		$_SESSION['listdelete']=null;
      		//echo "Da bam nut ok";
      		foreach ($list as $item => $item_value  ){
      			$sqlDelete="DELETE FROM slide WHERE Id = ".$item_value;
      			if (mysqli_query($conn, $sqlDelete)) {
      				echo "Xóa thành công";
      				header('Location: index.php');
      			} else {
      				echo "Error deleting record: " . mysqli_error($conn);
      			}
      		}
      		
      	}
      ?>
    </div>
</div >

</div>


</body>
</html>