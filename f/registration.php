<?php
error_reporting(0);
include("../dbcon.php");
$msg = $_REQUEST['msg'];
?>

<!-- Html main -->
<?php include './htmlmain.php'; ?>

<?php include("./navbar.html"); ?>

<main>

	<!-- Registration Box -->

	<section class="registration d-flex justify-content-center">

		<div class="login-box text-center">
			<div class="head"><span class="text-uppercase">Faculty Registration</span></div>
			<div class="container">
				<hr>
				<div class="form-area">
					<?php

					if ($msg == "rf") {
						echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
						Registration <strong>Failed!</strong>.
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						  <span aria-hidden='true'>&times;</span>
						</button>
					  </div>";
					}

					?>
					<form action="../dblogic.php?pageno=6" method="POST" onsubmit="return confirm('Are you sure, want to register?')">
						<div class="input-group mb-3 mt-5">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="faculty_name" class="form-control" placeholder="Enter Your Name" required="required">
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tie"></i></span>
							</div>
							<input type="text" name="faculty_designation" class="form-control" placeholder="Designation" required="required">
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
							</div>
							<input type="email" name="email" class="form-control" placeholder="Email" required="required">
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-square-alt"></i></span>
							</div>
							<input type="number" name="mobile" class="form-control" placeholder="Mobile Number" required="required">
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control" placeholder="Password" required="required">
						</div>
						<input type="submit" class="mt-2 submit-btn btn btn-primary">
					</form>
				</div>
				<div class="mt-4">
					<span class="text-secondry">Already Have Account?</span>
					<span><a href="index.php" class="text-decoration-none" style="color:blue;">&nbsp;Click Here</a></span>
				</div>
			</div>

		</div>

	</section>
	<!-- End Registration Box -->

</main>