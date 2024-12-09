<?php

$servername = "localhost"; 
$dbusername = "root";      
$dbpassword = "";        
$dbname = "fetter";      

try {
 
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Handle any errors (such as connection failure)
    echo "Connection failed: " . $e->getMessage();
    exit(); // Stop further script execution if the connection fails
}
?>
