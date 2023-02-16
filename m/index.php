<!-- Html main -->
<?php include './htmlmain.php'; ?>

<?php include("./navbar.html"); ?>


<main>

	<div class="container mt-5">
		<?php
		error_reporting(0);
		$msg = $_REQUEST['msg'];
		if ($msg == "se") {
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
	</div>

	<!-- Login Box -->
	<section class="login  d-flex justify-content-center">
		<div class="login-box text-center">
			<div class="head"><span class="text-uppercase">Admin Login</span></div>
			<div class="container">
				<hr>
				<div class="form-area">
					<form action="../dblogic.php?pageno=1" method="POST">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="pass" class="form-control" placeholder="Password" required="required">
						</div>
						<input type="submit" class="mt-2 submit-btn btn btn-primary" value="Login">
					</form>
				</div>
				<!-- <div class="mt-4">
					<span class="text-secondry">Don't Have Account?</span>
					<span><a href="registration.php" class="text-decoration-none" style="color:blue;">&nbsp;Click Here</a></span>
				</div> -->
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