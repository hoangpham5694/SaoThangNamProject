<!DOCTYPE HTML>
<html lang="en">
    <?php include("../Connect/connection.php"); ?>

    <head>


        <meta name="author" content="GallerySoft.info" />
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/Admin/Include/import.php"; ?>
        <script  src="/ckeditor/ckeditor.js" ></script>

        <title>Viết Tin Mới</title>
    </head>

    <body>
        <?php //echo($_SERVER['DOCUMENT_ROOT'])?>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/Admin/Include/header.php"; ?>
        <div class="">

        </div>

        <div id="container">
            <?php include 'Include/menuleft.php'; ?>
            <div id="conten" class="col-lg-10 col-md-9 col-sm-9 col-xs-12 container-fluid">
                <div class="panel panel-default main">
                    <div class="panel-heading">Viết Bài mới</div>
                    <div class="panel-body">

                        <form action="createpost_control.php" method="post" class="form-horizontal" >

                            <input type="text" placeholder="Tiêu đề" name="title" class="form-control"> 
                            <input type="text" placeholder="Tóm tắt nội dung" name="description" class="form-control">

                            <select name="category" class="btn btn-default dropdown-toggle" required="required">
                                <!-- 	<option   selected="selected">---Thể loại---</option> -->

                                <?php
                                $sql = "SELECT *FROM categories";
                                $result = mysqli_query($conn, $sql);
                                //echo $sql;
                                ?>	<?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $row['Id']; ?>" > <?php echo $row['CateName']; ?></option>

                                <?php } ?>

                            </select>

                            <textarea id="summary" name="summary" ></textarea>
                            <script>CKEDITOR.replace('summary');</script>
                            <input type="radio" name="ishighlight" value="0" checked="checked" > Bài bình thường <br>
                            <input type="radio" name="ishighlight" value="1" > Bài tiêu điểm <br>


                            <input type="submit" value="Đăng bài"> 

                        </form>
                    </div>
                </div>
            </div >

        </div>

    </body>

</html>
