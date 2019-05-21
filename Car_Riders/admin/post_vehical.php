<?php
session_start();
include('../includes/connection.php');
if(isset($_SESSION['User']))
{ 
  if (isset($_POST['submit'])) 
  {
   $vehicletitle = $_POST['vehicletitle'];
   $brandname = $_POST['brandname'];
   $vehicaloverview = $_POST['vehicaloverview'];
   $priceperday = $_POST['priceperday'];
   $fueltype = $_POST['fueltype'];
   $modelyear = $_POST['modelyear'];
   $seatingcapacity = $_POST['seatingcapacity'];
   $img = $_FILES["img"]["name"];
   $dir = "../img/vehicalimg/";
   $FilePath = $dir.$img;
        move_uploaded_file($_FILES["img"]["name"], $FilePath);
          $query = "INSERT INTO vehicles(VehicleTitle,VehicleBrand,VehicleOverview,PricePerDay,FuelType,ModelYear,SeatingCapacity,Vehicleimage) VALUES('$vehicletitle','$brandname','$vehicaloverview','$priceperday','$fueltype','$modelyear','$seatingcapacity','$img')";
          $result = mysqli_query($conn,$query);
   if ($result) 
   {
    header('location:post_vehical.php?Success=Vehicle posted successfully');
    
   }
   else
   {
     header('location:post_vehical.php?Error=Something went wrong. Please try again');
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
		 	<h2 class="page-title" style="color: black;">Post Vehical</h2>
	<form method="post" name="post_vehical" class="form-inline pt-5" enctype="multipart/form-data">

      <?php
       if(@$_GET['Error'] == true)
       	{
       		?>
       	<div class="alert alert-danger" role="alert">
              <?php echo $_GET['Error'];?> 
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
     <div class="form-row">
		<div class="form-group row col-md-6">
      <label class="control-label" style="color: black;">Vehical Title<span style="color:red">*</span></label>
	      <input type="text" class="form-control row ml-5" name="vehicletitle" required>
        </div>
        <div class="form-group row col-md-6 float-right">
		  <label class="control-label " style="color: black;">Select Brand<span style="color:red">*</span></label>
         	<select class="selectpicker ml-2" name="brandname" required="">
         		<option value="">Select</option>
         		<?php 
                 $query = "SELECT Id,BrandName FROM brands";
                 $result = mysqli_query($conn,$query);
                 $rowcount = mysqli_num_rows($result);
                 if ($rowcount > 0) 
                 {
                 
                                  while ($rows = mysqli_fetch_assoc($result)) 
                 	{?>
                 	<option value="<?php echo $rows['Id'];?>"><?php echo $rows['BrandName'];?></option>
              <?php   }
}
         		?>
         	</select>
          </div>
		<div class="form-group pt-5 row col-md-12">
			<label class="control-label" style="color: black;">Vehical Overview<span style="color:red">*</span></label>
			<textarea class="form-control col-md-6 row ml-3" name="vehicaloverview" rows="3" required=""></textarea>
		</div>
			<div class="form-group pt-5 row col-md-6 ">
<label class="control-label" style="color: black;">Price Per Day<span style="color:red">*</span></label>
<input type="text" name="priceperday" class="form-control row ml-5" required>
</div>
<div class="form-group row  col-md-6">
<label class="control-label" style="color: black;">Select Fuel Type<span style="color:red">*</span></label>
<select class="selectpicker ml-2" name="fueltype" required>
<option value=""> Select </option>
<option value="Petrol">Petrol</option>
<option value="Diesel">Diesel</option>
<option value="CNG">CNG</option>
</select>
</div>
<div class="form-group pt-5 row col-md-6">
<label class="control-label" style="color: black;">Model Year<span style="color:red">*</span></label>
<input type="text" name="modelyear" class="form-control row ml-5" required>
</div>
<div class="form-group row col-md-6">
<label class="control-label" style="color: black;">Seating Capacity<span style="color:red">*</span></label>
<input type="text" name="seatingcapacity" class="form-control row  ml-3" required>
</div>
<div class="form-group row pt-5 col-md-6">
  <label class="control-label" style="color: black">Upload Image
    <span style="color: red">*</span>
    <input type="file" name="img" class="row ml-3" required>
  </label>
</div>
<div class="form-group pt-3 col-md-2">
  <button  type="submit" class="btn btn-login w-100 mt-4 login" name="submit">Submit</button>
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
else{
	header('location:admin_login.php');
}
?>