<?php

if (isset($PageId)) {} else {
    header("Location: Login.php");
}

$sqlData = "SELECT id FROM userinfo WHERE id = $PageId";
$sqlDataQuery = mysqli_query($connectDB, $sqlData);
$arrayDQ = mysqli_fetch_array($sqlDataQuery);
$idDBADQ = $arrayDQ['id'];

if (isset($idDBADQ)) {} else {
    hea
    
$profileimage = "photo";
$target_file = $profileimage . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
?>
