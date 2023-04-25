<?php
require_once('lib_session.php');
?>
<?php
echo '
<div id="logo-header"></div>
<div id="menu-header">
    <img class="line-header" src=".//assets/img/Line.png" style="order: 0;" alt="">
    <p class="child-menu-header" style="width: auto;order: 1;"><a style="color: white; text-decoration: none;" href=".//index.php">Trang chủ</a></p>
    <img class="line-header" src=".//assets/img/Line.png" style="order: 2;" alt="">
    <p class="child-menu-header" style="width: auto;order: 3;">Sản phẩm</p>
    <img class="line-header" src=".//assets/img/Line.png" style="order: 4;" alt="">
    <p class="child-menu-header" style="width: auto;order: 5;">Về chúng tôi</p>
    <img class="line-header" src=".//assets/img/Line.png" style="order: 6;" alt="">
    <p class="child-menu-header" style="width: auto;order: 7;">Liên hệ</p>
</div>
<div id="avt-and-icons">
    <img class="icon-header" src=".//assets/img/search.png" style="order: 0;" alt="">
    <img class="line-header" src=".//assets/img/Line.png" style="order: 1;" alt="">
    <img class="icon-header" src=".//assets/img/hoangImg/icons/icons8-help-24.png" style="order: 2;" alt="">
    <img class="line-header" src=".//assets/img/Line.png" style="order: 3;" alt="">
    <img class="icon-header" src=".//assets/img/hoangImg/icons/icons8-shopping-cart-24.png" style="order: 4;" alt="">
    <img class="line-header" src=".//assets/img/Line.png" style="order: 5;" alt="">'; ?>

<!-- Nếu chưa đăng nhập thì hiển thị nút Đăng nhập -->
<?php
//var_dump(isAdminLogged());
if (isAdminLogged()) {
    echo ' <img id="avt_user" onclick="avtClicked();" src=".//assets/img/Samsung.jpg" width="34" height="34" style="border-radius:25px;order: 6;" alt="">
   <div id="menu-options-user" style="position: absolute;
                                      top:37px;
                                      right:0;
                                      background-color:#ccc;
                                      z-index:1000;
                                      order: 7;
                                      width:200px;
                                      height:100px;
                                      display:none;">
   <ul style="list-style-type: none;
              font-size:20px;
              display:flex;
              height:100%;
              flex-direction: column;
              justify-content: space-around;
              background-color: #fff;
              font-family: "Roboto";
              font-style: normal;
              font-weight: normal;
              font-size: 16px;
              line-height: 40px;
              letter-spacing: 0.1px;
              ">
   <li style="padding-left:8px;"><a href=".//user.php">Thông tin tài khoản</a></li>
   <li style="padding-left:8px;">Đơn hàng của tôi</li>
   <li><hr></li>
   <li style="padding-left:8px;"><a class="nav-link" href=".//php_of_Hoang/logout.php?isAdmin=1">Đăng xuat</a></li>
   </ul>
   </div>
   <script lang="javascript">
   var avt_user = document.querySelector("#avt_user");
   var menu_options_user = document.querySelector("#menu-options-user");
   var flag = false;
   function avtClicked() {
    if(flag == true){
        menu_options_user.style.display = "none";
        flag = false;
    }
    else{
        menu_options_user.style.display = "block";
        flag = true;
    }
    
   } 
   </script>
   ';

} else {
    echo ('<p id="login-signup" style="order: 6;"> <a href=".//login.php">Đăng nhập</a></p>
    ');
}
?>