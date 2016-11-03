<!DOCTYPE HTML>
<html lang="en">
<?php include("../Connect/connection.php");?>
<head>


	<meta name="author" content="GallerySoft.info" />
    <?php include  $_SERVER['DOCUMENT_ROOT']."/Admin/Include/import.php";?>
	<title>Xem bài viết</title>
</head>

<body>
<?php //echo($_SERVER['DOCUMENT_ROOT'])?>
<?php include  $_SERVER['DOCUMENT_ROOT']."/Admin/Include/header.php";?>
<div class="">
	
</div>

<div id="container">
<?php include 'Include/menuleft.php';?>
<div id="conten" class="col-lg-10 col-md-9 col-sm-9 col-xs-12 container-fluid">
    <div class="panel panel-default main">
          <?php $id=$_GET['id'];
      
      ?>
    <?php 
      $sql = "SELECT *FROM post p inner join categories c on p.CategoryId=c.Id inner join users u on p.UserPostId = u.Id WHERE p.Id =".$id;
      $result = mysqli_query($conn,$sql);
      //echo $sql;
      if(mysqli_num_rows($result)==0){
      	echo '<div class="alert alert-warning" role="alert">Bài viết không tồn tại</div>';
      }else{
      	//echo 'co ket qua';
      	$row= mysqli_fetch_assoc($result);
      
      ?>
      <div class="panel-heading">Xem bài viết</div>

      <div class="panel-body">
      
      <div class="row">
      <div class="panel panel-warning">
      
 
  <div class="panel-body">
       <div class="col-xs-6 col-md-4 col-sm-5 col-lg-3 ">
    <a href="#" class="thumbnail">
      <img src="<?php echo $row["ImageUrl"]?>" alt="...">
    </a>
  </div  >
  <div class="col-xs-12 col-md-8 col-sm-7 col-lg-9">
  <h4><strong><?php echo $row["Title"];?></strong></h4>
  <p><a href="edit.php?id=<?php echo $id;?>" >Sửa bài viết</a></p>
  <p>Thể loại: <?php echo $row['CateName']?></p>
  <p>Ngày đăng: <?php echo $row["DatePost"] ;?></p>
  <p>Người đăng: <?php echo $row["FullName"];?></p>
  <p><?php if($row["IsHightLight"]==1){echo "Bài đăng nỗi bật";} else echo "Bài đăng bình thường";?></p>
  
  </div>
  
  </div>
      </div>
      
      	  
      </div>

      <?php echo $row["Content"];
      }?>
          <hr>
                                    
            <div id="divcomment" class="col-lg-7 ">
                                            
           </div>

      </div>
    </div>
</div >

</div>

            <script>
                                        $(document).ready(function () {
                                           
                                            var id = "<?=$id?>";
                                             $("#linkdelete").click(function (){
                                                alert("reload");
                                                loadcomment(id);
                                            });
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
                                                         //   document.getElementById("result").innerHTML = result;
                                                          //  $('#mymodal').modal('show');
                                                         //   $("#name").val('');
                                                         //   $("#comment").val('');
                                                        //    loadcomment(postid)
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
</body>
</html>