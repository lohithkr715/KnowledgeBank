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
//-------------------------------------------------------------------------------------------------------------------------
?>
<!-- Html main -->
<?php include './htmlmain.php'; ?>

<?php include("./dashboardNav.php"); ?>

<!-- Main area -->
<main>
	<section class="faculty container my-5">

		<div class="main-title d-flex justify-content-center">
			<h2>Faculty</h2>
		</div>
		<hr>
		<!-- populate area -->

		<div class="populate-area m-5">
			<?php
			if ($msg == "es") {
				echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
				Edit <strong>Successful</strong>.
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				  <span aria-hidden='true'>&times;</span>
				</button>
			  </div>";
			} else if ($msg == "ef") {
				echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
				Edit <strong>Unsuccessful</strong>.
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				  <span aria-hidden='true'>&times;</span>
				</button>
			  </div>";
			}
			?>
			<!-- form -->
			<form name="frm1" class="form-group">
				<div class="selection-box d-flex justify-content-center">
					<div class="row">
						<!-- 1 box -->
						<div class="pr-5">
							<select name="femail" id="femail" required="required" class="form-control">
								<option value="">-Select Faculty-</option>
								<?php
								$q = "select * from tbl_faculty order by faculty_name";
								$res = mysqli_query($con, $q);

								while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
									//echo $row['subcategory_id'];
								?>
									<option value="<?php echo $row['email']; ?>"><?php echo $row['faculty_name']; ?></option>
								<?php
								}
								?>
							</select>
						</div>
						<!-- End 1 box -->
						<a onclick="getFacultyData()"><input type="button" value="Populate" class="btn btn-success px-3"></a>
					</div>
				</div>
			</form>
			<!-- end form -->
			<div class="" id="fac">

			</div>
		</div>

		<!-- end populate area -->
	</section>
	<!-- all topics -->
	<section class="all-topics container my-5">

		<div class="main-title d-flex justify-content-center">
			<h2>All Topics</h2>
		</div>
		<hr>

		<div id="option" style="display:none;" class="my-4">
			<!-- filter area -->
			<form name="frm" class="form-group">
				<div class="filter-box d-flex justify-content-center">
					<input type="hidden" id="faculty_email" name="faculty_email">
					<table>
						<tr>
							<td>
								<select name="category_id" id="category_id" required="required" onchange="getSubcategory()" class="form-control">
									<option value="">-Select Category-</option>
									<?php
									$q = "select * from tbl_category order by category_name";
									$res = mysqli_query($con, $q);

									while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
										//echo $row['category_id'];
									?>
										<option><?php echo $row['category_name']; ?></option>
									<?php
									}
									?>
								</select>
							</td>
							<td>
								<div id="sub">
									<select name="subcategory_id" id="subcategory_id" required="required" class="form-control">
										<option value="">-Select Subcategory-</option>
										<?php
										$q = "select * from tbl_subcategory order by subcategory_name";
										$res = mysqli_query($con, $q);

										while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
											//echo $row['subcategory_id'];
										?>
											<option><?php echo $row['subcategory_name']; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</td>

							<td><a onclick="getData()"><input type="button" value="GO" class="btn btn-success"></a></td>
						</tr>
					</table>
				</div>
			</form>
			<!-- end filter area -->
		</div>
		<!-- topic-list -->
		<div class="container mt-5" id="all">
			<?php
			$q = "select * from tbl_topic t,tbl_subcategory sub,tbl_category c where t.subcategory_id=sub.subcategory_id and sub.category_id=c.category_id order by topic_upload_date desc,t.faculty_email";
			//echo $q;
			$res = mysqli_query($con, $q);
			$n = mysqli_num_rows($res);
			if ($n == 0) {
				echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
				No <strong> Data Found</strong>.
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				  <span aria-hidden='true'>&times;</span>
				</button>
			  </div>";
			} else {
				$count = 1;
				while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
			?>

					<table class="table topic-list table-borderless" width="70%" cellspacing="5">
						<tr>
							<td width="25%"><b>Topic <?php echo $count;
														$count++; ?>:</b><?php echo $row['topic_name']; ?></td>
							<td width="25%"> <b>Category:</b> <?php echo $row['category_name']; ?></td>
							<td width="25%"> <b>Subcategory:</b> <?php echo $row['subcategory_name']; ?></td>
							<td width="25%"> <b>Upload Date:</b> <?php echo $row['topic_upload_date']; ?></td>
						<tr>
						<tr>
							<td colspan="4" width="100%"><b>Description:</b><br><?php echo $row['topic_description']; ?> </td>
						</tr>
						<tr>
							<td colspan="2"><a align="center" onclick="return confirm('Are you sure ,want to download file?')" class="btn btn-success text-decoration-none" style="color:white;" href="../topic_files/download.php?file=<?php echo $row['file_name']; ?>">Download File</a></td>


						</tr>
					</table>

					<br>
			<?php
				}
			}
			?>

		</div>
		<!-- end topic-lis -->
	</section>

	<!-- end all topics -->
</main>
<!-- End Main Area -->

<script>
	function getSubcategory() {
		// var w1 = frm.category_id.value;
		var w1 = document.getElementById("category_id");
		//alert(w1);
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("sub").innerHTML = this.responseText;
			}
		};
		xhttp.open("GET", "getsubcategory.php?q=" + w1.value, true);
		xhttp.send();
	}

	function getFacultyData() {

		//var femail = frm1.femail;
		var femail = document.getElementById("femail");
		if (femail.value == "") {
			alert("Please select a faculty from the list!");
			femail.focus();
		} else {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {

					document.getElementById("fac").innerHTML = this.responseText;
					document.getElementById("option").style.display = "block";
					document.getElementById("faculty_email").value = femail.value;
				}
			};
			xhttp.open("GET", "getFacultyData.php?femail=" + femail.value, true);
			xhttp.send();
		}
	}

	function getData() {

		var c = document.getElementById("category_id").value;
		var sc = document.getElementById("subcategory_id").value;
		var em = document.getElementById("femail").value;
		// alert(c + " " + sc + " " + em);
		//alert(c+sc);
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {

				document.getElementById("all").innerHTML = this.responseText;
			}
		};
		xhttp.open("GET", "getData.php?c=" + c + "&sc=" + sc + "&em=" + em, true);
		xhttp.send();
	}
</script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>

</body>

</html>