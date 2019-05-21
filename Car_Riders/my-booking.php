<?php 
session_start();
include("includes/connection.php");
include ("includes/header.php");
if (isset($_SESSION['login'])) 
{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Car Riders Rental | My Bookings</title>
</head>
<body>
  <?php 
$useremail=$_SESSION['login'];
$query = "SELECT * from users where EmailId='$useremail'";
$result = mysqli_query($conn,$query);
$rowCount = mysqli_num_rows($result);
if($rowCount > 0)
{
while ($rows = mysqli_fetch_assoc($result)) 
{
  ?>
<section class="user_profile inner_pages">
  <div class="container">
    <div class="user_profile_info gray-bg padding_4x4_40" style="padding-top: 40px;">
      <div class="upload_user_logo"> <img src="assets/img/man.png" width="150px;" height="150px" alt="image">
      </div>

      <div class="dealer_info">
        <h5><?php echo $rows['FullName'];?></h5>
        <p><?php echo $rows['Address'];?><br>
          <?php echo $rows['City'];?>&nbsp;<?php echo $rows['Country']; }}?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-3">
       <?php include('includes/sidebar.php');?>
   
      <div class="col-md-8 col-sm-8">
        <div class="profile_wrap">
          <h5><U>MY BOOKINGS</U> </h5>
          <div class="my_vehicles_list">
            <ul class="vehicle_listing">
<?php 
$useremail=$_SESSION['login'];
 $query = "SELECT vehicles.VehicleImage as Vehicleimage,vehicles.VehicleTitle,vehicles.Id as vid,brands.BrandName,booking.FromDate,booking.ToDate,booking.Status  from booking join vehicles on booking.VehicleId=vehicles.Id join brands on brands.Id=vehicles.VehicleBrand where booking.UserEmail='$useremail'";
$result = mysqli_query($conn,$query);
$rowCount = mysqli_num_rows($result);
if($rowCount > 0)
{
while ($rows = mysqli_fetch_assoc($result)) 
{
   ?>

<li>
                <div class="vehicle_img"><a href="vehicles_details.php?vhid=<?php echo $rows['vid'];?>"><img src="admin/img/vehicalimg/<?php echo $rows['Vehicleimage'];?>" alt="image" width="300px;" height="150px"></a> </div>
                <div class="vehicle_title">
                  <h6><a href="vehicles_details.php?vhid=<?php echo $rows['vid'];?>""> <?php echo $rows['BrandName'];?> , <?php echo $rows['VehicleTitle'];?></a></h6>
                  <p><b>From Date:</b> <?php echo $rows['FromDate'];?><br /> <b>To Date:</b> <?php echo $rows['ToDate'];?></p>
                </div>
                <?php if($rows['Status']==1)
                { ?>
                <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn">Confirmed</a>     
                 </div>
                 <div class="vehicle_status "> <a href="#" class="btn outline btn-xs active-btn">Print Ticket</a>     
                 </div>

              <?php } else if($rows['Status']==2) { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Cancelled</a>
            
        </div>
             


                <?php } else { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Not Confirm yet</a>
            
        </div>
                <?php }}} ?>
         
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



    <?php include("includes/footer.php");?>
    <?php include("includes/login.php");?>
    <?php include("includes/registration.php");?>
</body>
</html>


<?php	
}
else{
	header('location:index.php');
}
?>