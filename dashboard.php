<?php
session_start();
include "config.php";
$result= mysqli_query($mysqli, "SELECT * FROM student");
$total_student = mysqli_num_rows($result);
?>
<html>
<head>
<title>User Login</title>
</head>
<body>

<?php if($_SESSION["name"]) { ?>
	Welcome <?php echo $_SESSION["name"]; ?>. Click here to <a href="logout.php" tite="Logout">Logout

	<br><br><a href="create_student.php" tite="Add Student" class="button">Add Student</a>
	<br><br><a href="view_students.php" tite="View Students">View Student </a> (Total Students : <?php echo $total_student;?> )
<?php } else echo "<h1>Please login first .</h1>" ?>
</body>
</html>
