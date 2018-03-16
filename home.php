<?php 
	include "connect.php";
   // session_start();
	
  
  $qry = "SELECT Name,Description FROM newsdata";
  $sql = mysqli_query($conn,$qry);
  if(mysqli_num_rows($sql)>0) 
     $row=mysqli_fetch_assoc($sql);
  else 
     $warning = "Invalid page";
?>
<!DOCTYPE html>
<html>
	 <head>
   	  <link rel="stylesheet" href="index.css">
      <title>Newswebsite</title>
   </head>
    <body>
    <h1>NEWS</h1>
    	<div>
         <h2><?php echo $row['Name'];?></h2>
          <p ><?php echo $row['Description'];?></p>
          <h3>Your Photos</h3>
          <ul>
              <li><img src="uploads/<?php echo $row['Image'];?>"></li>
          </ul>
          </div>
    </body>  
</html>
