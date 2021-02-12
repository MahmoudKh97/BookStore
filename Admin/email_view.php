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
<script>
          function printpage() {       
              window.print();
          }
</script>
<body>
    <div class="main-wrapper">
<?php include ("include/header.php");?>
<?php $active = "email"; include ("include/sidebar.php");?>

        <div class="page-wrapper">
		
			<div class="content container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">View Email Message</h4>
						<a href="email.php"><i class="fa fa-home back-icon"></i> Back to Inbox</a>
                    </div>
                </div>
						<?php
							include("php/connect.php");
								$id = $_GET["ID"];
								$name = $_GET["NAME"];
								$email = $_GET["EMAIL"];
								$subject = $_GET["SUBJECT"];
								$phone_number = $_GET["PHONE_NUMBER"];
								$message = $_GET["MESSAGE"];
								$time = $_GET["TIME"];
						?>
				
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="mailview-content">
                                <div class="mailview-header">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="text-ellipsis m-b-10">
                                                <span class="mail-view-title"><?php echo $subject ?></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="mail-view-action">
                                                <button type="button" class="btn btn-white fa-2x" data-toggle="tooltip" title="Delete">
													<a href='php/delete_email.php?id=<?php echo $id?>'>
													<i class="fa fa-trash-o"></i></a></button>
                                                <button type="button" onclick="printpage()" class="btn btn-white fa-2x" data-toggle="tooltip" title="Print">
													<i class="fa fa-print"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sender-info">
                                        <div class="sender-img">
                                            <img width="40" alt="" src="assets/img/user.jpg" class="rounded-circle">
                                        </div>
                                        <div class="receiver-details pull-left">
                                            <span class="sender-name"><?php echo $name . ' (' . $email . ')' ?> </span>
                                            <span class="receiver-name">
												<?php echo $phone_number ?>
                                            </span>
                                        </div>
                                        <div class="mail-sent-time">
                                            <span class="mail-time"><?php echo $time ?></span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="mailview-inner">
                                    <p><?php echo $message ?></p>
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


</html>