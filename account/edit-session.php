<!DOCTYPE html>
<html lang="en">
<?php
	include 'includes/functions.php';
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
						<div class="card card-table">
							<div class="card-header">
								<h4 class="card-title">Edit Session</h4>
							</div>
							<div class="card-body">
								<div style="padding: 3%;">
									<form method="post" action="includes/functions.php">
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
										<div class="form-group">
											<label for="exampleFormControlInput1">Session Title</label>
											<input type="text" name="name" value="<?php echo $title;?>" class="form-control" id="exampleFormControlInput1" placeholder="Session 1: Introduction to Block Based Coding" required>
										</div>
										<div class="form-group">
											<label for="exampleFormControlTextarea1">Session Description</label>
											<textarea type="text" class="form-control"  name="description" placeholder="Start typing here..." id="exampleFormControlTextarea1" rows="5"><?php echo $description;?></textarea>
										</div>
										<div class="form-group">
											<label for="exampleFormControlInput1">Start Date Time</label>
											<input type="datetime-local" name="startdatetime" value="<?php echo $startdatetime;?>" class="form-control" id="exampleFormControlInput1" required>
										</div>
										<input type="hidden" name="id" value="<?php echo $sessionid;?>">
										<div class="form-group">
											<label for="exampleFormControlInput1">Session Link</label>
											<input type="text" name="link" value="<?php echo $link;?>" class="form-control" id="exampleFormControlInput1" placeholder="https://yourLiveLinkToTheSession.session" required>
										</div>
										<div class="form-group">
											<label for="exampleFormControlInput1">Session Video Link</label>
											<input type="text" name="video_link" value="<?php echo $videolink;?>" class="form-control" id="exampleFormControlInput1" placeholder="https://yourvideoLinkToTheSession.recording" required>
										</div>
										<div class="form-group">
											<input type="submit" name="update-session" value="Update" class="form-control btn btn-success">
										</div>
									</form>
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
