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
//echo $femail;
$topic_id = $_REQUEST['topic_id'];
//$msg=$_REQUEST['msg'];

?>

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
//echo $femail;
$msg = $_REQUEST['msg'];

?>

<!-- Html main -->
<?php include './htmlmain.php'; ?>

<?php include("./dashboardNav.php"); ?>

<main>
	<!-- view topic area -->

	<section class="view-topic-area container my-5">
		<div class="main-title d-flex justify-content-center">
			<h2>Edit Topic</h2>
		</div>
		<?php
		$q = "select * from tbl_topic t,tbl_subcategory sub,tbl_category c where t.subcategory_id=sub.subcategory_id and sub.category_id=c.category_id and faculty_email='$femail' order by topic_upload_date desc,t.	subcategory_id	asc";
		//echo $q;
		$res = mysqli_query($con, $q);
		$count = 1;
		if ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
		?>
			<form action="../dblogic.php?pageno=9" method="POST" enctype="multipart/form-data">
				<div class="topic-area my-4">
					<div class="topic-details my-1">
						<div class="topic-info ">
							<div class="row px-3">
								<div class="col-lg-3 col-md-4 col-sm-4">
									<div class="row">
										<p class="text-desc"><span class="head"> Topic <?php echo $count;
																						$count++; ?>: </span><input type="text" class="form-control" value="<?php echo $row['topic_name']; ?>" name="topic_name"></p>
									</div>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-4">
									<div class="row">
										<p class="text-desc"><span class="head"> Category: </span><?php echo $row['category_name']; ?></p>
									</div>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-4">
									<div class="row">
										<p class="text-desc"><span class="head"> Subcategory: </span> <?php echo $row['subcategory_name']; ?> </p>
									</div>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-4">
									<div class="row">
										<p class="text-desc"><span class="head"> Upload Date: </span> <?php echo $row['topic_upload_date']; ?></p>
									</div>
								</div>
							</div>
							<div class="topic-desc">
								<span class="head">Description: </span>
								<textarea rows="6" name="topic_description" class="form-control mb-3"><?php echo $row['topic_description']; ?></textarea>
							</div>
							<div class="d-flex justify-content-between">
								<div><span class="head"> Old File:&nbsp;&nbsp;</span><a class="text-decoration-none" onclick="return confirm('Are you sure ,want to download file?')" class="text-decoration-none" href="../topic_files/download.php?file=<?php echo $row['file_name']; ?>"><?php echo $row['file_name']; ?></a></div>
								<div><span class="head"> New File:&nbsp;&nbsp;</span><input type="file" name="file"> <input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>">
									<input type="hidden" name="file_name" value="<?php echo $row['file_name']; ?>"> </div>
								<div><button class="btn btn-success" type="submit"><span>Save<span><i class="fas fa-save mx-2"></i></button></div>
							</div>
						</div>

					</div>
				</div>
			</form>
		<?php
		}
		?>
	</section>

	<!-- end view topic area -->
</main>

</body>

</html>






<!-- 

<div>
	<a href="viewTopic.php">Back</a>
	<h1>Edit Topic</h1>
	<?php
	$q = "select * from tbl_topic t,tbl_subcategory sub,tbl_category c where t.subcategory_id=sub.subcategory_id and sub.category_id=c.category_id and faculty_email='$femail' order by topic_upload_date desc,t.	subcategory_id	asc";
	//echo $q;
	$res = mysqli_query($con, $q);
	$count = 1;
	if ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
	?>
		<form action="../dblogic.php?pageno=9" method="POST" enctype="multipart/form-data">
			<table border="0" width="70%" style="border:1px solid;" cellspacing="5">
				<tr>
					<td width="25%"><b>Topic <?php echo $count;
												$count++; ?>:</b><input type="text" value="<?php echo $row['topic_name']; ?>" name="topic_name"></td>
					<td width="25%"> <b>Category:</b> <?php echo $row['category_name']; ?></td>
					<td width="25%"> <b>Subcategory:</b> <?php echo $row['category_name']; ?></td>
					<td width="25%"> <b>Upload Date:</b> <?php echo $row['topic_upload_date']; ?></td>
				<tr>
				<tr>
					<td colspan="4" width="100%"><b>Description:</b><br> <textarea cols="130" rows="6" name="topic_description"><?php echo $row['topic_description']; ?></textarea></td>
				</tr>
				<tr>
					<td><b>Old File:</b><a align="center" onclick="return confirm('Are you sure ,want to download file?')" style="text:decoration:none; color:blue;" href="../topic_files/download.php?file=<?php echo $row['file_name']; ?>"><?php echo $row['file_name']; ?></a></td>
					<td colspan="2"><b>New File:</b> <input type="file" name="file">
						<input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>">
						<input type="hidden" name="file_name" value="<?php echo $row['file_name']; ?>">
					</td>
					<td><input type="submit" value="Save"></td>
				</tr>
			</table>
		</form>

		<br>
	<?php
	}
	?>
	<a href="../dblogic.php?pageno=11">Logout</a>
</div> -->