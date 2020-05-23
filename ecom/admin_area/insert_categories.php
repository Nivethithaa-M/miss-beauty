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
				<i class="fa fa-dashboard"></i>Dashboard / Insert Brands
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-fw fa-money"></i>Insert Brands
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" action="" method="post">
					<div class="form-group">
						<label class="col-md-3 control-label">Brand Name</label>
						<div class="col-md-6">
							<input type="text" name="cat_title" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Brand Description</label>
						<div class="col-md-6">
							<textarea type="text" name="cat_desc" class="form-control">
							</textarea>
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
	$cat_title=$_POST['cat_title'];
	$cat_desc=$_POST['cat_desc'];

	$insert_cat="insert into categories (cat_title,cat_desc) values ('$cat_title','$cat_desc')";
    $run_cat=mysqli_query($con,$insert_cat);
    if($run_cat){
    	echo "<script>alert('New  Category has been Inserted')</script>";
    	echo "<script>window.open('index.php?view_categories','_self')</script>";
    }
}

?>

<?php } ?>