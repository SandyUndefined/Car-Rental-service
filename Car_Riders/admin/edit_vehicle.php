<?php 
session_start();
include('../includes/connection.php');
if (isset($_SESSION['User']))
{  
	if (isset($_POST['submit'])) 
	{
		$vehicletitle = $_POST['vehicletitle'];
		$brand = $_POST['brandname'];
		$vehicleoverview = $_POST['vehicleoverview'];
		$priceperday = $_POST['priceperday'];
		$fueltype = $_POST['fueltype'];
		$modelyear = $_POST['modelyear'];
		$seatingcapacity = $_POST['seatingcapacity'];
		$id = $_GET['id2'];
		$query = "update vehicles set VehicleTitle='$vehicletitle',VehicleBrand='$brand',VehicleOverview='$vehicleoverview',PricePerDay='$priceperday',FuelType='$fueltype',ModelYear='$modelyear',SeatingCapacity='$seatingcapacity' where id='$id'";
		if (mysqli_query($conn,$query)) 
		{
			header('location:edit_vehicle.php?Success=vehicle Updated successfully');
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
		 	<h2 class="page-title" style="color: black;">Edit Vehicles</h2>
      <?php
        if(@$_GET['Success'] == true)
		{
	   ?>
	   <div class="alert alert-success" role="alert">
              <?php echo $_GET['Success'];?> 
          </div>
	   <?php 
	   }
         $id2=$_GET['id2'];
         $query2 = "SELECT vehicles.*,brands.BrandName,brands.Id as bid from vehicles join brands on brands.Id=vehicles.VehicleBrand where vehicles.Id='$id2'";
         $result2 = mysqli_query($conn,$query2);
         $rowCount = mysqli_num_rows($result2);
         if ($rowCount > 0)
         {
                  while ($rows2 = mysqli_fetch_assoc($result2)) 
                 { 
            
	   ?>
	   <form method="post" name="edit_vehicle" class="form-inline pt-5" enctype="multipart/form-data" onSubmit="return valid();">
	   	<div class="form-row">
		<div class="form-group row col-md-6">
          <label class="control-label" style="color: black">Vehicle Name</label>
	      <input type="text" class="form-control ml-5" name="vehicletitle" id="vehicletitle" 
            value="<?php echo $rows2['VehicleTitle'];?>" required>
		 </div>
		<div class="form-group row col-md-6 float-right">
		  <label class="control-label " style="color: black;">Select Brand<span style="color:red">*</span></label>
         	<select class="selectpicker ml-2" name="brandname" required="">
         		<option value="<?php echo $rows2['bid']; ?>"><?php echo $rows2
         		['BrandName'];?></option>
         		<?php 
                 $query3 = "SELECT Id,BrandName FROM brands";
                 $result3 = mysqli_query($conn,$query3);
                 $rowcount3 = mysqli_num_rows($result3);
                 if ($rowcount3 > 0) 
                 {
                 
                                  while ($rows3 = mysqli_fetch_assoc($result)) 
                 	{?>
                 	<option value="<?php echo $rows3['Id'];?>"><?php echo $rows3['BrandName'];?></option>
              <?php   }
                }
         		?>
         	</select>
          </div>
          <div class="form-group pt-5 row col-md-12">
			<label class="control-label" style="color: black;">Vehical Overview<span style="color:red">*</span></label>
			<textarea class="form-control col-md-6 row ml-3" name="vehicleoverview" rows="3" required=""><?php  echo $rows2['VehicleOverview'];?></textarea>
		</div>
		<div class="form-group pt-5 row col-md-6 ">
<label class="control-label" style="color: black;">Price Per Day<span style="color:red">*</span></label>
<input type="text" name="priceperday" class="form-control row ml-5" required value="<?php echo $rows2['PricePerDay']; ?>">
</div>
<div class="form-group row  col-md-6">
<label class="control-label" style="color: black;">Select Fuel Type<span style="color:red">*</span></label>
<select class="selectpicker ml-2" name="fueltype" required>
<option value="<?php echo $rows2['FuelType']; ?>"><?php echo $rows2['FuelType']; ?> </option>
<option value="Petrol">Petrol</option>
<option value="Diesel">Diesel</option>
<option value="CNG">CNG</option>
</select>
</div>
<div class="form-group pt-5 row col-md-6">
<label class="control-label" style="color: black;">Model Year<span style="color:red">*</span></label>
<input type="text" name="modelyear" class="form-control row ml-5" value="<?php echo $rows2['ModelYear']?>" required>
</div>
<div class="form-group row col-md-6">
<label class="control-label" style="color: black;">Seating Capacity<span style="color:red">*</span></label>
<input type="text" name="seatingcapacity" class="form-control row  ml-3" value="<?php echo $rows2['SeatingCapacity'] ?>" required>
</div>
<div class="form-group row pt-5 col-md-6">
  <label class="control-label" style="color: black">Image
    <span style="color: red">*</span>
  </label>
  <img class="ml-5 row" src="img/vehicalimg/<?php echo $rows2['Vehicleimage'];?>" width="400" height="200">
  
</div>
<a class="pt-5 ml-5 row" href="changeimg.php?imgid=<?php echo $rows2['Id']; ?>">Change Image</a>
<div class="form-group pt-3 col-md-2">
  <button  type="submit" class="btn btn-login w-100 mt-4 login" name="submit">Save Changes</button>
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