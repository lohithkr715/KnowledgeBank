<?php
error_reporting(0);
include("../dbcon.php");
session_start();
$femail = "";
if (isset($_SESSION['email'])) {
	$femail = $_SESSION['email'];
} else {
	header("location:index.php?msg=se");
}
// echo $femail;
$msg = $_REQUEST['msg'];
?>

<!-- Html main -->
<?php include './htmlmain.php'; ?>
<script>
	function getSubcategory() {
		var w1 = document.getElementById("category_id").value;
		// alert(w1);
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("sub").innerHTML = this.responseText;
			}
		};
		xhttp.open("GET", "getsubcategory.php?q=" + w1, true);
		xhttp.send();
	}
</script>
<?php include("./dashboardNav.php"); ?>

<main>
	<!-- add topic area -->

	<section class="add-topic  d-flex justify-content-center">
		<div class="topic-box">
			<div class="head text-center"><span class="text-uppercase">Add Topic</span></div>
			<div class="container">
				<hr>
				<div class="form-area">
					<?php
					if ($msg == "tuf") {
						echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
						<strong>Failed </strong> to add topic.
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						  <span aria-hidden='true'>&times;</span>
						</button>
					  </div>";
					}
					?>
					<form name="frm" action="../dblogic.php?pageno=8" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Are you sure,want to submit?')">
						<div class="form-group">
							<label for="exampleFormControlSelect1">Select Category</label>
							<select class="form-control" name="category_id" id="category_id" onchange="getSubcategory()" required="required">
								<option value="">-Select Category-</option>
								<?php
								$q = "select * from tbl_category order by category_name";
								$res = mysqli_query($con, $q);
								while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
								?>
									<option value="<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></option>
								<?php
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleFormControlSelect1">Select Subcategory</label>
							<div id="sub">
								<select class="form-control" name="subcategory_id" required="required">
									<option value="">-Select Subcategory-</option>
									<?php
									$q = "select * from tbl_subcategory order by subcategory_name";
									$res = mysqli_query($con, $q);

									while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
										//echo $row['subcategory_id'];
									?>
										<option value="<?php echo $row['subcategory_id']; ?>"><?php echo $row['subcategory_name']; ?></option>

									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleFormControlInput1">Title</label>
							<input type="text" class="form-control" name="topic_name" required="required" placeholder="Enter Topic Title">
						</div>
						<div class="">
							<input type="hidden" name="femail" value="<?php echo $femail; ?>">
						</div>
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Title Description</label>
							<textarea class="form-control" name="topic_description" rows="5" required="required"></textarea>
						</div>
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="file" required="required">
							<label class="custom-file-label" for="customFile">Choose file</label>
						</div>
						<button class="btn btn-success mt-4 w-100" type="submit">Add Topic&nbsp;&nbsp;&nbsp;<i class="fas fa-folder-plus"></i></button>
					</form>
				</div>
			</div>
		</div>
	</section>

	<!-- end add topic area -->
</main>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>

</body>

</html>