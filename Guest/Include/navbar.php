<?php
//include './import.php';
?>
<link rel="stylesheet" href="/css/navbar.css"/>
<div class="nav-top hidden-xs">        
    <div class="container">
        <div class="col-xs-12 col-sm-7 col-md-5">
            <div class="row nav-top-content">
                <div class="nav-top-logo">
                    <a href="/Guest/index.php"><img src="/img/logo2.jpg" style="height: 100px; width: 100px; "class="img-circle" alt=""></a>
                </div>
                <div class="nav-top-caption">
                    <h4 style="text-align: center;">CÔNG TY TNHH TƯ VẤN & ĐÀO TẠO KẾ TOÁN</h4>
                    <h3 style="text-align: center; margin-top: 5px; margin-bottom: 5px;">SAO THÁNG NĂM</h3>
                    <hr>
                    <h5 style="text-align: center; margin-top: 5px;"><i>Chất lượng tạo nên sự khác biệt!</i></h5>
                </div>                    
            </div>
        </div>
        <div class="col-xs-12 col-sm-5 col-md-7">
            <ul class="nav navbar-nav">          
                <li class="" id="gioi-thieu">
                    <a href="/Guest/index.php" >Trang chủ</a>

                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Chuyên mục
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php
                        $sql = "select * from categories";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <li><a href="list.php?id=<?= $row['Id'] ?>"><?= $row['CateName'] ?></a></li>
                                <?php
                            }
                        }
                        ?>

                    </ul>
                </li>

                <li class="" id="dao-tao">
                    <a href="/Guest/enroll.php" >Đăng ký học</a>

                </li>
                <li class="" id="khoa-hoc">
                    <a href="/Guest/ip_lienhe.php" class="has-submenu">Liên hệ</a>

                </li>

                <li id="hoi-thao-khoa-hoc" class="hidden-sm"><a href="/Guest/ip_cackhoahoc.php"  >Các khóa học</a></li>
                <li id="tap-chi" class="hidden-sm"><a href="">Thông báo tuyển sinh</a></li>
                <li id="hop-tac" class="hidden-sm"><a href="" >Ngân hàng đề tài tốt nghiệp</a></li>
                <li id="cong-tac-sv">
                    <a href="" class="has-submenu">Công tác sinh viên</a>

                </li>
                <li class="hidden-sm"><a href="#"  class="has-submenu">Thư viện</a>

                </li>


            </ul>
        </div>        
    </div>

</div>

<div class="navbar navbar-fixed-top navbar-stn" role="navigation" style="margin-bottom: 0px ! important;">
    <div class="container">
        <div class="navbar-header"> 
            <a href="/Guest/index.php">           
                <img src="/img/logo.jpg" id="logo" class="hidden-sm hidden-md hidden-lg img-circle"  style="width: 50px;float:left" alt="Logo trường Đại học Sư phạm Đà Nẵng">
            </a>

            <!--
          <div class="mobi-caption pull-left hidden-sm hidden-md hidden-lg">    
          <h2><a href="/">Trường Đại học Sư phạm, Đại học Đà Nẵng</a></h2>
          <hr>
          <h4><a href="http://en.ued.vn" target="_blank">The University of Danang, University of Education</a></h4>
          </div>
            -->
            <button type="button" class="navbar-toggle collapsed nav-sm" data-toggle="offcanvas" aria-expanded="false" nav-sm aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>               
        </div>
        <div class="collapse navbar-collapse">
            <a class="navbar-brand hidden-xs" href="/">
                <img src="/img/logo.jpg" id="logo" style="width: 81px;height:81px;" class="img-circle" alt="Logo trường Đại học Sư phạm Đà Nẵng"></a>
            <ul class="nav navbar-nav">            
                <li class="" id="gioi-thieu">
                    <a href="/Guest/index.php" >Trang chủ</a>

                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Chuyên mục
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php
                        $sql = "select * from categories";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <li><a href="list.php?id=<?= $row['Id'] ?>"><?= $row['CateName'] ?></a></li>
                                <?php
                            }
                        }
                        ?>

                    </ul>
                </li>
                <li class="" id="khoa-hoc">
                    <a href="#" class="has-submenu">Khoa học</a>

                </li>
                <li class="" id="dao-tao">
                    <a href="/Guest/enroll.php" >Đăng ký học</a>

                </li>
                <li class="" id="khoa-hoc">
                    <a href="/Guest/ip_lienhe.php" class="has-submenu">Liên hệ</a>

                </li>

                <li id="hoi-thao-khoa-hoc" class="hidden-sm"><a href="/Guest/ip_cackhoahoc.php"  >Các khóa học</a></li>      
                <li id="cong-tac-sv">
                    <a href="" class="has-submenu">Công tác sinh viên</a>

                </li>
                <li class="hidden-sm"><a href="" class="has-submenu">Thư viện</a>

                </li>

            </ul>
        </div>

    </div>
</div>


<a data-toggle="modal" data-target="#modalContact" id="contactme_tab">
    <span id="contactme_tab_inner"><span id="contactme_tab_color"></span>
        <span id="contactme_tab_text">Contact</span></span></a>
<!--<div style="min-height:  10000px;">
        
   
           </div>-->

<div class="modal fade bs-example-modal-sm" id="modalContact" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">

            <div id="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Liên hệ</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Họ và tên</label>
                        <input type="text" id="contactname" class="form-control"  placeholder="Họ và tên">
                    </div><div class="form-group">
                        <label for="exampleInputEmail1">Mã số sinh viên</label>
                        <input type=text" id="contactcode" class="form-control" placeholder="Mã sinh viên">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" id="contactemail" class="form-control"  placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Facebook</label>
                        <input type="text" id="contactfacebook" class="form-control"  placeholder="Facebook">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số điện thoại</label>
                        <input type="tel" id="contactphone" class="form-control"  placeholder="Số điện thoại">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Yêu cầu của bạn</label>
                        <textarea class="form-control" id="contactrequired" rows="3"></textarea>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" id="submitcontact" class="btn btn-primary">Gởi liên hệ</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>  
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-sm" id="contactmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Thông báo</h4>
            </div>
            <div class="modal-body" id="contactResult">

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        //   var id = $("#postid").val();
        //      loadcomment(id);
        $("#submitcontact").click(function () {
            $('#modalContact').modal('hide')
            var code = $("#contactcode").val();
            var name = $("#contactname").val();
            var email = $("#contactemail").val();
            var facebook = $("#contactfacebook").val();
            var phone = $("#contactphone").val();
            var required = $("#contactrequired").val();
//var email = $("#email").val();
//var password = $("#password").val();
            //   var content = $("#comment").val();
// Returns successful data submission message when the entered information is stored in database.
            var dataString = 'name=' + name + '&code=' + code + '&email=' + email + '&facebook=' + facebook + '&phone=' + phone + '&required=' + required;
            if (1 == 2)
            {
                alert("Please Fill All Fields");
            }
            else
            {
// AJAX Code To Submit Form.
                $.ajax({
                    type: "POST",
                    url: "/Guest/send_contact.php",
                    data: dataString,
                    cache: false,
                    success: function (result) {
                        document.getElementById("contactResult").innerHTML = result;
                        $('#contactmodal').modal('show');
                        //   $("#name").val('');
                        //   $("#comment").val('');
                        //      loadcomment(postid)
//alert(result);
                    }
                });
            }
            return false;
        });
    });

</script>