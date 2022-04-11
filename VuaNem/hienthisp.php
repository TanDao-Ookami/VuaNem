<?php
    $ma = "ma";

    $ten = "";
    $gia = "";
    $hinh = "";
    $flashsale = "";

    include_once("db.php");

    $mysqli = connect_db();
    $sql = "select * from tblsanpham where ma = {$ma}";
    $result = $mysqli->query($sql);
    if($mysqli->affected_rows >0) {
        $row = $result->fetch_array();
        $ten = $row["ten"];
        $gia = number_format($row["gia"],'0','.','.');
        $hinh = $row["hinh"];
        $flashsale = number_format($row["flashsale"],'0','.','.');
    }
    else {
        echo "Khong co san pham nao";
        $mysqli->close();
        exit();
    }
    $mysqli->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/fonts/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Trang Hiển Thị Sản Phẩm</title>
</head>
<body>
    <div id="content">
    <form method='POST' class='form-button' action='index.php' style='display: flex;justify-content: center; padding-bottom:10px'>
    <input type='submit' class='button-item' name='trangchu' value='Trang Chủ'>
    </form>
    <form method='POST' class='form-button' action='themsp.php' style='display: flex; padding-bottom:10px;justify-content: center;'>
    <input type='submit' class='button-item' name='tieptuc' value='Thêm Sản Phẩm'>
    </form>
        <div class="product-section">
            <div class="list-product">
    <?php
    include_once("db.php");
    $cn = connect_db();
    $sql = "select * from tblsanpham";
    $result = $cn -> query($sql);
    if ($cn->affected_rows > 0) {
        while ($row = $result->fetch_array()) {
            $ma = $row["ma"];
            $ten = $row["ten"];
            $gia = number_format($row["gia"],'0','.','.');
            $hinh = $row["hinh"];
            $flashsale = number_format($row["flashsale"],'0','.','.');

            echo "<div class='product-item'>";
            
                echo "<div class='product-image'>";
                    echo "<img id='hinhsp' name='hinh' src='{$hinh}' alt='product-*'>";
                echo "</div>";
                echo "<div class='product-info'>";
                    echo "<p class='product-name'>{$ten}</p>";
                    echo "<p class='SKU'>SKU: {$ma}</p>";
                    echo "<div class='price-container'>";
                        echo "<div class='price-box'>";
                            echo "<label>Giá gốc</label>";
                            echo "<div class='price'>{$gia} đ</div>";
                        echo "</div>";
                        echo "<div class='installment'>";
                            echo "<label>Flash Sale</label>";
                            echo "<div class='amount'>{$flashsale} đ</div>";
                        echo "</div>";
                    echo "<div class='button-list'>";

                        echo "<form method='POST' class='form-button' action='xoasp.php' style='display: inline;'>";
                        echo "<input type='hidden' name='masp_xoa' value='{$ma}'>";
                        echo "<input type='submit' class='button-item' name='xoasp' value='Xóa'>";
                        echo "</form>";

                        echo "<form method='POST' class='form-button' action='capnhatsp.php' style='display: inline;'>";
                        echo "<input type='hidden' name='masp_capnhat' value='{$ma}'>";
                        echo "<input type='submit' class='button-item' name='capnhatsp' value='Cập Nhật' >";
                        echo "</form>";

                        

            
                    echo "</div>";
                echo "</div>";
                            echo "</div>";
                
            
            

            echo "</div>";
        }
    }
    ?>
            </div>
        </div>
    </div>
</body>
</html>