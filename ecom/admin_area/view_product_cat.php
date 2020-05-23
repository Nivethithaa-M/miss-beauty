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
				<i class="fa fa-dashboard"></i>Dashboard / View Product Categories
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			 <div class="panael-heading">
			 	<h3 class="panel-title">
			 		<i class="fa fa-fw fa-money"></i>View Product Categories
			 	</h3>
			 </div>
			 <div class="panel-body">
			 	<div class="table-responsive">
			 		<table class="table table-bordered table-hover table-striped">
			 			<thead>
			 				<tr>
			 					<th>Product Category Id</th>
			 					<th>Product Category Title</th>
			 					<th>Product Category Description</th>
			 					<th>Delete Product Category</th>
			 					<th>Edit Product Category</th>
			 				</tr>
			 			</thead>
			 			<tbody>
			 				<?php
                            $i=0;
                            $get_p_cats="select * from product_category";
                            $run_p_cats=mysqli_query($con,$get_p_cats);
                            while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {
                            	$p_cat_id=$row_p_cats['p_cat_id'];
                            	$p_cat_title=$row_p_cats['p_cat_title'];
                            	$p_cat_desc=$row_p_cats['p_cat_desc'];
                            	$i++;
			 				?>
			 				<tr>
			 					<td><?php echo $i; ?></td>
			 					<td><?php echo $p_cat_title; ?></td>
			 					<td><?php echo $p_cat_desc; ?></td>
			 					<td><center></center>
			 						<a href="index.php?delete_p_cat=<?php echo $p_cat_id; ?>">
			 							<i class="fa fa-trash fa-2x"></i><br>Delete
			 						</a></center>
			 					</td>
			 					<td><center>
			 						<a href="index.php?edit_p_cat=<?php echo $p_cat_id; ?>">
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