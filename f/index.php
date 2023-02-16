<?php
error_reporting(0);
include("../dbcon.php");
$msg = $_REQUEST['msg'];
?>
<!-- Html main -->
<?php include './htmlmain.php'; ?>

<?php include("./navbar.html"); ?>

<main>
	<!-- Login Box -->
	<section class="login  d-flex justify-content-center">
		<div class="login-box text-center">
			<div class="head"><span class="text-uppercase">Faculty Login</span></div>
			<div class="container">
				<hr>
				<div class="form-area">
					<?php

					if ($msg == "lf") {
						echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
						<strong>Sorry!</strong> Wrong Credentials.
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						  <span aria-hidden='true'>&times;</span>
						</button>
					  </div>";
					} else if ($msg == "rs") {
						echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
						Your <strong>Registration </strong> was successful.
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						  <span aria-hidden='true'>&times;</span>
						</button>
					  </div>";
					} else if ($msg == "ar") {
						echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
						You <strong>are already registered with us! </strong>  kindly login with your credential.
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						  <span aria-hidden='true'>&times;</span>
						</button>
					  </div>";
					} else if ($msg == "se") {
						echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
						<strong>Session Expierd!</strong> Login Again.
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						  <span aria-hidden='true'>&times;</span>
						</button>
					  </div>";
					} else if ($msg == "lo") {
						echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
						<strong>Successfully </strong> logged out.
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						  <span aria-hidden='true'>&times;</span>
						</button>
					  </div>";
					}

					?>
					<form action="../dblogic.php?pageno=7" method="POST" onsubmit="return confirm('Are you sure, want to login?')">
						<div class="input-group mb-3 mt-5">
							<div class="input-group-prepend">
								<label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-user"></i></label>
							</div>
							<select class="custom-select" id="inputGroupSelect01" name="email" required="required">
								<option selected value="">-Select Your Email Here-</option>
								<?php
								$q = "select * from tbl_faculty order by email";
								$res = mysqli_query($con, $q);
								while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
								?>
									<option><?php echo $row['email']; ?></option>
								<?php
								}
								?>
							</select>
						</div>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="pass" class="form-control" placeholder="Password" required="required">
						</div>
						<input type="submit" class="mt-2 submit-btn btn btn-primary">
					</form>
				</div>
				<div class="mt-4">
					<span class="text-secondry">Don't Have Account?</span>
					<span><a href="registration.php" class="text-decoration-none" style="color:blue;">&nbsp;Click Here</a></span>
				</div>
			</div>

		</div>
	</section>
	<!-- End Login Box -->
</main>


<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>

</body>

</html>