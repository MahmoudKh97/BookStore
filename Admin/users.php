<?php
session_start();
if(!isset($_SESSION["ADMIN"] ) ){
	header("Location: index.php");
}else{
	$admin_id = $_SESSION["ADMIN"] ; 
}
include("php/connect.php");
?>
<!DOCTYPE html>
<html>
<?php include ("include/head.php");?>

<body>
    <div class="main-wrapper">
<?php include ("include/header.php");?>
<?php $active = "users"; include ("include/sidebar.php");?>

        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">User Profile</h4>
                    </div>
                </div>
				
				<div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h4 class="card-title"></h4>
							<form action="" method="post">
								<div class="form-group row">
									<div class="col-md-12">
										<select name="USER_ID" class="form-control">
											<option disabled select selected hidden >Select User</option>';
									<?php
									
									$query = "SELECT * FROM `user_information` ORDER BY `ID` DESC";
									$result = $link->query($query);
									while($array = $result->fetch_array() ){
										$name_select = $array["NAME"];
										$user_id_select = $array["ID"];
										echo "<option value='$user_id_select'>$name_select</option>";
									}
									?>
										</select>
									</div>
								</div>
								<div class="text-center">
									<button type="submit" class="btn btn-primary">View Profile</button>
								</div>
							</form>
						</div>
                    </div>
                </div>
				
				<?php
				if(isset($_POST["USER_ID"]) || isset($_GET["user_id"]) ){
					if(isset($_POST["USER_ID"]))
					{
						$user_id = $_POST["USER_ID"];
					}
					else
					{
						$user_id = $_GET["user_id"];
					}
					$query = "SELECT * FROM `user_information` WHERE `ID`=$user_id";
					$result = $link->query($query);
					$array = $result->fetch_array();
					$name = $array["NAME"];
					$email = $array["EMAIL"];
					$phone_number = $array["PHONE_NUMBER"];
					$gender = $array["GENDER"];
					$country = $array["COUNTRY"];
					$city = $array["CITY"];
					$address = $array["ADDRESS"];
					$zip_code = $array["ZIP_CODE"];
					echo '
				<div class="card-box m-b-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
								
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="profile-info-left">
												<h5 class="user-name m-t-30 m-b-0">User Name:</h5>
                                                <h3 class=" m-t-10">'.$name.'</h3>
                                                <div class="staff-id">User ID : #'.$user_id.'</div>
												<small class="text-muted">Gender: '.$gender.'</small>
											</div>
                                        </div>
                                        <div class="col-md-9">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text"><a href="#">'.$phone_number.'</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><a href="#">'.$email.'</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Address:</span>
                                                    <span class="text">'.$address.'</span>
                                                </li>
                                                <li>
                                                    <span class="title">Country</span>
                                                    <span class="text">'.$country.'</span>
                                                </li>
												<li>
                                                    <span class="title">City</span>
                                                    <span class="text">'.$city.'</span>
                                                </li>
												<li>
                                                    <span class="title">Zip Code</span>
                                                    <span class="text">'.$zip_code.'</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
				
				?>
				
		<div class="card-box tab-box">
            <div class="row user-tabs">
                <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="nav-item col-sm-3"><a class="nav-link active" data-toggle="tab" href="#pending">Pending Orders</a></li>
						<li class="nav-item col-sm-3"><a class="nav-link" data-toggle="tab" href="#others">Others</a></li>
                    </ul>
                </div>
            </div>
        </div>
		<div class="row">
        <div class="col-lg-12">
		<div class="tab-content  profile-tab-content">
		
            <div id="pending" class="tab-pane fade show active">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
							<div class="table-responsive">
								<table class="table table-inbox m-b-0">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Order Id</th>
                                        <th>Order Date</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
						<?php

						$query = "SELECT * FROM `orders` WHERE `USER_ID`=$user_id AND `STATUS`='pending' ORDER BY `ID` DESC";
							$result = $link->query($query);
							while($array = $result->fetch_array()){
								$order_id = $array["ORDER_ID"];
								$product_id = $array["PRODUCT_ID"];
								$quantity = $array["QUANTITY"];
								$amount = $array["AMOUNT"];
								$time = $array["TIME"];
								$status = $array["STATUS"];
								$query1 = "SELECT * FROM `products`	WHERE `ID`=$product_id";
								$result1 = $link->query($query1);
								$array1 = $result1->fetch_array();
								$name = $array1["NAME"];
								$price = $array1["PRICE"];
								echo'
                                    <tr>
                                        <td>
                                            <div class="product-det">
                                                <h2><a href="../single-product.php?product_id='.$product_id.'">#'.$product_id.' : '.$name.'</a> <span>JOD '.$price.'</span></h2>
                                            </div>
                                        </td>
                                        <td><a href="#">#'.$order_id.'</a></td>
                                        <td>'.$time.'</td>
                                        <td>'.$quantity.'</td>
                                        <td>
                                            <p class="price-sup"><sup>JOD</sup>'.$amount.'</p>
                                        </td>
										<td>
											<span class="badge badge-warning-border">Pending</span>
										</td>
										<td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" 
														href="php/orders.php?action=shipped&product_id='.$product_id.'&order_id='.$order_id.'&user_id='.$user_id.'">
														<i class="fa fa-pencil m-r-5"></i>Shipped
													</a>
                                                    <a class="dropdown-item" 
														href="php/orders.php?action=rejected&product_id='.$product_id.'&order_id='.$order_id.'&user_id='.$user_id.'">
														<i class="fa fa-trash-o m-r-5"></i>Rejected
													</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>';
							}
						?>
                                </tbody>
								</table>			
							</div>
                        </div>
                    </div>
                </div>			
            </div>
			
			
			
			
			<div id="others" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
							<div class="table-responsive">
								<table class="table table-inbox m-b-0">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Order Id</th>
                                        <th>Order Date</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
						<?php

						$query = "SELECT * FROM `orders` WHERE `USER_ID`=$user_id AND `STATUS`!='pending' ORDER BY `ID` DESC";
							$result = $link->query($query);
							while($array = $result->fetch_array()){
								$order_id = $array["ORDER_ID"];
								$product_id = $array["PRODUCT_ID"];
								$quantity = $array["QUANTITY"];
								$amount = $array["AMOUNT"];
								$time = $array["TIME"];
								$status = $array["STATUS"];
								$query1 = "SELECT * FROM `products`	WHERE `ID`=$product_id";
								$result1 = $link->query($query1);
								$array1 = $result1->fetch_array();
								$name = $array1["NAME"];
								$price = $array1["PRICE"];
								echo'
                                    <tr>
                                        <td>
                                            <div class="product-det">
                                                <h2><a href="../single-product.php?product_id='.$product_id.'">#'.$product_id.' : '.$name.'</a> <span>JOD '.$price.'</span></h2>
                                            </div>
                                        </td>
                                        <td><a href="#">#'.$order_id.'</a></td>
                                        <td>'.$time.'</td>
                                        <td>'.$quantity.'</td>
                                        <td>
                                            <p class="price-sup"><sup>JOD</sup>'.$amount.'</p>
                                        </td>
										<td>';
										if($status == 'shipped'){
											echo'
											<span class="badge badge-info-border">Shipped</span>
										';}else if($status == 'rejected'){
											echo'
											<span class="badge badge-danger-border">Rejected</span>
										';}else if($status == 'delivered'){
										echo'
											<span class="badge badge-success-border">Delivered</span>
										';}
										echo'
										</td>
                                    </tr>';
							}
						?>
                                </tbody>
								</table>			
							</div>
                        </div>
                    </div>
                </div>			
            </div>
			
			
			
			
			
        </div>
        </div>
        </div>
				
				
				
				
			<?php
			}
		
			?>	
				
				
				
				
				
				
                
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
</body>


<!-- Mirrored from dreamguys.co.in/preadmin/dark/inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Oct 2018 21:49:30 GMT -->
</html>