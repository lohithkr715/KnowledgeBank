<?php
error_reporting(0);
include("../dbcon.php");
session_start();
if (isset($_SESSION['master'])) {
	$master = $_SESSION['master'];
} else {
	header("location:index.php?msg=se");
}
$category_id = $_POST['category_id'];
$category_name = $_POST['category_name'];
?>
<!-- Html main -->
<?php include './htmlmain.php'; ?>

<?php include("./dashboardNav.php"); ?>

<main style="height: 90vh">
	<h3 class="text-center mt-5">Edit Category Name</h3>
	<section class="edit-area d-flex justify-content-center mt-5">
		<div class="container">
			<form action="../dblogic.php?pageno=3" method="POST">
				<div class="form-group">
					<input type="hidden" name="category_id" class="form-control" value="<?php echo $category_id; ?>">
				</div>
				<div class="form-group">
					<input type="text" name="category_name" placeholder="Category" class="form-control" value="<?php echo $category_name; ?>" required="required">
				</div>
				<div class="form-group"><input type="submit" value="ADD" class="btn btn-success mr-5"><a href="addcategory.php"><input type="button" class="btn btn-danger" value="Cancel"></a></div>
			</form>
		</div>
	</section>
</main>

</body>

</html>