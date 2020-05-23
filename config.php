<?php 

session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con, 'beauty');

$email = $_POST['email'];
$password = $_POST['password'];

$s = " select * from custoreg where email = '$email' && password = '$password'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num==1) {
	header('location:ecom/index.php');
} else {
	header('location:cuslogin.php');
}

?>