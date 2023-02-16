<?php
include("dbcon.php");
$pageno = $_REQUEST["pageno"];
switch ($pageno) {
		// Master Login Logic
	case 1:
		$password = "master123";
		if ($_POST['pass'] == $password) {
			session_start();
			$_SESSION['master'] = "master";
			header("location:m/dashboard.php");
		} else {
			header("location:m/index.php?err=12");
		}
		break;
		// Add category Logic
	case 2:
		$category_name = $_POST['category_name'];
		$query1 = "select * from tbl_category where category_name='$category_name'";
		$res = mysqli_query($con, $query1);
		$rowsAffected = mysqli_num_rows($res);
		//echo $rowsAffected;
		if ($rowsAffected > 0) {
			header("location:m/addcategory.php?msg=f2");
		} else {
			$query = $con->prepare("insert into tbl_category(category_name) values(?)");
			$query->bind_param("s", $category_name);
			if ($query->execute()) {
				header("location:m/addcategory.php?msg=s");
			} else {
				header("location:m/addcategory.php?msg=f1");
			}
		}


		break;
		//category edit logic
	case 3:
		$category_id = $_POST['category_id'];
		$femail = $_POST['femail'];
		$category_name = $_POST['category_name'];
		$query1 = "select * from tbl_category where category_name='$category_name'";
		$res = mysqli_query($con, $query1);
		$rowsAffected = mysqli_num_rows($res);
		//echo $rowsAffected;
		if ($rowsAffected > 0) {
			header("location:m/addcategory.php?msg=f3");
		} else {
			$q = "update tbl_category set category_name='$category_name' where category_id=$category_id";
			if (mysqli_query($con, $q)) {
				header("location:m/addcategory.php?msg=es");
			} else {
				header("location:m/addcategory.php?msg=ef");
			}
		}

		break;
		// Add subcategory Logic
	case 4:
		$category_id = $_POST['category'];
		$subcategory_name = $_POST['subcategory_name'];
		$query1 = "select * from tbl_subcategory where category_id=$category_id and subcategory_name='$subcategory_name'";
		$res = mysqli_query($con, $query1);
		$rowsAffected = mysqli_num_rows($res);
		//echo $rowsAffected;
		if ($rowsAffected > 0) {
			header("location:m/addsubcategory.php?msg=f2");
		} else {
			$query = $con->prepare("insert into tbl_subcategory(subcategory_name,category_id) values(?,?)");
			$query->bind_param("si", $subcategory_name, $category_id);
			if ($query->execute()) {
				header("location:m/addsubcategory.php?msg=s");
			} else {
				header("location:m/addsubcategory.php?msg=f1");
			}
		}


		break;
	case 5: //Edit subcatgeory logic
		$subcategory_id = $_POST['subcategory_id'];
		$category_id = $_POST['category'];
		$subcategory_name = $_POST['subcategory_name'];
		$query1 = "select * from tbl_subcategory where category_id=$category_id and subcategory_name='$subcategory_name'";
		$res = mysqli_query($con, $query1);
		$rowsAffected = mysqli_num_rows($res);
		//echo $rowsAffected;
		if ($rowsAffected > 0) {
			header("location:m/addsubcategory.php?msg=f3");
		} else {
			$q = "update tbl_subcategory set subcategory_name='$subcategory_name' , category_id=$category_id where subcategory_id=$subcategory_id";
			if (mysqli_query($con, $q)) {
				header("location:m/addsubcategory.php?msg=es");
			} else {
				header("location:m/addsubcategory.php?msg=ef");
			}
		}

		break;
	case 6: //faculty registration logic

		$email = $_POST['email'];

		$q1 = "select * from tbl_faculty where email='$email'";
		$res = mysqli_query($con, $q1);
		$rowsAffected1 = mysqli_num_rows($res);
		if ($rowsAffected1 > 0) {
			header("location:f/index.php?msg=ar");	//already registered
		} else {
			$mobile = $_POST['mobile'];
			$password = $_POST['password'];
			$faculty_name = $_POST['faculty_name'];
			$faculty_designation = $_POST['faculty_designation'];
			$q = "insert into tbl_faculty(faculty_name,faculty_designation,email,mobile,password,faculty_status,faculty_reg_date) values('$faculty_name','$faculty_designation','$email','$mobile','$password',1,curdate())";
			$res = mysqli_query($con, $q);
			if ($res > 0) {
				header("location:f/index.php?msg=rs");	//registration successful
			} else {
				header("location:f/registration.php?msg=rf");	//registration failed
			}
		}

		break;
	case 7:		//faculty login logic
		$email = $_POST['email'];
		$password = $_POST['pass'];
		echo $password;
		$q = "select * from tbl_faculty where email='$email' and password='$password'";
		echo $q;
		$res = mysqli_query($con, $q);
		$rowsAffected = mysqli_num_rows($res);
		if ($rowsAffected > 0) {
			session_start();
			$_SESSION['email'] = $email;
			header("location:f/dashboard.php");	//login successful
		} else {
			header("location:f/index.php?msg=lf");	//login failed
		}
		break;
	case 8:	//topic insertion logic
		//$category_id=$_POST['category_id'];
		$femail = $_POST['femail'];
		$subcategory_id = $_POST['subcategory_id'];
		$topic_name = $_POST['topic_name'];
		$topic_description = $_POST['topic_description'];

		//file upload logic----------------------------------------------------------------
		$file = $_FILES['file']['name'];
		$extension = pathinfo($file);
		$file = rand() . "." . $extension['extension'];

		//-----------------------------------------------------------------------------
		$q = "insert into tbl_topic (subcategory_id,topic_name,topic_description,topic_upload_date,topic_status,faculty_email,file_name) values($subcategory_id,'$topic_name','$topic_description',curdate(),1,'$femail','$file')";
		echo $q;
		//exit;

		if (mysqli_query($con, $q)) {
			move_uploaded_file($_FILES['file']['tmp_name'], "topic_files/$file");
			header("location:f/dashboard.php?msg=tus");
		} else {
			header("location:f/addTopic.php?msg=tuf");
		}


		break;
	case 9:	//topic edit logic
		//$category_id=$_POST['category_id'];
		$topic_id = $_POST['topic_id'];
		$file_name = $_POST['file_name'];
		$topic_name = $_POST['topic_name'];
		$topic_description = $_POST['topic_description'];
		//echo $file_name;
		//file upload logic----------------------------------------------------------------
		$file = $_FILES['file']['name'];
		//echo $file;
		if ($file == "") {
			$q = "update tbl_topic set topic_name='$topic_name', topic_description='$topic_description' where topic_id=$topic_id";
			//$res=;
			if (mysqli_query($con, $q)) {
				header("location:f/ViewTopic.php?msg=tes");
			} else {
				header("location:f/ViewTopic.php?msg=tef");
			}
		} else {
			//echo "entter";
			$location = "topic_files/" . $file_name;
			//echo $location."<br>";
			if (unlink($location)) {
				//echo "entter1";

				$extension = pathinfo($file);
				$file = rand() . "." . $extension['extension'];
				$q = "update tbl_topic set topic_name='$topic_name', topic_description='$topic_description',file_name='$file' where topic_id=$topic_id";
				//echo "<br>".$q;
				//$res=;
				if (mysqli_query($con, $q)) {
					move_uploaded_file($_FILES['file']['tmp_name'], "topic_files/$file");
					header("location:f/ViewTopic.php?msg=tes");
				} else {
					header("location:f/ViewTopic.php?msg=tef");
				}
			} else {
				header("location:f/ViewTopic.php?msg=cfof");
			}
		}



		break;
	case 10:
		//topic delete login
		$topic_id = $_REQUEST['topic_id'];
		$file_name = $_REQUEST['file_name'];
		$location = "topic_files/" . $file_name;
		$q = "delete from tbl_topic where topic_id=$topic_id";
		if (mysqli_query($con, $q)) {
			if (unlink($location)) {
			}
		} else {
		}
		//echo $location."<br>";


		break;
	case 11:
		// faculty logout logic
		session_start();
		if (isset($_SESSION["email"])) {
			unset($_SESSION["email"]);
			session_destroy();
			header("location:f/index.php?msg=lo");
		} else {
			header("location:f/index.php?msg=se");
		}
		break;
	case 12:
		// admin logout logic
		session_start();
		if (isset($_SESSION["master"])) {
			unset($_SESSION["master"]);
			session_destroy();
			header("location:m/index.php?msg=lo");
		} else {
			header("location:m/index.php?msg=se");
		}
		break;
	case 13: //faculty edit logic

		$email = $_POST['email'];


		$mobile = $_POST['mobile'];
		$password = $_POST['password'];
		$faculty_name = $_POST['faculty_name'];
		$faculty_id = $_POST['faculty_id'];
		$faculty_designation = $_POST['faculty_designation'];
		$q = "update tbl_faculty set email='$email',mobile='$mobile',password='$password',faculty_name='$faculty_name',faculty_designation='$faculty_designation' where faculty_id=$faculty_id";

		if (mysqli_query($con, $q)) {
			header("location:m/facultyTopics.php?msg=es");	//edit successful
		} else {
			header("location:m/facultyTopics.php?msg=ef");	//edit failed
		}


		break;
}
