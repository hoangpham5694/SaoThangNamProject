<!DOCTYPE HTML>
<html lang="en">
    <?php include("../../Connect/connection.php"); ?>
    <head>


        <meta name="author" content="GallerySoft.info" />
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/Admin/Include/import.php"; ?>
        <title>Quản lý thành tích</title>
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
                    <div class="panel-heading">Danh sách thành tích</div>
                    <div class="panel-body">
                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">Thêm Thành tích và hoạt động</button>



                        <?php
                        $sql = "select * from achievement limit 200";
                        //echo $sql;
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            ?>
                            <form action="delete.php" method="post">
                                <table id="table_list" class="table table-hover">

                                    <thead>
                                        <tr>    
                                            <th>Id</th>
                                            <th>Hình</th>
                                            <th>Tên</th>
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
                                                <td><a href="editimage.php?id=<?php echo $row["Id"] ?>"><img alt="<?php echo $row["Id"] ?>" src="<?php echo $row["ImageUrl"] ?>" width="50px" height="50px"></a></td>
                                                
                                                <td><?php echo $row["Name"] ?></td>
                                                <td>
                                                    <?php if($row['AllowShow']==0){ echo 'Không hiển thị';} else echo 'Cho hiển thị';  ?>
                                                </td>
                                                <td><a data-toggle="modal"  data-target="#modal" href="edit.php?id=<?php echo $row["Id"] ?>">Sửa</a></td>                          
                                                <td> 
                                                    <input type="checkbox"  name="listdelete[]" value="<?php echo $row["Id"]; ?>" >
                                                    

                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>
                                <input type="submit" class="btn btn-warning" value="Xóa các thành tích đã chọn"> 
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
        <div id="modal"  class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      ...
    </div>
  </div>
            </div>
        <div id="myModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <form method="post" action="create.php">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Thêm thành tích và hoạt động</h4>
                        </div>
                        <div class="modal-body">


                            <div class="form-group">
                                <input type="text" maxlength="20" class="form-control" required="required" name="name" >

                            </div><!-- /input-group -->
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
                            <button class="btn btn-default" type="submit">Thêm</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        </div> </form>
                </div>
            </div>
        </div>


    </body>
</html>