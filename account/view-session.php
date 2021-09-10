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
										$sessionid = $_GET['session'];
										$sqlsession = "SELECT * FROM sessions WHERE id =".$sessionid;
										$sessions = get_data($sqlsession);
										foreach ($sessions as $session){
											$title = $session['name'];
											$description = $session['description'];
											$startdatetime = $session['startdatetime'];
											$link = $session['link'];
											$videolink = $session['video_link'];
										}
									?>
									<div class="card-header">
										<h3 class="card-title"><?php echo $title; ?></h3>
									</div>
									<div class="card-body">
										<h5 class="card-title">Session Description</h5>
										<p class="card-text"><i class="fas fa-file-alt"></i>  <?php echo $description; ?> </p>
										<p><strong><i class="fas fa-calendar-times"></i>  Date and Time: </strong><?php echo $startdatetime; ?></p>
										<p><strong><i class="fas fa-link"></i>  Session Link: </strong><a class="text-primary" href="<?php echo $link; ?>" target="_blank"><?php echo $link; ?></a></p>
										<p><strong><i class="fas fa-link"></i>  Video Link: </strong><a class="text-success" href="<?php echo $videolink; ?>" target="_blank"><?php echo $videolink; ?></a></p>
										<div class="container">
											<a href="edit-session.php?session=<?php echo $sessionid;?>" class="btn btn-sm btn-warning "> <i class="fas fa-pen-square"></i> Edit Session</a>
											<a href="includes/functions.php?deleteSession=<?php echo $sessionid;?>" class="btn btn-sm btn-outline-danger float-right"><i class="fas fa-trash"></i> Delete Session</a>&emsp;
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
                                    $sessionid = $_GET['session'];
                                    $sqlsession = "SELECT * FROM sessions WHERE id =".$sessionid;
                                    $sessions = get_data($sqlsession);
                                    foreach ($sessions as $session){
                                        $title = $session['name'];
                                        $description = $session['description'];
                                        $startdatetime = $session['startdatetime'];
                                        $link = $session['link'];
										$videolink = $session['video_link'];
                                    }
                                    ?>
                                    <div class="card-header">
                                        <h3 class="card-title"><?php echo $title; ?></h3>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Session Description</h5>
                                        <p class="card-text"><i class="fas fa-file-alt"></i>  <?php echo $description; ?> </p>
                                        <p><strong><i class="fas fa-calendar-times"></i>  Date and Time: </strong><?php echo $startdatetime; ?></p>
                                        <p><strong><i class="fas fa-link"></i>  Session Link: </strong><a class="text-primary" href="<?php echo $link; ?>" target="_blank"><?php echo $link; ?></a></p>
										<p><strong><i class="fas fa-link"></i>  Video Link: </strong><a class="text-success" href="<?php echo $videolink; ?>" target="_blank"><?php echo $videolink; ?></a></p>
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


