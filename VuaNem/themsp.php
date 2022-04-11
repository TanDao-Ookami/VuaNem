
<!-- Them san pham -->
<?php
    $ten = "";
    $gia = "";
    $hinh = "";
    $flashsale = "";
    $tb = "";
    $loi = false;

    if(isset($_POST["themsp"])) {
        $ten = $_POST["ten"];
        $gia = $_POST["gia"];
        $hinh = $_FILES["hinh"];
        $flashsale = $_POST["flashsale"];
        
        include_once("db.php");

        $mysqli = connect_db();

        $sql = "insert into tblsanpham (ten, gia, flashsale) values ('{$ten}', '{$gia}', '{$flashsale}')";
        $result = $mysqli->query($sql);

        if($mysqli->affected_rows > 0) {
            $ma = $mysqli->insert_id;
            $strhinh = "./assets/img/Content/product/{$hinh['name']}";
            move_uploaded_file($hinh['tmp_name'], $strhinh);
            $sql = "update tblsanpham set hinh = '{$strhinh}' where ma = {$ma}";
            $mysqli->query($sql);
            $mysqli->close();
            header("location:hienthisp.php?ma={$ma}");
        }
        else {
            $loi = true;
            $tb = "Lỗi thêm ({$mysqli->error})";
            $mysqli->close();
        }
    }
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
    <title>Trang Thêm Sản Phẩm</title>
    <script>
        function xuat_hinh(input) {
            img = document.getElementById("hinhsp");
            img.src = URL.createObjectURL(input.files[0]);
        }
    </script>
</head>
<body>
    <?php
        if ($loi == true) {
            echo "<p style='color:red'> {$tb} </p>";
        }
    ?>
    <div id="add-product">
        <div class="row">
            <div class="content">
                <div class="logo">
                    <a href="index.php">
                        <img src="./assets/img/Header/astronaut-fishing-stars-512x512.png" alt="logo">
                    </a>
                </div>
                <form class="form-info" method="POST" enctype="multipart/form-data">
                    <div class="title-cart" style="font-weight: bold;">Thêm Sản Phẩm</div>

                    <div class="form-group">
                        <div class="label" for="ten">Tên Sản Phẩm<sup>*</sup></div>
                        <input class="form-control" type="text" id="ten" name="ten" value="<?=$ten?>" required></p>
                    </div>
                    <div class="form-group">
                        <div class="label" for="gia">Giá Bán<sup>*</sup></div>
                        <input class="form-control" type="number" id="gia" name="gia"></p>
                    </div>
                    <div class="form-group">
                        <div class="label" for="flashsale">Flashsale<sup>*</sup></div>
                        <input class="form-control" type="number" id="flashsale" name="flashsale" value="<?=$flashsale?>" required></p>
                    </div>
                    <p><label for="hinh">Hình Ảnh<sup>*</sup></label><br>
                    <input type="file" id="hinh" name="hinh" required accept="image/*" onchange="xuat_hinh(this)"><br>
                    <img id="hinhsp" src="#" alt="chưa có hình" style="max-width: 300px;">
                    </p>

                    <div class="pay-button">
                    <input id="customer-submit" class="button-action" type="submit" name="themsp" value="THÊM">
                    <button type="button" class="button-action" onclick="window.location.href='hienthisp.php'">HỦY</button>
                    </div>
                    
                </form>
            </div>
            
            <div id="loading-form">
                <div id="loading">
                    <div class="item1"></div>
                    <div class="item2"></div>
                    <div class="item3"></div>
                </div>
            </div>
        </div>
    </div>



    
</body>
</html>