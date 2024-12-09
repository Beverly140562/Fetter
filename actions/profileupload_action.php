<?php
// Define the target directory where files will be uploaded
$target_dir = "images/Profile";
// Ensure the directory exists and has the right permissions
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

// Generate a unique file name to prevent conflicts
$target_file = $target_dir . uniqid('', true) . '.' . strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if the file is an actual image or a fake image
if (isset($_POST["upload"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "File is not an image.<br>";
        $uploadOk = 0;
    }
}

// Check for any file upload errors (size limit, partial upload, etc.)
if ($_FILES["image"]["error"] != 0) {
    echo "Sorry, there was an error uploading your file. Error code: " . $_FILES["image"]["error"] . "<br>";
    $uploadOk = 0;
}

// Check if the file already exists (optional, since we're using a unique name, this check might not be necessary)
if (file_exists($target_file)) {
    echo "Sorry, file already exists.<br>";
    $uploadOk = 0;
}

// Check file size (limit to 500 KB, you can adjust as needed)
if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.<br>";
    $uploadOk = 0;
}

// Allow certain file formats
if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<br>";
} else {
    // Try to move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.<br>";
    } else {
        echo "Sorry, there was an error uploading your file.<br>";
    }
}
?>
