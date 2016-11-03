
<!DOCTYPE HTML>
<html lang="en">
<?php include("../../Connect/connection.php");?>
<head>


	<meta name="author" content="GallerySoft.info" />
    <?php include  $_SERVER['DOCUMENT_ROOT']."/Admin/Include/import.php";?>
	<title>Quản lý Contact</title>
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
<?php include '../Include/menuleft.php';?>
<div id="conten" class="col-lg-10 col-md-9 col-sm-9 col-xs-12 container-fluid">
    <div class="panel panel-default">
             
      <div class="panel-heading">Danh sách Contact </div>
      
      <div class="panel-body">
          
               
            <?php 
      $sql= "select * from contact order by Id DESC limit 2000" ;
      //echo $sql;
      $result = mysqli_query($conn,$sql);
      if (mysqli_num_rows($result) > 0){
      	
      
      ?>
      <form action="delete.php" method="post">
      <table id="table_list" class="table table-hover">

      <thead>
      <tr>    
      <th>Id</th>
      <th>Ngày gởi</th>
      <th>Tên</th>
      <th>Số sinh viên</th>
      <th>Email</th>
      <th>Facebook</th>
      <th>Điện thoại</th>
      <th>Yêu cầu</th>
      <th>Xóa</th>
      </tr>
  
      </thead>
      	<tbody>
      	<?php 
      	while($row = mysqli_fetch_assoc($result)){
      	?>
      	<tr>      	
      		<td><?= $row['Id']?></td>
                   <td><?= $row['Date']?></td>
                <td><?= $row['Name']?></td>
                <td><?= $row['StudentNumber']?></td>
                 <td><?= $row['Email']?></td>
                  <td><?= $row['Facebook']?></td>
                   <td><?= $row['Phone']?></td>
                    <td><?= $row['Required']?></td>
                 
               
      		
      		<td> 
      			<input type="checkbox" name="listdelete[]" value="<?php echo $row["Id"];?>">
      		</td>
      	</tr>
		<?php }?>
      	</tbody>
      	
      </table>
      <input type="submit" class="btn btn-warning" value="Xóa các liên hệ đã chọn"> 
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Xóa tất cả</button>
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

   
<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Cảnh báo</h4>
        </div>
        <div class="modal-body">
            Bạn chắc chắn muốn xóa tất cả message?
        </div>
        <div class="modal-footer">
            <a href="deleteall.php" class="btn btn-default">Có</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
   
        
        </div>
  </div>
</div>
</div>

</body>
</html>