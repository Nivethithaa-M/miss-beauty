<?php
session_start();
if(!isset($_SESSION['customer_email'])){
  echo "<script>window.open('../checkout.php','_self')</script>";
}else{
  
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
                    <a href="../customer_registration.php">Register</a>
                  </li>
                 	<li>
                 		<a href="my_account.php">My Account</a>
                 	</li>
                 	<li>
                 		<a href="../cart.php">Goto Cart</a>
                 	</li>
                 	<li>
                 		<?php
                    if(!isset($_SESSION['customer_email'])){
                      echo "<a href='../checkout.php'>Login</a>";
                    }else{
                      echo "<a href='../logout.php'>Logout</a>";
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
               	   <a class="navbar-brand home" href="../index.php">
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
               	  			<a href="../index.php">Home</a>
               	  		</li>
               	  		<li>
               	  			<a href="../shop.php">Shop</a>
               	  		</li>
               	  		<li class="active">
               	  			<a href="my_account.php">My Account</a>
               	  		</li>
               	  		<li>
               	  			<a href="../cart.php">Shopping Cart</a>
               	  		</li>
               	  
               	  		<li>
               	  			<a href="../contactus.php">Contact Us</a>
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
        <li><a href="../index.php">Home</a></li>
        <li>My Account</li>
      </ul>
    </div>
    <div class="col-md-3">
      <?php
      include("includes/sidebar.php");
      ?>
    </div>
    <div class="col-md-9">
      <?php
      if(isset($_GET['my_order'])){
        include("my_order.php");;
      }
      ?>

      <?php
      if(isset($_GET['pay_offline'])){
        include("pay_offline.php");
      }
      ?>

      <?php
      if(isset($_GET['edit_act'])){
        include("edit_act.php");
      }
      ?>

      <?php
      if(isset($_GET['change_pass'])){
        include("change_password.php");
      }
      ?>
      <?php
      if(isset($_GET['delete_ac'])){
        include("delete_ac.php");
      }
      ?>
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
}
?>
<?php
function getUserIP(){
        switch (true) {
                case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
                case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
                case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
                default : return $_SERVER['REMOTE_ADDR'];
        }
}
function item(){
        global $db;
        $ip_add=getUserIP();
        $get_items="select * from cart where ip_add='$ip_add' ";
        $run_item=mysqli_query($db,$get_items);
        $count=mysqli_num_rows($run_item);
        echo $count;
}

function totalPrice(){
        global $db;
        $ip_add=getUserIP();
        $total=0;
        $select_cat="select * from cart where ip_add='$ip_add' ";
        $run_cart=mysqli_query($db,$select_cat);
        while ($record=mysqli_fetch_array($run_cart)) {
                $pro_id=$record['p_id'];
                $pro_qty=$record['qty'];
                $get_price="select * from products where product_id='$pro_id' ";
                $run_price=mysqli_query($db,$get_price);
                while ($row=mysqli_fetch_array($run_price)) {
                        $sub_total=$row['product_price']*$pro_qty;
                        $total += $sub_total;
                }
        }
        echo $total;


}
?>