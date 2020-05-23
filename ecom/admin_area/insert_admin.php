<?php

if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('adminlogin.php','_self')</script>";
}else{


?>
<style>
	.btn-hotpink{
		background-color: hotpink;
		color: white;
	}
</style>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i>Dashboard / Insert New Admin
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-fw fa-money"></i>Insert New Admin
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="" enctype="multipart/form-data" method="post">
					<div class="form-group">
						<label class="col-md-3 control-label">Admin Name</label>
						<div class="col-md-6">
							<input type="text" name="admin_name" class="form-control" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Admin Email</label>
						<div class="col-md-6">
							<input type="text" name="admin_email" class="form-control" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">User Password</label>
						<div class="col-md-6">
							<input type="password" name="admin_pass" class="form-control" required="">
						</div>
					</div>
						<div class="form-group">
						<label class="col-md-3 control-label">Admin Image</label>
						<div class="col-md-6">
						<input type="file" name="admin_image" class="form-control" required="">
					</div>
				</div>
						<div class="form-group">
						<label class="col-md-3 control-label">Admin Contact</label>
						<div class="col-md-6">
							<input type="text" name="admin_contact" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Admin Country</label>
						<div class="col-md-6">
							<input type="text" name="admin_country" class="form-control">
						</div>
					</div>
						<div class="form-group">
						<label class="col-md-3 control-label">Admin Job</label>
						<div class="col-md-6">
							<input type="text" name="admin_job" class="form-control" required="">
						</div>
					</div>
						<div class="form-group">
						<label class="col-md-3 control-label">Admin About</label>
						<div class="col-md-6">
							<textarea type="text" name="admin_about" class="form-control" rows="3"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input type="submit" name="submit" value="Submit Now" class="btn btn-hotpink form-control">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php

if(isset($_POST['submit'])){
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

	$ins_admin="insert into admins (admin_name,admin_email,admin_pass,admin_image,admin_contact,admin_country,admin_job,admin_about) values ('$admin_name','$admin_email','$admin_pass','$admin_image','$admin_contact','$admin_country','$admin_job','$admin_about')";
    $run_admin=mysqli_query($con,$ins_admin);
    if($run_admin){
    	echo "<script>alert('New Admin has been Added')</script>";
    	echo "<script>window.open('index.php?view_admin','_self')</script>";
    }
}

?>

<?php } ?>