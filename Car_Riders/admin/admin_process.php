<?php
session_start();
 if (isset($_POST['login'])) 
 {

 	if (empty($_POST['username']) || empty($_POST['password'])) 
  	 {
  	 	header("location:admin_login.php?Empty= Please Enter Username and Password");
  	 }
  	 else
  	 {
        
        $username = "Sandeep Sharma";
        $password = "1234";


  	 	if ($_POST['username']==$username && $_POST['password']==$password) 
  	 	{
  	 	   $_SESSION['User'] = $_POST['username'];  
  	 		header("location:dashboard.php");	
  	 	}
  	 	else
  	 	{

  	 		header("location:admin_login.php?Invalid= Invalid Username and Password");
  	 	}

  	 }
 }
 else
 {

 }

?>