<?php 
session_start();
if($_SESSION["name"]) { ?>
<?php
include "config.php";
$id=$_GET['id'];
$sql=mysqli_query($mysqli, "SELECT * from student where id=".$id);
$result=mysqli_query($mysqli, "DELETE FROM student where id=".$id);
//echo "DELETE FROM student id=".$id;
header("Location:view_students.php"); 
?>
<?php } else echo "<h1>Please login first .</h1>" ?>