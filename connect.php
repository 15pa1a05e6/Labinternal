<?php
$servername = "localhost";
$username = "root";
$password = "vishnu123";
$db = "newswebsite";


$conn = mysqli_connect($servername, $username, $password,$db) or die("Connection is failed: " . mysqli_connect());
if(!$conn){
    echo 'failed to connect';
}

?>
