<?php
$customer_email=$_SESSION['customer_email'];
$get_customer="select * from customers where customer_email='$customer_email' ";
$run_cust=mysqli_query($con,$get_customer);
$row_cust=mysqli_fetch_array($run_cust);
$customer_id=$row_cust['customer_id'];
$customer_name=$row_cust['customer_name'];
$customer_email=$row_cust['customer_email'];
$customer_country=$row_cust['customer_country'];
$customer_city=$row_cust['customer_city'];
$customer_contact=$row_cust['customer_contact'];
$customer_address=$row_cust['customer_address'];
//$customer_image=$row_cust['customer_image'];

?>
<div class="box">
	<center>
		<h1>Edit Your Account</h1>
	</center>
	<form method="post" enctype="multipart/form-data">
	<div class="form-group">
            <label>Customer Name</label>
            <input type="text" name="c_name" required="" value="<?php echo $customer_name;  ?>" class="form-control">
          </div>
          <div class="form-group">
            <label>Customer Email</label>
            <input type="text" name="c_email" required="" value="<?php echo $customer_email; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label>Customer Country</label>
            <input type="text" name="c_country" value="<?php echo $customer_country; ?>" required="" class="form-control">
          </div>
          <div class="form-group">
            <label>Customer City</label>
            <input type="text" name="c_city" required="" value="<?php echo $customer_city; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label>Customer Contact Number</label>
            <input type="text" name="c_number" required="" value="<?php echo $customer_contact; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label>Customer Address</label>
            <input type="text" name="c_address" required="" value="<?php echo $customer_address; ?>" class="form-control">
          </div>
           <div class="form-group">
            <label>Customer Image</label>
            <input type="file" name="c_image" required="" class="form-control">
            <img src="customer_images/<?php echo $customer_image; ?>" class="img-responsive" height="100" width="100">
          </div> 
	<div class="form-group"><center>
		<input type="submit" name="update" value="Update Now" class="btn btn-primary"></center>
	</div>
</form>
</div>

<?php
if(isset($_POST['update'])){
	$update_id=$customer_id;
	$c_name=$_POST['c_name'];
	$c_email=$_POST['c_email'];
	$c_country=$_POST['c_country'];
	$c_city=$_POST['c_city'];
	$c_contact=$_POST['c_number'];
	$c_address=$_POST['c_address'];
	$c_image=$_FILES['c_image']['name'];
	$c_image_tmp=$_FILES['c_image']['tmp_name'];
	
	move_uploaded_file($c_image_tmp,"customer_images/$c_image");
	$update_customer="update customers set customer_name='$c_name',customer_email='$c_email',customer_country='$c_country',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address',customer_image= '$c_image' where customer_id='$update_id' ";

	$run_customer=mysqli_query($con,$update_customer);
	if($run_customer){
		echo "<script>alert('your details are updated.')</script>";
		echo "<script>window.open('my_account.php?my_order','_self')</script>";
	}

}
?>