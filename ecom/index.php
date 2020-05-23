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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="styles\style.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>
  .carousel-inner>.item {
    -webkit-transition: -webkit-transform 0.3s ease-in-out !important;
    -o-transition: -o-transform 1.2s ease-in-out !important;
    transition: transform 1.2s ease-in-out !important;
}
</style>
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
               	  		<li class="active">
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
               	  		<li>
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
<div class="container" id="slider">
	<div class="col-md-12">
		<div class="carousel slide" id="myCarousel" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="myCarousel" data-slide-to="1"></li>
				<li data-target="myCarousel" data-slide-to="2"></li>
				<li data-target="myCarousel" data-slide-to="3"></li>
			</ol>
			<div class="carousel-inner">
				<?php 
				$get_slider= "select * from slider LIMIT 0,1";
				$run_slider= mysqli_query($con,$get_slider);
				while ($row=mysqli_fetch_array($run_slider)) {
					$slider_name=$row['slider_name'];
					$slider_image=$row['slider_image'];
					echo "
					<div class='item active'>
					<img src='admin_area/slider_images/$slider_image'>
					</div>
					"
					;
	            }
	            ?>

				<?php
				$get_slider= "select * from slider LIMIT 1,3";
				$run_slider= mysqli_query($con,$get_slider);
				while ($row=mysqli_fetch_array($run_slider)) {
					$slider_name=$row['slider_name'];
					$slider_image=$row['slider_image'];
					echo "
					<div class='item'>
					<img src='admin_area/slider_images/$slider_image'>
					</div>
					"
					;
				}
                ?>
			</div>
			<a href="#myCarousel" class="left carousel-control" data-slide="next">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a href="#myCarousel" class="right carousel-control" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</div>
<div id="advantage">
	<div class="container">
		<div class="same-height-row">
			<div class="col-sm-4">
				<div class="box same-height">
					<div class="icon">
						<i class="fa fa-heart"></i>
					</div>
					<h3><a href="#">BEST PRICES</h3></a>
						<p>You can check on all others sites about the prices and then compare with us.</p>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="box same-height">
					<div class="icon">
						<i class="fa fa-heart"></i>
					</div>
					<h3><a href="#">100% SATISFACTION GUARANTEED FROM US</h3></a>
						<p>Free returns on everything within 3 months.</p>
				</div>
			</div> 
			<div class="col-sm-4">
				<div class="box same-height">
					<div class="icon">
						<i class="fa fa-heart"></i>
					</div>
					<h3><a href="#">WE LOVE OUR CUSTOMERS</h3></a>
						<p>We are known to provide best possible service ever.</p>
				</div>
			</div>  
		</div>
	</div>
</div>

<div id="hot">
	<div class="box">
		<div class="container">
			<div class="col-md--12">
				<h2>LATEST THIS WEEK!</h2>
			</div>
		</div>
	</div>	
</div>
<div id="content" class="container">
	<div class="row">
		<?php
		getPro();
		?>
	</div>
</div>

<?php
include("includes/footer.php");
?>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>