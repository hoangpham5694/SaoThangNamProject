
<!DOCTYPE HTML>
<html lang="en">
<?php include("../Connect/connection.php");?>
<head>


	<meta name="author" content="GallerySoft.info" />
    <?php include  $_SERVER['DOCUMENT_ROOT']."/Admin/Include/import.php";?>
	<title>Danh sách bài đăng</title>
	<script>
	$(document).ready( function () {
	    $('#table_list').DataTable();
	} );</script>
</head>

<body>
<?php //echo($_SERVER['DOCUMENT_ROOT'])?>
<?php include  $_SERVER['DOCUMENT_ROOT']."/Admin/Include/header.php";?>
<div class="">
	
</div>

<div id="container">
<?php include 'Include/menuleft.php';?>
<div id="conten" class="col-lg-10 col-md-9 col-sm-9 col-xs-12 container-fluid">
    <div class="panel panel-default">
              <?php
              if(isset($_GET['page'])){
              	$page=$_GET['page'];
              }else {
              	$page=1;
              }
              $max= $page *20;
              $min = $max-20;
              
      
      ?>
      <div class="panel-heading">Danh sách bài viết </div>
      
      <div class="panel-body">
            <?php 
      $sql= "select p.Id,Title,DatePost,ImageUrl,IsHightLight,CateName,FullName from post p inner join categories c on p.CategoryId = c.Id inner join users u on p.UserPostId = u.Id ORDER by p.Id DESC limit 200" ;
      //echo $sql;
      $result = mysqli_query($conn,$sql);
      if (mysqli_num_rows($result) > 0){
      	
      
      ?>
      <form action="delete.php" method="post">
      <table id="table_list" class="table table-hover">

      <thead>
      <tr>    
      <th>Hình ảnh</th>
      <th>Tiêu đề</th>
       <th>Thể loại</th>
      <th>Ngày đăng</th>
     
      <th>Người Đăng</th>
      <th>Nỗi bật</th>
      <th>Điều khiển</th>
      <th>Xóa</th>
      </tr>
  
      </thead>
      	<tbody>
      	<?php 
      	while($row = mysqli_fetch_assoc($result)){
      	?>
      	<tr>      	
      		<td><a href="editimage.php?id=<?php echo $row["Id"]?>"><img alt="<?php echo $row["Id"]?>" src="<?php echo $row["ImageUrl"]?>" width="50px" height="50px"></a></td>
      		
      		<td><a href="detail.php?id=<?php echo $row["Id"]?>"><?php echo $row["Title"]?></a></td>
      		<td><?php echo $row["CateName"]?></td>
      		<td><?php echo $row["DatePost"]?></td>
      		
      		<td><?php echo $row["FullName"]?></td>
      		<td><?php if($row["IsHightLight"] ==0) echo "Bài đăng bình thường"; else echo "Bài nỗi bật" ?></td>
      		<td><a href="edit.php?id=<?php echo $row["Id"]?>">Sửa</a></td>
      		<td> 
      			<input type="checkbox" name="listdelete[]" value="<?php echo $row["Id"];?>">
      		</td>
      	</tr>
		<?php }?>
      	</tbody>
      	
      </table>
      <input type="submit" class="btn btn-warning" value="Xóa các bài đã chọn"> 
      </form>
      <?php }
      else{
      	echo '<div class="alert alert-warning" role="alert">Không có bài viết</div>';
      }
      ?>
      </div>
      
    </div>
</div >

</div>


</body>
</html>