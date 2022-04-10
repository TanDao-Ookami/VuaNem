
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
    <form method="POST" enctype="multipart/form-data">
        <p style="font-weight: bold;">Them San Pham</p>

        <p><label for="ten">Ten san pham</label><br>
        <input type="text" id="ten" name="ten" value="<?=$ten?>" required style="width:300px;"></p>

        <p><label for="gia">Gia ban</label><br>
        <input type="number" id="gia" name="gia" value="<?=$hinh?>" required style="width:150px;"></p>

        <p><label for="flashsale">Flashsale</label><br>
        <input type="number" id="flashsale" name="flashsale" value="<?=$flashsale?>" required style="width:150px;"></p>

        <p><label for="hinh">Hinh anh</label><br>
        <input type="file" id="hinh" name="hinh" required accept="image/*" onchange="xuat_hinh(this)"><br>
        <img id="hinhsp" src="#" alt="chua co hinh" style="max-width: 300px;">
        </p>

        <input type="submit" name="themsp" value="Them">
        <button onclick="window.location.href='hienthisp.php'">Huy</button>
    </form>
</body>
</html>