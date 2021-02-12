<html lang="">
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img alt="image" class="img-responsive" src="images/logo4.png" width="50%">
				</br></br>
				<ul class="contact">
					<li>
						<p><i class="fa fa-phone list-unstyled"></i><span><strong>Phone:</strong> <a>(+962) 788 100 621</a></span></p>
					</li>
					<li>
						<p><i class="fa fa-envelope list-unstyled"></i><span><strong>Email:</strong> <a>mahmoudalkawajah@gmail.com</a></span></p>
					</li>
				</ul>
			</div>
			<div class="col-md-1">
				<h4 class="footer-title"></h4>
				<ul class="list-unstyled page-links links">

				</ul>
			</div>
			<div class="col-md-3">
				<div class="contact-details">
					<h4 class="footer-title">Pages</h4>
					<ul class="list-unstyled page-links links">
						<li><a href="home.php">Home</a></li>
						<li><a href="about-us.php">About Us</a></li>
						<li><a href="categories.php">Categories</a></li>
						<li><a href="contact.php">Contact Us</a></li>
						<li><a href="admin/index.php">Control Panel</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-4">
				<div class="newsletter">
					<h4 class="footer-title text-uppercase">Newsletter</h4>
					<p>Subscribe to our Newsletters to receive exclusive offers and the latest news on our amazing new book.</p>

					<!-- Newsletter Form -->

					<form method="post" action="php/newsletter.php?REF=<?php  echo $ref;?>" class="pad-top-10">
						<div class="form-group">
							<div class="input-group">
								<input class="form-control" placeholder="Email Address" name="NEWSLETTER" id="newsletterEmail" type="text">
								<span class="input-group-btn">
									<button class="btn btn-theme" type="submit"><i class="fa fa-send"></i></button>
									<span class="form-loader">
										<i class="fa fa-spinner fa-spin"></i>
									</span>
								</span>
							</div>
						</div>
					</form><!-- End of Newsletter Form -->

					<!-- Newsletter Response Modal -->


					<p class="spam">*We promise not to spam!</p>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			<div class="row">
				<div class="col-sm-5">
					<p>© Copyright 2021 . All Rights Reserved.</p>
				</div>
				<div class="col-sm-7 visible-sm-block visible-md-block visible-lg-block">

					<ul class="social-icons list-inline list-unstyled si-6-white si-no-border inverse">
						<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
					</ul>

				</div>

			</div>
		</div>
	</div>
</footer>
