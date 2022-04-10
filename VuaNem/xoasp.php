<?php
    $loi = false;
    $tb = "";
    if (isset($_POST["xoasp"])) {
        $ma = $_POST["masp_xoa"];

        include_once("db.php");
        $mysqli = connect_db();
        $sql = "delete from tblsanpham where ma = {$ma}";
        $mysqli->query($sql);
        if($mysqli->affected_rows > 0){
            $tb = "Đã xóa sản phẩm mã {$ma}";
            array_map('unlink', glob("./assets/img/Content/product/{$ma}-*"));
        }
        else {
            $tb = "Khong co san pham ma {$ma} de xoa";
        }    
        $mysqli->close();
    }
    else {
        $loi = true;
        $tb = "Loi quy trinh";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Xóa Sản Phẩm</title>
</head>
<body>
    <?php
        if ($loi == false) {
            echo "<p>$tb</p>";
        }
        else {
            echo "<p style='color: red;'>$tb</p>";
        }
    ?>
    <button onclick="window.location.href='themsp.php'">Tiep tuc</button>
</body>
</html>