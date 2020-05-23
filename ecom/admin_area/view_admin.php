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
				<i class="fa fa-dashboard"></i>Dashboard / View Admins
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-fw fa-money"></i> View Admins
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped">
						<thead>
							<tr>
								<th>Admin Id</th>
								<th>Admin Name</th>
								<th>Admin Email</th>
								<th>Admin Passwod</th>
								<th>Admin Image</th>
								<th>Admin Contact</th>
								<th>Admin Country</th>
								<th>Admin Job</th>
								<th>Admin About</th>
								<th>Delete Admin</th>
							</tr>
						</thead>
						<tbody>
							<?php
                              $i=0;
                              $get_admin="select * from admins";
                              $run_admin=mysqli_query($con,$get_admin);
                              while ($row_admin=mysqli_fetch_array($run_admin)) {
                              	$a_id=$row_admin['admin_id'];
                              	$a_name=$row_admin['admin_name'];
                              	$a_email=$row_admin['admin_email'];
                              	$a_pass=$row_admin['admin_pass'];
                              	$a_image=$row_admin['admin_image'];
                              	$a_contact=$row_admin['admin_contact'];
                              	$a_country=$row_admin['admin_country'];
                              	$a_job=$row_admin['admin_job'];
                              	$a_about=$row_admin['admin_about'];
                              	$i++;
                              
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $a_name; ?></td>
								<td><?php echo $a_email; ?></td>
								<td><?php echo $a_pass; ?></td>
								<td><img src="admin_images/<?php echo $a_image; ?>" width="60" height="60"></td>
								<td><?php echo $a_contact; ?></td>
								<td><?php echo $a_country; ?></td>
								<td><?php echo $a_job; ?></td>
								<td><?php echo $a_about; ?></td>
								<td><center>
									<a href="index.php?delete_admin=<?php echo $a_id; ?>">
										<i class="fa fa-trash fa-2x"></i><br>Delete
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