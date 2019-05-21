<?php
session_start();
error_reporting();
include('../includes/connection.php');
$query = "SELECT users.FullName,brands.BrandName,vehicles.VehicleTitle,booking.FromDate,booking.ToDate,booking.VehicleId as vid,booking.Status,booking.PostingDate,booking.Id  from booking join vehicles on vehicles.Id=booking.VehicleId join users on users.EmailId=booking.userEmail join brands on vehicles.VehicleBrand=brands.Id  ";
$reslut = mysqli_query($conn,$query);
if (isset($_SESSION['User'])) 
{

   if (isset($_REQUEST['cancel'])) 
   {
   	$cancel = $_GET['cancel'];;
   	$status = "2";
   	$query2 = "UPDATE booking SET Status= $status WHERE  id=$cancel";
   if (mysqli_query($conn,$query2)) 
   {
              echo '<script language="javascript">';
              echo 'alert("Booking Cancelled successfully")';
              echo '</script>';
    } 

   }
   if (isset($_REQUEST['confirm']))
    {
   	 $confirm = $_GET['confirm'];
   	 $status = 1;
   	 $query3 = "UPDATE booking SET Status= '$status' WHERE  id='$confirm'";
   	 if (mysqli_query($conn,$query3))
   	  {
   	          echo '<script language="javascript">';
              echo 'alert("Booking Confirmed successfully")';
              echo '</script>';	
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
		 	<h2 class="page-title" style="color: black;">Manage Bookings</h2>
		 
	<table class="table table-bordered table-striped">
		<thead class="thead-dark">
			<tr>

				<th scope="col">#</th>
				<th scope="col">Name</th>
				<th scope="col">Vehicle</th>
				<th scope="col">From Date</th>
				<th scope="col">To Date</th>
				<th scope="col">Status</th>
				<th scope="col" class="col-sm-2">Post Date</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$count=1;
			while ($rows = mysqli_fetch_assoc($reslut)) 
			 {
			 ?>
			  <tr>
                <th><?php echo $count; ?></th>
			  	<th><?php echo $rows['FullName'];?></th>
			  	<th><?php echo $rows['BrandName'].",".$rows['VehicleTitle'];?>
			  	</th>
                <th><?php echo $rows['FromDate']?></th>
                <th><?php echo $rows['ToDate']?></th>
                 <th>
                 	<?php
                     if($rows['Status']==0)
                     {
                     	echo "Not Confirmed yet";
                     }
                     else if ($rows['Status']==1) 
                     {
                     	echo "Confirmed";
                     }
                     else{
                     	echo "Cancelled";
                     }

                 	?>
                 </th>
                 <th><?php echo $rows['PostingDate']; ?></th>
			  	<th><a href="manage_bookings.php?confirm=<?php echo $rows['Id'];?>" onclick="return confirm('Do you really want to confirm this booking')"><i class="fas fa-check"></i>
			  	</a>/
                <a href="manage_bookings.php?cancel=<?php echo $rows['Id'];?>" onclick="return confirm('Do you want to Cancel this Booking');">
                	<i class="fas fa-times"></i>
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
