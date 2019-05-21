<?php
session_start();
include('../includes/connection.php');
if (isset($_SESSION['User'])) 
{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Car Riders Rental </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link rel="stylesheet" type="text/css" href="admin_style.css">
<script type="text/javascript" src="main.js"></script>
<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg">
  <span class="navbar-text ml-5">
  <h3>Car Rental Portal | Admin Panel</h3>
  </span>
  <h4 class="float-left" style="color: #fff">Welcome  <?php echo $_SESSION['User']?></h4>
</nav>
<div class="ts-main-content">
	<?php 
	include('sidebar.php');?>

<div class="container text-white">
	<div class="row">

		 <div class="col-md-10">
		 	<h2 class="page-title" style="color: black;">Update Password</h2>
	<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
											<div class="form-group">
												<label class="col-sm-4 control-label">Current Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="password" id="password" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											
											<div class="form-group">
												<label class="col-sm-4 control-label">New Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="newpassword" id="newpassword" required>
												</div>
											</div>
											<div class="hr-dashed"></div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Confirm Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
												</div>
											</div>

										</form>
</div>
</div>
</div>
</div>
<?php
}else {
	header('location:admin_login.php');
}
?>

</body>
</html>