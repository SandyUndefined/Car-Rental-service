<?php 
session_start();
include("includes/connection.php");
include ("includes/header.php");
if(isset($_POST['submit']))
{
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate']; 
$useremail=$_SESSION['login'];
$status=0;
$vhid=$_GET['vhid'];
$query="INSERT INTO  booking(UserEmail,VehicleId,FromDate,ToDate,Status) VALUES('$useremail','$vhid','$fromdate','$todate','$status')";
$result = mysqli_query($conn,$query);
if($result)
{
echo "<script>alert('Booking successfull.');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Car Rental Port | Vehicle Details</title>
</head>
<body>
<?php 
$vhid=intval($_GET['vhid']);
$query = "SELECT vehicles.*,brands.BrandName,brands.Id as bid  from vehicles join brands on brands.Id=vehicles.VehicleBrand where vehicles.Id='$vhid'";
 $result = mysqli_query($conn,$query);
 $rowCount = mysqli_num_rows($result);
if($rowCount > 0)
{
while ($rows = mysqli_fetch_assoc($result)) 
 {
  
$_SESSION['brndid']=$rows['bid'];  
?>  
	<section>
		<img src="admin/img/vehicalimg/<?php echo $rows['Vehicleimage'];?>" class="img-responsive" alt="image" width="100%" height="700">
 	</section>
 	<section class="mt-5 ml-5">	
 		<h2><?php echo $rows['BrandName'];?> , <?php echo $rows['VehicleTitle'];?></h2>
 		<p class="ml-5"><?php echo $rows['VehicleOverview']; ?></p>
 		 <div class="row">
      <div class="col-sm-8 mt-4">
        <div class="main_features">
          <ul>
            <li> <i class="fa fa-calendar" aria-hidden="true"></i>
              <h4><?php echo $rows['ModelYear'];?></h4>
              <p>Reg.Year</p>
            </li>
            <li> <i class="fa fa-cogs" aria-hidden="true"></i>
              <h4><?php echo $rows['FuelType'];?></h4>
              <p>Fuel Type</p>
            </li>
            <li> <i class="fas fa-taxi" aria-hidden="true"></i>
              <h4><?php echo $rows['SeatingCapacity'];?></h4>
              <p>Seats</p>
            </li>
          </ul>
        </div>
    </div>
<?php }} ?>
<section class="col-sm-3  sidelogin">
        <div class="sidebar_widget">
          <div class="widget_heading">
           <center> <h5><i class="fa fa-envelope" aria-hidden="true"></i>Book Now</h5></center>
          </div>
          <form method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" required>
            </div>
            <div class="form-group text">
              <input type="text" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" required>
            </div>
          <?php if(isset($_SESSION['login']))
              {?>
              <div class="form-group">
              <center><input type="submit" class="btn"  name="submit" value="Book Now">
              </center>
              </div>
              <?php } else { ?>
              	<center>
<a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login For Book</a></center>

              <?php } ?>
          </form>
        </div>
        </div>
      </section>
 	</section>
 	
    <?php include("includes/footer.php");?>
    <?php include("includes/login.php");?>
    <?php include("includes/registration.php");?>
</body>
</html>