<!DOCTYPE html>
<html>
<head>
  <title>Car Riders Rental</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>
  <nav class="navbar sticky-top navbar-expand-lg">
  <a class="navbar-brand mr-3" href="index.php">
    <img src="assets/img/logo.png" width="180" height="50" class="d-inline-block align-top ">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active mr-2">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item mr-2">
        <a class="nav-link" href="#carlisting">Car listing</a>
      </li>
       <li class="nav-item mr-2">
        <a class="nav-link" href="#our_customers">our customers</a>
      </li><li class="nav-item mr-2">
        <a class="nav-link" href="#about_us">About us</a>
      </li>
      <div class="user_login">
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle"></i> 
<?php
if (isset($_SESSION['login'])) 
{
$email=$_SESSION['login'];
$query ="SELECT FullName FROM users WHERE EmailId='$email'";
$result = mysqli_query($conn,$query);
$rowcount = mysqli_num_rows($result);
if( $rowcount > 0)
{
while ( $rows = mysqli_fetch_assoc($result))
{
   echo $rows['FullName'];}}?>
         <i class="fa fa-angle-down"></i></a>
              <ul class="dropdown-menu">
           <?php if(isset($_SESSION['login'])){?>
            <li><a href="profile.php">Profile Settings</a></li>
              <li><a href="update-password.php">Update Password</a></li>
            <li><a href="my-booking.php">My Booking</a></li>
            <li><a href="logout.php">Sign Out</a></li>
            <?php } else { ?>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Profile Settings</a></li>
              <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Update Password</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Booking</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Sign Out</a></li>
            <?php }} ?>
          </ul>
            </li>
          </ul>
        </div>
      <?php 
   if(isset($_SESSION['login'])==0) 
   {
     ?>
     <div class="login_btn ml-4"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a> </div>
   <?php }?>
      </ul>
  </div>
</nav>


