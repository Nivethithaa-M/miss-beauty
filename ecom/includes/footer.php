<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<h4>Pages</h4>
				<ul>
					<li><a href="cart.php">Shopping Cart</a></li>
					<li><a href="contactus.php">Contact Us</a></li>
					<li><a href="shop.php">Shop</a></li>
					<li><a href="customer/my_account.php">My Account</a></li>
				</ul>
				<hr>
				<h4>User Section</h4>
				<ul>
					<li><a href="logout.php">Logout</a></li>
				</ul>
				<hr class="hidden-md hidden-lg hidden-sm">
			</div>
			<div class="col-md-3 col-sm-6">
				<h4>Top Product Categories</h4>
				<ul>
					<?php
					$get_p_cats="select * from product_category";
					$run_p_cats=mysqli_query($con,$get_p_cats);
					while ($row_p_cat=mysqli_fetch_array($run_p_cats)) {
					$p_cat_id=$row_p_cat['p_cat_id'];
					$p_cat_title=$row_p_cat['p_cat_title'];
					echo "<li><a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a></li>";
					}
					?>
				</ul>
				<hr class="hidden-md hidden-lg">

			</div>
			<div class="col-md-3 col-sm-6">
				<h4>Where to find us</h4>
				<p>
					<strong>MissBeauty.com</strong>
					<br>MN-12 Lincon Street
					<br>NewYork 12356
					<br>USA
					<br>missbeauty@org.com
					<br>+0452 245 1235 67
				</p>
			</div>
			<div class="col-md-3 col-sm-6">
				<h4>Contact Us</h4>
				<a href="contactus.php">Goto Contact us page</a>
				<hr>
				<hr class="hidden-md hidden-lg">
				<h4>Stay In Touch</h4>
				<p class="social">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-google-plus"></i></a>
					<a href="#"><i class="fa fa-envelope"></i></a>
				</p>
			</div>
		</div>
	</div>
</div>

<div id="copyright">
	<div class="container">
		<div class="col-md-6">
			<p class="pull-right">
				&copy; 2020 MissBeauty
			</p>
		</div>
	</div>
</div>