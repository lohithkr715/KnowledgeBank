 <?php

error_reporting(0);
include("../dbcon.php");
$w1=$_REQUEST["q"];
//$w1=1;
//echo $w1;
$query="select * from tbl_subcategory sc,tbl_category c where sc.category_id=c.category_id and c.category_name = '$w1' order by subcategory_name";
//echo $query;
$res=mysqli_query($con,$query);
echo "<select class='form-control' name='subcategory_id' required='required'>";
   echo "<option value='' selected>-Select Subcategory-</option>";
while($row=mysqli_fetch_array($res,MYSQLI_BOTH)){
 echo "<option value='".$row['subcategory_id']."'>".$row['subcategory_name']."</option>";
	}
 echo "</select>";
  ?>
