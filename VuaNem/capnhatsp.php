<?php
    $loi = false;
    $tb = "";
    $ma = "";
    $ten = "";
    $gia = "";
    $hinh = "";
    $flashsale = "";

    if(isset($_POST["luu"])) {
        $ma = $_POST["ma"];
        $ten = $_POST["ten"];
        $gia = $_POST["gia"];
        $hinh = "";

        if($_FILES["hinh"] ["name"] != "") {
            $hinh = "./assets/img/Content/product/{$ma}-{$_FILES['hinh']['name']}";
            array_map('unlink', glob("./assets/img/Content/product/{$ma}-*"));
            move_uploaded_file($_FILES['hinh']['tmp_name'], $hinh);

        }
        $flashsale = $_POST["flashsale"];
        include_once("db.php");
        $mysqli = connect_db();

        if($hinh != "") {
            $sql = "update tblsanpham set ten='{$ten}', gia='{$gia}', hinh='{$hinh}', flashsale='{$flashsale}' where ma={$ma}";
        }
        else {
            $sql = "update tblsanpham set ten='{$ten}', gia='{$gia}', flashsale='{$flashsale}' where ma={$ma}";
        }

        $mysqli->query($sql);
        echo "<script>alert('Đã cập nhật')</script>";
        header("location:hienthisp.php?ma={$ma}");
        $mysqli->close();

    }
    else {
        if(isset($_POST["capnhatsp"])) {
            $ma = $_POST["masp_capnhat"];
            include_once("db.php");
            $mysqli = connect_db();
            $sql = "select * from tblsanpham where ma={$ma}";
            $result = $mysqli->query($sql);
            if ($mysqli->affected_rows>0) {
                $row = $result->fetch_array();
                $ten = $row["ten"];
                $gia = $row["gia"];
                $hinh = $row["hinh"];
                $flashsale = $row["flashsale"];
            }
            else {
                $tb = "Không có sản phẩm mã {$ma} này";
                $loi = true;
            }
            $mysqli->close();
        }
        else {
            $tb = "Sai quy trình";
            $loi = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website ban hang online abcshop</title>
    <script>
        function xuat_hinh(input) {
            img = document.getElementById("hinhsp");
            img.src = URL.createOjectURL(input.files[0]);
        }
    </script>
</head>
<body>
    <?php
        if($loi == true) {
            echo "<script>";
            echo "alert('{$tb}');";
            echo "window.location.href='themsp.php'";
            echo "</script>";
        }
    ?>

    <form id="f1" method="POST" enctype="multipart/form-data"></form>
    
    <form action="themsp.php" id="f2" method="POST"></form>

    <p><label>Ma san pham: </label></p>
    <input type="hidden" form="f1" name="ma" value="<?=$ma?>">

    <p><label for="ten">Ten: </label></p>
    <input type="text" id="ten" name="ten" form="f1" value="<?=$ten?>" required style="width: 300px;">

    <p><label for="gia">Gia: </label></p>
    <input type="text" id="gia" name="gia" form="f1" value="<?=$gia?>" required style="width: 300px;">

    <p><label for="gia">Flashsale: </label></p>
    <input type="text" id="flashsale" name="flashsale" form="f1" value="<?=$flashsale?>" required style="width: 300px;">

    <p><label for="hinh">Hinh: <input type="file" id="hinh" name="hinh" form="f1" accept="image/*" style="display:none;" onchage="xuat_hinh(this)"><br>
    <img src="<?=$hinh?>" id="hinhsp" name="hinhsp" style="max-width: 300px;">
    </label></p>

    

    <input type="submit" form="f1" name="luu" value="Luu">
    <input type="submit" form="f2" name="tiep" value="Ve trang them san pham">
    
</body>
</html>