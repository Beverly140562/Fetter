<?php

session_start();



$con =database::connect();

$email = $_SESSION['email'];

$query = $con->prepare("

DELETE FROM users WHERE email=:email

");

$query->bindparam(":email", $email);

$query->execute();

header("Location: index.html");


?>