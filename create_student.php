<?php 
session_start();
if($_SESSION["name"]) { ?>
<html>
<head>
  <title>Add Student</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script type="text/javascript" src="js/validation.js"></script>
</head>
<body>
<div class="container">
  <h2>Add Student</h2>
  <h3><a href="dashboard.php">Dashboard</a></h3>
  <hr>
  <!-- Required Div Starts Here -->
  <form id="form" action="create_student.php" name="form" method="post">
    <p id="returnmessage"></p>
    <table width='50%' border="0" cellpadding="10px">
      <tr>
        <td>Student Name</td>
        <td> <input type="text" name="name"> </td>
      </tr>
      <tr>
        <td>Student Birth Date</td>
        <td> <input type="date" name="dob"> </td>
      </tr>
      <tr>
        <td>Student Email</td>
        <td> <input type="email" name="email"> </td>
      </tr>
      <tr>
        <td>Student Mobile Number</td>
        <td> <input type="text" name="mobile_no"> </td>
      </tr>
      <tr>
      <tr>
        <td>Student Gender</td>
        <td> <input type="radio" name="gender" value="Male">Male 
        <input type="radio" name="gender" value="Female">Female </td>
      </tr>
      <tr>
        <td>Student Hobby</td>
        <td> <input type="checkbox" name="hobby[]" value="Singing">Singing 
        <input type="checkbox" name="hobby[]" value="Dancing">Dancing
        <input type="checkbox" name="hobby[]" value="Drawing">Drawing
        <input type="checkbox" name="hobby[]" value="Travelling">Travelling </td>
      </tr>
      <tr>
        <td>Student Standard</td>
        <td><select name="standard">
          <option value="0">--Please Select Semester--</option>
          <option value="1">Std 1</option>
          <option value="2">Std 2</option>
          <option value="3">Std 3</option>
          <option value="4">Std 4</option>
          <option value="5">Std 5</option>
        </select>
        </td>
      </tr>     
      <tr>
        <td colspan="2"><input type="submit" name="submit" value="Register">
      </tr> 
    </table>
  </form>
</div>
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
</body>
</html>
<?php } else echo "<h1>Please login first .</h1>" ?>