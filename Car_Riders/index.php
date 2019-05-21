<?php 
session_start();
include("includes/connection.php");
include ("includes/header.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Car Riders Rental</title>
</head>
<body>
<section class="banner-section" id="banner">
	<div class="container">
    <div class="div_zindex">
      <div class="row">
        <div class="col-md-5 col-md-push-7">
          <div class="banner_content">
            <h1>Find the right car for you.</h1>
            <p>We have more than a thousand cars for you to choose. </p>
            <a href="#" class="btn btn-danger">Read More <span class="angle_arrow ml-1"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section-padding mt-5 gray-bg">
  <div class="container">
    <div class="section-header text-center">
      <h2><b>Find the Best Car For You</b></h2>
      <p class="mt-3">A car rental, hire car, or car hire agency is a company that rents automobiles for short periods of time, generally ranging from a few hours to a few weeks. It is often organised with numerous local branches (which allow a user to return a vehicle to a different location), and primarily located near airports or busy city areas and often complemented by a website allowing online reservation.</p>
    </div>
    <div class="mt-5" id="carlisting">
    <h2 class="text-center"><b>Car Listing</b></h2>
    </div>
    <div class="row" >
      
<?php $sql = "SELECT vehicles.VehicleTitle,brands.BrandName,vehicles.PricePerDay,vehicles.FuelType,vehicles.ModelYear,vehicles.Id,vehicles.SeatingCapacity,vehicles.VehicleOverview,vehicles.Vehicleimage from vehicles join brands on brands.Id=vehicles.VehicleBrand";
 $result = mysqli_query($conn,$sql);
 $rowCount = mysqli_num_rows($result);
if($rowCount > 0)
{
 while ( $rows = mysqli_fetch_assoc($result)) 
   {
     
?> 
<div class="col-sm-4 mt-5">
<div class="card" style="width: 22rem;"> 
  <a href="vehicles_details.php?vhid=<?php echo $rows['Id'];?>">
    <img src="admin/img/vehicalimg/<?php echo $rows['Vehicleimage']; ?>" style="width: 350px; height:200px;" class="card-img-top" alt="image"></a>
    <div class="card-body">
      <div class="card-title">
<h6><a href="vehicles_details.php?vhid=<?php echo $rows['Id'];?>"><?php echo $rows['BrandName'];?> , <?php echo $rows['VehicleTitle'];?></a></h6>
</div>
<div class="card-text">
<ul>
<li><i class="fas fa-taxi mr-3"></i><?php echo $rows['FuelType'];?></li>
<li><i class="fa fa-calendar mr-3" aria-hidden="true"></i><?php echo $rows['ModelYear'];?> Model</li>
<li><i class="fa fa-user mr-3" aria-hidden="true"></i><?php echo $rows['SeatingCapacity'];?> seats</li>
</ul>
<span class="price"><i class="fas fa-dollar-sign mr-3"></i><?php echo $rows['PricePerDay'];?>/Day</span> 
<p><?php echo $rows['VehicleOverview'];?></p>
</div><center>
<a href="vehicles_details.php?vhid=<?php echo $rows['Id'];?>" class="btn btn-danger">Book Now</a></center>
</div>
</div>
</div>
<?php }}?>
  </div>
</section>
<br>
<br>
 <section class="testimonial text-center" id="our_customers">
        <div class="container">

            <div class="heading white-heading">
                Testimonial
            </div>
            <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
             
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="testimonial4_slide">
                            <img src="assets/img/sagar.jpg" class="img-circle img-responsive" />
                            <p>Excellent and prompt  customer service. A truly professional car rental company. Cars are in up-to-date condition. In case of emergency, the response from the team is quick, The availability of customer support service is 24x7. All payment, contract terms and transactions are transparent. Great promotions and support from sales team helped me get a brand new SUV. Thanks to <b><i>Car Rental Portal</i></b>.</p>
                            <h4>Sagar Roy</h4>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <img src="assets/img/sonam.jpg" class="img-circle img-responsive" /><p>Keep up this very good services and i see you the best in car rental fields thanks best regards. </p>
                            <h4>Sonam Tamang</h4>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <img src="assets/img/sylvester.jpg" class="img-circle img-responsive" />
                            <p>Thanks a lot. I am so happy. Thanks again. </p>
                            <h4>Sylvester Lepcha</h4>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#testimonial4" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </section>
    <?php include("includes/footer.php");?>
    <?php include("includes/login.php");?>
    <?php include("includes/registration.php");?>
</body>
</html>