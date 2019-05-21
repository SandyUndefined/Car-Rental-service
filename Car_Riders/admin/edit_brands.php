<?php 
session_start();
include('../includes/connection.php');
if (isset($_SESSION['User']))
{
	if (isset($_POST['submit'])) 
	{
		$brand = $_POST['brand'];
		$id = $_GET['id'];
		$query = "update brands set BrandName='$brand' where id='$id'";
		if (mysqli_query($conn,$query)) 
		{
			header('location:edit_brands.php?Success=Brand Updated successfully');
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
<body style="overflow-x: hidden;">
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
		 	<h2 class="page-title" style="color: black;">Edit Brands</h2>
      <?php
        if(@$_GET['Success'] == true)
		{
	   ?>
	   <div class="alert alert-success" role="alert">
              <?php echo $_GET['Success'];?> 
          </div>
	   <?php 
	   }
         $id=$_GET['id'];
         $query2 = "SELECT * FROM `brands` WHERE Id ='$id'";
         $result2 = mysqli_query($conn,$query2);
	   ?>
	   <form method="post" name="create_brands" onSubmit="return valid();">
		<div class="form-group">
          <label class="col-sm-4 control-label">Brand Name</label>
           <div class="col-sm-8">
           	<?php 
                 while ($rows2 = mysqli_fetch_assoc($result2)) 
                 { ?>
	      <input type="text" class="form-control" name="brand" id="brand" 
            value="<?php echo $rows2['BrandName'];?>" 
	      required>
	          <?php }?>
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