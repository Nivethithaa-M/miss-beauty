<?php
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('adminlogin.php','_self')</script>";
}else{

?>

<?php

if(isset($_GET['edit_p_cat'])){
	$edit_p_cat_id=$_GET['edit_p_cat'];
	$edit_p_cat_q="select * from product_category where p_cat_id='$edit_p_cat_id' ";
	$run_p_cat_edit=mysqli_query($con,$edit_p_cat_q);
	$row_p_cat_edit=mysqli_fetch_array($run_p_cat_edit);
	$p_cat_id=$row_p_cat_edit['p_cat_id'];
	$p_cat_title=$row_p_cat_edit['p_cat_title'];
	$p_cat_desc=$row_p_cat_edit['p_cat_desc'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
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
				<i class="fa fa-dashboard"></i>Dashboard / Edit Product Category
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-fw fa-money"></i>Edit Product Cataegory
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="" method="post">
					<div class="form-group">
						<label class="col-md-3 control-label">Product Category Title</label>
						<div class="col-md-6">
							<input type="text" name="p_cat_title" class="form-control" value="<?php echo $p_cat_title; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Product Category Description</label>
						<div class="col-md-6">
							<textarea type="text" name="p_cat_desc" class="form-control"><?php echo $p_cat_desc; ?></textarea>
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
	$p_cat_title=$_POST['p_cat_title'];
	$p_cat_desc=$_POST['p_cat_desc'];

	$update_p_cat="update product_category set p_cat_title='$p_cat_title',p_cat_desc='$p_cat_desc' where p_cat_id='$p_cat_id' ";

	$run_p_cat=mysqli_query($con,$update_p_cat);

	if($run_p_cat){
		echo "<script>alert('Product Category has been updated')</script>";

		echo "<script>window.open('index.php?view_product_cat','_self')</script>";
	}

}

?>
</body>
</html>
<?php } ?>