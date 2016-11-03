<!DOCTYPE HTML>
<html lang="en">
<?php include("Connect/connection.php");?>
<head>


	<meta name="author" content="GallerySoft.info" />
    <?php include "Admin/Include/import.php";?>
	<title>Untitled 3</title>
</head>

<body>
<?php 
	if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
		$username1=$_COOKIE['username'];
		$pass1= $_COOKIE['password'];
		$sql2 = "SELECT * from users WHERE Username='".$username1."' AND Password='".$pass1."'";
		$result= mysqli_query($conn,$sql2);
		if(mysqli_num_rows($result) >0 ){
			$row= mysqli_fetch_assoc($result);
			echo 'dang nhap thanh cong';
		
			session_start();
			$_SESSION['user']= $row;
			header('Location: /Admin/index.php');
		}
	}

?>

<div  >
<div class="col-lg-4 col-md-4 col-sm-3"></div>

<div class="jumbotron col-lg-4 col-md-4 col-sm-6" style="margin-top: 50px;">
<div class="container">
<form method="post" action="login.php">
  <div class="form-group">
  <div  style="text-align: center; margin-top: -30px">
  <h3>Login</h3>
  </div>
  	
    <label for="exampleInputEmail1">Tên đăng nhập</label>
    <input name="username" type="text" required="required" class="form-control" id="exampleInputEmail1" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mật khẩu</label>
    <input name="password" type="password" required="required" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div class="checkbox">
    <label>
      <input type="checkbox" name="savepass" value="yes"> Duy trì đăng nhập
    </label>
  </div>
  <button type="submit" name="submit" class="btn btn-default btn-lg btn-block">Đăng nhập</button>
</form>
	<?php 
if (isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password']))
{
$username= $_POST['username'];
$pass= $_POST['password'];
//echo $username."  ".$pass;
$sql = "SELECT * FROM users where Username='".$username."'";
//echo $sql;
$result= mysqli_query($conn,$sql);
if(mysqli_num_rows($result) >0 ){
	//echo 'username right';
	$row= mysqli_fetch_assoc($result);
	if($row['Password'] == $pass){
		if(isset($_POST['savepass'])){
			setcookie('username', $username, time() + (86400 * 30), "/");
			setcookie('password', $pass, time() + (86400 * 30), "/");
		}
		
		echo 'dang nhap thanh cong';
		
		session_start();
		$_SESSION['user']= $row;
		header('Location: /Admin/index.php');
	}else{
		echo '<div class="alert alert-danger">
 			 Sai mật khẩu
		</div>';
	}
}else{
			echo '<div class="alert alert-danger">
 			 Sai tên đăng nhập
		</div>';
}

}
mysqli_close($conn);
?>
</div>

</div>
<div class="col-lg-4 col-md-4 col-sm-3"></div>

</div>


</body>
</html>