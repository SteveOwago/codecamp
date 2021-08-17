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
							<div class="row">
								<div class="col-xl-8 col-sm-8 col-md-8 offset-2">
									<div class="card">
										<div class="card-body">
											<div class="dash-widget-header">
												<span class="dash-widget-icon text-primary bg-primary-light">
												<i class="fa fa-coins"></i>
												</span>
												<div class="dash-count">
													<h3>***</h3>
												</div>
											</div>
											<div class="dash-widget-info bg-warning">
												<p class="text-muted">If you experience problems with payments, please contact: +25470063323 </p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <div class="row">
                        <!-- Recent Orders -->
							<div class="card card-table">
								<div class="card-header">
									<h4 class="card-title">My Courses</h4>
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
                                                    <th>Action</th>
												</tr>
											</thead>
											<tbody>
											<?php
													$sqlcourses = "SELECT * FROM users,courses,course_enroll WHERE courses.id=course_enroll.course_id AND users.id = course_enroll.user_id AND users.email ='$email'";
													$courses = get_data($sqlcourses);
													if(count($courses)>0){
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
														<td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $id; ?>"> <i class="fa fa-coins"></i> Pay </button>
														<div class="modal fade" id="exampleModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<form action="includes/functions.php" method="post" class="form-horizontal">
															<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title" id="exampleModalLabel">Pay: KES <?php echo htmlentities($price); ?>/=</h5>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																			</button>
																		</div>
																	
																		<div class="modal-body">
																			<p>Course: <?php echo htmlentities($name); ?></p>
																			<div class="form-group">
																				<label for="phone">Phone</label>
                                                                                <input type="hidden" name="course_id" value="<?php echo $id;?>">
                                                                                <input type="hidden" name="email" value="<?php echo $email;?>">
																				<input type="hidden" name="amount" value="<?php echo $price;?>">
																				<input type="number" class="form-control" name="phone" placeholder="2547xxxxxxxx">
																			</div>
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
																			<input type="submit" name="submit-payment" class="btn btn-success" value="Submit">
																		</div>
																	
																	</div>
															</div>
														</form></td>
													</tr>
												<?php
														}
													}else{
                                                        echo "No Courses Enrolled!";
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
