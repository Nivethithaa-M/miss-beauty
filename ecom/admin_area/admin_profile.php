<?php
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('adminlogin.php','_self')</script>";
}else{

?>

<?php

if(isset($_GET['admin_profile'])){
	$edit_id=$_GET['admin_profile'];
	$get_admin="select * from admins where admin_id='$edit_id' ";
	$run_admin=mysqli_query($con,$get_admin);
	$row_admin=mysqli_fetch_array($run_admin);
	$admin_id=$row_admin['admin_id'];
	$admin_name=$row_admin['admin_name'];
	$admin_email=$row_admin['admin_email'];
	$admin_pass=$row_admin['admin_pass'];
    $admin_image=$row_admin['admin_image'];
    $admin_country=$row_admin['admin_country'];
    $admin_job=$row_admin['admin_job'];
    $admin_contact=$row_admin['admin_contact'];
    $admin_about=$row_admin['admin_about'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Admin Profile</title>
	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
  <style>
  	.btn-hotpink{
        background-color: hotpink;
        color: white;
  	}
  </style>
</head>
<body>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i>Dashboard / Edit My Admin Profile
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-fw fa-money"></i>Edit My Admin Profile
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="" enctype="multipart/form-data" method="post">
					<div class="form-group">
						<label class="col-md-3 control-label">Admin Name</label>
						<div class="col-md-6">
							<input type="text" name="admin_name" class="form-control" required value="<?php echo $admin_name; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Admin Email</label>
						<div class="col-md-6">
							<input type="text" name="admin_email" class="form-control" required value="<?php echo $admin_email; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Admin Password</label>
						<div class="col-md-6">
							<input type="password" name="admin_pass" class="form-control" required value="<?php echo $admin_pass; ?>">
						</div>
					</div>
						<div class="form-group">
						<label class="col-md-3 control-label">Admin Image</label>
						<div class="col-md-6">
						<input type="file" name="admin_image" class="form-control" required value="">
						<img src="admin_images/<?php echo $admin_image; ?>" width="70" height="70">
					</div>
				</div>
						<div class="form-group">
						<label class="col-md-3 control-label">Admin Contact</label>
						<div class="col-md-6">
							<input type="text" name="admin_contact" class="form-control" required value="<?php echo $admin_contact; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Admin Country</label>
						<div class="col-md-6">
							<input type="text" name="admin_country" class="form-control" required value="<?php echo $admin_country; ?>">
						</div>
					</div>
						<div class="form-group">
						<label class="col-md-3 control-label">Admin Job</label>
						<div class="col-md-6">
							<input type="text" name="admin_job" class="form-control" required value="<?php echo $admin_job; ?>">
						</div>
					</div>
						<div class="form-group">
						<label class="col-md-3 control-label">Admin About</label>
						<div class="col-md-6">
							<textarea type="text" name="admin_about" class="form-control" rows="3"><?php echo $admin_about; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input type="submit" name="update" value="Update Now" class="btn btn-hotpink form-control">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php

if(isset($_POST['update'])){
	$admin_name=$_POST['admin_name'];
	$admin_email=$_POST['admin_email'];
	$admin_pass=$_POST['admin_pass'];
	$admin_image=$_FILES['admin_image']['name'];
	$temp_admin_image=$_FILES['admin_image']['tmp_name'];
	$admin_contact=$_POST['admin_contact'];
	$admin_country=$_POST['admin_country'];
	$admin_job=$_POST['admin_job'];
	$admin_about=$_POST['admin_about'];

	move_uploaded_file($temp_admin_image,"admin_images/$admin_image");

	$upd_admin="update admins set admin_name='$admin_name',admin_email='$admin_email',admin_pass='$admin_pass',admin_image='$admin_image',admin_contact='$admin_contact',admin_country='$admin_country',admin_job='$admin_job',admin_about='$admin_about' ";
    $upd_admin=mysqli_query($con,$upd_admin);
    if($upd_admin){
    	echo "<script>alert('Your Profile has been Edited Successfully')</script>";
    	echo "<script>window.open('adminlogin.php','_self')</script>";
    	session_destroy();
    }
}

?>
</body>
</html>
<?php } ?>