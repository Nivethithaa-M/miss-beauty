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
				<i class="fa fa-dashboard"></i>Dashboard / View Orders
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-fw fa-money"></i>View Orders
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
						  <tr>
							<th>Order No</th>
							<th>Customer Email</th>
							<th>Invoice No</th>
							<th>Product Title</th>
							<th>Product Qty</th>
							<th>Product Size</th>
							<th>Order Date</th>
							<th>Product Amount(Rs)</th>
							<th>Order Status</th>
							<th>Delete Order</th>
						  </tr>
						</thead>
						<tbody>
							<?php
                            
                            $i=0;
                            $get_order="select * from customer_order";
                            $run_order=mysqli_query($con,$get_order);
                            while ($row_order=mysqli_fetch_array($run_order)) {
                            	$order_id=$row_order['order_id'];
                            	$customer_id=$row_order['customer_id'];
                            	$invoice_no=$row_order['invoice_no'];
                            	$product_id=$row_order['product_id'];
                            	$qty=$row_order['qty'];
                            	$size=$row_order['size'];
                            	$order_date=$row_order['order_date'];
                            	$due_amount=$row_order['due_amount'];
                            	$order_status=$row_order['order_status'];

                            	$get_products="select * from products where product_id='$product_id' ";
                            	$run_products=mysqli_query($con,$get_products);
                            	$row_products=mysqli_fetch_array($run_products);
                            	$product_title=$row_products['product_title'];
                            	$i++;


                            	

							?>
							<tr>
							<td><?php echo $i; ?></td>
							<td>
                            <?php 
                             $get_customer="select * from customers where customer_id='$customer_id' ";
                             $run_customer=mysqli_query($con,$get_customer);
                             $row_customer=mysqli_fetch_array($run_customer);
                             $customer_email=$row_customer['customer_email'];
                             echo $customer_email;
                            ?>
							</td>
							<td>
                             <?php echo $invoice_no; ?>
							</td>
							<td> <?php echo $product_title; ?></td>
							<td> <?php echo $qty; ?></td>
							<td> <?php echo $size; ?></td>
							<td> <?php echo $order_date; ?></td>
							<td> <?php echo $due_amount; ?></td>
							<td>
							<?php

							if($order_status=="pending"){
								echo $order_status='pending';
							}else{
								echo $order_status='Complete';
							}
							?></td>
							<td>
							<a href="index.php?delete_order=<?php echo $order_id; ?>">
							<i class="fa fa-trash fa-2x"></i>Delete
							</a>
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



