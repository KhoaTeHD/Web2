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
  <link rel="stylesheet" href=".//assets/css/login.css">
  <link rel="stylesheet" href=".//assets/css/header.css">
  <link rel="stylesheet" href=".//assets/css/footer.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap&amp;_cacheOverride=1679484892371"
    data-tag="font">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
    data-tag="font">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
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

      include(".//components/header.php");      

    ?>
  </div>
  <!--End: Header-->

  <div id="body" style=" height: 600px;">
    <div class="containerlogin-containerlogin">
     
      <?php 
      if (isAdminLogged()) {
        
        echo '

      <img src=".//assets/img/hoangImg/imgs/rectangle23772-m91-500w.png" alt="Rectangle23772"
        class="containerlogin-rectangle2">
      <div class="containerlogin-frame12">
        <div class="containerlogin-frame10"><p>Nhấn vào <a href="logout.php?isAdmin=1">đây</a> nếu bạn muốn đăng xuất!</p></div>
      </div>
        ';
      }
      else{
        echo '
        <img src=".//assets/img/hoangImg/imgs/rectangle23772-m91-500w.png" alt="Rectangle23772"
        class="containerlogin-rectangle2">
      <div class="containerlogin-frame12">
        <div class="containerlogin-frame10"></div>
      </div>
        <form name="frm" id="" action=".//modules/login_processing.php" method="POST" onsubmit="return kiemTra();">
        <div class="containerlogin-group1">
          <span class="containerlogin-text LabelMedium">
            <span>ĐĂNG NHẬP</span>';
            
            if (isset($_SESSION['errorLogin'])) {
              echo '<p id="loginError" style="font-size: 12px;line-height: 18.391px; padding-left: 12px;color: red;font-weight: bold;">' . $_SESSION['errorLogin'] . '</p>';
              unset($_SESSION['errorLogin']);
            }
            echo '
          </span>
          <div class="containerlogin-frame13">
            <span class="containerlogin-text02">
              <span>Bạn chưa có tài khoản? &nbsp;</span>
            </span>
            <span class="containerlogin-text04"><a href="signup.php" style="text-decoration: none;">Đăng ký.</a></span>
          </div>
          <p style="top:46px; position: absolute;">Tài khoản</p> 
          <input name="userName" class="containerlogin-text08 LabelSmall" type="text"
            style="width:332px; height:42px; position: absolute; border-style: outset; border: 1px solid #674FA3; border-radius: 8px;"
            placeholder="Email/Số điện thoại">
            <p style="top:130px; position: absolute;">Mật khẩu</p> 
          <input name="passWord" class="containerlogin-text10 LabelSmall" type="password"
            style="width:332px; height:42px; position: absolute; border-style: outset; border: 1px solid #674FA3; border-radius: 8px;"
            placeholder="Mật khẩu">
          <img src=".//assets/img/hoangImg/imgs/rectangle63772-oop-200h.png" alt="Rectangle63772"
            class="containerlogin-rectangle6">
          <input type="submit" id="btnSubmitLogin" class="containerlogin-text06 LabelLarge" value="Đăng nhập" onclick="">
          </span>
          <div id="container-eyes"></div>
          <img id="btn-eyes" src=".//assets/img/hoangImg/icons/icons8-eye-24.png" alt="ClosedEye3772" class="containerlogin-closed-eye" onclick ="showHidePass();">
          <img id="btn-eyes-blind" style="display:none;" src=".//assets/img/hoangImg/icons/icons8-blind-24.png" alt="ClosedEye3772" class="containerlogin-closed-eye" onclick ="showHidePass();">

        </div>
      </form>
        ';
      }
      ?>
      
      
      <img src=".//assets/img/hoangImg/logo/logo_tron.png" alt="z416347160358228d6ce2e5edbcf0ee0b207d1a4329bed23772"
        class="containerlogin-z416347160358228d6ce2e5edbcf0ee0b207d1a4329bed2" onclick="showAlert();">
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
  <div id="my-footer">
  <?php
    include(".//components/footer.php");
    ?>
  </div>
  <!--End: Footer-->

  <script>
    var btn_eye = document.querySelector('#btn-eyes');
    var eyeBlind = document.getElementById("btn-eyes-blind");
    var passwordtxt = document.frm.passWord;
    var flag_eye = false;
    function showHidePass() {
      if(flag_eye == false){
          passwordtxt.type = 'text';
          flag_eye = true;
          eyeBlind.style.display = 'block';
          btn_eye.style.display = 'none';
      }
      else{
        passwordtxt.type = 'password';
          flag_eye = false;
          eyeBlind.style.display = 'none';
          btn_eye.style.display = 'block';
      }
    }
  </script>

  <!--Start hien thi thong bao dang nhập sai-->
  <script> 
    function kiemTra() {
      

      if (document.frm.userName.value.trim().length == 0 ||
        document.frm.passWord.value.trim().length == 0) {
          Swal.fire({
        title: 'Thông báo!',
        text: 'Vui lòng điền đủ thông tin đăng nhập!',
        icon: 'warning',
        confirmButtonText: 'Xác nhận'
      })
        return false;
      }
    }
  </script>
  <!--End hien thi thong bao dang nhap sai-->
</body>

</html>