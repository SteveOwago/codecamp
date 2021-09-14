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
						<div class="row mt-5">
							<div class="col-sm-8 offset-2">
								<div class="card">
									<?php
										$courseid = $_GET['course'];
										$sqlcourses = "SELECT * FROM courses WHERE id =".$courseid;
										$courses = get_data($sqlcourses);
										foreach ($courses as $course){
											$title = $course['name'];
											$description = $course['description'];
											$price = $course['price'];
											$courseoutline = $course['course_outline'];
										}
									?>
									<div class="card-header">
                                        <h3 class="card-title"><?php echo $title; ?></h3>
									</div>
									<div class="card-body">
										
										<div class="container">
											<div class="row">
												<div class="col-sm-6">
													<h5 class="card-title">Course Description</h5>
													<p class="card-text"><?php echo $description; ?> </p>
													<p><strong><i class="fas fa-book"></i>  Course Outline: </strong><a class="text-primary" href="<?php echo 'includes/uploads/courses/'.$courseoutline; ?>" target="_blank"><?php echo $courseoutline; ?></a></p>
													<p><strong>Price: </strong>KES <?php echo $price; ?></p>
												</div>
												<div class="col-sm-6">
													<p class="float-left"><strong>Number of Students: </strong><?php
														global $conn;
														$sqlstudents= "SELECT * FROM course_payments WHERE course_id = '$courseid'";
														$resultcount = mysqli_query($conn,$sqlstudents);
														$count = mysqli_num_rows($resultcount);
														echo $count;
													?> student(s)</p>
												</div>
											</div>
											
											
										</div>
										<br><br>
										<div class="container">
											<a href="add-session.php?course=<?php echo $courseid;?>" class="btn btn-sm btn-outline-success float-left"> <i class="fas fa-plus"></i> Add Session</a> &emsp;
											<a href="edit-course.php?course=<?php echo $courseid;?>" class="btn btn-sm btn-warning "> <i class="fas fa-pen-square"></i> Edit Course</a>
											<a href="includes/functions.php?deleteCourse=<?php echo $courseid;?>" class="btn btn-sm btn-outline-danger float-right"><i class="fas fa-trash"></i> Delete Course</a>&emsp;
											
										</div>
									</div>
								</div>
							</div>
						</div>
                        <div class="row mt-2">
                            <div class="col-sm-8 offset-2">
                                <div class="card card-table">
                                    <div class="card-header">
                                        <h4 class="card-title">All Sessions for <?php echo htmlentities($title);?></h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-center table-stripped">
                                                <thead>
                                                <tr>
                                                    <th>Session Title</th>
                                                    <th>Start Date and Time</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
												<?php
													$sqlsessions = "SELECT * FROM sessions WHERE course_id=".$courseid;
													$sessions = get_data($sqlsessions);
													foreach ($sessions as $session) {
													$id = $session['id'];
													$name = $session['name'];
													$startdatetime = $session['startdatetime'];
												?>

                                                <tr>
                                                    <td><?php echo htmlentities($name);?></td>
                                                    <td><?php echo htmlentities($startdatetime);?></td>
                                                    <td><a class="btn btn-primary waves-effect waves-light btn-sm" href="view-session.php?session=<?php echo $id;?>"> <i class="fas fa-eye"></i> View Session</a>
                                                        <a class="btn btn-outline-warning waves-effect waves-light btn-sm" href="edit-session.php?session=<?php echo $id;?>"> <i class="fas fa-pen-square"></i> Edit Session</a>
                                                    </td>
                                        </tr>
										<?php
											}
													if(count($sessions)<=0){
													    echo "<td>No Sessions Available</td>";
                                        }
										?>
                                        </tbody>
                                        </table>
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
                        <div class="row mt-5">
                            <div class="col-sm-8 offset-2">
                                <div class="card">
                                    <?php
                                    $courseid = $_GET['course'];
                                    $sqlcourses = "SELECT * FROM courses WHERE id =".$courseid;
                                    $courses = get_data($sqlcourses);
                                    foreach ($courses as $course){
                                        $title = $course['name'];
                                        $description = $course['description'];
                                        $price = $course['price'];
                                    }
                                    ?>
                                    <div class="card-header">
                                        <h3 class="card-title"><?php echo $title; ?></h3>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Course Description</h5>
                                        <p class="card-text"><?php echo $description; ?> </p>
                                        <p><strong>Price: </strong>KES <?php echo $price; ?></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-8 offset-2">
                                <div class="card card-table">
                                    <div class="card-header">
                                        <h4 class="card-title">All Sessions for <?php echo htmlentities($title);?></h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-center table-stripped">
                                                <thead>
                                                <tr>
                                                    <th>Session Title</th>
                                                    <th>Start Date and Time</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $sqlsessions = "SELECT * FROM sessions WHERE course_id=".$courseid;
                                                $sessions = get_data($sqlsessions);
                                                foreach ($sessions as $session) {
                                                    $id = $session['id'];
                                                    $name = $session['name'];
                                                    $startdatetime = $session['startdatetime'];
                                                    ?>

                                                    <tr>
                                                        <td><?php echo htmlentities($name);?></td>
                                                        <td><?php echo htmlentities($startdatetime);?></td>
                                                        <td><a class="btn btn-primary waves-effect waves-light btn-sm" href="view-session.php?session=<?php echo $id;?>"> <i class="fas fa-eye"></i> View Session</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                if(count($sessions)<=0){
                                                    echo "<td>No Sessions Available</td>";
                                                }
                                                ?>
                                                </tbody>
                                            </table>
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

