<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Beauty store</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="styles\style.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
     <div id="top"> <!-- Top Bar Start -->
         <div class="container"> <!-- container start -->
         	 <div class="col-md-6 offer"> <!-- col-md-6 start -->
         	 	<a href="#" class="btn btn-success btn-sm">
         	 		<?php
              if(!isset($_SESSION['customer_email'])){
                echo "Welcome Guest";
              }else{
                echo "Welcome" .$_SESSION['customer_email'] . "";
              }
              ?>
         	 	</a>

         	 	<a href="#">Shoppping Cart Total Price: INR <?php totalPrice(); ?>, Total Items <?php item(); ?></a>
             </div>  <!-- col-md-6 end -->  

             <div class="col-md-6">  
                 <ul class="menu">
                  <li>
                    <a href="customer_registration.php">Register</a>
                  </li>
                 	<li>
                 		<?php
                    if(!isset($_SESSION['customer_email'])){
                      echo "<a href='checkout.php'>My Account</a>";
                    }else{
                       echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                    }?>
                 	</li>
                 	<li>
                 		<a href="cart.php">Goto Cart</a>
                 	</li>
                 	<li>
                 		<?php
                    if(!isset($_SESSION['customer_email'])){
                      echo "<a href='checkout.php'>Login</a>";
                    }else{
                      echo "<a href='logout.php'>Logout</a>";
                  }
                  ?>
                 	</li>
                 </ul>  
              </div>    
         </div> <!-- container End -->

     </div> <!-- Top Bar End -->

     <div class="navbar navbar-default" id="navbar"> 
           <div class="container">
               <div class="navbar-header">
               	   <a class="navbar-brand home" href="index.php">
                        <img src="images/logoo.jpg" alt="MissBeauty" class="hidden-xs" height="50px" width="100px">
                        <img src="images/logoo-small.jpg" alt="MissBeauty" class="visible-xs" height="50px" width="100px">
               	   </a>

               	   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
               	   	<span class="sr-only">Toggle Navigation</span>
               	   	<i class="fa fa-align-justify"></i>
               	   </button>
               	   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
               	   	<span class="sr-only"></span>
               	   	<i class="fa fa-search"></i>	
               	   </button>
               </div>

               <div class="navbar-collapse collapse" id="navigation">
               	  <div class="padding-nav">
               	  	<ul class="nav navbar-nav navbar-left">
               	  		<li>
               	  			<a href="index.php">Home</a>
               	  		</li>
               	  		<li>
               	  			<a href="shop.php">Shop</a>
               	  		</li>
               	  		<li>
               	  			<?php
                    if(!isset($_SESSION['customer_email'])){
                      echo "<a href='checkout.php'>My Account</a>";
                    }else{
                       echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                    }?>
               	  		</li>
               	  		<li>
               	  			<a href="cart.php">Shopping Cart</a>
               	  		</li>
               	  		
               	  		<li class="active">
               	  			<a href="contactus.php">Contact Us</a>
               	  		</li>
               	  	</ul>	
               	  </div>
               	  <a href="cart.php" class="btn btn-primary navbar-btn right">
               	  	<i class="fa fa-shopping-cart"></i>     
               	  	   <span><?php item(); ?> items In the Cart</span>
               	  </a>

               	  <div class="navbar-collapse collapse right">
               	  	  <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
               	  	  	 <span class="sr-only"> Toggle Search</span>
               	  	  	 <i class="fa fa-search"></i>
               	  	  </button>
               	  </div>

               	  <div class="collapse clearfix" id="search">
               	  	  <form class="navbar-form" method="get" action="result.php">
               	  	  	<div class="input-group">
               	  	  		<input type="text" name="user_query" placeholder="Search" class="form-control" required="">
               	  	  		<span class="input-group-btn">
               	  	  		<button type="submit" value="Search" name="search" class="btn btn-primary">
               	  	  			<i class="fa fa-search"></i>
               	  	  		</button>
               	  	  		</span>
               	  	  	</div>
               	  	  	
               	  	  </form> 
               	  </div>
               </div>
           </div>  
     </div>

<div id="content">
  <div class="container">
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Contact Us</li>
      </ul>
    </div>
     <div class="col-md-3">
      <?php
      include("includes/sidebar.php");
      ?>
    </div>
    <div class="col-md-9">
      <div class="box">
        <div class="box-header">
          <center>
            <h2>Contact Us</h2>
            <p class="text-muted">If you have any queries, please feel free to contact us, our customer service center is working for you 24/7</p>
          </center>
        </div>
        <form action="contactus.php" method="post">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" required="" class="form-control">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" required="" class="form-control">
          </div>
          <div class="form-group">
            <label>Subject</label>
            <input type="text" name="subject" required="" class="form-control">
          </div>
          <div class="form-group">
            <label>Message</label>
            <textarea name="message" class="form-control"></textarea>
          </div>
          <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary">
              <i class="fa fa-user-md"></i>Send Message
            </button>
          </div>
        </form>
      </div>
    </div>


    </div>
</div>

<?php
include("includes/footer.php");
?>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php
//Admin
if(isset($_POST['submit'])){
$senderName=$_POST['name'];
$senderEmail=$_POST['email'];
$senderSubject=$_POST['subject'];
$senderMessage=$_POST['message'];
$receiverEmail="charmingdolly75@gmail.com";
mail($receiverEmail,$senderName,$senderSubject,$senderMessage,$senderEmail);
//Customer
$email=$_POST['email'];
$subject="Welcome to our Website";
$msg="I shall get you soon, thanks for sending email";
$from="charmingdolly75@gmail.com";
mail($email,$subject,$msg,$from);
echo "<h2 align='center'>Your mail has been sent</h2>";
}
?>