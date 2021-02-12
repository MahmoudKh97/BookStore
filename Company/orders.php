<?php
session_start();
if(!isset($_SESSION["COMPANY"] ) ){
	header("Location: index.php");
}else{
	$company_id = $_SESSION["COMPANY"] ; 
}
?>
<!DOCTYPE html>
<html>
<?php include ("include/head.php");?>

<body>
    <div class="main-wrapper">
<?php include ("include/header.php");?>
<?php $active = "orders"; include ("include/sidebar.php");?>

        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Orders</h4>
                    </div>
                </div>
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
                                        <th>Customer</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
						<?php
						include("php/connect.php");

						$query = "SELECT `orders`.*, `products`.*,`orders`.`STATUS` as 'STATUS' FROM `orders`,`products` 
								WHERE `products`.`COMPANY`=$company_id
									AND `orders`.`PRODUCT_ID` = `products`.`ID`
									 ORDER BY `orders`.`ID` DESC";
							$result = $link->query($query);
							while($array = $result->fetch_array()){
								$order_id = $array["ORDER_ID"];
								$user_id = $array["USER_ID"];
								$product_id = $array["PRODUCT_ID"];
								$quantity = $array["QUANTITY"];
								$amount = $array["AMOUNT"];
								$discount_percentage = $array["DISCOUNT_PERCENTAGE"];
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
                                        <td><a href="users.php?user_id='.$user_id.'">'.$user_id.'</a></td>
                                        <td>'.$quantity.'</td>
										<td><p class="price-sup"><sup>JOD</sup>'.$amount.'</p></td>
										<td>'.$discount_percentage.'%</td>';
                                        
										if($status == 'pending'){
											echo'
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
										';}else{
										if($status == 'shipped'){
											echo'
										<td>
											<span class="badge badge-info-border">Shipped</span>
										</td>
										';}else if($status == 'rejected'){
											echo'
										<td>
											<span class="badge badge-danger-border">Rejected</span>
										</td>
										';}else if($status == 'delivered'){
										echo'
										<td>
											<span class="badge badge-success-border">Delivered</span>
										</td>
										';}
										echo'
										<td></td>
										';
										}
								echo' 
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
    <div class="sidebar-overlay" data-reff=""></div>
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
</body>


<!-- Mirrored from dreamguys.co.in/preadmin/dark/inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Oct 2018 21:49:30 GMT -->
</html>