<!DOCTYPE html> 
<html lang="en">
<?php
    include ('includes/head.php');
?>


	<body>
		<!-- Main Wrapper -->
		<div class="main-wrapper">
		<?php
								if(isset($_GET['message'])){
									?>
									<div class="alert alert-success text-center">
										<p class="lead">Registration Successfull!</p>
									</div>
								<?php
								}
								?>

                <?php
//                Header Top
                    include ('includes/header-top.php');
//                End Header Top

//                Header-Nav
                    include ('includes/header-nav.php');
//                End Header-Nav
                ?>
			
			<!-- Banner -->
			<section class="banner-section-courses">
				<div class="container">
					<div class="banner-content text-center">
						<div class="banner-heading">
							<h2>ONLINE SKILLSET COURSES</h2>
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
			<!-- Popular Courses -->
			<section class="popular-course-section">
				<div class="container">
					<div class="section-heading d-flex align-items-center">
						<div class="heading-content">
							<h2><span class="text-weight">Our</span> Courses<span class="header-right"></span></h2>
							<p>The Best Online Learning Platform.</p>
						</div> 
					</div>
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-12 d-flex flex-wrap">
							<div class="popular-course">
								<div class="courses-head">
									<div class="courses-img-main">
										<img src="assets/img/course/scratch.jpg" alt="" class="img-fluid w-100">
									</div>
								</div>
								<div class="courses-body">
									<div class="courses-ratings">
										<h4 class="mb-0">Block-Based Coding Scratch</h4>
										<p class="mb-1"><b>Age:</b> 9-12 years</p>
										<div class="section-btn m-auto mt-2">
											<a href="#scratch.php"><button class="btn btn-course">View Course<i class="fas fa-caret-right right-nav-white"></i></button></a>
										</div>
									</div>
								</div>
								<div class="courses-border"></div>
								<div class="courses-footer d-flex align-items-center">
									<div class="courses-count">
										<ul class="mb-0">
											<li><i class="fas fa-user-graduate mr-1"></i> 85</li>
											<li><i class="far fa-file-alt mr-1"> Sessions</i>8</li>
										</ul>
									</div>
									<div class="courses-amt ml-auto">
										<h3 class="mb-0">KES:15,000</h3>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12 d-flex flex-wrap">
							<div class="popular-course">
								<div class="courses-head">
									<div class="courses-img-main">
										<img src="assets/img/course/java.jpg" alt="" class="img-fluid w-100">
									</div>
								</div>
								<div class="courses-body">
									<div class="courses-ratings">
										<h4 class="mb-0">Basic Program Development in Java</h4>
										<p class="mb-1"><b>Age:</b> 13-16 years</p>
										<div class="section-btn m-auto mt-2">
											<a href="#java.php"><button class="btn btn-course">View Course<i class="fas fa-caret-right right-nav-white"></i></button></a> 
										</div>
									</div>
								</div>
								<div class="courses-border"></div>
								<div class="courses-footer d-flex align-items-center">
									<div class="courses-count">
										<ul class="mb-0">
											<li><i class="fas fa-user-graduate mr-1"></i> 85</li>
											<li><i class="far fa-file-alt mr-1"> Sessions</i>12</li>
										</ul>
									</div>
									<div class="courses-amt ml-auto">
										<h3 class="mb-0">KES:15,000</h3>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12 d-flex flex-wrap">
							<div class="popular-course">
								<div class="courses-head">
									<div class="courses-img-main">
										<img src="assets/img/course/python.jpg" alt="" class="img-fluid w-100">
									</div>
								</div>
								<div class="courses-body">
									<div class="courses-ratings">
										<h4 class="mb-0">Basic Program Development in Python</h4>
										<p class="mb-1"><b>Age:</b> 13-16 years</p>
										<div class="section-btn m-auto mt-2">
											<a href="#python.php"><button class="btn btn-course">View Course<i class="fas fa-caret-right right-nav-white"></i></button></a> 
										</div>
									</div>
								</div>
								<div class="courses-border"></div>
								<div class="courses-footer d-flex align-items-center">
									<div class="courses-count">
										<ul class="mb-0">
											<li><i class="fas fa-user-graduate mr-1"></i> 85</li>
											<li><i class="far fa-file-alt mr-1"> Sessions</i>10</li>
										</ul>
									</div>
									<div class="courses-amt ml-auto">
										<h3 class="mb-0">KES:20,000</h3>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12 d-flex flex-wrap">
							<div class="popular-course">
								<div class="courses-head">
									<div class="courses-img-main">
										<img src="assets/img/course/blender.jpg" alt="" class="img-fluid w-100">
									</div>
								</div>
								<div class="courses-body">
									<div class="courses-ratings">
										<h4 class="mb-0">Creative Design in Blender</h4>
										<p class="mb-1"><b>Age:</b> 13-16 years</p>
										<div class="section-btn m-auto mt-2">
											<a href="#blender.php"><button class="btn btn-course">View Course<i class="fas fa-caret-right right-nav-white"></i></button></a>
										</div>
									</div>
								</div>
								<div class="courses-border"></div>
								<div class="courses-footer d-flex align-items-center">
									<div class="courses-count">
										<ul class="mb-0">
											<li><i class="fas fa-user-graduate mr-1"></i> 85</li>
											<li><i class="far fa-file-alt mr-1"> Sessions</i>8</li>
										</ul>
									</div>
									<div class="courses-amt ml-auto">
										<h3 class="mb-0">KES:10,000</h3>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12 d-flex flex-wrap">
							<div class="popular-course">
								<div class="courses-head">
									<div class="courses-img-main">
										<img src="assets/img/course/robox.jpg" alt="" class="img-fluid w-100">
									</div>
								</div>
								<div class="courses-body">
									<div class="courses-ratings">
										<h4 class="mb-0">Basic Game Development in Roblox</h4>
										<p class="mb-1"><b>Age:</b> 9-13 years</p>
										<div class="section-btn m-auto mt-2">
											<a href="#roblox.php"><button class="btn btn-course">View Course<i class="fas fa-caret-right right-nav-white"></i></button></a> 
										</div>
									</div>
								</div>
								<div class="courses-border"></div>
								<div class="courses-footer d-flex align-items-center">
									<div class="courses-count">
										<ul class="mb-0">
											<li><i class="fas fa-user-graduate mr-1"></i> 85</li>
											<li><i class="far fa-file-alt mr-1"> Sessions</i>7</li>
										</ul>
									</div>
									<div class="courses-amt ml-auto">
										<h3 class="mb-0">KES:15,000</h3>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12 d-flex flex-wrap">
							<div class="popular-course">
								<div class="courses-head">
									<div class="courses-img-main">
										<img src="assets/img/course/javascript.jpg" alt="" class="img-fluid w-100">
									</div>
								</div>
								<div class="courses-body">
									<div class="courses-ratings">
										<h4 class="mb-0">Basic Web Development in JavaScript</h4>
										<p class="mb-1"><b>Age:</b> 13-16 years</p>
										<div class="section-btn m-auto mt-2">
											<a href="#javascript.php"><button class="btn btn-course">View Course<i class="fas fa-caret-right right-nav-white"></i></button></a> 
										</div>
									</div>
								</div>
								<div class="courses-border"></div>
								<div class="courses-footer d-flex align-items-center">
									<div class="courses-count">
										<ul class="mb-0">
											<li><i class="fas fa-user-graduate mr-1"></i> 85</li>
											<li><i class="far fa-file-alt mr-1"> Sessions</i>10</li>
										</ul>
									</div>
									<div class="courses-amt ml-auto">
										<h3 class="mb-0">KES:15,000</h3>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12 d-flex flex-wrap">
							<div class="popular-course">
								<div class="courses-head">
									<div class="courses-img-main">
										<img src="assets/img/course/autodesk.jpg" alt="" class="img-fluid w-100">
									</div>
								</div>
								<div class="courses-body">
									<div class="courses-ratings">
										<h4 class="mb-0">3D Creative Design in Maya</h4>
										<p class="mb-1"><b>Age:</b> 13-16 years</p>
										<div class="section-btn m-auto mt-2">
											<a href="#maya.php"><button class="btn btn-course">View Course<i class="fas fa-caret-right right-nav-white"></i></button></a>
										</div>
									</div>
								</div>
								<div class="courses-border"></div>
								<div class="courses-footer d-flex align-items-center">
									<div class="courses-count">
										<ul class="mb-0">
											<li><i class="fas fa-user-graduate mr-1"></i> 85</li>
											<li><i class="far fa-file-alt mr-1"> Sessions</i>10</li>
										</ul>
									</div>
									<div class="courses-amt ml-auto">
										<h3 class="mb-0">KES:25,000</h3>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12 d-flex flex-wrap">
							<div class="popular-course">
								<div class="courses-head">
									<div class="courses-img-main">
										<img src="assets/img/course/adobe-premiere.jpg" alt="" class="img-fluid w-100">
									</div>
								</div>
								<div class="courses-body">
									<div class="courses-ratings">
										<h4 class="mb-0">Basic Video Editing and Art in Adobe Premiere</h4>
										<p class="mb-1"><b>Age:</b> 9-14 years</p>
										<div class="section-btn m-auto mt-2">
											<a href="#priemere.php"><button class="btn btn-course">View Course<i class="fas fa-caret-right right-nav-white"></i></button></a>
										</div>
									</div>
								</div>
								<div class="courses-border"></div>
								<div class="courses-footer d-flex align-items-center">
									<div class="courses-count">
										<ul class="mb-0">
											<li><i class="fas fa-user-graduate mr-1"></i> 85</li>
											<li><i class="far fa-file-alt mr-1"> Sessions</i>5</li>
										</ul>
									</div>
									<div class="courses-amt ml-auto">
										<h3 class="mb-0">KES:15,000</h3>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12 d-flex flex-wrap">
							<div class="popular-course">
								<div class="courses-head">
									<div class="courses-img-main">
										<img src="assets/img/course/3d-printing.jpg" alt="" class="img-fluid w-100">
									</div>
								</div>
								<div class="courses-body">
									<div class="courses-ratings">
										<h4 class="mb-0">3D Modelling and Printing with Autodesk</h4>
										<p class="mb-1"><b>Age:</b> 9-14 years</p>
										<div class="section-btn m-auto mt-2">
											<a href="#3d-printing.php"><button class="btn btn-course">View Course<i class="fas fa-caret-right right-nav-white"></i></button></a> 
										</div>
									</div>
								</div>
								<div class="courses-border"></div>
								<div class="courses-footer d-flex align-items-center">
									<div class="courses-count">
										<ul class="mb-0">
											<li><i class="fas fa-user-graduate mr-1"></i> 85</li>
											<li><i class="far fa-file-alt mr-1"> Sessions</i>5</li>
										</ul>
									</div>
									<div class="courses-amt ml-auto">
										<h3 class="mb-0">KES:15,000</h3>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12 d-flex flex-wrap">
							<div class="popular-course">
								<div class="courses-head">
									<div class="courses-img-main">
										<img src="assets/img/course/minecraft.jpg" alt="" class="img-fluid w-100">
									</div>
								</div>
								<div class="courses-body">
									<div class="courses-ratings">
										<h4 class="mb-0">Video Game Dev with Minecraft</h4>
										<p class="mb-1"><b>Age:</b> 8+ years</p>
										<div class="section-btn m-auto mt-2">
											<a href="#minecraft.php"><button class="btn btn-course">View Course<i class="fas fa-caret-right right-nav-white"></i></button></a> 
										</div>
									</div>
								</div>
								<div class="courses-border"></div>
								<div class="courses-footer d-flex align-items-center">
									<div class="courses-count">
										<ul class="mb-0">
											<li><i class="fas fa-user-graduate mr-1"></i> 85</li>
											<li><i class="far fa-file-alt mr-1"> Sessions</i>5</li>
										</ul>
									</div>
									<div class="courses-amt ml-auto">
										<h3 class="mb-0">KES:12,000</h3>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12 d-flex flex-wrap">
							<div class="popular-course">
								<div class="courses-head">
									<div class="courses-img-main">
										<img src="assets/img/course/unity.jpg" alt="" class="img-fluid w-100">
									</div>
								</div>
								<div class="courses-body">
									<div class="courses-ratings">
										<h4 class="mb-0">Game Development with Unity</h4>
										<p class="mb-1"><b>Age:</b> 9-14 years</p>
										<div class="section-btn m-auto mt-2">
											<a href="#unity.php"><button class="btn btn-course">View Course<i class="fas fa-caret-right right-nav-white"></i></button></a> 
										</div>
									</div>
								</div>
								<div class="courses-border"></div>
								<div class="courses-footer d-flex align-items-center">
									<div class="courses-count">
										<ul class="mb-0">
											<li><i class="fas fa-user-graduate mr-1"></i> 85</li>
											<li><i class="far fa-file-alt mr-1"> Sessions</i>5</li>
										</ul>
									</div>
									<div class="courses-amt ml-auto">
										<h3 class="mb-0">KES:18,000</h3>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12 d-flex flex-wrap">
							<div class="popular-course">
								<div class="courses-head">
									<div class="courses-img-main">
										<img src="assets/img/course/c++.jpg" alt="" class="img-fluid w-100">
									</div>
								</div>
								<div class="courses-body">
									<div class="courses-ratings">
										<h4 class="mb-0">Programming & App Development in C++</h4>
										<p class="mb-1"><b>Age:</b> 9-14 years</p>
										<div class="section-btn m-auto mt-2">
											<a href="#c++.php"> <button class="btn btn-course">View Course<i class="fas fa-caret-right right-nav-white"></i></button></a>
										</div>
									</div>
								</div>
								<div class="courses-border"></div>
								<div class="courses-footer d-flex align-items-center">
									<div class="courses-count">
										<ul class="mb-0">
											<li><i class="fas fa-user-graduate mr-1"></i> 85</li>
											<li><i class="far fa-file-alt mr-1"> Sessions</i>5</li>
										</ul>
									</div>
									<div class="courses-amt ml-auto">
										<h3 class="mb-0">KES:15,000</h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Popular Courses -->
			
			
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