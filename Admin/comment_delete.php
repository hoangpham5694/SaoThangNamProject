<?php include("../Connect/connection.php");?>
<?php 
//echo 'hello';
if(isset($_GET['cmtid'])){
    $cmtid= $_GET['cmtid'];
    $sql= "DELETE from comment  WHERE Id = ".$cmtid;
 //   echo $sql;
    if (mysqli_query($conn, $sql)) {
        ?> 
                 <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Thông báo</h4>
      </div>
          <div class="modal-body">
              Xóa thành công
          </div>
<div class="modal-footer">
    
</div>
            <?php
      				
      			} else {
      				echo "Error deleting record: " . mysqli_error($conn);
      			}
}

?>