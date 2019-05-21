<?php
session_start();
include('../includes/connection.php');
if (isset($_SESSION['User'])) 
{
	if (isset($_GET['del'])) 
	{
	   $id = $_GET['del'];
       $query2 = "delete from vehicles  WHERE Id='$id'";
       if (mysqli_query($conn,$query2))
        {
        header('location:manage_vehicle.php?Success=Data Deleted Successfully');
       }
       else
       {
       	header('location:manage_vehicle.php?Error=Data Updatation Failed');
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
		 	<h2 class="page-title" style="color: black;">Manage Vehicle</h2>
		  
      <?php
       if(@$_GET['Success'] == true)
       	{
       		?>
       	<div class="alert alert-success" role="alert">
              <?php echo $_GET['Success'];?> 
          </div>
       <?php
        } ?>

	<table class="table table-bordered table-striped">
		<thead class="thead-dark">
			<tr>

				<th scope="col">#</th>
				<th scope="col">Vehicle Name</th>
				<th scope="col">Brand Name</th>
				<th scope="col">Price Per Day</th>
				<th scope="col">Fuel Type</th>
				<th scope="col">Model Year</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$query = "SELECT vehicles.VehicleTitle,brands.BrandName,vehicles.PricePerDay,vehicles.FuelType,vehicles.ModelYear,vehicles.Id from vehicles join brands on brands.Id=vehicles.VehicleBrand";
               $result = mysqli_query($conn,$query);
			$count=1;
			while ($rows = mysqli_fetch_assoc($result)) 
			 {
			 ?>
			  <tr>
                <th><?php echo $count; ?></th>
			  	<th><?php echo $rows['VehicleTitle'];?></th>
			  	<th><?php echo $rows['BrandName'];?></th>
			  	<th><?php echo $rows['PricePerDay'];?></th>
			  	<th><?php echo $rows['FuelType'];?></th>
			  	<th><?php echo $rows['ModelYear'];?></th>
			  	<th><a href="edit_vehicle.php?id2=<?php echo $rows['Id'];?>">
			  		<i class="fas fa-user-edit"></i>
			  	</a>&nbsp;&nbsp;
                <a href="manage_vehicle.php?del=<?php echo $rows['Id'];?>" onclick="return confirm('Do you want to delete');">
                	<i class="fas fa-trash"></i>
                </a>
              </th>
			  </tr>
			 <?php
			 $count +=1;	
			 } 
			?>
		</tbody>
	</table>
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