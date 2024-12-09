<?php
// define server variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fetter";

$name = $_POST['name'];

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($name) {
        $sql = "INSERT INTO users (name) VALUES ('$name')";
        $conn->exec($sql);
        echo "New Registration!";
    }


    // 

} catch(PDOException $e) {

    echo "Connection failed: " . $e->getMessage();

}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>User Registration!</h1>

    <form action="" method="post">
        Name: <input type="text" name="name"><br>
        <input type="submit" value="Register">
    </form>

    <a href="logout.php">Logout</a>
</body>
</html>