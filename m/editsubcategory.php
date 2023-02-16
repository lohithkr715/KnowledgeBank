<?php
error_reporting(0);
include("../dbcon.php");
session_start();
if (isset($_SESSION['master'])) {
	$master = $_SESSION['master'];
} else {
	header("location:index.php?msg=se");
}

$subcategory_id = $_POST['subcategory_id'];
$q = "select * from tbl_subcategory sc , tbl_category c where sc.category_id=c.category_id and subcategory_id=$subcategory_id";
$res = mysqli_query($con, $q);
$count = 1;
$category_name = "";
$subcategory_name = "";
while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
	$category_name = $row['category_name'];
	$subcategory_name = $row['subcategory_name'];
}
?>


<!-- Html main -->
<?php include './htmlmain.php'; ?>

<?php include("./dashboardNav.php"); ?>

<main style="height: 90vh">
	<h3 class="text-center mt-5">Edit Subcategory Name</h3>
	<section class="edit-area d-flex justify-content-center mt-5">
		<div class="container">
			<form action="../dblogic.php?pageno=5" method="POST" onsubmit="return confirm('Are you sure wannt to submit changes?')">
				<div class="form-group">
					<select name="category" required="required" class="form-control">
						<option value="">-Select Category-</option>
						<?php
						$q = "select * from tbl_category order by category_name";
						$res = mysqli_query($con, $q);

						while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
							echo $row['category_id'];
						?>
							<option value="<?php echo $row['category_id']; ?>" <?php if ($row['category_name'] == $category_name) echo "selected"; ?>><?php echo $row['category_name']; ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="subcategory_name" placeholder="Subcategory" value="<?php echo $subcategory_name ?>" required="required">
					<input type="hidden" name="subcategory_id" value="<?php echo $subcategory_id; ?>">
				</div>
				<div class="form-group"><input type="submit" class="btn btn-success" value="ADD"></div>
			</form>
		</div>
	</section>
</main>

</body>

</html>