

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Trang Đặt Hàng - Customer</title>
</head>
<body>
    <!-- session-start-minicart -->
<?php
        session_start();

        $giohang = array();
        if(isset($_SESSION["giohang"])) {
            $giohang = $_SESSION["giohang"];
        }
        else {
            $_SESSION["giohang"] = $giohang;
        }

        if(isset($_POST["hd"])) {
            $hd = $_POST["hd"];
            if ($hd == "them") {
                //them vao gio
                $masp = $_POST["masp"];

                if(isset($giohang[$masp])) {
                    $giohang[$masp] = (int)$giohang[$masp] + 1;
                }
                else {
                    $giohang[$masp] = 1;
                }
                $_SESSION["giohang"] = $giohang;
            }
            elseif ($hd == "capnhat") {
                //capnhat
                $dssl = $_POST["dssl"];
                foreach($giohang as $k => $v) {
                    $giohang[$k] = (int)$dssl[$k];
                    if($giohang[$k] == 0) {
                        unset($giohang[$k]);
                    }
                }
                $_SESSION["giohang"] = $giohang;
            }
            elseif ($hd == 'xoa') {
                $giohang = array();
                $_SESSION["giohang"] = $giohang;
            }
        }
?>
<!-- them khach hang -->
<?php
    $tenkh = "";
    $sodienthoai = "";
    $diachi = "";
    $tb = "";
    $loi = false;

    if(isset($_POST["themkh"])) {
        $tenkh = $_POST["tenkh"];
        $sodienthoai = $_POST["sodienthoai"];
        $diachi = $_POST["diachi"];
        
        include_once("db.php");

        $mysqli = connect_db();

        $sql = "insert into tblkhachhang (sodienthoai, tenkh, diachi) values ('{$sodienthoai}', '{$tenkh}', '{$diachi}')";
        $result = $mysqli->query($sql);
        
        if($mysqli->affected_rows > 0) {
            $sodienthoai = $mysqli->insert_id;
            $mysqli->query($sql);
            $mysqli->close();
            unset($_SESSION["giohang"]);
            header("location:camon.php");
        }
        else {
            $loi = true;
            $tb = "Lỗi thêm ({$mysqli->error})";
            $mysqli->close();
        }
    }

    if(isset($_POST["madh"])) {
        $madh = $_POST["madh"];
    
        $sql = "select * from tbldonhang, tblkhachhang ";
        $sql = $sql . " where tbldonhang.sodienthoai = tblkhachhang.sodienthoai ";
        $sql = $sql . " and madh = {$madh}";
        $result = $mysqli->query($sql);
    }
    
