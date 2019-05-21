<?php 
session_start();
include('../includes/connection.php');
if (isset($_SESSION['User']))
{
	if (isset($_POST['submit'])) 
	{
		$brand = $_POST['brand'];
		$query = "INSERT INTO  brands(BrandName) VALUES('$brand')";
		$result = mysqli_query($conn,$query);
		if (empty($_POST['brand'])) 
		{
			header('location:create_brands.php?Empty=Please Enter Brand Name');
		}
		else 
           {
              header('location:create_brands.php?Success=Brand Created successfully');
           }
	} 
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
		 	<h2 class="page-title" style="color: black;">Create Brands</h2>
		 
	<form method="post" name="create_brands" onSubmit="return valid();">
      <?php
       if(@$_GET['Empty'] == true)
       	{
       		?>
       	<div class="alert alert-danger" role="alert">
              <?php echo $_GET['Empty'];?> 
          </div>
       <?php
        } 
		else if(@$_GET['Success'] == true)
		{
	   ?>
	   <div class="alert alert-success" role="alert">
              <?php echo $_GET['Success'];?> 
          </div>
	   <?php 
	   }
	   ?>
		<div class="form-group">
          <label class="col-sm-4 control-label" style="color: black;">Brand Name</label>
           <div class="col-sm-8">
	      <input type="text" class="form-control" name="brand" id="brand" required>
			</div>
		</div><br>
		<div class="form-group">
			<div class="col-sm-8 col-sm-offset-4">									
			<button class="btn btn-primary" name="submit" type="submit">Submit</button>
		    </div>
	   </div>																		
	</form>
</div>
</div>
</div>
</div>
</body>
</html>
<?php
}
else {
	header('location:admin_login.php');
}
?>