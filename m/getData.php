 <?php

	error_reporting(0);
	include("../dbcon.php");
	$category_id = $_REQUEST["c"];
	//$category_id = "Computer Science";
	$subcategory_id = $_REQUEST["sc"];
	//$subcategory_id = "Computer Network";
	$faculty_email = $_REQUEST["em"];
	//$faculty_email = "Amarsingh@yahoo.com";
	//$w1=1;
	//echo $w1;
	$q = "select * from tbl_topic t,tbl_subcategory sub,tbl_category c where t.subcategory_id=sub.subcategory_id and sub.category_id=c.category_id and t.faculty_email ='$faculty_email' and sub.subcategory_name like '%$subcategory_id%' and c.category_name like '%$category_id%' order by topic_upload_date desc,t.subcategory_id asc";
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
 		<div class="container mt-5">
 			<table class="table topic-list table-borderless" cellspacing="5">
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
 					<td colspan="2"><a onclick="return confirm('Are you sure ,want to download file?')" class="btn btn-success" style="text:decoration:none; color:white;" href="topic_files/download.php?file=<?php echo $row['file_name']; ?>">Download File</a></td>


 				</tr>
 			</table>

 		</div>
 <?php
		}
	}
	?>