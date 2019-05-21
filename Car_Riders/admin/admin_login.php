<!DOCTYPE html>
<html>
<head>
	<title>Car Riders Rental</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link rel="stylesheet" type="text/css" href="admin_style.css">
</head>
<nav class="navbar sticky-top navbar-expand-lg">
  <span class="navbar-text ml-5">
  <h2>Car Rental Portal</h2>
  </span>
  <div class="buttons">
  	<button type="button" style="border-radius: 100px;" onclick="location.href='../index.php'" class="btn btn-success"><i class="fas fa-home mr-2"></i>Home</button>
  	<button type="button" style="border-radius: 100px;" onclick="history.go(-1);" class="btn btn-success ml-4"><i class="fas fa-arrow-left mr-2"></i>Back</button>
  	
  	</div>
</nav>
<body style="overflow: hidden;">

<div class="login-page" style="background-image: url(../assets/img/hero.jpg);">
          <div class="form-content">
            <div class="container">
<div class="row">
	<div class="col-sm-6"></div>
	<div class="col-sm-4">
		<center><h1 class="text-white mt-5">Admin Login</h1></center>
		<br><br>
		<?php
            if(@$_GET['Empty'] == true)
             {
         ?>
          <div class="alert alert-danger" role="alert">
              <?php echo $_GET['Empty'];?>
          </div>
          <?php 
            }
		  ?>
		  <?php
            if(@$_GET['Invalid'] == true)
             {
         ?>
          <div class="alert alert-danger" role="alert">
              <?php echo $_GET['Invalid'];?>
          </div>
          <?php 
            }
		  ?>
		<form method="post" action="admin_process.php" name="login_form" >
			<div class="form-group input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-user"></i></span>
				</div>
				<input type="text" class="form-control" placeholder="username" name="username"> 
			</div>
			<div class="form-group input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-key"></i></span>
				</div>
				<input type="password" class="form-control" placeholder="password" name="password">
			</div>
			<button  type="submit" class="btn btn-login w-50 mt-4 login" name="login">Log In</button>
		</form>
	</div>
	<div class="col-sm-4"></div>
</div>
</div>
                 
            </div>
</div>
