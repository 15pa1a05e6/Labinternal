<?php
  include "connect.php";
  //session_start();

  function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
  }

  if(isset($_POST["sub"])) {
    $usrname=$_POST["uname"];
    $pass=md5($_POST["psw"]);

    if(($usrname == "Saikiran") && ($pass == MD5('kiran'))){
        echo "logged in";   
       /// $_SESSION["user"]=$usrname;
        //$_SESSION["email"] = $email;
       // $_SESSION["password"] = $pass;
        
        header('location:admin.php');
    }
    else {
        phpAlert(   "Invalid login!!!....Please Register"   );         
        header('location:index.php');
    }
  } 


?>

<!DOCTYPE HTML>
<html>
<head>
    <title>ADMIN LOGIN</title>
     <link rel="stylesheet" href="index.css">
</head>
<body>
	<h1>ADMIN LOGIN</h1>
    <form action="" method="post">        
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required><br>
             
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required><br>
              
        <button type="submit" name="sub">Login</button>
    </form>
</body>
</html>
