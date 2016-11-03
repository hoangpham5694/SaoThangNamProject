  <?php include("../../Connect/connection.php"); ?> 
<?php
                        $id = $_GET['id'];
                        $sql = "select * from achievement  where Id = " . $id;
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $row1 = mysqli_fetch_assoc($result);
                            ?>
                            <?php //echo $row1['Title']?>
                            <form action="edit_control.php" method="post" class="form-horizontal" >
                                <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sửa thành tích</h4>
      </div>
                                <div class="modal-body">
           <input name="id" hidden="true" value="<?=$row1['Id']?>">
                                <input name="name" placeholder="Tên" maxlength="20" name="description" value="<?= $row1['Name'] ?>" class="form-control" > 
                              


                                <div class="radio">
                                    <label>
                                        <input type="radio" name="allowshow" value="0" <?php if ($row1['AllowShow'] == 0) {
                                    echo "checked='checked'";
                                } ?>  > Không cho hiển thị <br>
                                    </label>
                                </div>

                                <div class="radio">
                                    <label>  <input type="radio" name="allowshow" value="1" <?php if ($row1['AllowShow'] == 1) {
                                    echo "checked='checked'";
                                } ?> > Cho hiển thị <br>
                                    </label>
                                </div>
      </div>
                                 <div class="modal-footer">
        
        <input type="submit" class="btn btn-default" value="Sửa"> 
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
                             


                                

                            </form>
                            <?php
                        } else {
                            echo '<div class="alert alert-warning" role="alert">Thành tích không tồn tại</div>';
                        }
                        ?>
