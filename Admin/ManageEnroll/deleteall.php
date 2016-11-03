<!DOCTYPE HTML>

<?php include("../../Connect/connection.php"); ?>

<?php
$sqlDelete = "DELETE FROM enroll ";
if (mysqli_query($conn, $sqlDelete)) {
    echo "Xóa thành công";
    header('Location: index.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>
