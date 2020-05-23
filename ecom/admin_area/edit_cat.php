<?php
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('adminlogin.php','_self')</script>";
}else{

?>

<?php

if(isset($_GET['edit_cat'])){
	$edit_cat_id=$_GET['edit_cat'];
	$edit_cat_q="select * from categories where cat_id='$edit_cat_id' ";
	$run_cat_edit=mysqli_query($con,$edit_cat_q);
	$row_cat_edit=mysqli_fetch_array($run_cat_edit);
	$cat_id=$row_cat_edit['cat_id'];
	$cat_title=$row_cat_edit['cat_title'];
	$cat_desc=$row_cat_edit['cat_desc'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Brands</title>
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
				<i class="fa fa-dashboard"></i>Dashboard / Edit Brands
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-fw fa-money"></i>Edit Brands
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="" method="post">
					<div class="form-group">
						<label class="col-md-3 control-label">Brand Name</label>
						<div class="col-md-6">
							<input type="text" name="cat_title" class="form-control" value="<?php echo $cat_title; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Brand Description</label>
						<div class="col-md-6">
							<textarea type="text" name="cat_desc" class="form-control"><?php echo $cat_desc; ?></textarea>
						</div>
					</div>
                     <div class="form-group">
                     	<label class="col-md-3 control-label"></label>
                     	<div class="col-md-6">
                     		<input type="submit" name="update" value="Update" class="btn btn-hotpink form-control" >
                     	</div>
                     </div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php

if(isset($_POST['update'])){
	$cat_title=$_POST['cat_title'];
	$cat_desc=$_POST['cat_desc'];

	$update_cat="update categories set cat_title='$cat_title',cat_desc='$cat_desc' where cat_id='$cat_id' ";

	$run_cat=mysqli_query($con,$update_cat);

	if($run_cat){
		echo "<script>alert('Product Category has been updated')</script>";

		echo "<script>window.open('index.php?view_categories','_self')</script>";
	}

}

?>
</body>
</html>
<?php } ?>