?>
<!-- them don hang -->
<!-- <?php
include_once("db.php");
$cn = connect_db();
if(isset($_POST["madh"])) {
    $madh = $_POST["madh"];

    $sql = "select * from tbldonhang, tblkhachhang ";
    $sql = $sql . " where tbldonhang.sodienthoai = tblkhachhang.sodienthoai ";
    $sql = $sql . " and madh = {$madh}";
    $result = $cn->query($sql);
}
?> -->

    <div id="page-checkout">
        <div class="container">
            <div class="row">
                <div class="customer">
                    <div class="content">
                        <div class="logo">
                            <a href="index.php">
                                <img src="./assets/img/Header/astronaut-fishing-stars-512x512.png" alt="logo">
                            </a>
                        </div>
                        <form class="form-info" method="POST" action="dathang.php">
                            <div class="title-cart">1. Thông tin khách hàng</div>
                            <div class="form-group">
                                <div class="label">Số điện thoại di động<sup>*</sup></div>
                                <input class="form-control" type="text" name="sodienthoai" id="sodienthoai" value="<?=$sodienthoai?>" required>
                            </div>
                            <div class="form-group">
                                <div class="label">Họ và tên<sup>*</sup></div>
                                <input class="form-control" type="text" name="tenkh" id="tenkh" value="<?=$tenkh?>" required>
                            </div>
                            <div class="form-group">
                                <div class="label">Địa chỉ cụ thể<sup>*</sup></div>
                                <input class="form-control" type="text" name="diachi" id="diachi" value="<?=$diachi?>" required>
                            </div>
                            <div class="pay-button">
                                <input id="customer-submit" class="button-action js-check-out" type="submit" name="themkh" value="Thanh Toán">
                            </div>  
                        </form>
                    </div>
                </div>
                <div id="cart-body" class="modal-body">
                
                    <?php
                    
                    if (count($giohang) == 0) {
                        echo "<div class='empty-cart'>";
                            echo "<div class='content-minicart'>";
                                echo "<p>";
                                    echo "Hiện tại chưa có sản phẩm nào";
                                    echo "<br>";
                                    echo "trong giỏ hàng";
                                echo "</p>";
                                echo "<div class='button-continue js-modal-close'>";
                                    echo "<span>Tiếp tục mua sắm</span>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                        
                    }
                    else{
                        
                        echo "<div class='list-items'>";
                        
                        echo "<div id='cart-items' class='list-product-cart'>";
                        // echo "<form method='POST'>";
                        // echo "<table border='1' cellspacing='0'>";
                        // echo "<tr><th>Ten</th><th>Gia</th><th>So luong</th><th>Thanh tien</th></tr>";
                        echo "<form method='POST'>";
                        include_once("db.php");
                        $cn = connect_db();
                        $dsma = implode(",",array_keys($giohang));
                        
                        $sql = "select ma, ten, gia, hinh, flashsale from tblsanpham where ma in ($dsma)";
                        $result = $cn->query($sql);
                        $cn->close();
                        $tongtien = 0;
                        while ($row = $result->fetch_array()) {
                            $hinh = $row["hinh"];
                            $ma = $row["ma"];
                            $ten = $row["ten"];
                            $flashsale = number_format($row["flashsale"],'0','.','.');
                        
                            echo "<div class='product-items-cart'>";
                                echo "<div class='product-img'>";
                                    echo "<a href=''>";
                                        echo "<img src='{$hinh}' alt='product-*'>";
                                    echo "</a>";
                        
                                    echo "<div class='number-qty'>";
                                
                                        echo "<input class='quantity' type='number' name='dssl[{$ma}]' min='0' value='{$giohang[$ma]}'>";
                                
                                    echo "</div>";
                                echo "</div>";
                                echo "<div class='product-info'>";
                                    echo"<div class='content-product'>";
                                        echo "<div class='header-block'>";
                                            echo "<h3 class='name-product'>";
                                                echo "<a href=''>{$row['ten']}</a>";
                                                        
                                            echo "</h3>";
                                            // echo "<div class='remove-item'>Xóa</div>";
                                        echo "</div>";
                                        echo "<p class='option-product'>";
                                            echo "<label class='label'>Mã:</label>";
                                            echo "<span>{$ma}</span>";
                                        echo "</p>";
                                        $gia = number_format($row["gia"],'0','.','.');
                                            
                                        echo "<p class='option-product'>";
                                            echo "<label class='label'>Giá:</label>";
                                            echo "<span>{$gia} đ</span>";
                                        echo "</p>";
                                            
                                        // echo "<p class='price-product'>";
                                        //     echo "<label class='label'>Flashsale:</label>";
                                        //     echo "<span>{$flashsale} đ</span>";
                                        // echo "</p>";
                                        $thanhtien = $giohang[$ma] * $row["gia"];
                                        $tongtien = $tongtien + $thanhtien;
                                        $thanhtien = number_format($thanhtien);
                                        echo "<p class='price-product'>";
                                            echo "<label class='label'>Thành tiền:</label>";
                                            echo "<span>{$thanhtien} đ</span>";
                                        echo "</p>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        
                        }
                        echo "</div>";
                        echo "</div>";
                        $strtongtien = number_format($tongtien);
                        echo "<div class='cart-bottom'>";
                            echo "<div class='cart-voucher'>";
                                echo "<form id='form-voucher' method='post'>";
                                    echo "<div class='discount-ps'>";
                                        echo "<input id='input-voucher' type='hidden' value='capnhat' name='hd'>";
                                        echo "<input type='submit' name='submit' value='Cap nhat'>";
                                    echo "</div>";
                                echo "</form>";
                                echo "<div class='shipping-amount'>";
                                    echo "<div class='title-shipping'>";
                                        echo "Vận chuyển";
                                    echo "</div>";
                                    echo "<div class='price-shipping'>";
                                        echo "<span class='free'>Miễn phí</span>";
                                    echo "</div>";
                                echo "</div>";
                                echo "<div class='total'>";
                                    echo "<p>Tổng</p>";
                                    echo "<p class='total-amount'>{$strtongtien}</p>";
                                echo "</div>";
                                
                            echo "</div>";
                        
                        echo "</div>";

                        // echo "<div class='button-pay-buymore'>";
                        //     echo "<a class='button-buymore js-modal-close'>";
                        //         echo "Mua thêm";
                        //     echo "</a>";
                        //     echo "<a class='button-pay' onclick=window.location.href='dathang.php'>";
                        //         echo "<span >Thanh toán</span>";
                        //     echo "</a>";
                        //     // echo "<a class='button-pay'>";
                        //     echo "<form  method='POST'>";
                        //         echo "<input type='hidden' name='hd' value='xoa'>";
                        //         echo "<input class='button-pay' type='submit' name='submit' value='Xoa gio hang'>";
                        //     echo "</form>";
                        //     // echo "</a>";
                        // echo "</div>";
                    echo "</form>";

        
                    } 
                    ?>
                        

                    
                </div>
            </div>
        </div>
    </div>


    <script>
        const checkOut = document.querySelector('.js-check-out')

        function checkOutsuccess () {
            alert("Thanh toán thành công");
        }

        checkOut.addEventListener('click', checkOutsuccess)
    </script>
</body>
</html>