<!DOCTYPE HTML>
<html lang="en">
    <?php include("../Connect/connection.php"); ?>
    <head>


        <meta name="author" content="GallerySoft.info" />
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/Guest/Include/import.php"; ?>
        <title>Trang Chủ</title>
   <style>
            .carousel-inner > .item > img,
            .carousel-inner > .item > a > img {
                width: 100%;
                margin: auto;
            }

        </style> 
    </head>

    <body >
        <?php include './Include/navbar.php' ?>


        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <?php 
               $sql = "select s.Id, s.PostId,p.Title,p.Description,s.SlideImageUrl,s.AllowShow from slide s inner join post p on p.Id=s.PostId where AllowShow =1 ";
                            //echo $sql;
                            $result = mysqli_query($conn, $sql);
            ?>
            <ol class="carousel-indicators">
                <?php 
                for($i = 0;$i< mysqli_num_rows($result);$i++){
                    if($i==0){
                         echo ' <li data-target="#carousel-example-generic" class="active" data-slide-to="'.$i.'"></li>';
                    }else{
                        echo ' <li data-target="#carousel-example-generic" data-slide-to="'.$i.'"></li>';
                    }
                    
                }
                ?>
               
               
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php 
                 $row=mysqli_fetch_assoc($result);
                 ?>
                      <div class="item active">
                          <a href="view.php?id=<?=$row['PostId']?>" >
                              <img src="<?=$row['SlideImageUrl'] ?>" alt="Chania" style="width: 1350px;height: 450px"  >
                          </a>
                    
                      <div class="carousel-caption">
                          <h3><?=$row['Title']?></h3>
                     <p style="text-align: center"><?=$row['Description']?></p>
  
  </div>
                </div>
                     <?php
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                     <div class="item">
                                          <a href="view.php?id=<?=$row['PostId']?>" >
                                           <img src="<?=$row['SlideImageUrl'] ?>" alt="Chania" style="width: 1350px;height: 450px" >
                                          </a>
                                      
                   <div class="carousel-caption">
                       <h3><?=$row['Title']?></h3>
                       <p style="text-align: center"><?=$row['Description']?></p>
 
  </div> 
                    
                </div>
                                    <?php
                            }
                ?>
                
               
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="container main">
            <div class="row row-offcanvas row-offcanvas-right sub-main">
                <div class="col-xs-12 col-sm-7 col-md-9">

                    <div class="row">
                        <div class="bs-callout bs-callout-info margin-10 padding-10 clearfix title-groups">
                            <a href="#trang-chu" class="pull-left">
                                <h4 id="trang-chu">Tiêu điểm</h4>
                            </a>

                        </div>
                        <div class="col-12 col-sm-12 col-md-7 col-lg-7 item">
                            <?php
                            $sql = "select p.Id,Title,Description,DatePost,ImageUrl,IsHightLight,CateName,FullName from post p inner join categories c on p.CategoryId = c.Id inner join users u on p.UserPostId = u.Id where p.IsHightLight  ORDER by p.Id DESC limit 8";
                            //echo $sql;
                            $result = mysqli_query($conn, $sql);
                            // echo mysqli_row
                            ?>
                            <!--First News-->
                            <?php
                            $rowHighLight = mysqli_fetch_assoc($result);
                            ?>
                            <div class="row row-end first-item">

                                <a href="view.php?id=<?php echo $rowHighLight['Id'] ?> ">
                                    <img itemprop="image" class="img-thumbnail" style="max-height:  350px;" alt="510x300" src="<?php echo $rowHighLight['ImageUrl']; ?>">
                                </a>
                                <h1 itemprop="name" class="text-justify news-name"><a href="view.php?id=<?php echo $rowHighLight['Id'] ?>"><?php echo $rowHighLight['Title']; ?></a></h1>
                                <p itemprop="description" class="text-justify">
                                    <?php echo $rowHighLight['Description'] ?>
                                </p>
                            </div>
                        </div>
                        <!--News from Unit-->
                        <div class="col-6 col-sm-12 col-md-6 col-lg-5 item">
                            <div class="row" style="margin-left:5px">
                                <ul class="list-group">
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <li class="list-group-item text-justify"><a href="view.php?id=<?php echo $row['Id'] ?>"><i class="bullet bullet-12"></i><?php echo $row['Title']; ?></a></li>
                                        <?php
                                    }
                                    ?>



                                </ul>
                            </div>
                        </div>                
                    </div>
                    <div class="row news-area">
                        <div class="bs-callout bs-callout-info margin-10 padding-10 clearfix title-groups" style="margin-bottom:20px;">
                            <a href="#trang-chu">
                                <h4 id="trang-chu">Tin mới nhất</h4>
                            </a>
                        </div>
                        <div class="col-6 col-sm-12 col-lg-5">                                                
                            <div class="list-news clearfix">
                                <?php
                                $sql = "select p.Id,Title,Description,DatePost,ImageUrl,IsHightLight,CateName,CategoryId,FullName from post p inner join categories c on p.CategoryId = c.Id inner join users u on p.UserPostId = u.Id  ORDER by p.Id DESC limit 10";
                                //echo $sql;
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <div class="row">
                                        <div class="post excerpt text-justify">
                                            <div class="post-date-ribbon"><div class="corner"></div>
                                                <?php echo $row['DatePost']; ?>    </div>
                                            <h4><a href="view.php?id=<?php echo $row['Id'] ?>" > <?php echo $row['Title']; ?></a></h4>
                                            <div class="col-sm-5" style="margin-right: 5px; padding: 0;">
                                                <a href="view.php?id=<?php echo $row['Id'] ?>" >
                                                    <img class="img-thumbnail "  alt="140x94" src="<?php echo $row['ImageUrl'] ?>" style="max-width:  140px; ">
                                                </a>
                                            </div>

                                            <p><?php echo $row['Description']; ?></p>
                                            <div class="clearfix"></div>
                                            <div class="readMore">
                                                <a href="list.php?id=<?=$row['CategoryId']?>" ><i class="glyphicon glyphicon-pencil"></i> <?php echo $row['CateName'] ?></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>


                                <script>
                                    $("img").error(function () {
                                        $(this).hide();
                                    });//.attr( "src", "missing.png" );  
                                </script><!--
                                 <link href="/css/bootstrap.min.css" rel="stylesheet">
                                
                                    
                                    <link href="/css/ui/style.css" rel="stylesheet">
                                    <link href="/css/dashboard.css" rel="stylesheet">    
                                    <link href="/css/ui/import-boostrap.css" rel="stylesheet">
                                    <link href="/css/ui/nav.css" rel="stylesheet">
                                    <link href="/css/ui/admin.css" rel="stylesheet">
                                    <link href="/css/ui/import-boostrap.css" rel="stylesheet">
                                    <link href="/css/ui/debug.css" rel="stylesheet">
                                    <script src="/js/jquery.min.js"></script>    
                                    <script src="/js/bootstrap.min.js"></script>    
                                    <script src="/js/jquery.easing.min.js"></script>    
                                    <script src="/js/jquery.easy-ticker.js"></script>    
                                    <script src="/js/ui/breakingnews.js"></script>    
                                <!-- JavaScript jQuery code from Bootply.com editor  -->

                               

                            </div>
                        </div>
                        <div class="col-6 col-sm-12 col-lg-7">
                            <?php
                            $sqlCate = "select * from categories";
                            //  echo $sqlCate;
                            $resultCate = mysqli_query($conn, $sqlCate);
                            while ($rowCate = mysqli_fetch_assoc($resultCate)) {
                                $sqlPost = "select p.Id,Title,Description,DatePost,ImageUrl,IsHightLight,CateName,FullName from post p inner join categories c on p.CategoryId = c.Id inner join users u on p.UserPostId = u.Id where p.CategoryId = " . $rowCate['Id'] . "  ORDER by p.Id DESC limit 7 ";
                                $resultPost = mysqli_query($conn, $sqlPost);
                                //   echo $sqlPost;
                                if (mysqli_num_rows($resultPost) > 0) {
                                    $rowPost = mysqli_fetch_assoc($resultPost);
                                    ?>
                                    <div class="row">

                                        <div class="bs-group bs-khoahoc bs-khoahoc-tabs">                            
                                            <div class="category-caption">
                                                <h4 id="hoat-dong-khoa-hoc"><?php echo $rowCate['CateName'] ?></h4>
                                            </div>

                                            <div id="Div2" class="tab-content panel panel-default">


                                                <div class="row text-justify panel-body">
                                                    <div class="col-6 col-sm-12 col-lg-6 item-sm">
                                                        <a href="view.php?id=<?php echo $rowPost['Id'] ?>" >
                                                            <img class="img-thumbnail" alt="200x110" src="<?php echo $rowPost['ImageUrl'] ?>" style="width: 220px; height: 100px;">
                                                        </a>
                                                        <h4><a href="view.php?id=<?php echo $rowPost['Id'] ?>"><?php echo $rowPost['Title'] ?></a></h4>
                                                        <p>
                                                            <?php echo $rowPost['Description'] ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-6 col-sm-12 col-lg-6 item">
                                                        <dl>
                                                            <?php
                                                            while ($rowPost = mysqli_fetch_assoc($resultPost)) {
                                                                ?>
                                                                <dd class=" ">
                                                                    <a href="view.php?id=<?php echo $rowPost['Id'] ?>" >
                                                                        <i class="bullet bullet-17"></i><?php echo $rowPost['Title'] ?></a>
                                                                </dd>

                                                            <?php } ?>

                                                        </dl>
                                                    </div>
                                                </div>


                                            </div>                            
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>




                        </div>

                    </div>
                    <!--              -->
                    <div class="row">
                        <div class="bs-callout bs-callout-info margin-10 padding-10 clearfix title-groups">
                            <a href="#trang-chu" class="pull-left">
                                <h4 id="trang-chu">Góc cựu học viên</h4>
                            </a>

                        </div>
                        <?php 
                        $sqlCate = "select * from oldstudent where AllowShow =1";
                            //  echo $sqlCate;
                            $result = mysqli_query($conn, $sqlCate);
                            if(mysqli_num_rows($result) >0){
                                while ($row= mysqli_fetch_assoc($result)){
                                    ?>
                                         <div class="col-lg-4 item ">
                            <div class="old-student">
                                  <div class="panel-heading" >
                                <img class="img-circle "  alt="140x94" src="<?=$row['ImageUrl']?>" style="width:  50px;height: 50px ">
                                <span><?=$row['Name']?></span>
                                <hr>
                            </div>
                            
                            <div >
                                <p>
                                    <?=$row['Content']?>
                                </p>
                                     
                            </div>
                            </div>
                          
                        </div>
                                        <?php
                                }
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
        <div>
            <?php include './Include/footer.php'; ?>
        </div>





    </body>
</html>