 <?php
	error_reporting(0);
	include("../dbcon.php");
	$faculty_email = $_REQUEST["faculty_id"];
	//$faculty_email="rishabhsingh1026@gmail.com";
	//$w1=1;
	//echo $w1;
	$q = "select *,(select Count(topic_id) from tbl_topic where faculty_email=email) as topic_count from tbl_faculty  where email='$faculty_email'";
	//echo $q;
	$res = mysqli_query($con, $q);
	$count = 1;
	while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
	?>

 	<!-- Html main -->
 	<?php include './htmlmain.php'; ?>

 	<?php include("./dashboardNav.php"); ?>

 	<main style="height: 90vh;">
 		<!-- edit-faculty-area -->
 		<div class="container my-5">
 			<form action="../dblogic.php?pageno=13" method="POST">
 				<table cellpadding="10" width="70%" class="table table-borderless">
 					<h3>Faculty Details</h3>
 					<tr>
 						<td width="40%">
 							<b>Name : </b>
 							<input type="text" class="form-control" required="required" value="<?php echo $row['faculty_name']; ?>" name="faculty_name">
 							<input type="hidden" value="<?php echo $row['faculty_id']; ?>" name="faculty_id">
 						</td>

 						<td width="30%">
 							<b>Designation :</b>
 							<input type="text" class="form-control" required="required" value="<?php echo $row['faculty_designation']; ?>" name="faculty_designation">
 						</td>
 						<td width="30%">
 							<b>Mobile :</b>
 							<input type="text" class="form-control" required="required" value="<?php echo $row['mobile']; ?>" name="mobile">
 						</td>
 					</tr>
 					<tr>
 						<td width="40%">
 							<b>Email :</b>
 							<input type="text" class="form-control" required="required" value="<?php echo $row['email']; ?>" name="email">
 						</td>
 						<td width="40%">
 							<b>Password :</b>
 							<input type="text" class="form-control" required="required" value="<?php echo $row['password']; ?>" name="password">
 						</td>
 						<td width="20%"><br /> <input class="btn btn-success form-control" type="submit" value="Save"></td>
 					</tr>
 				</table>
 			</form>
 		</div>
 		<!-- end edit faculty-area -->
 	</main>
 <?php
	}
	?>

 </body>

 </html>