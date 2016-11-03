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
        <?php  include ("Include/import.php"); ?>
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
                    if (!isset($_GET['id'])) {
                        echo '<div class="alert alert-warning" role="alert">Lỗi không xác định</div>';
                    } else {
                        $id = $_GET['id'];
                        $sql = "SELECT p.Id as postId,Title,Description,Content,DatePost,ImageUrl,IsHightLight,CateName,CategoryId,FullName FROM post p inner join categories c on p.CategoryId=c.Id inner join users u on p.UserPostId = u.Id WHERE p.Id =" . $id;
                         //  echo $sql;
                        $result = mysqli_query($conn, $sql);
                        $num=mysqli_num_rows($result);
                        if ($num == 0) {
                            echo '<div class="alert alert-warning" role="alert">Bài viết không tồn tại</div>';
                        } else {
                            $row = mysqli_fetch_assoc($result);
                            ?> 
                            <div class="row">
                                <ol class="breadcrumb bs-callout bs-callout-info margin-10 padding-10 clearfix title-groups">
                                    <li>
                                        <a href="/"><i class="glyphicon glyphicon-home"></i>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="list.php?id=<?=$row['CategoryId']?>"><?php echo $row['CateName'] ?></a></li></ol> 
                                <div class="clearfix title-groups">
                                    <a href="#trang-chu" class="pull-right">
                                        <small>                            
                                            <span itemprop="startDate" ><?php
                                                $date = strtotime($row['DatePost']);
                                                echo date("d/m/Y", $date);
                                                ?></span>                            
                                        </small>
                                    </a>                                    
                                    <!--   <div class="pull-right" id="share-social">        
                                           <div class="fb-like pull-left fb_iframe_widget" data-href="http://ued.udn.vn/tin-tuc/chi-tiet/khai-giang-lop-dao-tao-tieng-viet-cho-luu-hoc-sinh-lao-1817.html" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=&amp;container_width=0&amp;href=http%3A%2F%2Fued.udn.vn%2Ftin-tuc%2Fchi-tiet%2Fkhai-giang-lop-dao-tao-tieng-viet-cho-luu-hoc-sinh-lao-1817.html&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true"><span style="vertical-align: bottom; width: 137px; height: 20px;"><iframe name="f3013c6488" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="http://www.facebook.com/v2.0/plugins/like.php?action=like&amp;app_id=&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2Fjb3BUxkAISL.js%3Fversion%3D41%23cb%3Df2d531938c%26domain%3Dued.udn.vn%26origin%3Dhttp%253A%252F%252Fued.udn.vn%252Ff162aa53cc%26relation%3Dparent.parent&amp;container_width=0&amp;href=http%3A%2F%2Fued.udn.vn%2Ftin-tuc%2Fchi-tiet%2Fkhai-giang-lop-dao-tao-tieng-viet-cho-luu-hoc-sinh-lao-1817.html&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true" style="border: none; visibility: visible; width: 137px; height: 20px;" class=""></iframe></span></div>                        
                                           <div id="___plusone_0" style="text-indent: 0px; margin: 0px; padding: 0px; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 300px; height: 24px; background: transparent;"><iframe frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 300px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 24px;" tabindex="0" vspace="0" width="100%" id="I0_1445656208197" name="I0_1445656208197" src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;annotation=inline&amp;width=300&amp;hl=vi&amp;origin=http%3A%2F%2Fued.udn.vn&amp;url=http%3A%2F%2Fued.udn.vn%2Ftin-tuc%2Fchi-tiet%2Fkhai-giang-lop-dao-tao-tieng-viet-cho-luu-hoc-sinh-lao-1817.html&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en.sS9ePrAoNew.O%2Fm%3D__features__%2Fam%3DEQ%2Frt%3Dj%2Fd%3D1%2Ft%3Dzcms%2Frs%3DAGLTcCMOc8bEEL2BdNWejdOwnNtN_e4l0Q#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1445656208197&amp;parent=http%3A%2F%2Fued.udn.vn&amp;pfname=&amp;rpctoken=55954987" data-gapiattached="true" title="+1"></iframe></div>                            
                                       </div>  -->
                                </div>
                                <h1 class="text-justify" itemprop="name" style="font-size:24px">
                                    <?php echo $row['Title'] ?></h1>
                                <p itemprop="description" style="font: 700 14px arial;color: #333;">
                                    <?php echo $row['Description'] ?>
                                </p>
                                <div id="news-content" style="text-align: justify;display: block; display: -webkit-box;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">
                                    <?php echo $row['Content'] ?>
                                </div>
                                <div>
                                    <code class="glyphicon glyphicon-pencil"> </code>
                                    Người đăng: <?php echo $row['FullName'] ?>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="" style="margin-top: -20px;">
                                            <h3 style="font:700 16px/30px arial;margin-top: -5px;">Bình luận</h3>

                                        </div>


                                        <div id="form" class="col-lg-7">
                                            <!--     <form  method="post" onsubmit="loadDoc()"  class="form-horizontal">  -->
                                            <div class="form-group">
                                                <input type="text" id="postid" hidden="true" name="postid" value="<?php echo $id ?>">
                                                <input type="text"   required="true"class="form-control" id="name" name="name" placeholder="Tên">

                                            </div>
                                            <div class="form-group">
                                                <textarea  id="comment" required="true" placeholder="Bình luận" name="content" class="form-control" rows="3"></textarea>

                                            </div>

                                            <div class="form-group">
                                                <div class="">
                                                    <button type="submit" id="submit" class="btn btn-default">Đăng bình luận</button>
                                                </div>
                                            </div>
                                            <!--    </form>   -->
                                        </div>
                                    </div>

                                    <script>
                                        $(document).ready(function () {
                                            var id = $("#postid").val();
                                            loadcomment(id);
                                            $("#submit").click(function () {
                                                var postid = $("#postid").val();
                                                var name = $("#name").val();
        //var email = $("#email").val();
        //var password = $("#password").val();
                                                var content = $("#comment").val();
        // Returns successful data submission message when the entered information is stored in database.
                                                var dataString = 'name=' + name + '&content=' + content + '&postid=' + postid;
                                                if (1 == 2)
                                                {
                                                    alert("Please Fill All Fields");
                                                }
                                                else
                                                {
        // AJAX Code To Submit Form.
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "comment_control.php",
                                                        data: dataString,
                                                        cache: false,
                                                        success: function (result) {
                                                            document.getElementById("result").innerHTML = result;
                                                            $('#mymodal').modal('show');
                                                            $("#name").val('');
                                                            $("#comment").val('');
                                                            loadcomment(postid)
        //alert(result);
                                                        }
                                                    });
                                                }
                                                return false;
                                            });
                                        });

                                        function loadcomment(id) {
                                            if (id.length == 0) {
                                                document.getElementById("divcomment").innerHTML = "";
                                                return;
                                            } else {
                                                var xmlhttp = new XMLHttpRequest();
                                                xmlhttp.onreadystatechange = function () {
                                                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                                        document.getElementById("divcomment").innerHTML = xmlhttp.responseText;
                                                    }
                                                }
                                                xmlhttp.open("GET", "comment_load.php?id=" + id, true);
                                                xmlhttp.send();
                                            }
                                        }
                                    </script>

                                </div>


                                <div class="modal fade bs-example-modal-sm" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="gridSystemModalLabel">Thông báo</h4>
                                            </div>
                                            <div class="modal-body" id="result">

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <hr>
                                <div class="row">
                                    <div  class="col-lg-12">
                                        <div id="divcomment" class="col-lg-7 ">

                                        </div>

                                    </div>
                                </div>

                            </div>     

                            <?php
                        }
                    }
                    ?>

                </div>


                <div class="col-xs-12 col-sm-5 col-md-3">
                    <?php
                    include './Include/rightmenu.php'
                    ?>
                </div>
            </div>
        </div>
        <?php
        $pageTitle = $row['Title']; // Call this in your pages' files to define the page title 
        // echo $pageTitle;
        ?>

        <script type="text/javascript">
            document.title = "<?= $pageTitle ?>"
        </script>
         <?php include './Include/footer.php'; ?>
    </body>
</html>
