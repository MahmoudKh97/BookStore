<!DOCTYPE html>
<html>
<?php include ("include/head.php");?>

<body style="background-image: url(assets/img/catx5.jpg); background-repeat: no-repeat; background-size: cover; background-attachment: fixed; opacity: 0.9; ">
    <div class="main-wrapper">
        <div class="account-page">
            <div class="container">
                <h2 class="account-title text-center">Admin Dashboard</h2>
                <div class="account-box">
                    <div class="account-wrapper">
                        <div class="account-logo">
                            <a href="index.php"><img src="assets/img/logo4.png" alt="Preadmin"></a>
                        </div>
                        <form action="php/login.php" method="POST">
                            <div class="form-group form-focus">
                                <label class="focus-label">Email</label>
                                <input class="form-control floating" type="email" name="EMAIL">
                            </div>
                            <div class="form-group form-focus">
                                <label class="focus-label">Password</label>
                                <input class="form-control floating" type="password" name="PASSWORD">
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-danger btn-block account-btn" type="submit">Login</button>
                            </div>
                            <!--<div class="text-center">
                                <a href="forgot-password.html">Forgot your password?</a>
                            </div>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
</body>


</html>