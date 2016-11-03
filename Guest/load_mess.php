<?php include("../Connect/connection.php");?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change th8is template file, choose Tools | Templates
 * and open the template in the editor.
 */

//echo $id;
$sql = "select * from message  order by Id DESC limit 5";
 $result = mysqli_query($conn,$sql);
 $num = mysqli_num_rows($result);
 
?>
<!--  <div class="panel panel-success" style="margin-bottom: 5px;">
                <div class="panel-heading" >
                    <strong>Hoàng</strong>
                    <p>tôi thấy rất thú vị</p>
                </div>

            </div>    -->


<?php 
    if($num >0){
        while($row = mysqli_fetch_assoc($result)){
            ?>
<div class="panel panel-default" style="margin-bottom: 5px;">
    <div class="panel-body" style="background-color: #FBFAFB; padding-bottom: 0; padding-top: 5px;">
    <p style="font: 700 14px arial;color: #333; margin: 0;">
        <?=$row['Name']?>
    </p>
    <p>
        <?=$row['Content']?>
    </p>
</div>
</div>
 <?php
        }
    }
?>

