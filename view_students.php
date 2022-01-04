<?php 
session_start();
if($_SESSION["name"]) { ?>
<?php
include "config.php";
$result= mysqli_query($mysqli, "SELECT * FROM student");
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>View Students</title>
</head>
<body>
	<a href="dashboard.php">Dashboard</a> </br> </br>
	<a href="create_student.php">Add New Student Data</a> </br> </br>
	<table width="80%" border="2" id="student">
		<tr>
			<td>Student ID</td>
			<td>Student Name</td>
			<td>Student Mobile Number</td>
			<td>Student Email</td>
			<td>Student Standard</td>
			<td>Student Gender</td>
			<td>Student Hobby</td>
			<td>Student DOB</td>
			<td>Edit</td>
			<td>Delete</td>
		</tr>
		<?php
		while($res=mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>".$res['id']."</td>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['mobile_no']."</td>";
			echo "<td>".$res['email']."</td>";
			echo "<td>".$res['standard']."</td>";
			echo "<td>".$res['gender']."</td>";
			echo "<td>".$res['hobby']."</td>";
			echo "<td>".$res['dob']."</td>";
			echo "<td> <a href=\"edit_student.php?id=$res[id]\"> Edit</a> </td>";
			echo "<td> <a href=\"delete_student.php?id=$res[id]\"> Delete</a> </td>";
		}
		?>
		
	</table>
</body>
</html>
<?php } else echo "<h1>Please login first .</h1>" ?>