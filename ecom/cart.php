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
               	  		<li class="active">
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

<div id="content">
  <div class="container">
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Shopping Cart</li>
      </ul>
    </div>
     <div class="col-md-9" id="cart">
       <div class="box">
         <form action="cart.php" method="post" enctype="multipart-form-data">
           <h1>Shopping Cart</h1>
           <?php
           $ip_add=getUserIP();
           $select_cart="select * from cart where ip_add='$ip_add' ";
           $run_cart=mysqli_query($con,$select_cart);
           $count=mysqli_num_rows($run_cart);

           ?>
           <p class="text-muted">Currently you have <?php echo $count ?> item(s) in your cart</p>
           <div class="table-responsive">
             <table class="table">
               <thead>
                 <tr>
                   <th colspan="2">Product</th>
                   <th>Quantity</th>
                   <th>Unit Price</th>
                   <th>Size</th>
                   <th colspan="1">Delete</th>
                   <th colspan="1">Sub Total</th>
                 </tr>
               </thead>
               <tbody>
                <?php
                $total=0;
                while ($row=mysqli_fetch_array($run_cart)){
                   $pro_id=$row['p_id'];
                   $pro_size=$row['size'];
                   $pro_qty=$row['qty'];
                   $get_product="select * from products where product_id='$pro_id' ";
                   $run_pro=mysqli_query($con,$get_product);
                   while ($row=mysqli_fetch_array($run_pro)) {
                     $p_title=$row['product_title'];
                     $p_img1=$row['product_img1'];
                     $p_price=$row['product_price'];
                     $sub_total=$row['product_price']*$pro_qty;
                     $total +=$sub_total;

                   
                ?>
                 <tr>
                   <td><img src="admin_area/product_images/<?php echo $p_img1; ?>" height="300" width="300" class="img-responsive"></td>
                   <td><?php echo $p_title; ?></td>
                   <td><?php echo $pro_qty; ?></td>
                   <td>INR <?php echo $p_price; ?></td>
                   <td><?php echo $pro_size; ?></td>
                   <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                   <td>INR <?php echo $sub_total; ?></td>
                 </tr>
                 <?php } } ?>
               </tfoot>
             </table>
           </div>
           <div class="box-footer">
             <div class="pull-left">
               <h4>Total Price</h4>
             </div>
             <div class="pull-right">
                <h4>INR <?php echo $total; ?></h4>
             </div>
           </div>
           <div class="box-footer">
             <div class="pull-left">
               <a href="shop.php" class="btn btn-default">
                 <i class="fa fa-chevron-left"></i>Continue Shopping
               </a>
             </div>
             <div class="pull-right">
               <button class="btn btn-default" type="submit" name="update" value="Update Cart">
                   <i class="fa fa-refresh">Update Cart</i> 
               </button>
               <a href="checkout.php" class="btn btn-primary">
                 Proceed to checkout<i class="fa fa-chevron-right"></i>
               </a>
             </div>
           </div>
         </form>
       </div>
       <?php
       function update_cart(){
          global $con;
          if(isset($_POST['update'])){
            foreach ($_POST['remove'] as $remove_id) {
              $delete_product="delete from cart where p_id='$remove_id' ";
              $run_del=mysqli_query($con,$delete_product);
              if($run_del){
                echo "<script>window.open('cart.php','_self')</script>";
              }
            }
          }
       }

       echo $up_cart=update_cart();
   
       ?>
         <div id="row same-height-row">
        <div class="col-md-3 col-sm-6">
          <div class="box same-height headline">
            <h3 class="text-center">You Also LIke These Products</h3>
          </div>
        </div> 
        <?php
        $get_product="select * from products order by 1 LIMIT 0,3";
        $run_product=mysqli_query($con,$get_product);
        while ($row=mysqli_fetch_array($run_product)) {
          $pro_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_price=$row['product_price'];
          $product_img1=$row['product_img1'];
          echo "
          <div class='center-responsive col-md-3 col-sm-6'>
          <div class='product same-height'>
          <a href='details.php?pro_id=$pro_id'>
          <img src='admin_area/product_images/$product_img1' class='img-responsive'>
          </a>
          <div class='text'>
          <h3><a href='details.php?pro_id=$pro_id'>$product_title</a></h3>
          <p class='price'>INR $product_price</p>
          </div>
          </div>
          </div>
          ";
        }

        ?>
      </div>
     </div>
     <div class="col-md-3">
       <div class="box" id="order-summary">
         <div class="box-header">
           <h3>Order Summary</h3>
         </div>
         <p class="text-muted">
           Shipping and additional costs are calculated based on the values you have ordered.
         </p>
         <div class="table-responsive">
           <table class="table">
             <tbody>
               <tr>
                 <td>Order Subtotal</td>
                 <th>INR <?php echo $total; ?></th>
               </tr>
               <tr>
                 <td>Shipping and handling</td>
                 <td>INR 0</td>
               </tr>
               <tr>
                 <td>Tax</td>
                 <td>INR 0</td>
               </tr>
               <tr class="total">
                 <td>Total</td>
                 <th>INR <?php echo $total; ?></th>
               </tr>
             </tbody>
           </table>
         </div>
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