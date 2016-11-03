<!DOCTYPE HTML>
<html lang="en">
    <?php include("../../Connect/connection.php"); ?>
    <head>


        <meta name="author" content="GallerySoft.info" />
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/Admin/Include/import.php"; ?>
        <title>Quản lý thể loại</title>
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
                    <div class="panel-heading">Danh sách thể loại</div>
                    <div class="panel-body">
                        <div  class="row" >

                            <div class="col-lg-6 col-md-6 col-sm-8 col-sx-12">
                                <p><strong>Thêm thể loại</strong></p>
                                <form method="post" action="create.php">
                                    <div class="input-group">
                                        <input type="text" class="form-control" required="required" name="catename" placeholder="Tên thể loại">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">Thêm thể loại</button>
                                        </span>

                                    </div><!-- /input-group -->
                                </form>
                                <br>
                            </div>
                        </div>
                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $sql2 = "select * from categories where Id= " . $id;
                            //echo $sql;
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2) > 0) {
                                $row2 = mysqli_fetch_assoc($result2);
                                ?>
                                <div id="myModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                    <div class="modal-dialog modal-sm">

                                        <div class="modal-content">
                                            <form method="post" action="edit.php">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Sửa "<?php echo $row2['CateName'] ?>"</h4>
                                                </div>
                                                <div class="modal-body">

                                                    <input type="text" name="id" hidden="true" value="<?php echo $id; ?>">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" required="required" name="catename" value="<?php echo $row2['CateName'] ?>">
                                                  

                                                    </div><!-- /input-group -->

                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-default" type="submit">Sửa</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                </div> </form>
                                        </div>
                                    </div>
                                </div>
                                <script>

                                    $(document).ready(function () {
                                        $('#myModal').modal('show');
                                    });
                                </script>

                          <!--      <div class="row"  >

                                    <div class="col-lg-6 col-md-6 col-sm-8 col-sx-12">
                                        <p><strong>Sửa "<?php echo $row2['CateName'] ?>"</strong></p>
                                        <form method="post" action="edit.php">
                                            <input type="text" name="id" hidden="true" value="<?php echo $id; ?>">
                                            <div class="input-group">
                                                <input type="text" class="form-control" required="required" name="catename" value="<?php echo $row2['CateName'] ?>">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="submit">Sửa</button>
                                                    <a href="index.php"><button class="btn btn-default" type="button" >Quay lại</button></a>
                                                </span>

                                            </div>
                                        </form>
                                        <br>
                                    </div>
                                </div> -->
                                <?php
                            }
                        }
                        ?>





                        <?php
                        $sql = "select * from categories limit 200";
                        //echo $sql;
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            ?>
                            <form action="delete.php" method="post">
                                <table id="table_list" class="table table-hover">

                                    <thead>
                                        <tr>    
                                            <th>Id</th>
                                            <th>Tên thể loại</th>
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
                                                <td><?php echo $row["CateName"] ?></td>

                                                <td><a href="index.php?id=<?php echo $row["Id"] ?>">Sửa</a></td>                          
                                                <td> 
                                                    <input type="checkbox"  name="listdelete[]" value="<?php echo $row["Id"]; ?>" 
                                                    <?php
                                                    $sql2 = "select * from post where CategoryId=" . $row["Id"];
                                                    $result1 = mysqli_query($conn, $sql2);
                                                    if (mysqli_num_rows($result1) > 0) {
                                                        echo "disabled='disabled'";
                                                    }
                                                    ?>

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




    </body>
</html>