<?php
    include "config.php";
    session_start();
    if(count($_POST)>0) {
        $result = mysqli_query($mysqli,"SELECT * FROM user WHERE user_name='" . $_POST["user_name"] . "' and password = '". $_POST["password"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
            $_SESSION["id"] = $row['id'];
            $_SESSION["name"] = $row['name'];
        } else {
         $message = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["id"]) && $_SESSION["id"]>0) {
        header("Location:dashboard.php");
    }
?>
<html> 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Student Management System </title>
<style> 
button { 
   background-color: #4CAF50; 
   width: 100%;
    color: orange; 
    padding: 15px; 
    margin: 10px 0px; 
    border: none; 
    cursor: pointer; 
} 
form { 
    border: 3px solid #f1f1f1; 
} 
input[type=text], input[type=password] { 
    width: 100%; 
    margin: 8px 0;
    padding: 12px 20px; 
    display: inline-block; 
    border: 2px solid green; 
    box-sizing: border-box; 
}
.cancelbtn { 
    width: auto; 
    padding: 10px 18px;
    margin: 10px 5px;
} 
.container { 
    padding: 25px; 
} 
</style> 
</head>  
<body>  
    <center> <h1>Login Form </h1> </center> 
    <form name="frmlogin" method="post" action="">
        <div class="message"><?php if($message!="") { echo $message; } ?></div>
        <div class="container"> 
            <label>Username : </label> 
            <input type="text" placeholder="Enter Username" name="user_name" required>
            <label>Password : </label> 
            <input type="password" placeholder="Enter Password" name="password" required>
            <input type="submit" name="submit" value="Login"> 
            <input type="reset"> 
        </div> 
    </form>   
</body>   
</html>

 
