<!DOCTYPE HTML>
<html lang="en">
    <?php include("../../Connect/connection.php"); ?>
    <head>


        <meta name="author" content="GallerySoft.info" />
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/Admin/Include/import.php"; ?>
        <title>Quản lý cựu học viên</title>
        <script>
            $(document).ready(function () {
                $('#table_list').DataTable();
            });</script>
    </head>

    <body>
        <?php //echo($_SERVER['DOCUMENT_ROOT'])?>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/Admin/Include/header.php"; ?>
        <div class="">

        </div>

        <div id="container">
            <?php include '../Include/menuleft.php'; ?>
            <div id="conten" class="col-lg-10 col-md-9 col-sm-9 col-xs-12 container-fluid">
                <div class="panel panel-default">
                    <div class="panel-heading">Danh sách cảm nhận cựu học viên</div>
                    <div class="panel-body">
 <button type="button" class="btn btn-link" data-toggle="modal" data-target=".bs-example-modal-sm">Thêm cảm nhận</button>
                        <?php
                        $sql = "select * from oldstudent order by Id DESC limit 200";
                        //echo $sql;
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            ?>
                            <form action="delete.php" method="post">
                                <table id="table_list" class="table table-hover">

                                    <thead>
                                        <tr>    
                                            <th>Id</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên</th>
                                            <th>Nội dung</th>
                                            <th>Tình trạng</th>
                                               
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>      	

                                                <td><?php echo $row["Id"] ?></td>
                                                <td><a href="editimage.php?id=<?=$row['Id']?>"><img src="<?=$row['ImageUrl']?>" style="width: 70px; height: 70px"> </a></td>
                                                <td><?=$row['Name']?></td>
                                                <td><?=$row['Content']?></td>
                                                <td><?php if($row['AllowShow'] ==0){ 
                                                    echo "Không hiển thị";
                                                }else{
                                                    echo "Hiển thị";
                                                }
?></td>
                                                <td><a href="edit.php?id=<?php echo $row["Id"] ?>">Sửa</a></td>                          
                                                <td> 
                                                    <input type="checkbox"  name="listdelete[]" value="<?php echo $row["Id"]; ?>" >
                                                   

                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>
                                <input type="submit" class="btn btn-warning" value="Xóa các thể loại đã chọn"> 
                                 

                            </form>

                            <?php
                        } else {
                            echo '<div class="alert alert-warning" role="alert">Không có bài viết</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div >


<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <form action="create_oldstudent.php" method="post" class="form-horizontal" >
        <div class="modal-header" >
          
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Thêm Cảm nhận</h4>
        </div>
        <div class="modal-body">
             
                    

                                <input name="name" placeholder="Tên" maxlength="20" name="description"  class="form-control" > 
                                <textarea name="content" maxlength="320" placeholder="Nội dung" class="form-control" rows="6"></textarea>



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
        <button type="submit" class="btn btn-primary">Thêm cảm nhận</button>
      </div>
          </form>
    </div>
  </div>
</div>

    </body>
</html>