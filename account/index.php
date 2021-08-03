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
												<p class="mb-3">Mentoring Panel</p>
											</div>
										</div>
										<div class="align-self-end col-5"><img src="assets/img/profile-img.png" alt="" class="img-fluid"></div>
									</div>
								</div>
								<div class="pt-0 card-body">
									<div class="row">
										<div class="col-sm-6">
											<div class="avatar-md profile-user mb-4"><img src="assets/img/profiles/avatar-05.jpg" alt="" class="img-thumbnail rounded-circle img-fluid"></div>
											<div class="d-block">
												<h5><?php echo htmlentities($_SESSION["email"]);?></h5>
												<p class="text-muted mb-0  text-truncate">Administrator</p>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="pt-4">
												<div class="row">
													<div class="col-6">
														<h5 class="font-size-15">12</h5>
														<p class="text-muted mb-0">Meetings</p>
													</div>
													<div class="col-6">
														<h5 class="font-size-15">$1245</h5>
														<p class="text-muted mb-0">Revenue</p>
													</div>
												</div>
												<div class="mt-4"><a class="btn btn-primary waves-effect waves-light btn-sm" href="profile.html">View Profile <i class="mdi mdi-arrow-right ml-1"></i></a></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card flex-fill">
								<div class="card-header">
									<div class="d-flex justify-content-between align-items-center">
										<h5 class="card-title">Invoice Analytics</h5>
										<div class="dropdown" data-toggle="dropdown">
											<a href="javascript:void(0);" class="btn btn-white btn-sm dropdown-toggle" role="button" data-toggle="dropdown">
											Monthly
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a href="javascript:void(0);" class="dropdown-item">Weekly</a>
												<a href="javascript:void(0);" class="dropdown-item">Monthly</a>
												<a href="javascript:void(0);" class="dropdown-item">Yearly</a>
											</div>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div id="invoice_chart"></div>
									<div class="text-center text-muted">
										<div class="row">
											<div class="col-4">
												<div class="mt-4">
													<p class="mb-2 text-truncate"><i class="fas fa-circle text-primary mr-1"></i> Invoiced</p>
													<h5>$ 2,132</h5>
												</div>
											</div>
											<div class="col-4">
												<div class="mt-4">
													<p class="mb-2 text-truncate"><i class="fas fa-circle text-success mr-1"></i> Received</p>
													<h5>$ 1,763</h5>
												</div>
											</div>
											<div class="col-4">
												<div class="mt-4">
													<p class="mb-2 text-truncate"><i class="fas fa-circle text-danger mr-1"></i> Pending</p>
													<h5>$ 973</h5>
												</div>
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
												<h6 class="text-muted">Mentoring Points</h6>
												<div class="progress progress-sm">
													<div class="progress-bar bg-warning w-50"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card flex-fill">
								<div class="card-header">
									<div class="d-flex justify-content-between align-items-center">
										<h5 class="card-title">Sales Analytics</h5>
										<div class="dropdown" data-toggle="dropdown">
											<a href="javascript:void(0);" class="btn btn-white btn-sm dropdown-toggle" role="button" data-toggle="dropdown">
											Monthly
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a href="javascript:void(0);" class="dropdown-item">Weekly</a>
												<a href="javascript:void(0);" class="dropdown-item">Monthly</a>
												<a href="javascript:void(0);" class="dropdown-item">Yearly</a>
											</div>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="d-flex align-items-center justify-content-between flex-wrap flex-md-nowrap">
										<div class="w-md-100 d-flex align-items-center mb-3 chart-content">
											<div>
												<span>Total Sales</span>
												<p class="h3 text-primary mr-5">$1000</p>
											</div>
											<div>
												<span>Receipts</span>
												<p class="h3 text-success mr-5">$1000</p>
											</div>
											<div>
												<span>Expenses</span>
												<p class="h3 text-danger mr-5">$300</p>
											</div>
											<div>
												<span>Earnings</span>
												<p class="h3 text-dark mr-5">$700</p>
											</div>
										</div>
									</div>
									<div id="sales_chart"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 d-flex">

							<!-- Recent Orders -->
							<div class="card card-table flex-fill">
								<div class="card-header">
									<h4 class="card-title">Mentor List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Mentor Name</th>
													<th>Course</th>
													<th>Earned</th>
													<th>Reviews</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-08.jpg" alt="User Image"></a>
															<a href="profile.html">James Amen</a>
														</h2>
													</td>
													<td>Maths</td>
													<td>$3200.00</td>
													<td>
														<i class="fas fa-star text-warning"></i>
														<i class="fas fa-star text-warning"></i>
														<i class="fas fa-star text-warning"></i>
														<i class="fas fa-star text-warning"></i>
														<i class="far fa-star text-secondary"></i>
													</td>
												</tr>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-07.jpg" alt="User Image"></a>
															<a href="profile.html">Jessica Fogarty</a>
														</h2>
													</td>
													<td>Business Maths</td>
													<td>$3100.00</td>
													<td>
														<i class="fas fa-star text-warning"></i>
														<i class="fas fa-star text-warning"></i>
														<i class="fas fa-star text-warning"></i>
														<i class="fas fa-star text-warning"></i>
														<i class="far fa-star text-secondary"></i>
													</td>
												</tr>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-17.jpg" alt="User Image"></a>
															<a href="profile.html">Jose Anderson</a>
														</h2>
													</td>
													<td>Algebra</td>
													<td>$4000.00</td>
													<td>
														<i class="fas fa-star text-warning"></i>
														<i class="fas fa-star text-warning"></i>
														<i class="fas fa-star text-warning"></i>
														<i class="fas fa-star text-warning"></i>
														<i class="far fa-star text-secondary"></i>
													</td>
												</tr>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-06.jpg" alt="User Image"></a>
															<a href="profile.html">Sofia Brient</a>
														</h2>
													</td>
													<td>Integrated Sum</td>
													<td>$3200.00</td>
													<td>
														<i class="fas fa-star text-warning"></i>
														<i class="fas fa-star text-warning"></i>
														<i class="fas fa-star text-warning"></i>
														<i class="fas fa-star text-warning"></i>
														<i class="far fa-star text-secondary"></i>
													</td>
												</tr>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-14.jpg" alt="User Image"></a>
															<a href="profile.html">Marvin Campbell</a>
														</h2>
													</td>
													<td>Flow chart</td>
													<td>$3500.00</td>
													<td>
														<i class="fas fa-star text-warning"></i>
														<i class="fas fa-star text-warning"></i>
														<i class="fas fa-star text-warning"></i>
														<i class="fas fa-star text-warning"></i>
														<i class="far fa-star text-secondary"></i>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->

						</div>
						<div class="col-md-6 d-flex">

							<!-- Feed Activity -->
							<div class="card  card-table flex-fill">
								<div class="card-header">
									<h4 class="card-title">Mentee List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Mentee Name</th>
													<th>Phone</th>
													<th>Last Visit</th>
													<th>Paid</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/user/user.jpg" alt="User Image"></a>
															<a href="profile.html">Jonathan Doe </a>
														</h2>
													</td>
													<td>8286329170</td>
													<td>20 Oct 2019</td>
													<td class="text-right">$100.00</td>
												</tr>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/user/user1.jpg" alt="User Image"></a>
															<a href="profile.html">Julie Pennington </a>
														</h2>
													</td>
													<td>2077299974</td>
													<td>22 Oct 2019</td>
													<td class="text-right">$200.00</td>
												</tr>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/user/user2.jpg" alt="User Image"></a>
															<a href="profile.html">Tyrone Roberts</a>
														</h2>
													</td>
													<td>2607247769</td>
													<td>21 Oct 2019</td>
													<td class="text-right">$250.00</td>
												</tr>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/user/user3.jpg" alt="User Image"></a>
															<a href="profile.html">Allen Davis </a>
														</h2>
													</td>
													<td>5043686874</td>
													<td>21 Sep 2019</td>
													<td class="text-right">$150.00</td>
												</tr>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/user/user4.jpg" alt="User Image"></a>
															<a href="profile.html">Patricia Manzi </a>
														</h2>
													</td>
													<td>9548207887</td>
													<td>18 Sep 2019</td>
													<td class="text-right">$350.00</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Feed Activity -->

						</div>
					</div>
					<div class="row">
						<div class="col-md-12">

							<!-- Recent Orders -->
							<div class="card card-table">
								<div class="card-header">
									<h4 class="card-title">Booking List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Mentor Name</th>
													<th>Course</th>
													<th>Mentee Name</th>
													<th>Booking Time</th>
													<th>Status</th>
													<th class="text-right">Amount</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-08.jpg" alt="User Image"></a>
															<a href="profile.html">James Amen</a>
														</h2>
													</td>
													<td>Maths</td>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/user/user.jpg" alt="User Image"></a>
															<a href="profile.html">Jonathan Doe </a>
														</h2>
													</td>
													<td>9 Nov 2019 <span class="text-primary d-block">11.00 AM - 11.15 AM</span></td>
													<td>
														<div class="status-toggle">
															<input type="checkbox" id="status_1" class="check" checked>
															<label for="status_1" class="checktoggle">checkbox</label>
														</div>
													</td>
													<td class="text-right">
														$200.00
													</td>
												</tr>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-07.jpg" alt="User Image"></a>
															<a href="profile.html">Jessica Fogarty</a>
														</h2>
													</td>
													<td>Business Maths</td>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/user/user1.jpg" alt="User Image"></a>
															<a href="profile.html">Julie Pennington </a>
														</h2>
													</td>
													<td>5 Nov 2019 <span class="text-primary d-block">11.00 AM - 11.35 AM</span></td>
													<td>
														<div class="status-toggle">
															<input type="checkbox" id="status_2" class="check" checked>
															<label for="status_2" class="checktoggle">checkbox</label>
														</div>
													</td>
													<td class="text-right">
														$300.00
													</td>
												</tr>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-17.jpg" alt="User Image"></a>
															<a href="profile.html">Jose Anderson</a>
														</h2>
													</td>
													<td>Algebra</td>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/user/user2.jpg" alt="User Image"></a>
															<a href="profile.html">Tyrone Roberts</a>
														</h2>
													</td>
													<td>11 Nov 2019 <span class="text-primary d-block">12.00 PM - 12.15 PM</span></td>
													<td>
														<div class="status-toggle">
															<input type="checkbox" id="status_3" class="check" checked>
															<label for="status_3" class="checktoggle">checkbox</label>
														</div>
													</td>
													<td class="text-right">
														$150.00
													</td>
												</tr>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-06.jpg" alt="User Image"></a>
															<a href="profile.html">Sofia Brient</a>
														</h2>
													</td>
													<td>Integrated Sum</td>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/user/user3.jpg" alt="User Image"></a>
															<a href="profile.html">Allen Davis </a>
														</h2>
													</td>
													<td>7 Nov 2019<span class="text-primary d-block">1.00 PM - 1.20 PM</span></td>
													<td>
														<div class="status-toggle">
															<input type="checkbox" id="status_4" class="check" checked>
															<label for="status_4" class="checktoggle">checkbox</label>
														</div>
													</td>
													<td class="text-right">
														$150.00
													</td>
												</tr>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/profiles/avatar-14.jpg" alt="User Image"></a>
															<a href="profile.html">Marvin Campbell</a>
														</h2>
													</td>
													<td>Flow chart</td>
													<td>
														<h2 class="table-avatar">
															<a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="assets/img/user/user4.jpg" alt="User Image"></a>
															<a href="profile.html">Patricia Manzi </a>
														</h2>
													</td>
													<td>15 Nov 2019 <span class="text-primary d-block">1.00 PM - 1.15 PM</span></td>
													<td>
														<div class="status-toggle">
															<input type="checkbox" id="status_5" class="check" checked>
															<label for="status_5" class="checktoggle">checkbox</label>
														</div>
													</td>
													<td class="text-right">
														$200.00
													</td>
												</tr>
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
