<?php
session_start();
if (isset($_SESSION['master'])) {
	$master = $_SESSION['master'];
} else {
	header("location:index.php?msg=se");
}
?>

<!-- Html main -->
<?php include './htmlmain.php'; ?>

<?php include("./dashboardNav.php"); ?>

<main>

	<!-- Manage Area -->

	<section class="manage">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center title">
					<h1 class="text-uppercase title-text">Manage</h1>
				</div>
			</div>
			<div class="container manage-field  d-flex justify-content-center">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="manage-box">
							<div class="manage-img text-center py-4">
								<i class="fas fa-folder-plus fa-7x"></i>
							</div>
							<div class="card-body text-center">
								<h5 class="card-title text-uppercase font-roboto"><a href="addcategory.php" class="text-decoration-none">Add Category</a></h5>
								<p class="card-text text-secondary">
									Add new topic for the student
								</p>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="manage-box">
							<div class="manage-img text-center py-4">
								<i class="fas fa-folder-open fa-7x"></i>
							</div>
							<div class="card-body text-center">
								<h5 class="card-title text-uppercase font-roboto"><a href="addsubcategory.php" class="text-decoration-none">Add Subcategory</a></h5>
								<p class="card-text text-secondary">
									Add new topic for the student
								</p>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="manage-box">
							<div class="manage-img text-center py-4">
								<i class="fas fa-chalkboard-teacher fa-7x"></i>
							</div>
							<div class="card-body text-center">
								<h5 class="card-title text-uppercase font-roboto"><a href="facultyTopics.php" class="text-decoration-none">Faculty And Their Topics</a></h5>
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