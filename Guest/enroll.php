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
        <title>Đăng ký học</title>
    </head>
    <body>
        <?php
        include './Include/navbar.php'
        // put your code here
        ?>
        <div class="container main">
            <div class="row row-offcanvas row-offcanvas-right sub-main">
                <div class="col-xs-12 col-sm-7 col-md-9">

                    <div class="row">
                        <ol class="breadcrumb bs-callout bs-callout-info margin-10 padding-10 clearfix title-groups">
                            <li>
                                <a href="/"><i class="glyphicon glyphicon-home"></i>
                                </a>
                            </li>
                            <li class="active">

                                <a href="">Đăng ký học</a></li></ol> 

                        <div class="enroll" id="enroll">
                            <div class="col-md-7">
                                <form id="form"  method="get" action="search.php">


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Họ và tên</label>
                                        <input type="text" required="true" id="enrollname" class="form-control"  placeholder="Họ và tên">
                                    </div><div class="form-group">
                                        <label for="exampleInputEmail1">Ngày sinh</label>
                                        <input type="date" required="required" id="enrolldateofbird" class="form-control" placeholder="Ngày sinh">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Quê quán Xã/Huyện/Tỉnh</label>
                                        <input type="text" required="required" id="enrolladdress" class="form-control"  placeholder="Quê quán">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên chương trình học (Kế toán thuế và báo cáo thuế, ...)</label>
                                        <input type="text" required="required" id="enrollnameprogram" class="form-control"  placeholder="Tên chương trình học">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mong muốn học tại (Quảng Ngãi or Đà Nẵng)</label>
                                        <input type="text" required="required" id="enrollstudyat" class="form-control"  placeholder="Mong muốn học tại">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="text" required="required" id="enrollemail" class="form-control"  placeholder="Email">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số điện thoại</label>
                                        <input type="text" id="enrollphone" required="required" class="form-control"  placeholder="Số điện thoại">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Trường chuyên nghiệp bạn đang or đã học?</label>
                                        <input type="text" id="enrollschool" class="form-control"  placeholder="Trường chuyên nghiệp">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Lớp chuyên nghiệp</label>
                                        <input type="text" id="enrollclasss" class="form-control"  placeholder="Lớp chuyên nghiệp">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Bạn hãy viết những yêu cầu của bạn (giờ học, buổi học, ngày học, ...)</label>
                                        <textarea class="form-control" required="required" id="enrollrequireds" rows="3"></textarea>
                                    </div>




                                    <button type="submit" id="submitenroll" class="btn btn-primary">Đăng ký học</button>

                                </form> 
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-5 col-md-3">
                    <?php
                    include './Include/rightmenu.php'
                    ?>
                </div>
            </div>
        </div>

              <script>
                                        $(document).ready(function () {
                                         //   var id = $("#postid").val();
                                      //      loadcomment(id);
                                            $("#submitenroll").click(function () {
                                             //   $('#modalContact').modal('hide')
                                                var dateofbird = $("#enrolldateofbird").val();
                                                var name = $("#enrollname").val();
                                                var email= $("#enrollemail").val();
                                                 var address= $("#enrolladdress").val();
                                                  var phone= $("#enrollphone").val();
                                                   var nameprogram= $("#enrollnameprogram").val();
                                                    var studyat= $("#enrollstudyat").val();
                                                     var school= $("#enrollschool").val();
                                                     var classs= $("#enrollclasss").val();
                                                 var requireds= $("#enrollrequireds").val();
                                                 console.log("log");
                                                 console.log(name);
                                                 console.log(email);
                                                 console.log(address);
        //var email = $("#email").val();
        //var password = $("#password").val();
                                             //   var content = $("#comment").val();
        // Returns successful data submission message when the entered information is stored in database.
                                              var dataString = 'name=' + name + '&dateofbird=' + dateofbird + '&email=' + email + '&nameprogram=' + nameprogram + '&phone=' + phone + '&required=' + requireds+ '&address=' + address + '&studyat=' + studyat + '&school=' + school + '&class=' + classs;
     //   var dataString = '';                                       
        if (name=='' || email =='' || address=='' || dateofbird=='' || nameprogram=='' || requireds==''  )
                                                {
                                                    alert("Please Fill All Fields");
                                                }
                                                else
                                                {
        // AJAX Code To Submit Form.
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "/Guest/enroll_control.php",
                                                        data: dataString,
                                                        cache: false,
                                                        success: function (result) {
                                                            document.getElementById("enroll").innerHTML = result;
                                                          //  $('#contactmodal').modal('show');
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
        

 <?php include './Include/footer.php'; ?>
    </body>
</html>
