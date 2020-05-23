<?php
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('adminlogin.php','_self')</script>";
}else{

?>

<?php
if(isset($_GET['delete_order'])){
	$delete_id=$_GET['delete_order'];
	$del_order="delete from customer_order where order_id='$delete_id' ";
	$run_delete=mysqli_query($con,$del_order);
	if($run_delete){
		echo "<script>alert('One Customer Order has been deleted')</script>";
		echo "<script>window.open('index.php?view_order','_self')</script>";
	}
}

?>
<?php } ?>