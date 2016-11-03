
<script>
    $(document).ready(function () {
        // var id = $("#postid").val();
        loadmessage();
        $("#submit1").click(function () {
            //    var postid = $("#postid").val();
            var name1 = $("#name1").val();
            //var email = $("#email").val();
            //var password = $("#password").val();
            var content1 = $("#comment1").val();
            // Returns successful data submission message when the entered information is stored in database.
            var dataString = 'name=' + name1 + '&content=' + content1;
            if (name1 =='' || content1=='' )
            {
                alert("Please Fill All Fields");
            }
            else
            {
                // AJAX Code To Submit Form.
                $.ajax({
                    type: "POST",
                    url: "send_mess.php",
                    data: dataString,
                    cache: false,
                    success: function (result) {
                        //   document.getElementById("result").innerHTML = result;
                        //     $('#mymodal').modal('show');
                        //   $("#name1").val('');
                        $("#comment1").val('');
                        loadmessage();
                        //alert(result);
                    }
                });
            }
            return false;
        });
    });

    function loadmessage() {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("divmessage").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "load_mess.php", true);
        xmlhttp.send();

    }
</script>
<div class="row row-left">

    <form  method="get" action="search.php">

        <div class="input-group">

            <input type="text" required="true" name="key" class="form-control" id="exampleInputEmail2" placeholder="Tìm kiếm">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
            </span>

        </div>

    </form>




</div>

<div class="row row-left">
    <div class="panel panel-default">
        <div class="panel-heading">
            Cảm nhận của học viên
        </div>
        <div class="panel-body">
            <div id="divmessage" >

            </div>      
            <hr>
            <div id="result">

            </div>
            <strong>Để lại cảm nhận</strong>
            <div id="form" >
                <!--     <form  method="post" onsubmit="loadDoc()"  class="form-horizontal">  -->
                <div class="form-group">

                    <input type="text"   required="true"class="form-control" id="name1" name="name" placeholder="Tên">

                </div>
                <div class="form-group">
                    <textarea  id="comment1" required="true" placeholder="Ý kiến cảm nhận của bạn" name="content" class="form-control" rows="3"></textarea>

                </div>

                <div class="form-group">
                    <div class="">
                        <button type="submit" id="submit1" class="btn btn-default">Đăng cảm nhận</button>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>
<div class="row row-left" style="margin-bottom: 10px;">
    <img alt=".." src="/img/111.jpg"  style="width: 100%;">
    
</div>

<div class="row row-left">
<div class="panel panel-default">
    <div class="panel-heading">
        Thành tích và hoạt động
    </div>
    <div class="panel-body">
        <?php
        $sqlAchi = "select * from achievement order by Id DESC limit 200";
                        //echo $sql;
                        $resultAchi = mysqli_query($conn, $sqlAchi);
                         if (mysqli_num_rows($resultAchi) > 0){
                             while($rowAchi = mysqli_fetch_assoc($resultAchi)){
                                 ?> 
                                         <div>
                                             <h4><?= $rowAchi['Name']?></h4>
                                             <img src="<?= $rowAchi['ImageUrl']?>" style="width: 100%" alt="..." class="img-rounded">
                                        </div>
                                     <?php
                             }
                         }
        ?>
    
    </div>

</div>
</div>

