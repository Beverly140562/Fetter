

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetter | Log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/Login.css" rel="stylesheet">
</head>
<body>

<?php 

?>
<div class="text-center ">
         <img src="images/Logofetter.png">
    </div>

    <div class="container">
        <form action="actions/login_action.php" method="post">
            <div class="form-floating">
                <input type="text" class="form-control" name="username" value="" placeholder="Username" required>
                <label for="floating">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" placeholder="Password"  name="password" class="form-control" required>
                <span class="show_hide_text cursor-pointer" id="show_hide_password">Show</span>
                <label for="show_hide_password">Password</label>
            </div>
            <div class="form-btn text-center rounded  m-5 ">
                <input type="submit"  class="btn text-white fw-bold" value="Log in" name="login" class="btn ">
            </div>
        </form>
            <div class="p-1 text-white"><p>Not registered yet <a href="registration.php">Registration Here</a></p></div>
    </div>


    <script src="js/common.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>