
<?php

// Kết nối đến MySQL
$link = mysqli_connect("localhost", "root", "", "udn");

// Kiểm tra kết nối
if ($link === false) {
    die("ERROR: Không thể kết nối. " . mysqli_connect_error());
}

// Kiểm tra dữ liệu tìm kiếm
if (isset($_REQUEST["term"])) {

    // Chuẩn bị câu lệnh SQL
    $sql = "SELECT * FROM hocphan WHERE tenhp LIKE ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        // Liên kết biến với câu lệnh SQL
        mysqli_stmt_bind_param($stmt, "s", $param_term);

        // Thiết lập từ khóa tìm kiếm
        $param_term = $_REQUEST["term"] . '%';

        // Thực thi câu lệnh
        if (mysqli_stmt_execute($stmt)) {

            $result = mysqli_stmt_get_result($stmt);

            // Kiểm tra số lượng kết quả
            if (mysqli_num_rows($result) > 0) {

                // Lấy từng dòng dữ liệu
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                    echo "<p>" . htmlspecialchars($row["tenhp"]) . "</p>";

                }

            } else {

                echo "<p>Không tìm thấy kết quả nào</p>";

            }

        } else {

            echo "ERROR: Không thể thực thi câu lệnh SQL.";

        }

        // Đóng câu lệnh
        mysqli_stmt_close($stmt);
    }
}

// Đóng kết nối
mysqli_close($link);

?>
