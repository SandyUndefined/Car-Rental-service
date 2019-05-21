<?php
session_start();
include('../includes/connection.php');

$query = "SELECT * FROM `brands`";
$reslut = mysqli_query($conn,$query);
if (isset($_SESSION['User'])) 
{
	if (isset($_GET['del'])) 
	{
	   $id = $_GET['del'];
       $query2 = "delete from brands  WHERE Id='$id'";
       if (mysqli_query($conn,$query2))
        {
        header('location:manage_brands.php?Success=Data Updated Successfully');
       }
       else
       {
       	header('location:manage_brands.php?Fail=Brand Deleted Successfully');
       }
       
	}

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
<body style="overflow-x: hidden;">
<nav class="navbar sticky-top navbar-expand-lg">
  <span class="navbar-text ml-5">
  <h3>Car Rental Portal | Admin Panel</h3>
  </span>
  <h4 class="float-left" style="color: #fff">Welcome  <?php echo $_SESSION['User']?></h4>
</nav>
<div class="ts-main-content">
	<?php 
	include('sidebar.php');?>

<div class="container text-white">
	<div class="row">

		 <div class="col-md-10">
		 	<h2 class="page-title" style="color: black;">Manage Brands</h2>
		  
      <?php
       if(@$_GET['Success'] == true)
       	{
       		?>
       	<div class="alert alert-success" role="alert">
              <?php echo $_GET['Success'];?> 
          </div>
       <?php
        } ?>

	<table class="table table-bordered table-striped">
		<thead class="thead-dark">
			<tr>

				<th scope="col">#</th>
				<th scope="col">Brand Name</th>
				<th scope="col">Creation Date</th>
				<th scope="col">Updation Date</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$query = "SELECT * FROM `brands`";
            $reslut = mysqli_query($conn,$query);
			$count=1;
			while ($rows = mysqli_fetch_assoc($reslut)) 
			 {
			 ?>
			  <tr>
                <th><?php echo $count; ?></th>
			  	<th><?php echo $rows['BrandName'];?></th>
			  	<th><?php echo $rows['CreationDate'];?></th>
			  	<th><?php echo $rows['UpdationDate'];?></th>
			  	<th><a href="edit_brands.php?id=<?php echo $rows['Id']?>">
			  		<i class="fas fa-user-edit"></i>
			  	</a>&nbsp;&nbsp;
                <a href="manage_brands.php?del=<?php echo $rows['Id'];?>" onclick="return confirm('Do you want to delete');">
                	<i class="fas fa-trash"></i>
                </a>
              </th>
			  </tr>
			 <?php
			 $count +=1;	
			 } 
			?>
		</tbody>
	</table>
</div>
</div>
</div>
</div>
<?php
}else {
	header('location:admin_login.php');
}
?>

</body>
</html>
