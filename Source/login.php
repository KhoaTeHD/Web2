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
  <link rel="stylesheet" href=".//assets/css/login.css">
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
  <!-- <div id="bar-header"></div>
    <script src=".//assets/js/header.js"></script>
    <script>
      const myHeader = document.querySelector("#bar-header");
      myHeader.appendChild(createHeader());
    </script> -->
  <div id="bar-header">
    <?php

      include(".//php_of_Hoang/bar.php");      

    ?>
  </div>
  <!--End: Header-->

  <div id="body" style=" height: 600px;">
    <div class="containerlogin-containerlogin">
     
      <?php 
      if (isAdminLogged()) {
        
        echo '

      <img src="public/playground_assets/rectangle23772-m91-500w.png" alt="Rectangle23772"
        class="containerlogin-rectangle2">
      <div class="containerlogin-frame12">
        <div class="containerlogin-frame10"><p>Nhấn vào <a href=".//php_of_Hoang/logout.php?isAdmin=1">đây</a> nếu bạn muốn đăng xuất!</p></div>
      </div>
        ';
      }
      else{
        echo '
        <img src="public/playground_assets/rectangle23772-m91-500w.png" alt="Rectangle23772"
        class="containerlogin-rectangle2">
      <div class="containerlogin-frame12">
        <div class="containerlogin-frame10"></div>
      </div>
        <form name="" id="" action=".//php_of_Hoang/xulydangnhap.php" method="POST">
        <div class="containerlogin-group1">
          <span class="containerlogin-text LabelMedium">
            <span>ĐĂNG NHẬP</span>
          </span>
          <div class="containerlogin-frame13">
            <span class="containerlogin-text02">
              <span>Bạn chưa có tài khoản?</span>
            </span>
            <span class="containerlogin-text04"><span>Đăng ký</span></span>
          </div>
          <input name="userName" class="containerlogin-text08 LabelSmall" type="text"
            style="width:332px; height:42px; position: absolute; border-style: outset; border: 1px solid #674FA3; border-radius: 8px;"
            placeholder="Tên đăng nhập/Số điện thoại">
          <!-- <img src="public/playground_assets/rectangle43772-vvx-200h.png" alt="Rectangle43772" class="containerlogin-rectangle4"> -->
          <input name="passWord" class="containerlogin-text10 LabelSmall" type="text"
            style="width:332px; height:42px; position: absolute; border-style: outset; border: 1px solid #674FA3; border-radius: 8px;"
            placeholder="Mật khẩu">
          <!-- <img src="public/playground_assets/rectangle53772-6qka-200h.png" alt="Rectangle53772" class="containerlogin-rectangle5"> -->
          <img src="public/playground_assets/rectangle63772-oop-200h.png" alt="Rectangle63772"
            class="containerlogin-rectangle6">
          <input type="submit" id="btnSubmitLogin" class="containerlogin-text06 LabelLarge" value="Đăng nhập">

          <!-- <span class="containerlogin-text08 LabelSmall">
                <span>Tên đăng nhập/Số điện thoại</span>
              </span> -->
          <!-- <span class="containerlogin-text10 LabelSmall">
                <span>Mật khẩu</span> -->
          </span>
          <div id="container-eyes"></div>
          <img src="public/playground_assets/closedeye3772-x074-200h.png" alt="ClosedEye3772"
            class="containerlogin-closed-eye">
          <div class="containerlogin-frame11">
            <span class="containerlogin-text12">
              <span>Quên mật khẩu?</span>
            </span>
            <span class="containerlogin-text14">
              <span>Đăng nhập với SMS</span>
            </span>
          </div>
          <div class="containerlogin-frame14">
            <img src="public/playground_assets/line13772-qg9c.svg" alt="Line13772" class="containerlogin-line1">
            <span class="containerlogin-text16 LabelSmall">
              <span>Hoặc</span>
            </span>
            <img src="public/playground_assets/line23772-bsv.svg" alt="Line23772" class="containerlogin-line2">
          </div>
          <img src="public/playground_assets/rectangle73772-u7ye-200h.png" alt="Rectangle73772"
            class="containerlogin-rectangle7">
          <img src="public/playground_assets/rectangle83772-kai7-200h.png" alt="Rectangle83772"
            class="containerlogin-rectangle8">
          <img src="public/playground_assets/rectangle93772-ibyn-200h.png" alt="Rectangle93772"
            class="containerlogin-rectangle9">
          <span class="containerlogin-text18"><span>Facebook</span></span>
          <span class="containerlogin-text20"><span>Google</span></span>
          <span class="containerlogin-text22"><span>Twitter</span></span>
          <img src="public/playground_assets/facebook3772-gim-200h.png" alt="Facebook3772"
            class="containerlogin-facebook">
          <img src="public/playground_assets/google3772-6cym-200h.png" alt="Google3772" class="containerlogin-google">
          <img src="public/playground_assets/twitter3772-qqo-200h.png" alt="Twitter3772" class="containerlogin-twitter">
        </div>
      </form>
        ';
      }
      ?>
      
      
      <img src=".//assets/img/hoangImg/logo/logo_tron.png" alt="z416347160358228d6ce2e5edbcf0ee0b207d1a4329bed23772"
        class="containerlogin-z416347160358228d6ce2e5edbcf0ee0b207d1a4329bed2">
      <span class="containerlogin-text24 TitleMedium">
        <span>VŨ TRỤ ĐỒNG HỒ</span>
      </span>
      <span class="containerlogin-text26">
        <span>
          <span>Nền tảng thương mại điện tử được yêu thích tại</span>
          <br>
          <span>Thành phố Hồ Chí Minh</span>
        </span>
      </span>
    </div>
  </div>

  <!--Start: Footer-->
  <div id="my-footer"></div>
  <script src=".//assets/js/footer.js"></script>
  <script>
    const myFooter = document.querySelector("#my-footer");
    myFooter.appendChild(createFooter());
  </script>
  <!--End: Footer-->

  <script>
    function submitLogin() {
      alert("Đăng nhập thành công");
      window.location = ".//index.html";
    }
  </script>
</body>

</html>