<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="Css/bootstrap-grid.css" rel="stylesheet">
    <link href="Css/bootstrap-reboot.css" rel="stylesheet">
    <link href="Css/bootstrap.css" rel="stylesheet">
    <link href="js/bootstrap.bundle.js" rel="script">
    <link href="js/bootstrap.js" rel="script">
    <title>database</title>
</head>
<body>
</body>
</html>
<?php
if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $picture = $_POST['picture'];
}
$dir = 'upload/';
$picture = 'picture';
mkdir($dir . $name);
$picname = $_FILES[$picture]['name'];
$array = explode(".", $picname);
$ext = end($array);
$new_name = rand() . "." . $ext;
$from = $_FILES[$picture]['tmp_name'];
$to = $dir . $name . "/" . $new_name;
move_uploaded_file($from, $to);
class Db{
//Data Base Connection
$coon = mysqli_connect("localhost", "root", "", "sepidrod");
if (!$coon) {
    die(mysqli_connect_error());
} else {
    echo '<div class="alert alert-success" role = "alert" style="text-align: center"
 
<p>Your registration has been successful</p>
 </div >';
}
$sql = "INSERT INTO sepid_users (name,lastname,email,age,picture) values ('$name','$lastname','$email','$age','$picture')";
mysqli_query($coon, $sql);
}
?>
