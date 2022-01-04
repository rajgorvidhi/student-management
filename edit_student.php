<?php 
session_start();
if($_SESSION["name"]) { ?>
<?php
include "config.php";

if (isset($_POST['edit'])){
  //echo "hii";exit;
  $id=$_GET['id'];
  $name=$_POST['name'];
  $mobile_no=$_POST['mobile_no'];
  $email=$_POST['email'];
  $standard=$_POST['standard'];
  $gender=$_POST['gender'];
  $hobby=implode(",",$_POST['hobby']);
  $dob=$_POST['dob'];
  //echo "UPDATE student set name='$name',mobile_no='$mobile_no',email='$email', standard='$standard',gender='$gender',hobby='$hobby',dob='$dob' where id=".$id;
  //exit();

  $result=mysqli_query($mysqli, "UPDATE student set name='$name',mobile_no='$mobile_no',email='$email', standard='$standard',gender='$gender',hobby='$hobby',dob='$dob' where id=".$id);

  header("Location: view_students.php");
}
?>
<?php
$id=$_GET['id'];
//echo $id;exit;
$result= mysqli_query($mysqli, "SELECT * FROM student where id=".$id);
while ($res=mysqli_fetch_array($result)) {
  $name=$res['name'];
  $mobile_no=$res['mobile_no'];
  $email=$res['email'];
  $standard=$res['standard'];
  $gender=$res['gender'];
  $hobby=explode(",",$res['hobby']);
  $dob=$res['dob'];
}
?>
<html>
<head>
  <title>Edit Student</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script type="text/javascript" src="js/validation.js"></script>
</head>
<body>
<div class="container">
  <h2>Edit Student</h2>
  <h3><a href="dashboard.php">Dashboard</a></h3>
  <h3><a href="create_student.php">Add New Student</a></h3>
  <hr>
  <!-- Required Div Starts Here -->
  <form id="form" action="edit_student.php?id=<?php echo $id;?>" name="form" method="post">
    <p id="returnmessage"></p>
    <table width='50%' border="0" cellpadding="10px">
      <tr>
        <td>Student Name</td>
        <td> <input type="text" name="name" value="<?php echo $name; ?>"> </td>
      </tr>
      <tr>
        <td>Student Birth Date</td>
        <td> <input type="date" name="dob" value="<?php echo $dob; ?>"> </td>
      </tr>
      <tr>
        <td>Student Email</td>
        <td> <input type="email" name="email" value="<?php echo $email; ?>"> </td>
      </tr>
      <tr>
        <td>Student Mobile Number</td>
        <td> <input type="text" name="mobile_no" value="<?php echo $mobile_no; ?>"> </td>
      </tr>
      <tr>
      <tr>
        <td>Student Gender</td>
        <td> <input type="radio" name="gender" value="Male" <?php echo($gender=="Male"?'checked="checked"':""); ?> >Male 
        <input type="radio" name="gender" value="Female" <?php echo ($gender=="Female"?'checked="checked"':"");?>>Female </td>
      </tr>
      <tr>
        <td>Student Hobby</td>
        <td> <input type="checkbox" name="hobby[]" value="Singing" <?php if(in_array("Singing", $hobby)){ echo "checked=\"checked\""; } ?>>Singing 
        <input type="checkbox" name="hobby[]" value="Dancing" <?php if(in_array("Dancing", $hobby)){ echo "checked=\"checked\""; } ?>>Dancing
        <input type="checkbox" name="hobby[]" value="Drawing" <?php if(in_array("Drawing", $hobby)){ echo "checked=\"checked\""; } ?>>Drawing
        <input type="checkbox" name="hobby[]" value="Travelling" <?php if(in_array("Travelling", $hobby)){ echo "checked=\"checked\""; } ?>>Travelling </td>
      </tr>
      <tr>
        <td>Student Standard</td>
        <td><select name="standard">
          <option value="0">--Please Select Semester--</option>
          <option value="1" <?php echo ($standard == "1")?"selected":"" ?>>Std 1</option>
          <option value="2" <?php echo ($standard == "2")?"selected":"" ?>>Std 2</option>
          <option value="3" <?php echo ($standard == "3")?"selected":"" ?>>Std 3</option>
          <option value="4" <?php echo ($standard == "4")?"selected":"" ?>>Std 4</option>
          <option value="5" <?php echo ($standard == "5")?"selected":"" ?>>Std 5</option>
        </select>
        </td>
      </tr>     
      <tr>
        <td colspan="2">
          <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
          <input type="submit" name="edit" value="Edit">
      </tr> 
    </table>
  </form>
</div>
</body>
</html>
<?php } else echo "<h1>Please login first .</h1>" ?>