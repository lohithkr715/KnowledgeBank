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
			<h2>Your Topics</h2>
		</div>
		<?php
		$q = "select * from tbl_topic t,tbl_subcategory sub,tbl_category c where t.subcategory_id=sub.subcategory_id and sub.category_id=c.category_id and faculty_email='$femail' order by topic_upload_date desc,t.	subcategory_id	asc";
		//echo $q;
		$res = mysqli_query($con, $q);
		$n = mysqli_num_rows($res);
		if ($n == 0) {
			echo "<h3 style='color:red;'>No Data Fornd</h3>";
		} else {


			$count = 1;
			while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
		?>
				<div class="topic-area my-4">

					<div class="topic-details my-1">
						<div class="topic-info ">
							<div class="row px-3">
								<div class="col-lg-3 col-md-4 col-sm-4">
									<div class="row">
										<p class="text-desc"><span class="head"> Topic <?php echo $count;
																						$count++; ?>: </span> <?php echo $row['topic_name']; ?></p>
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
								<p class="text-desc text-secondry"><?php echo $row['topic_description']; ?> --s laboriosam pariatur, ut officiis asperiores reiciendis error consequatur laudantium sint possimus quam tempore quia consectetur quasi praesentium excepturi adipisci rem.</p>
							</div>
							<div class="d-flex justify-content-between">
								<a onclick="return confirm('Are you sure ,want to download file?')" href="../topic_files/download.php?file=<?php echo $row['file_name']; ?>" class="text-decoration-none"><button class="btn-prop btn btn-success">Download File<i class="fas fa-download ml-3"></i></button></a>
								<a href="editTopic.php?topic_id=<?php echo $row['topic_id']; ?>" onclick="return confirm('Are you sure, want to edit?')"><button class="btn-prop btn btn-dark mr-5"><i class="fas fa-user-edit"></i></button></a>
								<a href="../dblogic.php?pageno=10&file_name=<?php echo $row['file_name']; ?>&topic_id=<?php echo $row['topic_id']; ?>" onclick="return confirm('Are you sure, want to delete?')"><button class="btn-prop btn btn-danger mr-5"><i class="fas fa-trash-alt"></i></button></a>
							</div>
						</div>

					</div>
				</div>
		<?php
			}
		}
		?>
	</section>

	<!-- end view topic area -->
</main>

</body>

</html>