<?php include 'htmlmain.php'; ?>

<!-- Custome CSS file -->
<link rel="stylesheet" href="./css/alltopics.css">

<?php include 'navbar.html'; ?>
<?php
error_reporting(0);
include("dbcon.php");

?>


<!-- main section -->
<section class="main-area container mb-5">

	<div class="main-title d-flex justify-content-center">
		<h2>Search Your Topic Here</h2>
	</div>

	<!-- Selection Area -->
	<div class="selection-area">
		<form name="frm" class="form-group">
			<div class="selection-box d-flex justify-content-center">
				<div class="row">
					<!-- 1 box -->
					<div class="pr-5">
						<select name="category_id" required="required" onclick="getSubcategory()" class="form-control">
							<option value="">-Select Category-</option>
							<?php
							$q = "select * from tbl_category order by category_name";
							$res = mysqli_query($con, $q);
							$n = mysqli_num_rows($res);

							while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
								//echo $row['category_id'];
							?>
								<option value="<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></option>
							<?php
							}
							?>
						</select>
					</div>
					<!-- End 1 box -->
					<!-- 2 box -->

					<div id="sub" class="pr-5">
						<select name="subcategory_id" required="required" class="form-control">
							<option value="">-Select Category-</option>
							<?php
							$q = "select * from tbl_subcategory order by subcategory_name";
							$res = mysqli_query($con, $q);

							while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
								//echo $row['subcategory_id'];
							?>
								<option value="<?php echo $row['subcategory_name']; ?>"><?php echo $row['subcategory_name']; ?></option>
							<?php
							}
							?>
						</select>
					</div>
					<!-- End 2 Box -->
					<!-- 3 box -->
					<div class="pr-5">

						<select name="faculty_email" required="required" class="form-control">
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
					<!-- End 3 box -->

					<a onclick="getData()"><input type="button" value="GO" class="btn btn-primary px-3"></a>
				</div>
			</div>

		</form>
	</div>
	<!-- End Selection Area -->

	<!-- Topic-area -->
	<div id="all" class="topic-area container">
		<?php
		$q = "select * from tbl_topic t,tbl_subcategory sub,tbl_category c where t.subcategory_id=sub.subcategory_id and sub.category_id=c.category_id order by topic_upload_date desc,t.	subcategory_id	asc";
		//echo $q;
		$res = mysqli_query($con, $q);
		$n = mysqli_num_rows($res);
		if ($n == 0) {
			echo "<div class='alert alert-danger' role='alert'>
		No Data found!
	  </div>";
		} else {
			$count = 1;
			while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
		?>


				<div class="topic-details my-3">
					<div class="topic-info ">
						<div class="row px-3">
							<div class="col-lg-3 col-md-4 col-sm-4">
								<div class="row">
									<p class="text-desc"><span class="head"> Topic <?php echo $count;
																					$count++; ?>: </span><?php echo $row['topic_name']; ?></p>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-4">
								<div class="row">
									<p class="text-desc"><span class="head"> Category: </span><?php echo $row['category_name']; ?></p>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-4">
								<div class="row">
									<p class="text-desc"><span class="head"> Subcategory: </span> <?php echo $row['subcategory_name']; ?></p>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-4">
								<div class="row">
									<p class="text-desc"><span class="head"> Upload Date: </span><?php echo $row['topic_upload_date']; ?></p>
								</div>
							</div>
						</div>
						<div class="topic-desc">
							<span class="head">Description: </span>
							<p class="text-desc"><?php echo $row['topic_description']; ?> --s laboriosam pariatur, ut officiis asperiores reiciendis error consequatur laudantium sint possimus quam tempore quia consectetur quasi praesentium excepturi adipisci rem.</p>
						</div>
						<div>
							<button class="btn-prop btn btn-success"><a class="download" style="text-decoration: none;" onclick="return confirm('Are you sure ,want to download file?')" href="topic_files/download.php?file=<?php echo $row['file_name']; ?>">Download File <i class="fas fa-download ml-3"></i></a></button>
						</div>
					</div>
				</div>
		<?php

			}
		}
		?>
	</div>

	<!-- End Topic Area -->
</section>
<!-- End main section -->


<!-- JS -->

<script>
	function getSubcategory() {
		var w1 = frm.category_id.value;
		//alert(w1);
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("sub").innerHTML = this.responseText;
			}
		};
		xhttp.open("GET", "m/getsubcategory.php?q=" + w1, true);
		xhttp.send();
	}

	function getData() {
		var c = frm.category_id.value;
		var sc = frm.subcategory_id.value;
		var em = frm.faculty_email.value;
		//alert(w1);
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
<!-- End JS -->
<!-- Footer include -->
<?php include 'footer.html'; ?>