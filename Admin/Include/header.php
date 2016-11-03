<div class="navbar   navbar-inverse"  >

</div>

<div class="navbar  navbar-fixed-top navbar-inverse"  >
  <div class="container-fluid" >
    <div class="navbar-header">
        <a class="navbar-brand" href="/Admin/index.php"><span class="glyphicon glyphicon-book"></span> Admin Panel</a>
    </div>
    <div >
			
		
      <ul class="nav navbar-nav navbar-right">
      <?php 
      session_start();
      if(isset($_SESSION['user'])){
      	$user= $_SESSION['user'];
      	//echo $user['username'];
      	?>
          <li><a href="/Admin/ManageAccount/info.php"><span class="glyphicon glyphicon-user"></span><?php echo $user['FullName']?></a></li>
      	<li><a href="/logout.php"><span class="glyphicon glyphicon-log-in"></span>Đăng xuất</a></li>
		
      	<?php 
	   }else{
	   	header('Location: /login.php');
			?>
	<!-- 	 <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>   -->	
        	<li><a href="/login.php"><span class="glyphicon glyphicon-log-in"></span>Đăng nhập</a></li>
				
			<?php 
			}		
		?>
      
           </ul>
    </div>
  </div>
</div>