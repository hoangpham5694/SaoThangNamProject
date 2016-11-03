<?php include("../Connect/connection.php");?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change th8is template file, choose Tools | Templates
 * and open the template in the editor.
 */
$id= $_GET['id'];
//echo $id;
$sql = "select * from comment where PostId= ".$id." order by Id DESC";
 $result = mysqli_query($conn,$sql);
 $num = mysqli_num_rows($result);
 
?>
  <div class="" style="margin-top: -20px;">
                                         
<a role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
   <p style="font: 700 14px arial;color: #05a;">Có <?= $num ?> bình luận</p>
</a>
                                        </div>

<div class="collapse" id="collapseExample" >
    <div>
<?php 
    if($num >0){
        while($row = mysqli_fetch_assoc($result)){
            ?>
<div class="panel panel-default">
    <div class="panel-body" style="background-color: #FFF5F5">
    <p style="font: 700 14px arial;color: #333;">
        <?=$row['Name']?>
    </p>
    <p>
        <?=$row['Content']?>
    </p>
    <a href="comment_delete.php?cmtid=<?=$row['Id']?>" id="linkdelete" data-target="#modal" data-toggle="modal">Xóa</a>
</div>
</div>
 <?php
        }
    }
?>
    </div>
</div>
                       
<div class="modal fade bs-example-modal-sm" tabindex="-1" id="modal" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-content">
 
    </div>
  </div>
</div>