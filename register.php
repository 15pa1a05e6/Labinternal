<?php
   require "connect.php";
   session_start();
   if(isset($_POST['sub'])){
       $name=$_POST["uname"];
       $email=$_POST["email"];
       $pass=$_POST["psw"];
       $qry = "SELECT * FROM `users` WHERE  `username`='$name' OR `email`='$email'";
       $x=mysqli_query($conn,$qry);
       if(mysqli_num_rows($x)>0){
          echo "user/mail already existed";
       }else{    
            $qry="INSERT INTO `users`(username,email,password)VALUES('$name','$email','$pass')";
            $res=mysqli_query($conn,$qry);
             if($res){
            	echo '<script>alert("Registered sucessfully")</script>';
            	header('location:home.php');
            	}
            else 
             echo "Conn failed: ";
            
       }         
   }

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Register</title>
</head>   
<body>
<h1>USER REGISRATION</h1>
    <form aciton="home.php" method="post" autocomplete="off">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter email" name="email" required>
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
              
        <button type="submit" name="sub">Register</button>
    </form>
</body>
</html>
