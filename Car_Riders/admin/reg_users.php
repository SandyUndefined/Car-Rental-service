<?php
session_start();
include('../includes/connection.php');

$query = "SELECT * FROM `users`";
$result = mysqli_query($conn,$query);
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
		 	<h2 class="page-title" style="color: black;">Registered Users</h2>
		 
	<table class="table table-bordered table-striped">
		<thead class="thead-dark">
			<tr>

				<th scope="col">#</th>
				<th scope="col">Name</th>
				<th scope="col">EmailId</th>
				<th scope="col">Phone Number</th>
				<th scope="col">Date of Birth</th>
				<th scope="col">Address</th>
				<th scope="col">City</th>
				<th scope="col">Registration Date</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$count=1;
			while ($rows = mysqli_fetch_assoc($result)) 
			 {
			 ?>
			  <tr>
                <th><?php echo $count; ?></th>
			  	<th><?php echo $rows['FullName'];?></th>
			  	<th><?php echo $rows['EmailId'];?></th>
			  	<th><?php echo $rows['ContactNo'];?></th>
			  	<th><?php echo $rows['Dob'];?></th>	
			  	<th><?php echo $rows['Address'];?></th>
			  	<th><?php echo $rows['City'];?></th>
			  	<th><?php echo $rows['RegDate'];?></th>
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
