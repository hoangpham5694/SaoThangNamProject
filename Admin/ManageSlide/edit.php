<!DOCTYPE HTML>
<html lang="en">
    <?php include("../../Connect/connection.php"); ?>

    <head>


        <meta name="author" content="GallerySoft.info" />
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/Admin/Include/import.php"; ?>
        <script  src="/ckeditor/ckeditor.js" ></script>

        <title>Sửa bài viết</title>
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
                    <div class="panel-heading">Sửa slide</div>
                    <div class="panel-body">
                        <?php
                        $id = $_GET['id'];
                        $sql = "select s.Id,p.Title,s.SlideImageUrl,s.AllowShow from slide s inner join post p on p.Id=s.PostId where s.Id = " . $id;
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $row1 = mysqli_fetch_assoc($result);
                            ?>
                            <?php //echo $row1['Title']?>
                            <form action="edit_control.php" method="post" class="form-horizontal" >
                                <input name="id" hidden="true" value="<?=$row1['Id']?>">
                                <select name="postid" class="btn btn-default dropdown-toggle" required="required">
                                    <!-- 	<option   selected="selected">---Thể loại---</option> -->

                                    <?php
                                    $sql = "SELECT * FROM post";
                                    $result = mysqli_query($conn, $sql);
                                    //echo $sql;
                                    ?>	<?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <?php if ($row['Id'] == $row1['PostId']) { ?>
                                            <option value="<?php echo $row['Id']; ?>" selected="selected"  > <?php echo $row['Title']; ?></option>
                                            <?php } else {
                                            ?>
                                            <option value="<?php echo $row['Id']; ?>" > <?php echo $row['Title']; ?></option>
                                            <?php
                                        }
                                        ?>


                                    <?php } ?>

                                </select>



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


                                <input type="submit" class="btn btn-default" value="Sửa Bài viết"> 

                            </form>
                            <?php
                        } else {
                            echo '<div class="alert alert-warning" role="alert">Bào viết không tồn tại</div>';
                        }
                        ?>

                    </div>
                </div>
            </div >

        </div>

    </body>

</html>
