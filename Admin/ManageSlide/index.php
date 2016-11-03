
<!DOCTYPE HTML>
<html lang="en">
<?php include("../../Connect/connection.php");?>
<head>


	<meta name="author" content="GallerySoft.info" />
    <?php include  $_SERVER['DOCUMENT_ROOT']."/Admin/Include/import.php";?>
	<title>Danh sách slide</title>
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
             
      <div class="panel-heading">Danh sách ảnh slide </div>
      
      <div class="panel-body">
          
               <button type="button" class="btn btn-link" data-toggle="modal" data-target=".bs-example-modal-lg">Thêm slide</button>
            <?php 
      $sql= "select s.Id,p.Title,s.SlideImageUrl,s.AllowShow from slide s inner join post p on p.Id=s.PostId ORDER by Id DESC limit 200" ;
      //echo $sql;
      $result = mysqli_query($conn,$sql);
      if (mysqli_num_rows($result) > 0){
      	
      
      ?>
      <form action="delete.php" method="post">
      <table id="table_list" class="table table-hover">

      <thead>
      <tr>    
      <th>Hình ảnh</th>
      <th>Bài đăng</th>
      <th>Tình trạng</th>
      <th>Điều khiển</th>
      <th>Xóa</th>
      </tr>
  
      </thead>
      	<tbody>
      	<?php 
      	while($row = mysqli_fetch_assoc($result)){
      	?>
      	<tr>      	
      		<td><a href="editimage.php?id=<?php echo $row["Id"]?>"><img alt="<?php echo $row["Id"]?>" src="<?php echo $row["SlideImageUrl"]?>" width="200px" height="80px"></a></td>
                <td><?= $row['Title']?></td>
                <td><?php if($row["AllowShow"] ==0) echo "Không hiển thị"; else echo "Cho hiển thị" ?></td>
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

   

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form action="create_slide.php" method="post" class="form-horizontal" >
        <div class="modal-header" >
          
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Thêm slide</h4>
        </div>
        <div class="modal-body">
             
                              
                                <select name="postid" class="btn btn-default dropdown-toggle" required="required">
                                    <!-- 	<option   selected="selected">---Thể loại---</option> -->

                                    <?php
                                    $sql = "SELECT * FROM post";
                                    $result = mysqli_query($conn, $sql);
                                    //echo $sql;
                                     while ($row = mysqli_fetch_assoc($result)) { ?>
                                       
                                        
                                            <option value="<?php echo $row['Id']; ?>"   > <?php echo $row['Title']; ?></option>
                                      


                                    <?php } ?>

                                </select>



                                <div class="radio">
                                    <label>
                                        <input type="radio" name="allowshow" checked="true" value="0" > Không cho hiển thị <br>
                                    </label>
                                </div>

                                <div class="radio">
                                    <label>  <input type="radio" name="allowshow" value="1"  > Cho hiển thị <br>
                                    </label>
                                </div>


                                

                          
        </div>
              <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
        <button type="submit" class="btn btn-primary">Thêm slide</button>
      </div>
          </form>
    </div>
  </div>
</div>

</body>
</html>