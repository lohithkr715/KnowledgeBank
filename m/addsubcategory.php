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
					<h1 class="text-uppercase title">Add Subcategory</h1>
					<?php
					if ($msg == "es")
						echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
										Subcategory edit was successful!
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										  <span aria-hidden='true'>&times;</span>
										</button>
									  </div>";
					else if ($msg == "ef")
						echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
										Subcategory edit was unsuccessful!
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										  <span aria-hidden='true'>&times;</span>
										</button>
									  </div>";
					else if ($msg == "f3")
						echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
										Either you haven't made any chages or Subcategory already exists!
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
									<th scope="col">Subcategory Name</th>
									<th scope="col">Edit</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$q = "select * from tbl_subcategory sc , tbl_category c where sc.category_id=c.category_id order by category_name";
								$res = mysqli_query($con, $q);
								$count = 1;
								while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
								?>
									<tr>
										<th scope="row"><?php echo $count;
														$count++; ?></th>
										<td><?php echo $row['category_name']; ?></td>
										<td><?php echo $row['subcategory_name']; ?></td>
										<td>
											<form action="editsubcategory.php" method="POST">
												<input type="hidden" name="subcategory_id" value="<?php echo $row['subcategory_id']; ?>">
												<input type="submit" class="btn btn-danger" value="click" onclick="return confirm('Are sure want to edit?');">
											</form>
										</td>
									</tr>
								<?php
								}
								?>
								<tr>
									<form action="../dblogic.php?pageno=4" method="POST" onsubmit="return confirm('Are you sure wannt to submit?')">
										<th scope="row">+
										</th>
										<td><select name="category" required="required" class="form-control">
												<option value="">-Select Category-</option>
												<?php
												$q = "select * from tbl_category order by category_name";
												$res = mysqli_query($con, $q);

												while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
													echo $row['category_id'];
												?>
													<option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
												<?php
												}
												?>
											</select></td>
										<td><input type="text" name="subcategory_name" placeholder="Subcategory" class="form-control" required="required"></td>
										<td><input type="submit" class="btn btn-success" value="ADD"></td>
									</form>
									<?php
									if ($msg == "s")
										echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
										Subcategory added successfully!
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										  <span aria-hidden='true'>&times;</span>
										</button>
									  </div>";
									else if ($msg == "f1")
										echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
										Failed to add Subcategory!
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										  <span aria-hidden='true'>&times;</span>
										</button>
									  </div>";
									else if ($msg == "f2")
										echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
										Subcategory Already Exist!
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