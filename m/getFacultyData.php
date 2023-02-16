 <?php

	error_reporting(0);
	include("../dbcon.php");
	$faculty_email = $_REQUEST["femail"];
	//$faculty_email="rishabhsingh1026@gmail.com";
	//$w1=1;
	//echo $w1;
	$q = "select *,(select Count(topic_id) from tbl_topic where faculty_email=email) as topic_count from tbl_faculty  where email='$faculty_email'";
	//echo $q;
	$res = mysqli_query($con, $q);
	$count = 1;
	while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
	?>


 	<div class="faculty-details mt-5">
 		<table>
 			<h3>Faculty Details</h3>
 			<tr>
 				<td width="40%"><b>Name : </b><?php echo $row['faculty_name']; ?></td>

 				<td width="30%"> <b>Designation :</b> <?php echo $row['faculty_designation']; ?></td>
 				<td width="30%"> <b>Mobile :</b> <?php echo $row['mobile']; ?></td>
 			</tr>
 			<tr>
 				<td width="40%"> <b>Email :</b> <?php echo $row['email']; ?></td>
 				<td width="40%"> <b>Password :</b> <?php echo $row['password']; ?></td>
 				<td width="20%"> <b>Topic(s) Uploaded :</b> <?php echo $row['topic_count']; ?></td>
 			</tr>

 			<tr>
 				<td colspan="2"><a align="center" class="btn btn-danger text-decoration-none mt-3" onclick="return confirm('Are you sure ,want to edit?')" style="color:white;" href="editFaculty.php?faculty_id=<?php echo $row['email']; ?>">Edit</a></td>
 			</tr>
 		</table>
 	</div>
 	<br>
 <?php
	}
	?>