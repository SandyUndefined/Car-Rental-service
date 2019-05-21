<?php 
require_once("includes/config.php");
if(!empty($_POST["emailid"])) 
{
	$email= $_POST["emailid"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

		echo "error : You did not enter a valid email.";
	}
	else {
$query ="SELECT EmailId FROM users WHERE EmailId='$email'";
$result = mysqli_query($conn,$query);
if( mysqli_num_rows($result) > 0)
{
 echo "<span style='color:red'> Email already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Email available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}
?>