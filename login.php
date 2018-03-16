<?php
  include "connect.php";
  session_start();
  if(isset($_POST["sub"])) {
    $usrname=$_POST["uname"];
    $pass=md5($_POST["psw"]);
       
    $qry = "SELECT * FROM `users` WHERE  `username`='$usrname' AND `password`='$pass'";
    $sql = mysqli_query($conn,$qry) or die("Connection failed: " . mysqli_error());
   // $res=mysqli_fetch_assoc($sql);
    //echo $res['pwd'];
    if(mysqli_num_rows($sql)>0) {   
     //   $row=mysqli_fetch_assoc($sql);
      //  $_SESSION["id"]=$row['id'];
        //$_SESSION["user"]=$row['username'];
      //  $_SESSION["email"] = $row['email'];
        //$_SESSION["password"] = $row['pwd'];
        header('location:home.php');
    } else {
        //alert("Invalid login!!!....Please Register");
        header('location:register.php');
    }
  } 

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Login</title>
       	  <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1>USER LOGIN</h1>
    <form action="" method="post">
    	<div id="form">
		    <label for="uname"><b>Username</b></label>
		    <input type="text" placeholder="Enter Username" name="uname" required><br>
		    <label for="psw"><b>Password</b></label>
		    <input type="password" placeholder="Enter Password" name="psw" required>  <br>            
		    <button type="submit" name="sub">Login</button>
        </div>
    </form>
</body>
</html>
