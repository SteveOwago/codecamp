<!DOCTYPE html> 
<html lang="en">
<?php
    include ('includes/head.php');
?>

	<body>
		<!-- Main Wrapper -->
		<div class="main-wrapper">
		

                <?php
//                Header Top
                    include ('includes/header-top.php');
//                End Header Top

//                Header-Nav
                    include ('includes/header-nav.php');
//                End Header-Nav
                ?>
			
			<!-- Banner -->
			<section class="banner-section">
				<div class="container">
					<div class="banner-content text-center">
						<div class="banner-heading">
							<h2>INNOVATION ACADEMY</h2>
							<p>Shape Your Future Learning New Skills</p>
						</div>
						<!-- <div class="banner-forms">
							<form class="banner-form" action="https://mentoring-html.dreamguystech.com/template-1/search.html">
								<div class="input-group-form form-style form-br col-md-3 col-12"> <i class="fas fa-map-marker-alt text-warning"></i>
									<input class="input-style-form" type="text" placeholder="Search Location" name="going">
								</div>
								<div class="input-group-form form-style col-md-6 col-12"> 
									<input class="input-style-form" type="text" placeholder="Search School, Online eductional centers, etc" name="going">
								</div>
								<button class="btn button-form col-md-3 col-12" type="submit">Search Now</button>
							</form>
						</div> -->
					</div>
					<div class="banner-footer">
						<div class="banner-details">
							<div>
								<div class="banner-card d-flex align-items-center">
									<div class="banner-count">
										<h2>10</h2>
									</div>
									<div class="banner-contents">
										<h2>Private Sessions</h2>
										<a href="#">See all Sessions<i class="fas fa-caret-right right-nav-white"></i></a>
									</div>
								</div>
							</div>
							<div>
								<div class="banner-card d-flex align-items-center">
									<div class="banner-count">
										<h2>5</h2>
									</div>
									<div class="banner-contents">
										<h2>Coding Courses</h2>
										<a href="#">See all Courses <i class="fas fa-caret-right right-nav-white"></i></a>
									</div>
								</div>
							</div>
							<div>
								<div class="banner-card d-flex align-items-center">
									<div class="banner-count">
										<h2>5</h2>
									</div>
									<div class="banner-contents">
										<h2>Project-Based Learning</h2>
										<a href="#">Contact us <i class="fas fa-caret-right right-nav-white"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Banner -->
			
			<!-- All Courses -->
			 <!--Contact Page Start-->
             <section class="contact-page">
            <div class="container">
           
                <div class="block-title text-center">
                    <h4>Have Quesitons?</h4>
                    <h2>Send Us a Message</h2>
                </div>   
            
                <div class="row">
                    <div class="col-xl-8">
                        <div class="contact-form">
                            <form method="POST" action="includes/functions.php" class="form-horizontal">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Your name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email address" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Phone number" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Subject" name="subject">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group">
                                            <textarea type="text" name="message" rows="10" class="form-control" placeholder="Write message"></textarea>
                                        </div>
                                        <div class="form-group">
                                        <button type="submit" name="contactUs" class="btn btn-primary">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="contact-page__info-box-address">
                                <h4 class="contact-page__info-box-tilte">Address</h4>
                                <p class="contact-page__info-box-address-text"> <address>
                                    iEARN Africa Institute <br>
                                    Ngara Road, Ngara West <br> Nairobi KE
                                </address> </p>
                            </div>
                            <div class="contact-page__info-box-phone">
                                <h4 class="contact-page__info-box-tilte">Phone</h4>
                                <p class="contact-page__info-box-phone-number">
                                    <a href="tel:+254700063323">Local: +254700063323</a> <br>
                                    <a href="tel:+254754550620">Mobile: +254754550620</a>
                                </p>
                            </div>
                            <div class="contact-page__info-box-email">
                                <h4 class="contact-page__info-box-tilte">Email</h4>
                                <p class="contact-page__info-box-email-address">
                                    <a href="mailto:programs@iearn.africa">programs@iearn.africa</a>
                                </p>
                            </div>
                            <div class="contact-page__info-box-follow">
                                <h4 class="contact-page__info-box-tilte">Follow</h4>
                                <div class="contact-page__info-box-follow-social">
                                    <a href="https://twitter.com/IearnKenya" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.facebook.com/iearnKE" target="_blank" class="clr-fb"><i class="fab fa-facebook-square"></i></a>
                                    <a href="#" class="clr-dri"><i class="fab fa-dribbble"></i></a>
                                    <a href="https://www.instagram.com/iearn.kenya/" target="_blank"  class="clr-ins"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

			
			<?php
			include 'includes/footer.php';
			?>
			
		</div>
		<!-- /Main Wrapper -->
		
		<?php
			include 'includes/scripts.php'
		?>
		
	</body>


</html>