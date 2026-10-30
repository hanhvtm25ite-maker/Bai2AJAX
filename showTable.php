
<?php

$op = $_GET["chon"] ?? "";

$tables = ["giaovien", "sinhvien", "hocphan"];

if (in_array($op, $tables, true)) {

    include("database.class.php");

    $dao = new Dao("root", "", "udn");

    $sql = "SELECT * FROM {$op}";

    $header = "DANH SÁCH {$op}";

    $dao->table($sql, $header);
}

?>
