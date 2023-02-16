<?php
error_reporting(0);
include("../dbcon.php");
session_start();
if (isset($_SESSION['email'])) {
	$femail = $_SESSION['email'];
} else {
	header("location:index.php?msg=se");
}
$msg = $_REQUEST['msg'];
?>
<!-- Html main -->
<?php include './htmlmain.php'; ?>

<?php include("./dashboardNav.php"); ?>

<main>

	<!-- Manage Area -->

	<section class="manage">
		<div class="container">
			<?php
			if ($msg == "tus") {
				echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
		Topic Added Successfully!!
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		  <span aria-hidden='true'>&times;</span>
		</button>
	  </div>";
			}
			?>
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center title">
					<h1 class="text-uppercase title-text">Manage</h1>
				</div>
			</div>
			<div class="container manage-field  d-flex justify-content-center">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="manage-box">
							<div class="manage-img text-center py-4">
								<i class="fas fa-folder-plus fa-7x"></i>
							</div>
							<div class="card-body text-center">
								<h5 class="card-title text-uppercase font-roboto"><a href="addTopic.php" class="text-decoration-none">Add Topic </a></h5>
								<p class="card-text text-secondary">
									Add new topic for the student
								</p>
							</div>
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="manage-box">
							<div class="manage-img text-center py-4">
								<i class="fas fa-align-justify fa-7x"></i>
							</div>
							<div class="card-body text-center">
								<h5 class="card-title text-uppercase font-roboto"><a href="viewTopic.php" class="text-decoration-none">View Topic </a></h5>
								<p class="card-text text-secondary">
									Add new topic for the student
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Manage Area -->
</main>


<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>

</body>

</html>