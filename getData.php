 <?php

	error_reporting(0);
	include("dbcon.php");
	$category_id = $_REQUEST["c"];
	$subcategory_id = $_REQUEST["sc"];
	$faculty_email = $_REQUEST["em"];
	//$w1=1;
	//echo $w1;
	$q = "select * from tbl_topic t,tbl_subcategory sub,tbl_category c where t.subcategory_id=sub.subcategory_id and sub.category_id=c.category_id and t.faculty_email like '%$faculty_email%' and sub.subcategory_name like '%$subcategory_id%' and c.category_name like '%$category_id%' order by topic_upload_date desc,t.subcategory_id asc";
	//echo $query;
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

 		<div id="all" class="topic-area container">
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
 						<p class="text-desc"><?php echo $row['topic_description']; ?> </p>
 					</div>
 					<div>
 						<button class="btn-prop btn btn-success"><a class="download" style="text-decoration: none;" onclick="return confirm('Are you sure ,want to download file?')" href="topic_files/download.php?file=<?php echo $row['file_name']; ?>">Download File <i class="fas fa-download ml-3"></i></a></button>
 					</div>
 				</div>
 			</div>
 		</div>

 		<br>
 <?php
		}
	}
	?>