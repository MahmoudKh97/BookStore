<?php
session_start();
if(!isset($_SESSION["USER"] ) ){
	$user_id = 0 ;
}else{
	$user_id = $_SESSION["USER"] ; 
}
include("php/connect.php");
$query = "SELECT  COUNT(*) AS num_rows FROM `cart` WHERE `USER_ID`=$user_id LIMIT 1";
$result = $link->query($query);
$array = $result->fetch_array();
$cart_num = $array["num_rows"];
$query1 = "SELECT  COUNT(*) AS num_rows FROM `wishlist` WHERE `USER_ID`=$user_id LIMIT 1";
$result1 = $link->query($query1);
$array1 = $result1->fetch_array();
$wishlist_num = $array1["num_rows"];
?>

<html lang="">
				<!-- Top Header -->
			
			<div class="top-header transparent">
				<div class="container">
					<div class="top-contact left phone hidden-xs">
						<span class="text">
							<a class="top-contact-link" >
							Welcome To Book Store  <i class=" icon-space"></i>
							<i class="fa fa-book icon-space"></i></a>
						</span>
					</div>
					<div class="top-search phone">
						<form class="searchbox" action="search.php" method="get">
							<input type="text" placeholder="Search" name="search" onkeyup="buttonUp();"  class="searchbox-input" required>
							<button type="submit" class="searchbox-submit"  value="Go"><i class="fa fa-search"></i></button>
							<input type="reset" class="searchbox-reset" value="x">
							<span class="searchbox-icon"><i class="fa fa-search"></i></span>
						</form>
					</div>
					<div class="top-contact right phone">
						<span class="text">
						<ul class="list-inline list-unstyled si-6-white sm">
						
						<?php
						if($user_id > 0){
						?>
							<li><a href="php/logout.php" class="top-contact-link">logout </a></li>
							<li><a href="user-account.php" class="top-contact-link">Account <i class="fa fa-user"></i></a></li>
							<li><a href="user-cart.php" class="top-contact-link">Cart <?php echo "(".$cart_num.") " ?><i class="fa fa-shopping-cart"></i></a></li>
							<li><a href="user-wishlist.php" class="top-contact-link">Wishlist <?php echo "(".$wishlist_num.") " ?><i class="fa fa-heart"></i></a></li>
						<?php
						}else{
						?>
							<li><a href="user-login.php" class="top-contact-link">login <i class="fa fa-unlock-alt"></i></a></li>
						<?php
						}
						?>
								<li>
											
										</li>
						</ul>
						</span>
					</div>
				</div>
			</div><!-- End of Top Header --> 
			
			
				<!-- Header -->
				
				<header class="navigation transparent dark-dropdown">
				<div class="main-nav nav-pill header-right sticky">
					<div class="navbar navbar-default" role="navigation">
						<div class="container">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="logo" href="home.php"><img alt="image" src="images/logo4.png" style="height:60px;" /></a>
							</div>
							<div class="navbar-container">
								<div class="navbar-collapse nav-collapse collapse collapsing-nav">
									<ul class="nav navbar-nav">
										<li class='<?php echo($active == "home")? ' active':'' ?>'>
											<a href="home.php">Home</a>
										</li>
										<li class='dropdown <?php echo($active == "categories")? ' active':'' ?>'>
											<a href="categories.php">Categories</a>
											<ul class="dropdown-menu">
								<?php
							$query = "SELECT * FROM `category`";
							$result = $link->query($query);
							while($array = $result->fetch_array()){
								$menu_category = $array["CATEGORY"];
								$menu_category_id = $array["ID"];
								$menu_image = $array["IMAGE"];

								echo '  <li class="dropdown-submenu">
											<a href="#">'.$menu_category.'</a>
											<ul class="row dropdown-menu megamenu">
												<li class="col-md-9">
													<ul>';
												$query1 = "SELECT * FROM `sub_category` WHERE `CATEGORY`=$menu_category_id";
												$result1 = $link->query($query1);
												while($array1 = $result1->fetch_array()){
													$menu_sub_category = $array1["SUB_CATEGORY"];
													$menu_sub_category_id = $array1["ID"];
													echo '<li><a href="products.php?category_id='.$menu_category_id.
													'&sub_category_id='.$menu_sub_category_id.'&category='.$menu_category.
													'&sub_category='.$menu_sub_category.'">'.$menu_sub_category.'</a></li>';
												}
								echo'				</ul>
												</li>
												
												<li class="col-md-3">
													<ul>
														<li><img src="BookStore/'.$menu_image.'" width="100px"></li>
													</ul>
												</li>
											</ul>
										</li>';}
								?>				
												
											</ul>
										</li>
										<li class='<?php echo($active == "about-us")? 'active':'' ?>' >
											<a href="about-us.php">About Us</a>
										</li>
										<li class='<?php echo($active == "contact")? 'active':'' ?>'>
											<a href="contact.php">Contact Us</a>
										</li>
										<li class=''>
											<a href="Admin/index.php" target="_blank">Control Panel</a>
										</li>
										<li class='dropdown <?php echo($active == "company")? ' active':'' ?>'>
											<a href="#">Company</a>
											<ul class="dropdown-menu">
												<li class=''>
													<a href="Company/index.php" target="_blank">Login</a>
												</li>
												<li class=''>
													<a href="company_register.php" target="_blank">Register</a>
												</li>
											</ul>
										</li>
										
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header> <!-- End of Header -->
			