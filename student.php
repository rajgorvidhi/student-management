<?php
include "config.php";
if (isset($_POST['submit'])) {
  //echo $_POST['name'];exit;
  $name=$_POST['name'];
  $mobile_no=$_POST['mobile_no'];
  $email=$_POST['email'];
  $gender=$_POST['gender'];
  $dob=$_POST['dob'];
  $hobby=implode(",",$_POST['hobby']);
  $standard=$_POST['standard'];

  //echo "INSERT INTO student(name, mobile_no, email, standard, gender, hobby,dob) VALUES ('$name','$mobile_no','$email','$standard','$gender','$hobby','$dob')";exit;
  
  $result = mysqli_query($mysqli,"INSERT INTO student(name, mobile_no, email, standard, gender, hobby,dob) VALUES ('$name','$mobile_no','$email','$standard','$gender','$hobby','$dob')");

  header("location:view_students.php");
}
?>