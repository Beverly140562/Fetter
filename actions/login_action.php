<?php
session_start(); // Start the session to store session data

include 'database.php';

    $name = $_POST['name'];
    $Username = $_POST['username'];
    $password = $_POST['password'];

    // Check if any of the fields are empty
    if (empty($Username) || empty($password)) {
        die('All fields are required');
    
    }
    try {

    $sql = "SELECT name, Username, password FROM users WHERE username='$Username' AND password='$password'";
    $result = $conn->prepare($sql);
    $result->execute();

    // set fetch mode
    $result->setFetchMode(PDO::FETCH_ASSOC);

    // Store result into session variable user
    $_SESSION['users'] = $result->fetch();

    // Redirect the newly registered
    header('Location: ../profile.php');
    echo ucfirst($users['name']);

    } catch (PDOException $e) {

        echo "Error: " . $e->getMessage();

    } 