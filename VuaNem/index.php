
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siêu Nệm - Hệ Thống Bán Lẻ Nệm & Chăn Ga Gối Đệm Toàn Quốc</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/fonts/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
    <!-- main -->
    <div id="main">
        <!-- header -->
        <div id="header">
            
            <!-- header-center -->
            <div class="header-center">
                <div class="header-center-container">
                    <div class="logo-header">
                        <img class="logo-dream" src="./assets/img/Header/astronaut-fishing-stars-512x512.png" alt="logo-dream">
                    </div>
                    <div class="sieunem">
                        <span class="word">S</span>
                        <span class="word">I</span>
                        <span class="word">E</span>
                        <span class="word">U</span>
                        <span class="word">N</span>
                        <span class="word">E</span>
                        <span class="word">M</span>
                    </div>
                    <div class="header-center-right">
                        <div class="search-bar">
                            <input id="search" class="input-search-header" type="text" placeholder="Tìm kiếm">
                            <button class="btn-search ti-search">
                        </div>
                        <div class="info-website">
                            <div class="hotline">
                                <a class="hotline-content ti-mobile" href="#">
                                    Hotline: 1800 0079
                                </a>
                            </div>
                        </div>
                        <div class="header-cart">
                            <button class="mini-cart js-mini-cart">
                                <div class="ti-shopping-cart title-minicart">
                                    Giỏ hàng
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                
            </div>

            
            <!-- header-bottom -->
            <div class="header-bottom">
                <div class="header-bottom-container">
                    <div class="main-menu">
                        <ul id="nav">
                            <li><a href="">Nệm <i class="ti-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li class="sub-nav"><a href="#" class="menu-link">Chọn kích thước</a>
                                        <ul class="sub-nav-1">
                                            <li><a href="" class="nav-2">120 x 200cm</a></li>
                                            <li><a href="" class="nav-2">160 x 200cm</a></li>
                                            <li><a href="" class="nav-2">180 x 200cm</a></li>
                                            <li><a href="" class="nav-2">200 x 200cm</a></li>
                                            <li><a href="" class="nav-2">200 x 220cm</a></li>
                                            
                                        </ul>
                                        
                                    </li>
                
                                    <li class="sub-nav"><a href="#" class="menu-link">Giá tiền</a>
                                        <ul class="sub-nav-1">
                                            <li><a href="" class="nav-2">Dưới 3 triệu</a></li>
                                            <li><a href="" class="nav-2">3 triệu - 5 triệu</a></li>
                                            <li><a href="" class="nav-2">5 triệu - 10 triệu</a></li>
                                            <li><a href="" class="nav-2">10 triệu - 30 triệu</a></li>
                                            <li><a href="" class="nav-2">30 triệu - 50 triệu</a></li>
                                            <li><a href="" class="nav-2">trên 50 triệu</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-nav"><a href="#" class="menu-link">Loại nệm</a>
                                        <ul class="sub-nav-1">
                                            <li><a href="" class="nav-2">Nệm Bông Ép</a></li>
                                            <li><a href="" class="nav-2">Nệm Foam</a></li>
                                            <li><a href="" class="nav-2">Nệm Cao Su</a></li>
                                            <li><a href="" class="nav-2">Nệm Lò Xo</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-nav"><a href="#" class="menu-link">Nệm nhập khẩu</a>
                                        <ul class="sub-nav-1">
                                            <li><a href="" class="nav-2">Dunlopillo</a></li>
                                            <li><a href="" class="nav-2">Therapedic</a></li>
                                            <li><a href="" class="nav-2">Americanstar</a></li>
                                            <li><a href="" class="nav-2">Lady Americana</a></li>
                                            <li><a href="" class="nav-2">Zinus</a></li>
                                            <li><a href="" class="nav-2">Tempur</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-nav"><a href="#" class="menu-link">Thương hiệu</a>
                                        <ul class="sub-nav-1">
                                            <li><a href="" class="nav-2">Amando</a></li>
                                            <li><a href="" class="nav-2">Aeroflow</a></li>
                                            <li><a href="" class="nav-2">Dunlopillo</a></li>
                                            <li><a href="" class="nav-2">Goodnight</a></li>
                                            <li><a href="" class="nav-2">Gummi</a></li>
                                            <li><a href="" class="nav-2">Kim Cương</a></li>
                                            <li><a href="" class="nav-2">Lady Americana</a></li>
                                            <li><a href="" class="nav-2">Liên Á</a></li>
                                            <li><a href="" class="nav-2">Tempur</a></li>
                                            <li><a href="" class="nav-2">Therapedic</a></li>
                                            <li><a href="" class="nav-2">Vạn Thành</a></li>
                                            <li><a href="" class="nav-2">Zinus</a></li>
                                            <li><a href="" class="nav-2">Americanstar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="">Chăn ga gối <i class="ti-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li class="sub-nav"><a href="#" class="menu-link">Bộ chăn ga</a>
                                        <ul class="sub-nav-1">
                                            <li><a href="" class="nav-2">Bộ chăn ga chun</a></li>
                                            <li><a href="" class="nav-2">Bộ chăn ga phủ</a></li>
                                            <li><a href="" class="nav-2">Bộ ga chun và gối</a></li>
                                            <li><a href="" class="nav-2">Chăn lẻ</a></li>
                                            <li><a href="" class="nav-2">Ga lẻ</a></li>
                                            <li><a href="" class="nav-2">Vỏ gối lẻ</a></li>
                                            <li><a href="" class="nav-2">Vỏ chăn lẻ</a></li>
                                        </ul>
                                        
                                    </li>
                
                                    <li class="sub-nav"><a href="#" class="menu-link">Kích thước</a>
                                        <ul class="sub-nav-1">
                                            <li><a href="" class="nav-2">120 x 200cm</a></li>
                                            <li><a href="" class="nav-2">160 x 200cm</a></li>
                                            <li><a href="" class="nav-2">180 x 200cm</a></li>
                                            <li><a href="" class="nav-2">200 x 220cm</a></li>
                                            <li><a href="" class="nav-2">Free Size</a></li>
                                            
                                        </ul>
                                    </li>
                                    <li class="sub-nav"><a href="#" class="menu-link">Giá tiền</a>
                                        <ul class="sub-nav-1">
                                            <li><a href="" class="nav-2">Dưới 1 triệu</a></li>
                                            <li><a href="" class="nav-2">Từ 2 - 5 triệu</a></li>
                                            <li><a href="" class="nav-2">Trên 5 triệu</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-nav"><a href="#" class="menu-link">Thương hiệu</a>
                                        <ul class="sub-nav-1">
                                            <li><a href="" class="nav-2">Canada</a></li>
                                            <li><a href="" class="nav-2">Amando</a></li>
                                            <li><a href="" class="nav-2">Pyeoda</a></li>
                                            <li><a href="" class="nav-2">Homy</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="">Phụ kiện <i class="ti-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li class="sub-nav"><a href="#" class="menu-link">Phụ kiện giấc ngủ</a>
                                        <ul class="sub-nav-1">
                                            <li><a href="" class="nav-2">Gối Tựa Trang Trí</a></li>
                                            <li><a href="" class="nav-2">Tấm Bảo Vệ Nệm</a></li>
                                            <li><a href="" class="nav-2">Tấm Tăng Tiện Ích Nệm</a></li>
                                            <li><a href="" class="nav-2">Ruột Chăn</a></li>
                                            <li><a href="" class="nav-2">Gối</a></li>
                                            <li><a href="" class="nav-2">Máy Khuếch Tán Tinh Dầu</a></li>
                                            <li><a href="" class="nav-2">Tinh dầu</a></li>
                                            <li><a href="" class="nav-2">Lõi Tinh Dầu</a></li>
                                        </ul>
                                        
                                    </li>
                
                                    <li class="sub-nav"><a href="#" class="menu-link">Kích Thước</a>
                                        <ul class="sub-nav-1">
                                            <li><a href="" class="nav-2">45 x 65cm</a></li>
                                            <li><a href="" class="nav-2">50 x 70cm</a></li>
                                            <li><a href="" class="nav-2">60 x 60cm</a></li>
                                            <li><a href="" class="nav-2">160 x 200cm</a></li>
                                            <li><a href="" class="nav-2">180 x 200cm</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-nav"><a href="#" class="menu-link">Giá tiền</a>
                                        <ul class="sub-nav-1">
                                            <li><a href="" class="nav-2">Dưới 1 triệu</a></li>
                                            <li><a href="" class="nav-2">Từ 1 - 2 triệu</a></li>
                                            <li><a href="" class="nav-2">Trên 3 triệu</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-nav"><a href="#" class="menu-link">Thương hiệu</a>
                                        <ul class="sub-nav-1">
                                            <li><a href="" class="nav-2">Aeroflow</a></li>
                                            <li><a href="" class="nav-2">Amando</a></li>
                                            <li><a href="" class="nav-2">Arena</a></li>
                                            <li><a href="" class="nav-2">Doona</a></li>
                                            <li><a href="" class="nav-2">Kim Cương</a></li>
                                            <li><a href="" class="nav-2">Gummi</a></li>                    
                                            <li><a href="" class="nav-2">Liên Á</a></li>
                                            <li><a href="" class="nav-2">Kodo</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="">Giường <i class="ti-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li class="sub-nav"><a href="#" class="menu-link">Loại Giường</a>
                                        <ul class="sub-nav-1">
                                            <li><a href="" class="nav-2">Giường gỗ</a></li>
                                            <li><a href="" class="nav-2">Giường vải</a></li>
                                            <li><a href="" class="nav-2">Giường da</a></li>
                                            <li><a href="" class="nav-2">Giường trẻ em</a></li>
                                            <li><a href="" class="nav-2">Giường massage</a></li>
                                            <li><a href="" class="nav-2">Giường sắt</a></li>            
                                        </ul>        
                                    </li>
                
                                    <li class="sub-nav"><a href="#" class="menu-link">Kích thước</a>
                                        <ul class="sub-nav-1">
                                            <li><a href="" class="nav-2">180 x 200 cm</a></li>
                                            <li><a href="" class="nav-2">160 x 200 cm</a></li>
                                            <li><a href="" class="nav-2">120 x 200 cm</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-nav"><a href="#" class="menu-link">Giá tiền</a>
                                        <ul class="sub-nav-1">
                                            <li><a href="" class="nav-2">Từ 3 - 5 triệu</a></li>
                                            <li><a href="" class="nav-2">Từ 5 - 7 triệu</a></li>
                                            <li><a href="" class="nav-2">Từ 7 triệu</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-nav"><a href="#" class="menu-link">Thương hiệu</a>
                                        <ul class="sub-nav-1">
                                            <li><a href="" class="nav-2">Amando</a></li>
                                            <li><a href="" class="nav-2">GoBy</a></li>
                                            <li><a href="" class="nav-2">Zip</a></li>
                                            <li><a href="" class="nav-2">Beyours</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>       
                            <li><a href="" class="sale">Khuyến mãi</a></li>
                        </ul>
                    </div>
                    
                    <div class="store-location">
                        <a href="#">
                            <div class="ti-location-pin label-store">
                                Tìm quanh đây
                            </div>
                            <div class="effect-button">
                                118 CỬA HÀNG
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- slider -->
        <div id="slider">
            <div class="header-homepage-slider">
                <div class="slider-block">
                    <div class="slider-img">
                        <img class="myslider sliders" src="./assets/img/Slider/slider1.png" alt="slider1">
                        <img class="myslider sliders" src="./assets/img/Slider/slider2.jpg" alt="slider2">
                        <img class="myslider sliders" src="./assets/img/Slider/slider3.png" alt="slider3">

                        <button class="ti-angle-left btn-arrow right" onclick="plusDivs(-1)"></button>
                        <button class="ti-angle-right btn-arrow left" onclick="plusDivs(1)"></button>
                    </div>

                    <div class="detail-slider">
                        <div class="slider-list">
                            <div class="detail-slider-item">
                                <p>Nàng nằm êm</p>
                                <p>Thêm hạnh phúc</p>
                            </div>
                            <div class="detail-slider-item">
                                <p>Khai trương cửa hàng</p>
                                <p>tại TP. Cần Thơ</p>
                            </div>
                            <div class="detail-slider-item">
                                <p>Tích điểm nhân đôi</p>
                                <p>Nàng vui gấp bội</p>
                            </div>
                            <div class="detail-slider-item">
                                <p>Gummi Classic</p>
                                <p>Mua 1 tặng 11</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="list-block">
                    <div class="image-1"><a href=""><img src="./assets/img/Slider/img1.png" alt="Nệm Mỹ"></a></div>
                    <div class="image"><a href=""><img src="./assets/img/Slider/img2.png" alt="vuanem x VNPay"></a></div>
                    <div class="image"><a href=""><img src="./assets/img/Slider/img3.png" alt="Mua sắm thả ga"></a></div>
                </div>
            </div>
        </div>
        <!-- content -->
        <div id="content">
            <div class="flash-sale-section">
                <div class="block-heading">
                    <h2 class="heading-top">
                        <img src="./assets/img/Content/flash2.png" alt="Flash">
                        flash sale Nệm
                    </h2>
                    <div class="timeline-block">
                        <span>Kết thúc sau</span>
                        <div class="countdown-timeline">
                            <p id="countdown">
                                <div id="days" class="time">
                                </div>
                                <div id="hours" class="time">
                                </div>
                                <div id="minutes" class="time">
                                </div>
                                <div id="seconds" class="time">
                                </div>
                                
                            </p>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
            
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
                            echo "<label>Giá Gốc</label>";
                            echo "<div class='price'>{$gia} đ</div>";
                            echo "</div>";
                            echo "<div class='installment'>";
                            echo "<label>Flash Sale</label>";
                            echo "<div class='amount'>{$flashsale} đ</div>";
                            echo "</div>";
                            // echo "<button class='view-detail js-add-minicart'>Mua Ngay</button>";
                            
                            echo "<form id='{$ma}' method='POST' action=''> \n";
                            echo "<input class='view-detail js-add-minicart' type='submit' name='submit' value='Mua Ngay' form='{$ma}'></input> \n";
                            echo "<input type='hidden' name='masp' value='{$ma}'> \n";
                            echo "<input type='hidden' name='hd' value='them'> \n";
                            echo "</form>";
                            echo "</div>";
                            echo "</div>";
                            
                            echo "</div>";
                        }
                    
                    } else {
                        echo "Khong co san pham de hien thi";
                    }

                    $cn->close();
                    ?>
                    
                    

                    
                </div>
            </div>
        </div>

        <!-- footer -->
        <div id="footer">
            <div class="footer-top-content">
                <div class="footer-top-container">
                    <div class="top-footer">
                        <h2 class="title">Tại sao lại chọn Vua Nệm</h2>
                        <div class="benefit">
                            <div class="benefit-item">
                                <a href="">
                                    <div class="image">
                                        <img src="./assets/img/Footer/footer_top_1.jpg" alt="toc-do">
                                    </div>
                                    <p class="sologan">
                                        60 giây
                                        <br>
                                        <span>chọn nệm</span>
                                    </p>
                                    <p class="detail">
                                        Cùng Vua Nệm đi tìm chiếc nệm phù hợp nhất với bạn và gia đình chỉ trong vài bước duy nhất
                                    </p>
    
                                </a>
                            </div>
                            <div class="benefit-item">
                                <a href="">
                                    <div class="image">
                                        <img src="./assets/img/Footer/footer_top_2.jpg" alt="free-trial">
                                    </div>
                                    <p class="sologan">
                                        365 đêm
                                        <br>
                                        <span>nằm thử</span>
                                    </p>
                                    <p class="detail">
                                        Hãy “làm quen” với người bạn đồng hành trong hành trình đi tìm giấc mơ đẹp nào
                                    </p>
    
                                </a>
                            </div>
                            <div class="benefit-item">
                                <a href="">
                                    <div class="image">
                                        <img src="./assets/img/Footer/footer_top_3.jpg" alt="0%">
                                    </div>
                                    <p class="sologan">
                                        Trả góp
                                        <br>
                                        <span>0% lãi suất</span>
                                    </p>
                                    <p class="detail">
                                        Ngủ ngon mà vẫn dày ví, xua tan nỗi lo tài chính khi sử dụng những sản phẩm cao cấp,
                                        chất lượng
                                    </p>
    
                                </a>
                            </div>
                            <div class="benefit-item">
                                <a href="">
                                    <div class="image">
                                        <img src="./assets/img/Footer/footer_top_4.jpg" alt="free-shipping">
                                    </div>
                                    <p class="sologan">
                                        Vận chuyển
                                        <br>
                                        <span>miễn phí</span>
                                    </p>
                                    <p class="detail">
                                        Giao hàng tận giường, miễn phí giao hàng với cả sản phẩm
                                    </p>
    
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="footer-bottom">
                <div class="footer-bottom-container">
                    <div class="bottom-footer-item report">
                        <div class="image">
                            <a href="">
                                <img src="./assets/img/Header/astronaut-fishing-stars-512x512.png" alt="logo-dream">
                            </a>
                        </div>
                        <p>
                            Gọi mua hàng (8h30 - 21:00)
                            <br>
                            <span>
                                <a href="tel:18002092">1800 2092</a>
                            </span>
                        </p>
                        <p>
                            Gọi khiếu nại (8h30 - 18h00)
                            <br>
                            <span>
                                <a href="tel:18002093">1800 2093</a>
                            </span>
                        </p>
                        <p>
                            E-mail
                            <br>
                            <span>online@vuanem.com</span>
                        </p>
                        <p>Nghỉ chiều thứ 7 và Chủ nhật</p>
                    </div>

                    <div class="bottom-footer-item">
                        <p class="title-bottom">
                            <span>Thông tin công ty</span>
                        </p>
                        <p>
                            <a href="">Giới thiệu công ty</a>
                        </p>
                        <p>
                            <a href="">Liên hệ</a>
                        </p>
                        <p>
                            <a href="">Xem hệ thống cửa hàng</a>
                        </p>
                        <p>
                            <a href="">Đối tác của Vua Nệm</a>
                        </p>
                        <p class="social">
                            <span>Social</span>
                        </p>
                        <div class="social-symbol">
                            <div class="symbol"><a class="ti-facebook" href=""></a></div>
                            <div class="symbol"><a class="ti-youtube" href=""></a></div>
                            <div class="symbol"><a class="ti-instagram" href=""></a></div>
                        </div>
                    </div>
                    <div class="bottom-footer-item">
                        <p class="title-bottom">
                            <span>Tin tức</span>
                        </p>
                        <p>
                            <a href="">Khuyến mãi<a>
                        </p>
                        <p>
                            <a href="">Sức Khỏe Giấc Ngủ</a>
                        </p>
                        <p>
                            <a href="">Chuyên Gia Nệm</a>
                        </p>
                        <p><a href="">Tuyển dụng</a></p>
                    </div>
                    <div class="bottom-footer-item">
                        <p class="title-bottom">
                            <span>Hỗ trợ</span>
                        </p>
                        <p>
                            <a href="">Điều khoản và điều kiện</a>
                        </p>
                        <p>
                            <a href="">Chính sách bảo mật</a>
                        </p>
                        <p>
                            <a href="">Chính sách bảo hành</a>
                        </p>
                        <p>
                            <a href="">Phương thức thanh toán</a>
                        </p>
                        <p>
                            <a href="">Chính sách vận chuyển và giao nhận</a>
                        </p>
                        <p>
                            <a href="">Điều khoản Mua Bán Hàng Hóa</a>
                        </p>
                        <p>
                            <a href="">Chính sách đổi trả sản phẩm</a>
                        </p>
                        <p>
                            <a href="">Câu hỏi thường gặp</a>
                        </p>
                        <p>
                            <a href="">Chính sách khách hàng thân thiết</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Modal -->
    <div class="mini-cart-modal">
        <div class="mini-cart-container js-mini-cart-container">
        
            <header class="modal-header">
                <div class="title-cart ti-shopping-cart">
                    Giỏ Hàng
                </div>
                <div class="close-minicart js-modal-close">
                    Đóng
                </div>
            </header>

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
                                    echo "<input type='submit' name='submit' value='Cập Nhật'>";
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

                    echo "<div class='button-pay-buymore'>";
                        echo "<a class='button-buymore js-modal-close'>";
                            echo "Mua thêm";
                        echo "</a>";
                        echo "<a class='button-pay' onclick=window.location.href='dathang.php'>";
                            echo "<span >Thanh toán</span>";
                        echo "</a>";
                        // echo "<a class='button-pay'>";
                        echo "<form  method='POST'>";
                            echo "<input type='hidden' name='hd' value='xoa'>";
                            echo "<input class='button-pay' type='submit' name='submit' value='Xóa giỏ hàng'>";
                        echo "</form>";
                        // echo "</a>";
                    echo "</div>";
                echo "</form>";

                    
                    

                    
                    
                
                    
                } 
                ?>
                    

                
            </div>
        </div>
    </div>
                
        

    


    <!-- chạy slider -->
    <script>
        var slideIndex = 1;
        showDivs(slideIndex);
        
        function plusDivs(n) {
          showDivs(slideIndex += n);
        }
        
        function showDivs(n) {
          var i;
          var x = document.getElementsByClassName("myslider");
          if (n > x.length) {slideIndex = 1}
          if (n < 1) {slideIndex = x.length}
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
          }
          x[slideIndex-1].style.display = "block";  
        }
    </script>
    <!-- auto slider -->
    <script>
        var myIndex = 0;
        carousel();
        
        function carousel() {
          var i;
          var x = document.getElementsByClassName("myslider");
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
          }
          myIndex++;
          if (myIndex > x.length) {myIndex = 1}    
          x[myIndex-1].style.display = "block";  
          setTimeout(carousel, 3000); // Change image every 2 seconds
        }
    </script>
    <!-- countdown flashsale -->
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("May 31, 2022 23:59:59").getTime();
        
        // Update the count down every 1 second
        var x = setInterval(function() {
        
          // Get today's date and time
          var now = new Date().getTime();
        
          // Find the distance between now and the count down date
          var distance = countDownDate - now;
        
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);


          // Display the result in the element with id="demo"
        //     document.getElementById("days").innerHTML = days + " " + hours + " "
        //   + minutes + " " + seconds + " ";

        // format date
          if (days < 10) {
            document.getElementById("days").innerHTML = "0" + days;
          }
          else {
            document.getElementById("days").innerHTML = days;
          }
          if (hours < 10) {
            document.getElementById("hours").innerHTML = "0" + hours;
          }
          else {
            document.getElementById("hours").innerHTML = hours;
          }
          if (minutes < 10) {
            document.getElementById("minutes").innerHTML = "0" + minutes;
          }
          else {
            document.getElementById("minutes").innerHTML = minutes;
          }
          if (seconds < 10) {
            document.getElementById("seconds").innerHTML = "0" + seconds;
          }
          else {
            document.getElementById("seconds").innerHTML = seconds;
          }
          
          // If the count down is finished, write some text
          if (distance < 0) {
            clearInterval(x);
            document.getElementById("days").innerHTML = "EXPIRED";
          }
        }, 1000);
    </script>
    <!-- mini-cart -->
    <script>
        const minicartBtn = document.querySelector('.js-mini-cart')
        const minicartModal = document.querySelector('.mini-cart-modal')
        const modalCloses = document.querySelectorAll('.js-modal-close')
        const modalContainer = document.querySelector('.js-mini-cart-container')
        const addtoMinicarts = document.querySelectorAll('.js-add-minicart')
        
        // Hàm hiển thị modal minicart (them class open vào modal)
        function showMiniCart() {
            minicartModal.classList.add('open')
        }
        
        function AddMiniCart () {
            alert('Them thanh cong');
        }
        // Hàm ẩn modal minicart (go bo class open vào modal)
        function hideMiniCart() {
            minicartModal.classList.remove('open')
        }

        // Nghe hanh vi click
        minicartBtn.addEventListener('click', showMiniCart)
        // modalClose.addEventListener('click', hideMiniCart)
        minicartModal.addEventListener('click', hideMiniCart)

        for (const modalClose of modalCloses) {
            modalClose.addEventListener('click', hideMiniCart)
        }

        for (const addtoMinicart of addtoMinicarts) {
            addtoMinicart.addEventListener('click', AddMiniCart)
        }

        modalContainer.addEventListener('click', function (event) {
            event.stopPropagation()
        })

    </script>
    <script>
        function xuat_hinh(img) {
            img = document.getElementById("hinhsp");
            // img.src = URL.createObjectURL(img.files[0]);
            img.src = URL.createObjectURL(img.files[0]);
        }
    </script>

    <script>
        const list = document.querySelectorAll('.word')
        var index = 0

        setInterval((e) => {
            list.forEach((e) => {
                e.classList.remove('change-properties')
            })
            list[index].classList.add('change-properties')
            index++
            if (index == list.length) {
                index = 0
            }
        }, 200)
    </script>

</body>
</html>