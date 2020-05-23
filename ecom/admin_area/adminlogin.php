<?php
session_start();
include ("includes/db.php");

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin Login</title>
<style>
.logo {
  height: 60px;
  width: 100px;
  float: left;
  border-radius: 50px;
}
.logo {
  float: left;
  margin: 10px;
}
* {
  margin: 0px;
  padding: 0px;
}

body {
  background: url("regbg.jpg") no-repeat center fixed;
  background-size: cover;
  font-family: 'Helvetica Neue', sans-serif;
  font-weight: lighter;
}
h1{
  text-align: center;
  color: white;
  background: rgba(0,0,0,0.5);
  padding: 20px;
}
.registration{
   margin: auto;
   width: 50%;
   text-align: center;
   color: white;
   background: rgba(0,0,0,0.5);
   border: 2px solid white;
   padding: 15px;
}
h2{
  padding: 15px;
}
#name , #add{
   width: 40%;
   padding: 5px;
   border-radius: 5px;
   border: 1px solid white;
   outline: 0;
   font-family: serif;
   font-size: 18px;
   background: none;
}
#number{
   width: 34%;
   padding: 5px;
   border-radius: 5px;
   border: 1px solid white;
   outline: 0;
   font-family: serif;
   font-size: 18px;
   background: none;
   color: white;
}
#num{
   padding: 7px 0px;
   border-radius: 5px;
   border: 1px solid white;
   outline: 0;
   background: none;
   color: white;
}
#count, #state{
   width: 320px;
   padding: 7px 0px;
   border-radius: 5px;
   border: 1px solid white;
   outline: 0;
   background: none;
   color: white;
}
#count option, #num option , #state option{
   color: black;
}
#check{
   font-family: serif;
   font-size: 18px;
}
#sub{
   width: 150px;
   padding: 5px;
   font-family: serif;
   font-size: 18px;
   border: 1px solid white;
   outline: 0;
   border-radius: 5px;
   background: none;
   color: white;
}
::placeholder{
   color: white;
}
#sub:hover{
  background-color: hotpink;
}
a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
}

a:hover {
  background-color: black;
  color: white;
}

.previous {
  background-color: white;
  color: black;
  margin-left:50px;
}

.next {
  background-color: hotpink;
  color: white;
  margin-left:1200px;
}

body{
   margin: 0;
   padding: 0;
   font-family: sans-serif;
   background: url("regbg.jpg");
   background-size: cover;
}
.box{
   position: absolute;
   top:50%;
   left:50%;
   transform: translate(-50%,-50%);
   width: 400px;
   padding: 40px;
   background: rgba(0,0,0,.8);
   box-sizing: border-box;
   box-shadow: 0 15px 25px rgba(0,0,0,.5);
   border-radius: 10px;
}
.box h2{
    margin: 0 0 30px;
	padding: 0;
	color: white;
	text-align: center;
}
.box .inputBox{
   position: relative;
}
.box .inputBox input{
   width: 100%;
   padding: 10px 0;
   font-size: 16px;
   color: white;
   letter-spacing: 1px;
   margin-bottom: 30px;
   border: none;
   border-bottom: 1px solid white;
   outline: none;
   background: transparent;
}
.box .inputBox label{
   position: absolute;
   top: 0;
   left: 0;
   padding: 10px 0;
   font-size: 16px;
   color: white;
   pointer-events: none;
   transition: .5s;
}
.box .inputBox input:focus ~ label,
.box .inputBox input:valid ~ label{
   top: -18px;
   left: 0;
   color: hotpink;
   font-size: 12px;
}
.box input[type="submit"] {
   background: transparent;
   border: none;
   outline: none;
   color: white;
   background: hotpink;
   padding: 10px 20px;
   cursor: pointer;
   border-radius: 5px;
</style>
</head>
<body>
    <img class="logo" src="logoo.jpg" />
	<h1>MISS BEAUTY ADMIN LOGIN</h1><br><br><br>
   <div class="box">
       <h2>Login</h2>
	   <form method="POST" action="">
	      <div class="inputBox">
		     <input type="text" name="admin_email" required="">
			 <label>Email</label>
		  </div>
		  <div class="inputBox">
		     <input type="password" name="admin_pass" required="">
			 <label>Password</label>
		  </div>
		  <input type="submit" name="admin_login" value="submit">
		</form>
   </div>
</body>
</html>

<?php
if(isset($_POST['admin_login'])){
  $admin_email=mysqli_real_escape_string($con,$_POST['admin_email']);
  $admin_pass=mysqli_real_escape_string($con,$_POST['admin_pass']);
  $get_admin="select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass' ";
  $run_admin=mysqli_query($con,$get_admin);
  $count=mysqli_num_rows($run_admin);
  if($count==1){
    $_SESSION['admin_email']=$admin_email;
    echo "<script>alert('Your are logged in!')</script>";
    echo "<script>window.open('index.php?dashboard','_self')</script>";
  }else{
    echo "<script>alert('Incorrect Email/Password')</script>";
  }

}

?>