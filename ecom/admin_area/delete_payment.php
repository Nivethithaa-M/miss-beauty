<?php
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('adminlogin.php','_self')</script>";
}else{

?>

<?php
if(isset($_GET['delete_payment'])){
	$delete_id=$_GET['delete_payment'];
	$del_pay="delete from payments where payment_id='$delete_id' ";
	$run_pay=mysqli_query($con,$del_pay);
	if($run_pay){
		echo "<script>alert('One Payment has been deleted')</script>";
		echo "<script>window.open('index.php?view_payments','_self')</script>";
	}
}

?>
<?php } ?>