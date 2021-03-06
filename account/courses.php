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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
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
						<div class="col-lg-6 col-sm-12 col-md-6 offset-3">
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
												<div class="mt-4"><a class="btn btn-primary waves-effect waves-light btn-sm" href="add-course.php">Add Courses <i class="mdi mdi-arrow-right ml-1"></i></a></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-sm-12 offset-1">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">All Courses List</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered" style="width:100%;padding: 15%;">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
												<?php
													$sqlcourses = "SELECT * FROM courses";
													$courses = get_data($sqlcourses);
													foreach($courses as $course){
														$courseid = $course['id'];
														$name = $course['name'];
														$price = $course['price'];
														$startdate = $course['date'];
														?>
                                                        <tr>
                                                            <td><?php echo $name;?></td>
                                                            <td><?php echo $price;?></td>
                                                            <td><?php echo $startdate;?></td>
                                                            <td><a class="btn btn-warning waves-effect waves-light btn-sm" href="view-course.php?course=<?php echo $courseid;?>">View Course<i class="mdi mdi-arrow-right ml-1"></i></a></div></td>
                                                        </tr>
														<?php
													}
												?>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                                </tfoot>
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
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            } );
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
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
                                                <div class="mt-4"><a class="btn btn-primary waves-effect waves-light btn-sm" href="courses.php">Add Courses <i class="mdi mdi-arrow-right ml-1"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-sm-12 offset-2">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Courses List</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered" style="width:100%;padding: 15%;">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $sqlcourses = "SELECT * FROM courses";
                                            $courses = get_data($sqlcourses);
                                            foreach($courses as $course){
                                            $courseid = $course['id'];
                                            $name = $course['name'];
                                            $price = $course['price'];
                                            $startdate = $course['date'];
                                            ?>
                                            <tr>
                                                <td><?php echo $name;?></td>
                                                <td><?php echo $price;?></td>
                                                <td><?php echo $startdate;?></td>
                                                <td><a class="btn btn-warning waves-effect waves-light btn-sm" href="view-course.php?course=<?php echo $courseid;?>">View Course<i class="mdi mdi-arrow-right ml-1"></i></a></div></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
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
        }
    ?>
	</body>
</html>
<?php
}
?>
