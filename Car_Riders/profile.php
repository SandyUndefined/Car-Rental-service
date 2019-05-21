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
	<title>Car Riders Rental | My Profile</title>
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
    <div class="user_profile_info gray-bg" style="padding-top: 40px;">
      <div class="upload_user_logo"> <img src="assets/img/man.png" width="150px;" height="150px" alt="image">
      </div>

      <div class="dealer_info">
        <h5><?php echo $rows['FullName'];?></h5>
        <p><?php echo $rows['Address'];?><br>
          <?php echo $rows['City'];?>&nbsp;<?php echo $rows['Country'];?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <?php include('includes/sidebar.php');?>
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">Genral Settings</h5>
          <form  method="post" action="includes/login_regs_get.php">
           <div class="form-group">
              <label class="control-label" style="font-weight: bold;">Reg Date -</label>
             <?php echo $rows['RegDate'];?>
            </div>
             <?php if($rows['UpdationDate']!=""){?>
            <div class="form-group">
              <label class="control-label" style="font-weight: bold;">Last Update  -</label>
             <?php echo $rows['UpdationDate'];?>
            </div>
            <?php } ?>
            <div class="form-group">
              <label class="control-label">Full Name</label>
              <input class="form-control white_bg" name="fullname" value="<?php echo $rows['FullName'];?>" id="fullname" type="text"  required>
            </div>
            <div class="form-group">
              <label class="control-label">Email Address</label>
              <input class="form-control white_bg" value="<?php echo $rows['EmailId'];?>" name="emailid" id="email" type="email" required readonly>
            </div>
            <div class="form-group">
              <label class="control-label">Phone Number</label>
              <input class="form-control white_bg" name="mobilenumber" value="<?php echo $rows['ContactNo'];?>" id="phone-number" type="text" required>
            </div>
            <div class="form-group">
              <label class="control-label">Date of Birth&nbsp;(dd/mm/yyyy)</label>
              <input class="form-control white_bg" value="<?php echo $rows['Dob'];?>" name="dob" placeholder="dd/mm/yyyy" id="birth-date" type="text" >
            </div>
            <div class="form-group">
              <label class="control-label">Your Address</label>
              <textarea class="form-control white_bg" name="address" rows="4" ><?php echo $rows['Address'];?></textarea>
            </div>
            <div class="form-group">
              <label class="control-label">Country</label>
              <input class="form-control white_bg"  id="country" name="country" value="<?php echo $rows['Country'];?>" type="text">
            </div>
            <div class="form-group">
              <label class="control-label">City</label>
              <input class="form-control white_bg" id="city" name="city" value="<?php echo $rows['City'];?>" type="text">
            </div>
            <?php }} ?>
            <div class="form-group">
              <button type="submit" name="updateprofile" class="btn">Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
          </form>
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
else
{header('location:index.php');
}
?>