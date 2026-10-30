
<?php
session_start();

include("connect.php");

$us = $_GET["user"] ?? "";
$pw = $_GET["pass"] ?? "";

// Câu lệnh kiểm tra tài khoản
$sql = "SELECT * FROM sinhvien
        WHERE masv = ? AND matkhau = ?";

$stmt = mysqli_prepare($con, $sql);

mysqli_stmt_bind_param($stmt, "ss", $us, $pw);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);

    $_SESSION["code"] = $row["masv"];

    $_SESSION["info"] = $row["hoten"] . " " . $row["lop"];

    echo $us . " - " .
         htmlspecialchars($row["hoten"]) . " - " .
         htmlspecialchars($row["lop"]) .
         "&nbsp;&nbsp;<a href='QLSV.php'>Next</a>";

} else {

    echo "Bạn nhập thông tin sai!";

}

mysqli_stmt_close($stmt);

mysqli_close($con);
?>
