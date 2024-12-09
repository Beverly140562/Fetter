<?php

session_start();

include_once("database.php");


if(isset($_POST['submit']))
{
    $conn = database::connect();
    $name = sanitizeString($_POST['name']);
    $email = sanitizeString($_POST['email']);
    $Username = sanitizeString($_POST['username']);
    $gender = sanitizeString($_POST['gender']);
    $OrderDate = sanitizeString($_POST['birthdate']);
    $password = sanitizePassword($_POST['password']);

    if($name == "" || $email == "" || $password == "")
    {
        return;
    }
    


    if (insertDetails($con, $name, $email, $Username, $gender, $OrderDate, $password));
    {
        $_SESSION['email'] = $email;
        header('Location: profile.php');
    }
}

    if(isset($_POST['login']))
    {
        $con = database::connect();
        $email = sanitizeString($_POST['email']);
        $password = sanitizePassword($_POST['password']);

            if($email == "" || $password == "")
            {
                return;
            }


        if (checkLogin($con, $email, $password))
        {
            $_SESSION['email'] = $email;
            header('Location: profile.php');
        }
        else {
            echo 'The email and  password are incorrect';
        }
    }

    if(isset($_POST['update']))
    {
        $con = database::connect();
        $name = sanitizeString($_POST['name']);
        $email = sanitizeString($_POST['email']);
        $Username = sanitizeString($_POST['username']);
        $gender = sanitizeString($_POST['gender']);
        $OrderDate = sanitizeString($_POST['birthdate']);
        $password = sanitizePassword($_POST['password']);

        if($name == "" || $email == "" || $password == "")
        {
            return;
        }
        
        $currentemail = $_SESSION['email'];

        $query = $con->prepare("

            SELECT * FROM users WHERE email=:email

        ");

        $query->bindparam(":email", $currentemail,);

        $query->execute();


        $result = $query->fetch(PDO::FETCH_ASSOC);

        $user_id = $result['user_id'];

        if (updateDetails($con, $user_id, $name, $email, $password));
        {
            $_SESSION["email"] = $email;
            header("Location: profile.php");
        }
    }


    function insertDetails($con, $name, $email, $Username, $gender, $OrderDate, $password)
    {
        $query = $con->prepare("

        INSERT INTO users (name,email,Username,gender,OrderDate,password)

        VALUES(:name,:email,:username,:gender,:birthdate,:password)
        ");

        $query->bindparam(":name", $name);
        $query->bindparam(":email", $email);
        $query->bindparam(":username", $Username);
        $query->bindparam("gender", $gender);
        $query->bindparam("birthdate", $OrderDate);
        $query->bindparam("password", $password);

        return $query->execute();
    }

    function checkLogin($con, $email, $password)
    {
        $query = $con->prepare("

        SELECT * FROM users WHERE email=:email AND password=:password


        ");


        $query->bindparam(":email", $email);
        $query->bindparam("password", $password);

        $query->execute();

        if($query->rowCount() == 1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    function sanitizeString($string)
    {
        $string = strip_tags($string);

        $string = str_replace("","", $string);

        return $string;
    }

    function sanitizePassword($string)
    {
        $string = md5($string);

        return $string;
    }

    function updateDetails($con, $user_id, $name, $email, $password)
    {
        $query = $con->prepare("
        
        UPDATE users SET name=:name,email=:email,password=:password

        WHERE user_id=:user_id

        ");

        $query->bindparam(":name", $name);
        $query->bindparam(":email", $email);
        $query->bindparam(":password", $password);
        $query->bindparam(":user_id", $user_id);

        return $query->execute();

        
    }
?>