<?php
   include "connect.php";
   //session_start();
   if(isset($_POST['sub'])){
       $name=$_POST["name"];
       $desc=$_POST["desc"];
       $uploadOk = 0;
    
        $errors= array();
        echo $_FILES['photo']['name'];
        $file_name = $_FILES['photo']['name'];
        $file_size = $_FILES['photo']['size'];
        $file_tmp = $_FILES['photo']['tmp_name'];
        $file_type = $_FILES['photo']['type'];
        $tmp = explode('.', $file_name);
        $file_ext=strtolower(end($tmp));
        
        $expensions= array("jpeg","jpg","png", "gif");
        if(in_array($file_ext,$expensions)=== false){
           array_push($errors, "choose a JPEG or PNG file.");
        }
        
        if($file_size > 50000) {
            array_push($errors, "size must be excately 50 KB.");
        }
        
        if(empty($errors)==true) {
           if(!move_uploaded_file($file_tmp,"uploads/".$file_name))
           	echo("error moving file");
           $uploadOk = 1;
        }else{
           print_r($errors);
        }
     
    if ($uploadOk == 1) {
         $qry="INSERT INTO `newsdata`(Name,Description,Image)VALUES('$name','$desc','$file_name')";
        mysqli_query($conn,$qry);
         if(mysqli_query($conn,$qry)){
            	echo '<script>alert("News added sucessfully")</script>';
            	
            	}
            else 
             echo "Connection was failed: ";
        header('location:addnews.php');
    }
     
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Add</title>
       	  <link rel="stylesheet" href="index.css">
</head>
<body>
	<h1>Add News</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="name"><b>Name</b></label>
        <input type="text" placeholder="Enter news title" name="name" required><br>
       
        <label for="desc"><b>Description</b></label>
        <textarea rows='5' cols='30' placeholder="Enter Description" name="desc" required></textarea><br>

        <label for="photo"><b>Image</b></label>
        <input type="file" placeholder="Enter image" name="photo"><br>

        <button type="submit" name="sub">Add</button>
    </form>
</body>
</html>



