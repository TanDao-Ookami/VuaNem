<?php
    session_start();

    if(!isset($_SESSION["tinhtrang"])) {
        $_SESSION["tinhtrang"] = 0;
    }

    if(!isset($_SESSION["sodienthoai"])) {
        $_SESSION["sodienthoai"] = "";
    }

    if(isset($_POST["loc"])){
        $_SESSION["tinhtrang"] = $_POST["tinhtrang"];
        $_SESSION["sodienthoai"] = $_POST["sodienthoai"];
    }

    include_once("db.php");
    $cn = connect_db();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">

    <title>Quan Ly Don Hang</title>
</head>
<body>
    <div id="order-mana" >
        <h1>Quản lý đơn hàng</h1>
        <form class="form-loc" method="POST" style="padding: 30px 0px;">
            <p><label for="tinhtrang">Trạng Thái</label>
                <select name="tinhtrang" id="tinhtrang">
                    <option value="0"
                    <?php
                        if($_SESSION["tinhtrang"] == 0) {
                            echo "selected";
                        }
                    ?>
                    >Tất cả</option>
                    <?php
                        $sqltinhtrang = "select * from tbltinhtrang";
                        $result = $cn->query($sqltinhtrang);
                        while($row = $result->fetch_array()) {
                            if($row["matt"] == (int)$_SESSION["tinhtrang"]){
                                echo "<option selected value='{$row['matt']}'>{$row['tentt']}</option>";
                            } else {
                                echo "<option value='{$row['matt']}'>{$row['tentt']}</option>";
                            }
                        }
                    ?>
                    </select></p>
                    <p><label for="sodienthoai">Số điện thoại</label>
                        <input type="text" name="sodienthoai" value="<?=$_SESSION['sodienthoai']?>">
                    </p>
                    <p>
                    <input type="submit" name="loc" value="LOC">
                    </p>
        </form>

        <?php
            $where = " true ";
            if($_SESSION["sodienthoai"] != ""){
                $where = $where . "and tbldonhang.sodienthoai = '{$_SESSION['sodienthoai']}' ";
            }
            if((int)$_SESSION["tinhtrang"] != 0){
                $where = $where . "and tinhtrang = {$_SESSION['tinhtrang']}";
            }
            
            $sql = "select * from tbldonhang, tblkhachhang, tbltinhtrang ";
            $sql = $sql . " where tbldonhang.sodienthoai = tblkhachhang.sodienthoai ";
            $sql = $sql . " and tbldonhang.tinhtrang = tbltinhtrang.matt";
            $sql = $sql . " and {$where} ";
            $result = $cn->query($sql);
            if($cn->affected_rows > 0) {
                echo "<p style='font-weight:bold; padding-bottom: 10px;'>Các đơn hàng</p>";
                echo "<table border='1' cellspacing = '0' cellpadding = '3'>";
                echo "<tr>";
                echo "<th>Tên khách hàng</th>";
                echo "<th>Số điện thoại</th>";
                echo "<th>Địa chỉ giao</th>";
                echo "<th>Tình trạng</th>";
                echo "<th>Hành động</th>";
                echo "<tr>";

                while($row = $result->fetch_array()){
                    echo "<tr>";
                    echo "<td>{$row['tenkh']}</td>";
                    echo "<td>{$row['sodienthoai']}</td>";
                    echo "<td>{$row['diachi']}</td>";
                    echo "<td>{$row['tentt']}</td>";
                    echo "<td>";
                    echo "<form action='donhang.php' method='POST'>";
                    echo "<input type='hidden' name='madh' value='{$row['madh']}'>";
                    echo "<input type='submit' name='xem' value='Xem chi tiết'>";
                    echo "</form>";
                    echo "</td>";
                    echo "<tr>";
                }
                echo "</table>";
            }
            else {
                echo "Không tìm thấy đơn hàng nào";
            }
        ?>
    </div>
</body>
</html>
<?php
$cn->close();
?>