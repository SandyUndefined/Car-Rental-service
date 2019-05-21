<?php
session_start();
include("connection.php");
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=$_POST['password'];
$query ="SELECT EmailId,password,FullName FROM users WHERE EmailId='$email' and password='$password'";
$result = mysqli_query($conn,$query);
$rowCount = mysqli_num_rows($result);
if($rowCount > 0 )
{ $data = mysqli_fetch_assoc($result);
$_SESSION['login']=$_POST['email'];
$_SESSION['fname']=$data['FullName'];
echo "<script type='text/javascript'> history.go(-1);</script>";
} else{
  
  echo "<script>alert('Invalid Details');</script>";
  echo "<script type='text/javascript'> history.go(-1); </script>";
}
}
?>
<?php
if(isset($_POST['signup']))
{
$fname=$_POST['fullname'];
$email=$_POST['emailid']; 
$mobile=$_POST['mobileno'];
$password=$_POST['password']; 
$query="INSERT INTO  users(FullName,EmailId,ContactNo,password) VALUES('$fname','$email','$mobile','$password')";
$result = mysqli_query($conn,$query);
if($result)
{
echo "<script>alert('Registration successfull. Now you can login');</script>";
echo "<script type='text/javascript'> document.location ='../index.php'; </script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script type='text/javascript'> history.go(-1); </script>";
}
}
?>
<?php 
if(isset($_POST['updateprofile']))
  {
$name=$_POST['fullname'];
$mobileno=$_POST['mobilenumber'];
$dob=$_POST['dob'];
$adress=$_POST['address'];
$city=$_POST['city'];
$country=$_POST['country'];
$email=$_SESSION['login'];
$query="update users set FullName='$name',ContactNo='$mobileno',Dob='$dob',Address='$adress',City='$city',Country='$country' where EmailId='$email'";
$result = mysqli_query($conn,$query);
if($result)
{
echo "<script>alert('Profile Updated');</script>";
echo "<script type='text/javascript'> document.location ='../profile.php'; </script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
?>
<?php 

if(isset($_POST['update']))
  {
$password=$_POST['password'];
$newpassword=$_POST['newpassword'];
$email=$_SESSION['login'];
  $query ="SELECT password FROM users WHERE EmailId='$email' and Password='$password'";
$result = mysqli_query($conn,$query);
$rowCount = mysqli_num_rows($result);
if($rowCount > 0)
{
$query2="update users set password='$newpassword' where EmailId='$email'";
$result2 = mysqli_query($conn,$query2);
echo "<script>alert('Your Password succesfully changed');</script>";
echo "<script type='text/javascript'> document.location ='../update-password.php'; </script>";
}
else {
echo "<script>alert('Your current password is wrong');</script>"; 
echo "<script type='text/javascript'> document.location ='../update-password.php'; </script>";
}
}
?>