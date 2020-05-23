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
				<i class="fa fa-dashboard"></i>Dashboard / View Customers
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-fw fa-money"></i> View Customers
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped">
						<thead>
							<tr>
								<th>Customer No</th>
								<th>Customer Name</th>
								<th>Customer Email</th>
								<th>Customer Image</th>
								<th>Customer Country</th>
								<th>Customer City</th>
								<th>Customer phone number</th>
								<th>Customer Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php
                              $i=0;
                              $get_cust="select * from customers";
                              $run_cust=mysqli_query($con,$get_cust);
                              while ($row_cust=mysqli_fetch_array($run_cust)) {
                              	$c_id=$row_cust['customer_id'];
                              	$c_name=$row_cust['customer_name'];
                              	$c_email=$row_cust['customer_email'];
                              	$c_image=$row_cust['customer_image'];
                              	$c_country=$row_cust['customer_country'];
                              	$c_city=$row_cust['customer_city'];
                              	$c_contact=$row_cust['customer_contact'];
                              	$i++;
                              
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $c_name; ?></td>
								<td><?php echo $c_email; ?></td>
								<td><img src="../customer/customer_images/<?php echo $c_image; ?>" width="60" height="60"></td>
								<td><?php echo $c_country; ?></td>
								<td><?php echo $c_city; ?></td>
								<td><?php echo $c_contact; ?></td>
								<td><center>
									<a href="index.php?delete_customer=<?php echo $c_id; ?>">
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