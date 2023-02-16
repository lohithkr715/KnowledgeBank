<?php
	$con=mysqli_connect("localhost:3307","root","","knowledgeBank");
	if(!($con)){
		echo "<script>alert('Connection Failed !');</script>";
		exit;
	}else{
		//	echo "success";
	}
?>