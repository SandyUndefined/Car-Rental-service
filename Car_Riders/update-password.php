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
	<title>Car Riders Rental | Update Password</title>
<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
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
    <div class="user_profile_info gray-bg "style="padding-top: 40px;">
      <div class="upload_user_logo"> <img src="assets/img/man.png" width="150px;" height="150px" alt="image">
      </div>

      <div class="dealer_info">
        <h5><?php echo $rows['FullName'];?></h5>
        <p><?php echo $rows['Address'];?><br>
          <?php echo $rows['City'];?>&nbsp;<?php echo $rows['Country'];}}?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <?php include('includes/sidebar.php');?>
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
<form name="chngpwd" method="post" onSubmit="return valid();" action="includes/login_regs_get.php">
        
            <div class="gray-bg field-title">
              <h6>Update password</h6>
            </div>
            <div class="form-group">
              <label class="control-label">Current Password</label>
              <input class="form-control white_bg" id="password" name="password"  type="password" required>
            </div>
            <div class="form-group">
              <label class="control-label">Password</label>
              <input class="form-control white_bg" id="newpassword" type="password" name="newpassword" required>
            </div>
            <div class="form-group">
              <label class="control-label">Confirm Password</label>
              <input class="form-control white_bg" id="confirmpassword" type="password" name="confirmpassword"  required>
            </div>
            <div class="form-group">
               <input type="submit" value="Update" name="update" id="submit" class="btn btn-block">
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
}else
{
	header('location:index.php');
}

 ?>