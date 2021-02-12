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
<?php $active = "newsletter"; include ("include/sidebar.php");?>
       
        
        <div class="page-wrapper">
            <div class="content container-fluid">
                
                <div class="row">
                    <div class="col-md-8">
						<h4 class="page-title">View Newsletter Emails</h4>
                    </div>
                </div>
			
				
				<div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <div class="card-block">
                                <h4 class="card-title"></h4>
								<div class="table-responsive">
									<table class="table table-hover m-b-0">
										<thead style="background-color:#9b1c31;">
											<tr>
												<th>Num</th>
												<th>Email</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>
											<?php
											include("php/connect.php");
								$counter=0;
							$query = "SELECT * FROM `newsletter`";
							$result = $link->query($query);
							while($array = $result->fetch_array()){
								$email = $array["EMAIL"];
								$id = $array["ID"];
								$counter++;

								echo "<tr>
								<td>$counter</td>
								<td>$email</td>
								<td><a href='php/delete_newsletter.php?id=$id'>
								<i class='fa fa-trash fa-2x'></i></a></td>
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
    <script type="text/javascript" src="assets/js/select2.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
</body>


</html>