<?php
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('adminlogin.php','_self')</script>";
}else{

?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / View Brands
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			 <div class="panael-heading">
			 	<h3 class="panel-title">
			 		<i class="fa fa-fw fa-money"></i>View Brands
			 	</h3>
			 </div>
			 <div class="panel-body">
			 	<div class="table-responsive">
			 		<table class="table table-bordered table-hover table-striped">
			 			<thead>
			 				<tr>
			 					<th>Brand Id</th>
			 					<th>Brand Name</th>
			 					<th>Name Description</th>
			 					<th>Remove Brand</th>
			 					<th>Delete Brand</th>
			 				</tr>
			 			</thead>
			 			<tbody>
			 				<?php
                            $i=0;
                            $get_cats="select * from categories";
                            $run_cats=mysqli_query($con,$get_cats);
                            while ($row_cats=mysqli_fetch_array($run_cats)) {
                            	$cat_id=$row_cats['cat_id'];
                            	$cat_title=$row_cats['cat_title'];
                            	$cat_desc=$row_cats['cat_desc'];
                            	$i++;
			 				?>
			 				<tr>
			 					<td><?php echo $i; ?></td>
			 					<td><?php echo $cat_title; ?></td>
			 					<td><?php echo $cat_desc; ?></td>
			 					<td><center>
			 						<a href="index.php?delete_cat=<?php echo $cat_id; ?>">
			 							<i class="fa fa-trash fa-2x"></i><br>Delete
			 						</a></center>
			 					</td>
			 					<td><center>
			 						<a href="index.php?edit_cat=<?php echo $cat_id; ?>">
			 							<i class="fa fa-pencil fa-2x"></i><br>Edit
			 						</a></center>
			 					</td>
			 				</tr>
			 			<?php } ?>
			 			</tbody>
			 		</table>
			 	</div>
			 </div>
		</div>
	</div>
</div>
<?php } ?>