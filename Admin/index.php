<!DOCTYPE HTML>
<html lang="en">
<?php include("../Connect/connection.php");?>
<head>


	<meta name="author" content="GallerySoft.info" />
    <?php include  "Include/import.php";?>
	<title>Admin Panel</title>
</head>

<body>
<?php //echo($_SERVER['DOCUMENT_ROOT'])?>
<?php include  "Include/header.php";?>
<div class="">
	
</div>

<div id="container">
<?php include 'Include/menuleft.php';?>
<div id="conten" class="col-lg-10 col-md-9 col-sm-9 col-xs-12 container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading">Admin Panel</div>
      <div class="panel-body">
          <?php header("location: list.php");?>
      </div>
    </div>
</div >

</div>


</body>
</html>