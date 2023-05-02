<?php
    include("addToCart.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/detail_product.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Document</title>
</head>
<style>
    .material-symbols-outlined {
      font-variation-settings:
      'FILL' 0,
      'wght' 300,
      'GRAD' 0,
      'opsz' 24;
      padding-right: 6px;
    }
</style>
<body>
    <div id="bar-header">
        <?php
        include("bar.php");
        ?>
    </div>
    <div class="detail_container">
        <div class="detail_product">
            <div class="product_img"><img src="img/dongho.jpg" alt=""></div>
            <div class="product_name">
                <p class="product_title">CASIO WORLD TIME AE-1200WHD-1AVDF – NAM – QUARTZ (PIN) – MẶT SỐ 45 MM, BỘ BẤM GIỜ, CHỐNG NƯỚC 10 ATM</p>
                <p class="product_price"><span class="product_sale">12.000.000 đ</span><span class="product_nosale">12.000.000 đ</span><label class="product_price_label">20%</label></p>
                <p class="product_state">Tình trạng: <span style="color: green;">còn hàng</span></p>
                <p class="product_model">Loại máy: máy cơ</p>
                <p class="product_gender">Giới tính: Unisex</p> 
                <div class="product_policy">
                    <div class="product_policy_container">
                        <div class="product_policy_header">
                            <p>Chính sách mua hàng tại vutrudongho.vn</p>
                        </div>
                        <div class="product_policy_content">
                            <div class="product_policy_group1">
                                <div class="product_policy_shipping">
                                    <span class="material-symbols-outlined">local_shipping</span>
                                    Giao hàng toàn quốc
                                </div>
                                <div class="product_policy_exchange">
                                    <span class="material-symbols-outlined">currency_exchange</span>
                                    Đổi trả hàng trong 7 ngày</div>
                            </div>
                            <div class="product_policy_group2">
                                <div class="product_policy_guarantee">
                                    <span class="material-symbols-outlined">verified_user</span>
                                    Bảo hành 5 năm</div>
                                <div class="product_policy_authentic">
                                    <span class="material-symbols-outlined">thumb_up</span>
                                    Cam kết chính hãng</div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="" method="post">
                    <div class="add_cart_button">
                            <input type="hidden" name="UserID" value="US000001">
                            <input type="hidden" name="ProductID" value="PR000001">
                            <button type="submit" name="addToCart" value="add" >Thêm vào giỏ hàng</button>
                    </div>
                </form>
            </div>
        </div>


        <div class="product_description">
            Mô tả:
            <p class="product_description_content">
                Đồng hồ Casio MTP-1302D-7A1VDF có kiểu dáng truyền thống với mặt số tròn, niềng được tạo khía nổi bật quanh nền trắng mặt số, kim chỉ và vạch số được mạ bạc trên nền số.
            </p>
        </div>
    </div>
    <div id="my-footer">
        <?php
        include("footer.php");
        ?>
    </div>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php
        include ("alers.php");
    ?>

</body>
</html>