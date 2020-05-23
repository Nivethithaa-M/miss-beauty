<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('adminlogin.php','_self')</script>";
}else{

?>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background:hotpink">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle Navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<img src="includes/logoo.jpg" width="70" height="50" alt="LOGO">
		<a href="index.php?dashboard" class="navbar-brand" style="color:white"><b>Admin Panel</b></a>
	</div>
	<ul class="nav navbar-right top-nav">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" style="padding-right: 30px;" data-toggle="dropdown">
				<i class="fa fa-user"></i><?php echo $admin_name; ?>
			</a>
			<ul class="dropdown-menu">

		<li>
			<a href="index.php?view_product">
				<i class="fa fa-fw-envelope"></i>Products
                <span class="badge"><?php echo $count_pro; ?></span>
			</a>
		</li>
		<li>
			<a href="index.php?view_customer">
				<i class="fa fa-fw-users"></i>Customer
                <span class="badge"><?php echo $count_cust; ?></span>
			</a>
		</li>
		<li>
			<a href="index.php?pro_cat">
				<i class="fa fa-fw-gear"></i>Product Categories
                <span class="badge"><?php echo $count_p_cat; ?></span>
			</a>
		</li>
		<li class="divider"></li>
		<li>
			<a href="logout.php">
				Logout
				<i class="fa fa-fw fa-power-off"></i>
			</a>
		</li>
	</ul>
		</li>
	</ul>
	<div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
            	<li>
                    <a href="index.php?dashboard"><i class="fa fa-fw fa fa-dashboard"></i>DASHBOARD</a>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-table"></i> PRODUCTS <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="submenu-1" class="collapse">
                        <li><a href="index.php?insert_product"><i class="fa fa-angle-double-right"></i> Insert Product</a></li>
                        <li><a href="index.php?view_product"><i class="fa fa-angle-double-right"></i> View Product</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-table"></i>PRODUCT <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CATEGORIES<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="index.php?insert_product_cat"><i class="fa fa-angle-double-right"></i> Insert Product Categories</a></li>
                        <li><a href="index.php?view_product_cat"><i class="fa fa-angle-double-right"></i>View Product Categories</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-fw fa-table"></i>BRANDS<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-3" class="collapse">
                        <li><a href="index.php?insert_categories"><i class="fa fa-angle-double-right"></i>Insert New Brands</a></li>
                        <li><a href="index.php?view_categories"><i class="fa fa-angle-double-right"></i>View Available Brands</a></li>
                    </ul>
                </li>

                <li>
                    <a href="index.php?view_customer"><i class="fa fa-fw fa-edit"></i>VIEW CUSTOMER</a>
                </li>
                <li>
                    <a href="index.php?view_order"><i class="fa fa-fw fa-table"></i>VIEW ORDER</a>
                </li>
                <li>
                    <a href="index.php?view_payments"><i class="fa fa-fw fa-pencil"></i>VIEW PAYMENTS</a>
                </li>
                
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-5"><i class="fa fa-fw fa-table"></i>USERS<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-5" class="collapse">
                        <li><a href="index.php?insert_admin"><i class="fa fa-angle-double-right"></i>Insert New Admin</a></li>
                        <li><a href="index.php?view_admin"><i class="fa fa-angle-double-right"></i>View Admins</a></li>
                        <li><a href="index.php?admin_profile=<?php echo $admin_id; ?>"><i class="fa fa-angle-double-right"></i>Edit My Profile</a></li>
                    </ul>
                </li>
                <li>
                    <a href="index.php?view_payments"><i class="fa fa-fw fa-power-off"></i>LOGOUT</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
<script>
	$(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(".side-nav .collapse").on("hide.bs.collapse", function() {                   
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
    });
    $('.side-nav .collapse').on("show.bs.collapse", function() {                        
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
    });
})    
    
</script>

<?php } ?>