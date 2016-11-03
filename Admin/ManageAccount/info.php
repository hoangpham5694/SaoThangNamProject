<!DOCTYPE HTML>
<html lang="en">
    <?php include("../../Connect/connection.php"); ?>
    <head>


        <meta name="author" content="GallerySoft.info" />
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/Admin/Include/import.php"; ?>
        <title>Thông tin cá nhân</title>
    </head>

    <body>
        <?php //echo($_SERVER['DOCUMENT_ROOT'])?>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/Admin/Include/header.php"; ?>
        <div class="">

        </div>

        <div id="container">
            <?php include '../Include/menuleft.php'; ?>
            <div id="conten" class="col-lg-10 col-md-9 col-sm-9 col-xs-12 container-fluid">
                <div class="panel panel-default main"  >
                    <div class="panel-heading">Thông tin cá nhân</div>
                    <div class="panel-body">
                        <?php
                        $id = $_SESSION['user']['Id'];
                        ?>
                        <?php
                        if (isset($_POST['btnsubmit'])) {
                            $name = $_POST['name'];
                            $username = $_POST['username'];
                            $sql2 = "UPDATE users SET Username = '" . $username . "', `FullName` = '" . $name . "' WHERE Id = " . $id;

                            if (mysqli_query($conn, $sql2)) {
                                ?>


                                <div id="myModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                    <div class="modal-dialog modal-sm">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Thông báo</h4>
                                            </div>
                                            <div class="modal-body">
                                               Sửa thông tin thành công
                                            </div>
                                            <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    
      </div>
                                        </div>
                                    </div>
                                </div>
                                <script>

                                    $(document).ready(function () {
                                        $('#myModal').modal('show');
                                    });
                                </script>
                                <?php
                            }
                        }
                        ?><?php
                        $sql = "select * from users where Id=" . $id;
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['user'] = $row;
                        }
                        ?>
                        <form action="info.php" method="post">
                            <div class="col-lg-6">

                                <div class="form-group form-group-sm ">
                                    <div class="row">
                                        <label class="col-lg-4 control-label" for="formGroupInputSmall">Tên đăng nhập:</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" name="username" type="text" value="<?php echo $row["Username"] ?>" id="formGroupInputSmall" placeholder="Small input">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group form-group-sm ">
                                    <div class="row">
                                        <label class="col-lg-4 control-label" for="formGroupInputSmall">Mật khẩu:</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="password" readonly="true" value="<?php echo $row["Password"] ?>" id="formGroupInputSmall" placeholder="Small input">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group form-group-sm ">
                                    <div class="row">
                                        <label class="col-lg-4 control-label" for="formGroupInputSmall">Tên đầy đủ</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" name="name" type="text" value="<?php echo $row["FullName"] ?>" id="formGroupInputSmall" placeholder="Small input">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-4 col-lg-8 col-sm-offset-4 col-sm-8 col-sx-offset-4 col-sx-8" >
                                        <button type="submit" name="btnsubmit" class="btn btn-default"  >Thay đổi</button>
                                        <button type="reset" class="btn btn-default">Khôi phục</button>
                                    </div>
                                </div>

                            </div>


                        </form>

                    </div>
                </div>
            </div >

        </div>


    </body>
</html>