<?php 
session_start();
include('../includes/connection.php');
if (isset($_SESSION['User']))
{  
	if (isset($_POST['update'])) 
	{
		$img = $_FILES["img"]["name"];
		$id = $_GET['imgid'];
		move_uploaded_file($_FILES["img"]["temp_name"],"img/vehicalimg/".$_FILES["img"]["name"]);
		$query = "UPDATE vehicles SET Vehicleimage='$img' where Id='$id'";
		$result= mysqli_query($conn,$query);
		if ($result) 
		{
			header('location:changeimg.php?Success=Image changed successfully');
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

		 <div class="col-md-12">
		 	<h2 class="page-title" style="color: black;">Change Image</h2>
      <?php
        if(@$_GET['Success'] == true)
		{
	   ?>
	   <div class="alert alert-success" role="alert">
              <?php echo $_GET['Success'];?> 
          </div>
	   <?php 
	   }
         $id2=$_GET['imgid'];
         $query2 = "SELECT Vehicleimage FROM vehicles WHERE Id='$id2'";
         $result2 = mysqli_query($conn,$query2);
         $rowCount = mysqli_num_rows($result2);
         if ($rowCount > 0)
         {
                  while ($rows2 = mysqli_fetch_assoc($result2)) 
                 { 
            
	   ?>
	   <form method="post" name="edit_vehicle" class="form-inline pt-5" enctype="multipart/form-data" onSubmit="return valid();">
	   	<div class="form-row">
		<div class="form-group row pt-5 col-md-6">
           <label class="control-label" style="color: black">Image
            <span style="color: red">*</span>
           </label>
         <img class="ml-5 row" src="img/vehicalimg/<?php echo $rows2['Vehicleimage'];?>" width="400" height="200">
         </div>
		<div class="form-group row pt-5 col-md-8">
          <label class="control-label" style="color: black">Change Image
           <span style="color: red">*</span>
          <input type="file" name="img" class="row ml-3" required>
          </label>
       </div>
<div class="form-group pt-3 col-md-2">
  <button  type="submit" class="btn btn-login w-100 mt-4 login" name="update">Update</button>
</div>
	   </div>
	   <?php } }?>																	
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