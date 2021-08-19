<?php
//session_start();
include ('includes/functions.php');
if(!isset($_SESSION["email"]))
{
header("location:login.php");
}else{
    ?>
   <!DOCTYPE html>
    <html lang="en">
    <?php
        include ('includes/head.php');
       
    ?>

	<body>
    <?php
//        Check if user is Admin
		$email = $_SESSION["email"];
		$userAdmin = isAdmin($email);
		if($userAdmin){
			?>
			<div class="main-wrapper">
            <?php
            include ('includes/header.php');

            include ('includes/admin-sidebar.php');
            ?>


			<!-- Page Wrapper -->
			<div class="page-wrapper">
				<div class="content container-fluid">
					<div class="row">
						<div class="col-lg-4 col-sm-12 col-md-6 offset-3">
							<div class="card">
								<div class="bg-soft-primary">
									<div class="row">
										<div class="col-7">
											<div class="text-primary p-3">
												<h5 class="text-primary">Welcome Back !</h5>
												<p class="mb-3">Innovation Academy Admin Panel</p>
											</div>
										</div>
										<div class="align-self-end col-5"><img src="assets/img/profile-img.png" alt="" class="img-fluid"></div>
									</div>
								</div>
								<div class="pt-0 card-body">
									<div class="row">
										<div class="col-sm-7">
											<div class="avatar-md profile-user mb-4"><img src="assets/img/profiles/avatar.png" alt="" class="img-thumbnail rounded-circle img-fluid"></div>
											<div class="d-block">
												<h5><?php echo htmlentities($_SESSION["email"]);?></h5>
												<p class="text-muted mb-0  text-truncate">Administrator</p>
											</div>
										</div>
										<div class="col-sm-5">
											<div class="pt-4">
												<div class="row">
													<div class="col-6">
														<h5 class="font-size-15"><?php
															$sqlcourses = "SELECT * FROM courses ORDER BY id ASC";
															$courses = get_data($sqlcourses);
															echo count($courses);
														?></h5>
														<p class="text-muted mb-0">Courses</p>
													</div>
													<div class="col-6">
														<h5 class="font-size-15">120+</h5>
														<p class="text-muted mb-0">Sessions</p>
													</div>
												</div>
												<div class="mt-4"><a class="btn btn-primary waves-effect waves-light btn-sm" href="my-courses.php">My Courses <i class="mdi mdi-arrow-right ml-1"></i></a></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-sm-12">
                                <div class="card card-table">
                                    <div class="card-header">
                                        <h4 class="card-title">All Courses List</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                        <table class="table table-hover table-center table-stripped">
                                                <thead>
                                                    <tr>
                                                        <th>#ID</th>
                                                        <th>Course</th>
                                                        <th>Price</th>
                                                        <th>Reviews</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                        $sqlcourses = "SELECT * FROM courses ORDER BY id ASC";
                                                        $courses = get_data($sqlcourses);
                                                        foreach ($courses as $course) {
                                                            $id = $course['id'];
                                                            $name = $course['name'];
                                                            $price = $course['price'];
                                                            ?>
                                                            
                                                            <tr>
                                                        <td>
                                                            <?php echo htmlentities($id);?>
                                                        </td>
                                                        <td><?php echo htmlentities($name);?></td>
                                                        <td>KES <?php echo htmlentities($price);?></td>
                                                        <td>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="far fa-star text-secondary"></i>
                                                        </td>
                                                        <td><a class="btn btn-warning waves-effect waves-light btn-sm" href="enroll.php?course=<?php echo $id;?>">Enroll<i class="mdi mdi-arrow-right ml-1"></i></a></div></td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- /Recent Orders -->
                            </div>
                    </div>
						
				</div>
			</div>
			<!-- /Page Wrapper -->

		</div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
		<script src="assets/js/jquery-3.5.1.min.js"></script>

		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- Slimscroll JS -->
		<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="assets/plugins/raphael/raphael.min.js"></script>
		<script src="assets/plugins/morris/morris.min.js"></script>
			
		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/datatables.min.js"></script>
		

		<!-- Chart JS -->
		<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
		<script src="assets/plugins/apexchart/dsh-apaxcharts.js"></script>

		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
			<?php
	}else{
	?>
		<!-- Main Wrapper -->
		<div class="main-wrapper">
            <?php
            include ('includes/header.php');

            include ('includes/sidebar.php');
            ?>


			<!-- Page Wrapper -->
			<div class="page-wrapper">
				<div class="content container-fluid">
					<div class="row">
						<div class="col-lg-12 col-sm-12 text-center">
							<div class="row">
								<div class="col-xl-6 col-sm-6 col-12 offset-3">
									<div class="card">
										<div class="card-body">
											<div class="dash-widget-header">
												<span class="dash-widget-icon text-danger bg-danger-light">
												<i class="fas fa-user"></i>
												</span>
												<div class="text-center">
													<h3>&emsp; Unauthorised User</h3>
												</div>
											</div>
											<div class="dash-widget-info">
												<h6 class="text-muted"><a href="index.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back Home</a> You are not Authorised to Access this page!</h6>
												<div class="progress progress-sm">
													<div class="progress-bar bg-danger w-100"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Wrapper -->

		</div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
		<script src="assets/js/jquery-3.5.1.min.js"></script>

		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- Slimscroll JS -->
		<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="assets/plugins/raphael/raphael.min.js"></script>
		<script src="assets/plugins/morris/morris.min.js"></script>
			
		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/datatables.min.js"></script>
		

		<!-- Chart JS -->
		<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
		<script src="assets/plugins/apexchart/dsh-apaxcharts.js"></script>

		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
    <?php
        }
    ?>
	</body>
</html>
<?php
}
?>
