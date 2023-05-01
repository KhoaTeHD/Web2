<?php
require_once('lib_session.php');
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
    include("bar.php");
    ?>
  </div>
  <!--End: Header-->
  <div id="main-user">
    <div id="imagelogo">
      <img id="img-logo" src=".//assets/img/hoangImg/logo/logo_text_400x100.png" alt="">
    </div>
    <div id="main-content">
      <div id="tab-bar-user">
        <p class="content-tab-bar-userr">Xin chào,
          <?php echo ("$_SESSION[current_fullName]"); ?>!
        </p>
        <ul id="primary">
          <li style="margin-bottom: 16px;"><a href="user.php">Thông tin tài khoản</a></li>
          <li><a href="donhang.php">Quản lý đơn hàng</a></li>
        </ul>
<!--         <p class="content-tab-bar-user"
          style="margin-bottom: 12px;color:#fff;width: 100%;height: 50px;text-align: center;line-height: 50px;"><a
            href="user.php">Thông tin tài khoản</a></p>
        <p class="content-tab-bar-user"
          style="color:#000;width: 100%;height: 50px;text-align: center;line-height: 50px;"><a href="donhang.php">Quản
            lý đơn hàng</a></p> -->
      </div>
      <div id="content-user">
        <div id="user-infor-and-address-user">
          <div id="user-infor">
            <p style="font-size: 20px;display: flex;flex-direction: row;">Thông tin cá nhân | <a class="hoverTheA" href="detail-user.php" style="font-size: 20px;">Chỉnh
                sửa</a></p>
            <p>Họ và tên:
              <?php echo $_SESSION['current_fullName'] ?>
            </p>
            <p>Email:
              <?php echo $_SESSION['current_email'] ?>
            </p>
            <p>Số điện thoại:
              <?php echo $_SESSION['current_numberPhone'] ?>
            </p>
          </div>
          <hr>
          <div id="address-user">
            <p style="font-size: 20px;display: flex;flex-direction: row;">Địa chỉ nhận hàng | <a class="hoverTheA" href="detail-user.php" style="font-size: 20px;">Chỉnh sửa</a></p>
            <p>
              <?php echo $_SESSION['current_houseRoadAddress'] ?>,
              <?php echo $_SESSION['current_ward'] ?>,
              <?php echo $_SESSION['current_district'] ?>,
              <?php echo $_SESSION['current_province'] ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Start: Footer-->
  <div id="my-footer">
    <?php
    include("footer.php");
    ?>
  </div>
  <!--End: Footer-->
</body>

</html>