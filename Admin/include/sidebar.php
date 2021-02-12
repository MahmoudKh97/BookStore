<html lang="">
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">Main</li>
                    <li class='<?php echo($active == "dashboard")? 'active':'' ?>'>
                        <a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
					<li class="submenu">
                        <a href="#"><i class="fa fa-th" aria-hidden="true"></i> <span> Category</span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled" style="display: none;">
                        <li>
						<a class='<?php echo($active == "category")? 'active':'' ?>'href="category.php"> Categories</a>
						</li>
                        <li>
						<a class='<?php echo($active == "sub_category")? 'active':'' ?>' href="sub_category.php"> Sub Categories</a>
						</li>
                        </ul>
                    </li>
					<li class="submenu">
                        <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span> Products</span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled" style="display: none;">
                        <!--<li>
						<a class='<?php echo($active == "add_product")? 'active':'' ?>'href="add_product.php"> Add Product</a>
						</li>-->
						<li>
						<a class='<?php echo($active == "modify_product")? 'active':'' ?>'href="modify_product.php"> Modify Product</a>
						</li>
						<li>
						<a class='<?php echo($active == "delete_product")? 'active':'' ?>'href="delete_product.php"> View/Delete Products</a>
						</li>                        
                        </ul>
                    </li>
					<li class='<?php echo($active == "orders")? 'active':'' ?>'>
                        <a href="orders.php"><i class="fa fa-file-text"></i> Orders
							<span class="badge badge-pill bg-primary pull-right">
								<?php
								include("php/connect.php");
								$query = "SELECT * FROM `orders`";
								$result = $link->query($query);
								$counter_order = 0;
								while($array = $result->fetch_array()){
									$counter_order++;
								}
								echo $counter_order;
								?>
								
							</span>
						</a>
                    </li>
					<li class='<?php echo($active == "promocode")? 'active':'' ?>'>
                        <a href="promocode.php"><i class="fa fa-percent"></i> Promo Code</a>
                    </li>
					<li class="menu-title">Relations</li>
					<li class='<?php echo($active == "company")? 'active':'' ?>'>
                        <a href="company.php"><i class="fa fa-building"></i> Companies
							<span class="badge badge-pill bg-primary pull-right">
								<?php
								$query = "SELECT COUNT(`ID`) as 'company' FROM `company` WHERE `STATUS`='accepted'";
								$result = $link->query($query);
								$array = $result->fetch_array();
								echo $array["company"];
								?>
								
							</span>
						</a>
                    </li>
					<li class='<?php echo($active == "users")? 'active':'' ?>'>
                        <a href="users.php"><i class="fa fa-user"></i> Users
							<span class="badge badge-pill bg-primary pull-right">
								<?php
								$query = "SELECT * FROM `user_information`";
								$result = $link->query($query);
								$counter_user = 0;
								while($array = $result->fetch_array()){
									$counter_user++;
								}
								echo $counter_user;
								?>
								
							</span>
						</a>
                    </li>
					<li class="menu-title">Communications</li>
					<li class='<?php echo($active == "email")? 'active':'' ?>'>
                        <a href="email.php"><i class="fa fa-envelope"></i> Email
							<span class="badge badge-pill bg-primary pull-right">
								<?php
								$query = "SELECT * FROM `contact`";
								$result = $link->query($query);
								$counter = 0;
								while($array = $result->fetch_array()){
									$counter++;
								}
								echo $counter;
								?>
								
							</span>
						</a>
                    </li>	
					<li class='<?php echo($active == "news")? 'active':'' ?>'>
                        <a href="news.php"><i class="fa fa-newspaper-o"></i> News</a>
                    </li>
					<li class='<?php echo($active == "newsletter")? 'active':'' ?>'>
                        <a href="newsletter.php"><i class="fa fa-paper-plane"></i> Newsletter</a>
                    </li>
					
					
					
					
						
                        
                </ul>
            </div>
        </div>
    </div>    