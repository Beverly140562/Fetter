<?php
require 'actions/database.php';

$_SESSION["user_id"] = 1;
$sessionUser_id = $_SESSION["user_id"];
$user = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM users WHERE user_id = $sessionUser_id"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="css/profile.css" rel="stylesheet">


    <title>Profileupdate | Fetter</title>
</head>
<body>
 



</body>
</html>