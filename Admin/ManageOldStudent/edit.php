<!DOCTYPE HTML>
<html lang="en">
    <?php include("../../Connect/connection.php"); ?>

    <head>


        <meta name="author" content="GallerySoft.info" />
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/Admin/Include/import.php"; ?>
        <script  src="/ckeditor/ckeditor.js" ></script>

        <title>Sửa cảm nhận cựu học viên</title>
    </head>

    <body>
        <?php //echo($_SERVER['DOCUMENT_ROOT'])?>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/Admin/Include/header.php"; ?>
        <div class="">

        </div>

        <div id="container">
            <?php include '../Include/menuleft.php'; ?>
            <div id="conten" class="col-lg-10 col-md-9 col-sm-9 col-xs-12 container-fluid">
                <div class="panel panel-default main">
                    <div class="panel-heading">Sửa cảm nhận cựu học viên</div>
                    <div class="panel-body">
                        <div class="col-lg-7">
                                <?php
                        $id = $_GET['id'];
                        $sql = "select * from oldstudent  where Id = " . $id;
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $row1 = mysqli_fetch_assoc($result);
                            ?>
                            <?php //echo $row1['Title']?>
                            <form action="edit_control.php" method="post" class="form-horizontal" >
                                <input name="id" hidden="true" value="<?=$row1['Id']?>">
                                <input name="name" placeholder="Tên" maxlength="20" name="description" value="<?= $row1['Name'] ?>" class="form-control" > 
                                <textarea name="content" maxlength="320" placeholder="Nội dung" class="form-control" rows="6"><?= $row1['Content'] ?></textarea>



                                <div class="radio">
                                    <label>
                                        <input type="radio" name="allowshow" value="0" <?php if ($row1['AllowShow'] == 0) {
                                    echo "checked='checked'";
                                } ?>  > Không cho hiển thị <br>
                                    </label>
                                </div>

                                <div class="radio">
                                    <label>  <input type="radio" name="allowshow" value="1" <?php if ($row1['AllowShow'] == 1) {
                                    echo "checked='checked'";
                                } ?> > Cho hiển thị <br>
                                    </label>
                                </div>


                                <input type="submit" class="btn btn-default" value="Sửa bài viết"> 

                            </form>
                            <?php
                        } else {
                            echo '<div class="alert alert-warning" role="alert">Bào viết không tồn tại</div>';
                        }
                        ?>

                        </div>
                    
                    </div>
                </div>
            </div >

        </div>

    </body>

</html>
