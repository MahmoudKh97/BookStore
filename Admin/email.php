<?php
session_start();
if(!isset($_SESSION["ADMIN"] ) ){
	header("Location: index.php");
}else{
	$admin_id = $_SESSION["ADMIN"] ; 
}
?>
<!DOCTYPE html>
<html>
<?php include ("include/head.php");?>

<body>
    <div class="main-wrapper">
<?php include ("include/header.php");?>
<?php $active = "email"; include ("include/sidebar.php");?>

        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Inbox</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            
                            <div class="email-content">
								<div class="table-responsive">
									<table class="table table-inbox table-hover">
										<thead>
											<tr>
												<th>
													<input type="checkbox" class="checkbox-all">
												</th>
											</tr>
										</thead>
										<tbody>
						<?php
						include("php/connect.php");

						$query = "SELECT * FROM `contact`";
							$result = $link->query($query);
							while($array = $result->fetch_array()){
								$email_id = $array["ID"];
								$name = $array["NAME"];
								$email = $array["EMAIL"];
								$subject = $array["SUBJECT"];
								$phone_number = $array["PHONE_NUMBER"];
								$message = $array["MESSAGE"];
								$time = $array["TIME"];

									 echo " <tr class='clickable-row col-md-12 col-sm-12 col-xs-12'  data-href='email_view.php' >
												<td width='10%'>
													<a href='view_message.php'>
													<input type='checkbox' class='checkmail'>
													</a>
												</td>
												<td class='name' width='15%'>$name</td>
												<td class='subject' width='45%'>$subject</br></td>
												<td class='mail-date' width='20%'>$time</td>
												<td width='10%'><a href='email_view.php?ID=$email_id&NAME=$name&EMAIL=$email&SUBJECT=$subject&PHONE_NUMBER=$phone_number&MESSAGE=$message&TIME=$time'>
													<i class='fa fa-eye fa-2x'></i></a>
												</td>
												<td width='10%'><a href='php/delete_email.php?id=$email_id'>
													<i class='fa fa-trash fa-2x'></i></a>
												</td>
											</tr>";
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
    <div class="sidebar-overlay" data-reff=""></div>
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
</body>


<!-- Mirrored from dreamguys.co.in/preadmin/dark/inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Oct 2018 21:49:30 GMT -->
</html>