<?php
require_once('.//php_of_Hoang/lib_session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=".//assets/css/user.css">
    <link rel="stylesheet" href=".//assets/css/header.css">
  <link rel="stylesheet" href=".//assets/css/footer.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap&amp;_cacheOverride=1679484892371"
    data-tag="font">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
    data-tag="font">
</head>
<body>
    <!--Start: Header-->
    <div id="bar-header">
    <?php
      include(".//php_of_Hoang/bar.php");
    ?>
  </div>
  <!--End: Header-->
  <div id="main-user" >
    <div id="imagelogo">
        <img id="img-logo" src=".//public/playground_assets/vutrudidong14482-9p2.svg" alt="">
    </div>
    <div id="main-content">
        <div id="tab-bar-user">
            <p class="content-tab-bar-userr">Xin chào, <?php echo ("$_SESSION[current_username]"); ?>!</p>
            <p class="content-tab-bar-user">Thông tin tài khoản</p>
            <p class="content-tab-bar-user">Quản lý đơn hàng</p>
        </div>
        <div id="content-user">
            <div id="user-infor-and-address-user">
                <div id="user-infor">
                    <p style="font-size: 20px;">Thông tin cá nhân | <a href="#" style="font-size: 20px;">Chỉnh sửa</a></p>
                    <p>Họ và tên: <?php var_dump("$_SESSION[current_fullName]")?></p>
                    <p>Ngày sinh: 09/03/2002</p>
                    <p>Email: tvhoang@gmai.com</p>
                    <p>Số điện thoại: 0378765123</p>
                </div>
                <hr>
                <div id="address-user">
                    <p style="font-size: 20px;">Địa chỉ nhận hàng | <a href="#" style="font-size: 20px;">Chỉnh sửa</a></p>
                    <p>Thiều Việt Hoàng</p>
                    <p>Hẻm 35/7, Đường Nguyễn Văn Quỳ, Phường Tân Thuận Đông, Quận 7, TP. Hồ Chí Minh</p>
                    <p>(+84) 378765123</p>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!--Start: Footer-->
  <div id="my-footer" style="position: relative;top: 50px;"></div>
  <script src=".//assets/js/footer.js"></script>
  <script>
    const myFooter = document.querySelector("#my-footer");
    myFooter.appendChild(createFooter());
  </script>
  <!--End: Footer-->
</body>
</html>