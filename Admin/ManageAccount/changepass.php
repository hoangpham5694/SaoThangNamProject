<!DOCTYPE HTML>
<html lang="en">
<?php include("../../Connect/connection.php");?>
<head>


	<meta name="author" content="GallerySoft.info" />
    <?php include  $_SERVER['DOCUMENT_ROOT']."/Admin/Include/import.php";?>
	<title>Đổi mật khẩu</title>
</head>

<body>


<?php //echo($_SERVER['DOCUMENT_ROOT'])?>
<?php include  $_SERVER['DOCUMENT_ROOT']."/Admin/Include/header.php";?>
<div class="">
	
</div>

<div id="container">
<?php include '../Include/menuleft.php';?>
<div id="conten" class="col-lg-10 col-md-9 col-sm-9 col-xs-12 container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading">Đổi mật khẩu</div>
      <div class="panel-body">
      <div class="col-lg-5 col-md-6 col-sm-7 col-xs-12">
      <?php 
    if(isset($_POST['btnSubmit'])){
        //echo "dang thwuc hien";
        if($_POST['newpass1'] == $_POST['newpass2']){
            $oldpass= $_POST['oldpass'];
            $newpass=$_POST['newpass1'];
            $user = $_SESSION['user'];
            $id= $user['Id'];
           // echo $id;
           $sql= "select * from users where Id=".$id;
           $result = mysqli_query($conn,$sql);
           if(mysqli_num_rows($result)==0){
	           echo '<div class="alert alert-warning" role="alert">Lỗi không xác định</div>';
            }else{
                $row= mysqli_fetch_assoc($result);
                if($oldpass == $row['Password']){
                    $sql = "update users set Password='".$newpass."' where Id=".$id;
                    if (mysqli_query($conn, $sql)) {
	                   echo '<div class="alert alert-success" role="alert">Đổi mật khẩu thành công</div>';
                      
	                   //header('Location: index.php');
                       $_SESSION['user']['Password']= $newpass;
                    }                      
                }else{
                    echo '<div class="alert alert-danger" role="alert">Mật khẩu cũ không đúng</div>';
                }
            }
        }       
    }
?>
      	<form id="form" action="changepass.php" method="post" role="form" >
  <div class="form-group">
    <label for="exampleInputEmail1">Mật khẩu cũ</label>
    <input type="password" name="oldpass" required="required" class="form-control" id="oldpass" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mật khẩu mới:</label>
    <input type="password" name="newpass1" required="required" class="form-control" id="newpass1" placeholder="Password">
  	
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Nhập lại mật khẩu mới:</label>
    <input type="password" name="newpass2" required="required" onchange="check()"  class="form-control" id="newpass2" placeholder="Password">
  <p id="p" style="color: red;"></p>
  </div>
 
  <button type="submit" name="btnSubmit" class="btn btn-default">Xác nhận</button>
</form>


      </div>
      </div>
    </div>
</div >

</div>
<script >
function check() {
    //alert("Create");
    if ($("#newpass1").val() != $("#newpass2").val()) {
        $("#p").text("Mật khẩu phải trùng nhau ");
       // $("#btn").hide();
       $("#newpass1").css("background-color","#FF4747");
       $("#newpass2").css("background-color","#FF4747");
       console.log("pass k trung nhau");
        return false;
        
    } else {
        console.log("Pass da trung");
        if ($("#newpass1").val().length < 6) {
            
            console.log("Pass qua nho");
              $("#newpass1").css("background-color","#FF4747");
       $("#newpass2").css("background-color","#FF4747");
            $("#p").text("Mật khẩu không được nhỏ hơn 6 kí tự");
            //       $("#btn").hide();
            return false;
        }else{
             $("#newpass1").css("background-color","#66FF33");
       $("#newpass2").css("background-color","#66FF33");
        	   $("#p").text("");
               //     $("#btn").show();
                   return true;   
            }
      
    }

}

$(document).ready(function () {
    $("#form").on('submit', function (e) {
        console.log("submit");
        if (check() ==false) {
            
            console.log("Check success");
            e.preventDefault();
        }
    });
  /*  $("#form").submit(function(e){
                if (check() ==false) {
            console.log("Check success")
            e.preventDefault();
        }
    });*/
});
</script>

</body>
</html>