<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php include("../Connect/connection.php"); ?>
        <meta charset="UTF-8">
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/Guest/Include/import.php"; ?>
        <title>%title%</title>
    </head>
    <body>
        <?php
        include './Include/navbar.php'
        // put your code here
        ?>
        <div class="container main">
            <div class="row row-offcanvas row-offcanvas-right sub-main">
                <div class="col-xs-12 col-sm-7 col-md-9">
                    <?php
                    $key;
                    if (!isset($_GET['key'])) {
                        $key = NULL;
                    } else{
                        $key= $_GET['key'];
                        $sql= "select p.Id,Title,Description,DatePost,ImageUrl,IsHightLight,CateName,FullName from post p inner join categories c on p.CategoryId = c.Id inner join users u on p.UserPostId = u.Id where p.Title like '%".$key."%'  ORDER by p.Id DESC limit 200";
                       // echo $sql;
                         $result = mysqli_query($conn, $sql);
                      //   echo '<br>';
                       //  echo mysqli_num_rows($result);
                         
                        }
?>
                    <div class="row">
                                <ol class="breadcrumb bs-callout bs-callout-info margin-10 padding-10 clearfix title-groups">
                                    <li>
                                        <a href="/"><i class="glyphicon glyphicon-home"></i>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="">Tìm kiếm cho: <?php echo $key ?></a></li></ol> 
                        <h4 >Có <?php echo mysqli_num_rows($result) ?> kết quả</h4>
                        <hr>
                        <?php 
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                        <div class="row result">
                            <div class="col-md-4 col-sm-4">
                                <a href="view.php?id=<?= $row['Id']?>">
                                    <img src="<?php echo $row['ImageUrl'] ?>" class="img-thumbnail" >
                                </a>
                            </div>
                            <div class="col-md-8 col-sm-8" style="height: 100%">
                                <a href="view.php?id=<?= $row['Id']?>">
                                <h4><?=$row['Title'] ?></h4>
                                </a>
                                <p>
                                    <?= $row['Description']?>
                                </p>
                                
                            </div>
                            <div class="clearfix"></div>
                                            <div class="resultinfo">
                                                <a> <i class="glyphicon glyphicon-pencil"></i> <?php echo $row['CateName'] ?></a>
                                            </div>
                          
                        </div>
                                <?php
                        }
                        ?>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-5 col-md-3">
                    <?php
                    include './Include/rightmenu.php'
                    ?>
                </div>
            </div>
        </div>
        <?php
        $pageTitle = "Search '".$key."'"; // Call this in your pages' files to define the page title 
        //echo $pageTitle;
        ?>

        <script type="text/javascript">
            document.title = "<?=$pageTitle?>";
        </script>
         <?php include './Include/footer.php'; ?>
    </body>
</html>
