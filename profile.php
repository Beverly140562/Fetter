<?php

// start session
session_start();

// if session user does not exist
if( empty($_SESSION['users']) ) {
    header('Location: login.php');
    exit();
}

// otherwise set user
$users = $_SESSION['users'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="css/profile.css" rel="stylesheet">


    <title>Profile | Fetter</title>
</head>
<body>

    <header class="navbar-light fixed-top header-static bg-mode mb-5">
        <nav class="navbar navbar-expand-sm bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                     <img class="light-mode-item navbar-brand-item" style="width:35px;" src="images/Logofetter.png" alt="logo">
			    </a>
                 
                <ul class="nav flex-nowrap align-items-center ms-sm-3 list-unstyled">
                    <li class="nav-item dropdown ms-2">
                            <a class="nav-link bg-light icon-md btn btn-light p-0" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                <span class="badge-notif animation-blink"></span>
                                    <i class='bx bxs-bell'></i>
                            </a>
                            <div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0" aria-labelledby="notifDropdown">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h6 class="m-0">Notifications <span class="badge bg-danger bg-opacity-10 text-danger ms-2"></span></h6>
                                        <a class="small" href="#">Clear all</a>
                                    </div>
                                    
                                    </div>
                                </div>                          
                     </li>
                </ul>
            </div>
        </nav>
    </header>


    <div class="container mt-5 ">
        <div class="row">
            <div class="col-lg-3 ">
               
            <form action="actions/profileupload_action.php" method="post" enctype="multipart/form-data" class="mb-3">
                <div class="d-flex justify-content-center align-items-center vh-100">
                    <div class="shadow w-350 p-3 text-center">
                        <div class="user-image mb-3 text-center">
                            <div style="width: 100px; height:100px; overflow: hidden; background: #cccccc; margin:0 auto">
                                <img src="images/Profile" class="figure-img img-fluid rounded" id="imgPlaceholder" alt="" >
                            </div>
                        </div>
                        <h3 class="display-4"><?php echo ucfirst($users['name']); ?></h3>
                        <input type="file" name="image" class="form-control" >
                        <br>
                        <input type="submit" value="Upload" name="upload" class="btn btn-success">
                       
                    </div>
                </div>
            </form>
            </div>
            <div class="col-lg-6 p-3 mt-5">
            <div class="card card-body">
					<div class="d-flex mb-3">
						<!-- Avatar -->
						<div class="avatar avatar-xs me-2">
							<a href="#"> <img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt=""> </a>
						</div>
						<!-- Post input -->
						<form class="w-100">
							<textarea class="form-control pe-4 border-0" rows="2" data-autoresize="" placeholder="Share your thoughts..."></textarea>
						</form>
					</div>
					<!-- Share feed toolbar START -->
					<ul class="nav nav-pills nav-stack small fw-normal">
						<li class="nav-item">
							<a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#feedActionPhoto"> <i class='bx bxs-photo-album' style='color:#18d535'  ></i>Photo</a>
						</li>
						<li class="nav-item">
							<a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#feedActionVideo"> <i class='bx bxs-videos'></i>Video</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link bg-light py-1 px-2 mb-0" data-bs-toggle="modal" data-bs-target="#modalCreateEvents"> <i class='bx bxs-calendar-event' style='color:#e52222'></i> Event </a>
						</li>						
					</ul>
					<!-- Share feed toolbar END -->
				</div>
                <h3 class="text-center mt-5">Display Image</h3>
                <?php
// SQL to select users who do not have an image (NULL or empty string)
$sql = "SELECT * FROM users WHERE image IS NULL OR image = ''";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Iterate through the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Access the row data, for example:
        $user_id = $row['user_id'];
        $image = $row['image'];  // This will be NULL or empty for these users

        // Display or process the data, for example:
        echo "User ID: " . $user_id . "<br>";
        echo "Image: No image available<br><br>";
    }
} else {
    echo "Error fetching data: " . mysqli_error($conn);
}
?>


            </div>
            <div class="col-lg-3 mt-5"></div>
        </div>
    </div>
 
    <a href="logout.php">Logout</a>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function readURL(input){
    if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imgPlaceholder').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); //covert to base64 string

    }
}

$("#chooseFile").change(function () {
    readURL(this);
});
    </script>

</body>
</html>