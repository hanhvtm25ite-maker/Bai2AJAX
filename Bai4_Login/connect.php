
<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "udn";

$con = mysqli_connect($server, $user, $pass, $db);

if (!$con) {
    die("Không thể kết nối: " . mysqli_connect_error());
}

mysqli_query($con, "SET NAMES 'utf8'");
?>
