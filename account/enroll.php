<?php
session_start();
if(!isset($_SESSION["email"]))
{
header("location:login.php");
}else{
    ?>
   <!DOCTYPE html>
<html lang="en">
<?php
    include ('includes/head.php');
    include ('includes/functions.php');
?>

	<body>

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
						<div class="col-lg-4 col-sm-12">
							<div class="card">
								<div class="bg-soft-primary">
									<div class="row">
										<div class="col-7">
											<div class="text-primary p-3">
												<h5 class="text-primary">Welcome Back !</h5>
												<p class="mb-3">Innovation Academy Acount Panel</p>
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
												<h5><?php 
                                                $email= $_SESSION["email"];
                                                echo htmlentities($email);?></h5>
												<p class="text-muted mb-0  text-truncate">Student</p>
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
						<div class="col-lg-8 col-sm-12">
							<div class="row">
								<div class="col-xl-4 col-sm-6 col-12">
									<div class="card">
										<div class="card-body">
											<div class="dash-widget-header">
												<span class="dash-widget-icon text-primary bg-primary-light">
												<i class="fas fa-user"></i>
												</span>
												<div class="dash-count">
													<h3>168</h3>
												</div>
											</div>
											<div class="dash-widget-info">
												<h6 class="text-muted">Members</h6>
												<div class="progress progress-sm">
													<div class="progress-bar bg-primary w-50"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-sm-6 col-12">
									<div class="card">
										<div class="card-body">
											<div class="dash-widget-header">
												<span class="dash-widget-icon text-success bg-success-light">
												<i class="fas fa-credit-card"></i>
												</span>
												<div class="dash-count">
													<h3>487</h3>
												</div>
											</div>
											<div class="dash-widget-info">
												<h6 class="text-muted">Appointments</h6>
												<div class="progress progress-sm">
													<div class="progress-bar bg-success w-50"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-sm-6 col-12">
									<div class="card">
										<div class="card-body">
											<div class="dash-widget-header">
												<span class="dash-widget-icon text-warning bg-warning-light">
												<i class="fas fa-star"></i>
												</span>
												<div class="dash-count">
													<h3>485</h3>
												</div>
											</div>
											<div class="dash-widget-info">
												<h6 class="text-muted">Progress Points</h6>
												<div class="progress progress-sm">
													<div class="progress-bar bg-warning w-50"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Recent Orders -->
                            <?php
                                if(isset($_GET['course'])){
                                    $id = $_GET['course'];
                                
                                    $sqlcourse = "SELECT * FROM courses WHERE id=".$id;
									$courses = get_data($sqlcourse);
                                    foreach ($courses as $course) {
                                        $id = $course['id'];
                                        $name = $course['name'];
                                        $price = $course['price'];
                                        ?>
                               
                                        <div class="card card-table">
                                            <div class="card-header">
                                                <h4 class="card-title">Enroll for <?php echo htmlentities($name);?></h4>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <div class="col-md-6 offset-3">
                                                        <div class="table-responsive">
                                                            <table class="table table-stripped">
                                                            <tr>
                                                                <th>Course</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                            <tbody>
                                                                <tr>
                                                                    <td><?php echo htmlentities($name);?></td>
                                                                    <td>KES: <?php echo htmlentities($price);?></td>
                                                                </tr>
                                                            </tbody>
                                                            </table> 
                                                        </div>
                                                        <div class="text-center mt-4 mb-4">
                                                            <form method="post" action="includes/functions.php">
                                                                <input type="hidden" name="course_id" value="<?php echo htmlentities($id);?>">
                                                                <input type="hidden" name="user_id" value="<?php 
                                                                    $sqluser = "SELECT * FROM users WHERE email='$email'";
                                                                    $user = get_data($sqluser);
                                                                    foreach ($user as $usr) {
                                                                        $user_id = $usr['id'];
                                                                        echo htmlentities($user_id);
                                                                    }
                                                                ?>">
                                                                <button type="submit" name="enroll-course" class="btn btn-success"> <i class="fa fa-graduation-cap"></i> Enroll</button>
                                                            </form>
                                                        </div>       
                                                    </div>
                                            </div>
                                    
                                            </div>
                                            
                                        </div>
                                        <?php
                                    }
                                }
                             ?>
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
	</body>
</html>
<?php
}
?>
