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
                        <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span> Products</span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled" style="display: none;">
                        <li>
						<a class='<?php echo($active == "add_product")? 'active':'' ?>'href="add_product.php"> Add Product</a>
						</li>
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
								$query = "SELECT `orders`.*, `products`.*,`orders`.`STATUS` as 'STATUS' FROM `orders`,`products` 
								WHERE `products`.`COMPANY`=$company_id
									AND `orders`.`PRODUCT_ID` = `products`.`ID`
									ORDER BY `orders`.`ID` DESC";
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
					<li class='<?php echo($active == "users")? 'active':'' ?>'>
                        <a href="users.php"><i class="fa fa-user"></i> Users</a>
                    </li>

					
						
                        
                </ul>
            </div>
        </div>
    </div>    