<?php
error_reporting(0);
include("../dbcon.php");
session_start();
if (isset($_SESSION['master'])) {
	$master = $_SESSION['master'];
} else {
	header("location:index.php?msg=se");
}
$msg = $_REQUEST['msg'];
?>


<!-- Html main -->
<?php include './htmlmain.php'; ?>

<?php include("./dashboardNav.php"); ?>

<main>

	<section class="category-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center title">
					<h1 class="text-uppercase title">Category List</h1>
					<?php
					if ($msg == "es")
						echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
						Category edit was <strong> successful! </strong>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						  <span aria-hidden='true'>&times;</span>
						</button>
					  </div>";
					else if ($msg == "ef")
						echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
						Category edit was <strong> unsuccessful!</strong>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						  <span aria-hidden='true'>&times;</span>
						</button>
					  </div>";
					else if ($msg == "f3")
						echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
						Either you haven't made any chages or category already exists!
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						  <span aria-hidden='true'>&times;</span>
						</button>
					  </div>";
					?>
				</div>
			</div>
			<div class="container category-list d-flex justifty-content-center">
				<div class="row">
					<div class="category-area-box col-lg-12">
						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">S No.</th>
									<th scope="col">Category Name</th>
									<th scope="col">Edit</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$q = "select * from tbl_category order by category_name";
								$res = mysqli_query($con, $q);
								$count = 1;
								while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
								?>
									<tr>
										<th scope="row"><?php echo $count;
														$count++; ?></th>
										<td><?php echo $row['category_name']; ?></td>
										<td>
											<form action="editcategory.php" method="POST">
												<input type="hidden" name="category_id" value="<?php echo $row['category_id']; ?>">
												<input type="hidden" name="category_name" value="<?php echo $row['category_name']; ?>">
												<input type="submit" class="btn btn-danger" value="click" onclick="return confirm('Are sure want to edit?');">
											</form>
										</td>
									</tr>
								<?php
								}
								?>
								<tr>
									<form action="../dblogic.php?pageno=2" method="POST">
										<th scope="row">+
										</th>
										<td><input type="text" class="form-control" name="category_name" placeholder="Category" required="required"></td>
										<td><input type="submit" class="btn btn-success" value="ADD"></td>
									</form>
									<?php
									if ($msg == "f2")
										echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
										Category Already Exist!
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										  <span aria-hidden='true'>&times;</span>
										</button>
									  </div>";
									else if ($msg == "f1")
										echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
										<strong>Failed </strong> to add category!
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										  <span aria-hidden='true'>&times;</span>
										</button>
									  </div>";
									else if ($msg == "s")
										echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
										<strong>Category </strong> added successfully.
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										  <span aria-hidden='true'>&times;</span>
										</button>
									  </div>";
									?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>



<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>

</body>

</html>