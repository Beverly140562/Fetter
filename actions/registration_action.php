<?php

// Include the database connection file
include 'database.php';

// post data
$name = $_POST['name'];
$Username =$_POST['username'];
$password = $_POST['password'];

// Validate inputs
if (empty($name) || empty($Username) || empty($password)) {
    die("All fields are required!");
}



// Hash the password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);


try {
    // Insert user data into the database using a prepared statement
    $sql = "INSERT INTO users (name, Username, password) VALUES (:name, :username, :password)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':username', $Username);
    $stmt->bindParam(':password', $hashed_password);


    // Execute the statement
    $stmt->execute();
    
    // Start User Session [user_id]
    // and Get ID of The Last Inserted Record
    session_start();
    $user_id = $conn->lastInsertId();

    // retrive user data
    $sql2 = "SELECT user_id, name, Username FROM users WHERE user_id = $user_id";
    $result = $conn->prepare($sql2);
    $result->execute();

    // set fetch mode
    $result->setFetchMode(PDO::FETCH_ASSOC);

    // Store result into session variable user
    $_SESSION['users'] = $result->fetch();

    // Redirect the newly registered
    header('Location: ../profile.php');

} catch (PDOException $e) {

    echo "Error: " . $e->getMessage();

}   