<?php
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('adminlogin.php','_self')</script>";
}else{

?>

<?php
if(isset($_GET['delete_admin'])){
	$delete_id=$_GET['delete_admin'];
	$del_admin="delete from admins where admin_id='$delete_id' ";
	$run_delete=mysqli_query($con,$del_admin);
	if($run_delete){
		echo "<script>alert('One Admin has been deleted')</script>";
		echo "<script>window.open('index.php?view_admin','_self')</script>";
	}
}

?>
<?php } ?>