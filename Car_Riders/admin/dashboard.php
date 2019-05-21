<?php
session_start();
include('../includes/connection.php');
if(strlen($_SESSION['User'])==0)
{
	header('location:admin_login.php');
}
else{


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
include('sidebar.php');
?>		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title" style="color: black">Dashboard</h2>
						
						<div class="row mt-5">
							<div class="col-md-12" >
								<div class="row">
									<div class="col-md-3" style="background: #ff6c00;">
										<div class="panel panel-default" >
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
<?php 
$query ="SELECT Id from users";
if ($result = mysqli_query($conn,$query)) {
	$rowCount = mysqli_num_rows($result)
?>
													<div class="stat-panel-number h1" style="color: black;">
													<?php echo htmlentities($rowCount);
													mysqli_free_result($result);
												     }?>
												    </div>
													<div cl
													ass="stat-panel-title text-uppercase" style="color: black;">Registered  Users</div>
												</div>
											</div>
											<a href="reg_users.php" class="block-anchor panel-footer" style="color: black;">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3" style="background: #9e6648;">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
												<?php 
$query1 ="SELECT Id from vehicles ";
if ($result = mysqli_query($conn,$query1)) {
	$rowCount = mysqli_num_rows($result)
?>
													<div class="stat-panel-number h1 "style="color: black;"><?php echo htmlentities($rowCount);
													mysqli_free_result($result);
												     }?>
													
												</div>
													<div class="stat-panel-title text-uppercase"style="color: black;">Listed Vehicles</div>
												</div>
											</div>
											<a href="manage_vehicle.php" class="block-anchor panel-footer text-center"style="color: black;">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3" style="background: #175d82">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
<?php 
$query2 ="SELECT Id from booking ";
if ($result = mysqli_query($conn,$query2)) {
	$rowCount = mysqli_num_rows($result)
?>

													<div class="stat-panel-number h1 "style="color: black;"><?php echo htmlentities($rowCount);
                                                      mysqli_free_result($result);
                                                  }
													?></div>
													<div class="stat-panel-title text-uppercase"style="color: black;">Total Bookings</div>
												</div>
											</div>
											<a href="manage_bookings.php" class="block-anchor panel-footer text-center"style="color: black;">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3" style="background: #fa2837;">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
<?php 
$query3 ="SELECT id from brands ";
if ($result = mysqli_query($conn,$query3)) {
	$rowCount = mysqli_num_rows($result)
?>												
													<div class="stat-panel-number h1 "style="color: black;"><?php echo htmlentities($rowCount);
                                                      mysqli_free_result($result);
                                                  }
													?></div>
													<div class="stat-panel-title text-uppercase"style="color: black;">Listed Brands</div>
												</div>
											</div>
											<a href="manage_brands.php" class="block-anchor panel-footer text-center"style="color: black;">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>


</body>
</html>
<?php } ?>