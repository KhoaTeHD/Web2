<?php
require_once('lib_session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vũ Trụ Di Động</title>
  <link rel="shortcut icon" href=".//assets/icons/VUTRUDIDONG-icon.svg">
  <link rel="stylesheet" href=".//assets/css/home.css">
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
    include("bar.php");
    ?>
  </div>
  <!--End: Header-->
  <link rel="stylesheet" href=".">
  <div id="main"
    style="display: flex;flex-direction: column; background-color:#fff; height: 5000px; position: relative; top: 50px;">
    <style>
      #vtdd-logotext {
        display: block;
        width: auto;
        height: 75px;

      }

      #my-footer {
        position: relative;
        top: 50px;
      }
    </style>

    <div id="ỉntroduction" style="display: flex;    background-color: rgba(103, 80, 164, 0.5);
    height: 100px;justify-content: center;">
      <img id="vtdd-logotext" src=".//assets/img/hoangImg/logo/logo_text_ngang.png" alt="">
    </div>
    <!--Begin: Slider-->
    <div class="slider">
      <div class="slide-wrapper">
        <div class="slide">
          <img class="slide-img" src=".//assets/img/hoangImg/slider/slide1.png" alt="Slide1" />
        </div>
        <div class="slide">
          <img class="slide-img" src=".//assets/img/hoangImg/slider/slide2.png" alt="Slide2" />
        </div>
        <div class="slide">
          <img class="slide-img" src=".//assets/img/hoangImg/slider/slide3.png" alt="Slide3" />
        </div>
      </div>
    </div>
    <!--End: Slider-->
    <div style="background-color: #fff;">
      <p class="bigtitlehome" style="text-align:center ;">CÁC HÃNG ĐỒNG HỒ CHÚNG TÔI ĐANG KINH DOANH</p>
      <div id="productKD" style="margin-top: 30px;margin-left: 50px;margin-right: 50px;">
        <div
          style="width: 200px;height:200px;background-color:rgba(103, 80, 164, 0.5);display: flex;justify-content: center;align-items: center;">
          <div id="pdIphone" style="display:flex ;flex-direction: column;position: relative;">
            <p class="mediumtitlehome"
              style="color:#fff ;text-align: center;background-color: rgba(103, 80, 164, 0.6);position: absolute;width:100% ;top:50%;transform: translateY(-50%);line-height: 1.5;">
              Casio</p>
            <img src=".//assets/img/productImg/118_AEQ-110W-3AVDF-699x699.png" alt="" width="180px">
          </div>
        </div>

        <div
          style="width: 200px;height:200px;background-color:rgba(103, 80, 164, 0.5);display: flex;justify-content: center;align-items: center;">
          <div style="width:180px ;height: 180px;background-color: #fff;">
            <div id="pdOppo" style="display:flex ;flex-direction: column;position: relative;">
              <p class="mediumtitlehome"
                style="color:#fff ;text-align: center;background-color: rgba(103, 80, 164, 0.6);position: absolute;width:100% ;top:50%;transform: translateY(-50%);line-height: 1.5;">
                Apple</p>
              <img src=".//assets/img/productImg/0011842_midnight_550.png" alt="" width="180px">
            </div>
          </div>
        </div>
        <div
          style="width: 200px;height:2020x;background-color:rgba(103, 80, 164, 0.5);display: flex;justify-content: center;align-items: center;">
          <div id="pdPixel" style="display:flex ;flex-direction: column;position: relative;">
            <p class="mediumtitlehome"
              style="color:#fff ;text-align: center;background-color: rgba(103, 80, 164, 0.6);position: absolute;width:100% ;top:50%;transform: translateY(-50%);line-height: 1.5;">
              Citizen</p>
            <img src=".//assets/img/productImg/AN8195-58E-699x699.png" alt="" width="180px">
          </div>
        </div>

        <div
          style="width: 200px;height:200px;background-color:rgba(103, 80, 164, 0.5);display: flex;justify-content: center;align-items: center;">
          <div id="pdRealme" style="display:flex ;flex-direction: column;position: relative;">
            <p class="mediumtitlehome"
              style="color:#fff ;text-align: center;background-color: rgba(103, 80, 164, 0.6);position: absolute;width:100% ;top:50%;transform: translateY(-50%);line-height: 1.5;">
              Orient</p>
            <img src=".//assets/img/productImg/FAC08003A0-1-699x699.png" alt="" width="180px">
          </div>
        </div>

        <div
          style="width: 200px;height:200px;background-color:rgba(103, 80, 164, 0.5);display: flex;justify-content: center;align-items: center;">
          <div id="pdSamsung" style="display:flex ;flex-direction: column;position: relative;">
            <p class="mediumtitlehome"
              style="color:#fff ;text-align: center;background-color: rgba(103, 80, 164, 0.6);position: absolute;width:100% ;top:50%;transform: translateY(-50%);line-height: 1.5;">
              Seiko</p>
            <img src=".//assets/img/productImg/SRPG41K1.png" alt="" width="180px">
          </div>
        </div>

      </div>
    </div>


    <div style="background-color: rgba(103, 80, 164, 0.4); margin-top: 56px; padding-bottom: 56px;">
      <!--<p class="bigtitlehome" style="text-align:center ;margin-top: 50px;">SẢN PHẨM BÁN CHẠY</p>-->
      <p class="bigtitlehome" style="text-align:center ;margin-top: 50px;">CASIO</p>
      <div id="productBC">
        <div id="casioContent">
          <div class="col30">
            <img src=".//assets/img/productImg/118_AEQ-110W-3AVDF-699x699.png" alt="" width="250px" alt="">
          </div>
          <p style="text-align: justify;" class="col70 smalltitlehome">Đồng hồ Casio là một trong những thương hiệu đồng hồ nổi tiếng và được yêu thích trên toàn
            thế giới. Với thiết kế đơn giản, thời trang và đa dạng về chức năng, đồng hồ Casio đã trở thành một lựa chọn
            phổ biến cho các tín đồ thời trang cũng như những người đam mê công nghệ. Không chỉ đơn thuần là một chiếc
            đồng hồ báo giờ, đồng hồ Casio còn tích hợp nhiều tính năng hữu ích như đồng hồ định vị GPS, đồng hồ thông
            minh, đồng hồ chống nước, đồng hồ đo nhịp tim và nhiều tính năng khác. Với chất lượng đáng tin cậy và giá cả
            hợp lý, đồng hồ Casio là một lựa chọn tuyệt vời cho bất kỳ ai đang tìm kiếm một chiếc đồng hồ đa năng và
            thời trang.</p>
        </div>
        <img src=".//assets/img/hoangImg/imgs/banerCasioBaby.png" alt="">
        <img src=".//assets/img/hoangImg/imgs/banerCasioGsock.png" alt="">
        <!-- <div id="pdSPBC1"
          style="display:flex ;flex-direction: column;background-color: rgba(103, 80, 164, 0.7);padding: 14px;border-radius: 8px;">
          <img src=".//assets/img/productImg/SRPG41K1.png" alt="" width="250px">
          <p style="color:#fff ;text-align: left;margin-top: 8px;" class="smalltitlehome">Iphone 14 ProMax</p>
          <div style="display:inline-flex;justify-content: flex-end;position: relative;">
            <p style="color:#fff ;text-align: left;position: absolute;left:0 ;" class="smalltitlehome">Giá bán: 18.000.000đ</p>
            <input class="minititlehome" type="button" style="width:75px;text-align: center;" value="Mua ngay">
          </div>
        </div>
        <div id="pdSPBC2"
          style="display:flex ;flex-direction: column;background-color: rgba(103, 80, 164, 0.7);padding: 14px;border-radius: 8px;">
          <img src=".//assets/img/productImg/SRPG41K1.png" alt="" width="250px">
          <p style="color:#fff ;text-align: left;margin-top: 8px;" class="smalltitlehome">Iphone 14 ProMax</p>
          <div style="display:inline-flex;justify-content: flex-end;position: relative;">
            <p style="color:#fff ;text-align: left;position: absolute;left:0 ;" class="smalltitlehome">Giá bán: 18.000.000đ</p>
            <input class="minititlehome" type="button" style="width:75px;text-align: center;" value="Mua ngay">
          </div>
        </div>
        <div id="pdSPBC3"
          style="display:flex ;flex-direction: column;background-color: rgba(103, 80, 164, 0.7);padding: 14px;border-radius: 8px;">
          <img src=".//assets/img/productImg/SRPG41K1.png" alt="" width="250px">
          <p style="color:#fff ;text-align: left;margin-top: 8px;" class="smalltitlehome">Iphone 14 ProMax</p>
          <div style="display:inline-flex;justify-content: flex-end;position: relative;">
            <p style="color:#fff ;text-align: left;position: absolute;left:0 ;" class="smalltitlehome">Giá bán: 18.000.000đ</p>
            <input class="minititlehome" type="button" style="width:75px;text-align: center;" value="Mua ngay">
          </div>
        </div>
        <div id="pdSPBC4"
          style="display:flex ;flex-direction: column;background-color: rgba(103, 80, 164, 0.7);padding: 14px;border-radius: 8px;">
          <img src=".//assets/img/productImg/SRPG41K1.png" alt="" width="250px">
          <p style="color:#fff ;text-align: left;margin-top: 8px;" class="smalltitlehome">Iphone 14 ProMax</p>
          <div style="display:inline-flex;justify-content: flex-end;position: relative;">
            <p style="color:#fff ;text-align: left;position: absolute;left:0 ;" class="smalltitlehome">Giá bán: 18.000.000đ</p>
            <input class="minititlehome" type="button" style="width:75px;text-align: center;" value="Mua ngay">
          </div>
        </div>
        <div id="pdSPBC5"
          style="display:flex ;flex-direction: column;background-color: rgba(103, 80, 164, 0.7);padding: 14px;border-radius: 8px;">
          <img src=".//assets/img/productImg/SRPG41K1.png" alt="" width="250px">
          <p style="color:#fff ;text-align: left;margin-top: 8px;" class="smalltitlehome">Iphone 14 ProMax</p>
          <div style="display:inline-flex;justify-content: flex-end;position: relative;">
            <p style="color:#fff ;text-align: left;position: absolute;left:0 ;" class="smalltitlehome">Giá bán: 18.000.000đ</p>
            <input class="minititlehome" type="button" style="width:75px;text-align: center;" value="Mua ngay">
          </div>
        </div>
        <div id="pdSPBC6"
          style="display:flex ;flex-direction: column;background-color: rgba(103, 80, 164, 0.7);padding: 14px;border-radius: 8px;">
          <img src=".//assets/img/productImg/SRPG41K1.png" alt="" width="250px">
          <p style="color:#fff ;text-align: left;margin-top: 8px;" class="smalltitlehome">Iphone 14 ProMax</p>
          <div style="display:inline-flex;justify-content: flex-end;position: relative;">
            <p style="color:#fff ;text-align: left;position: absolute;left:0 ;" class="smalltitlehome">Giá bán: 18.000.000đ</p>
            <input class="minititlehome" type="button" style="width:75px;text-align: center;" value="Mua ngay">
          </div>
        </div>
        <div id="pdSPBC7"
          style="display:flex ;flex-direction: column;background-color: rgba(103, 80, 164, 0.7);padding: 14px;border-radius: 8px;">
          <img src=".//assets/img/productImg/SRPG41K1.png" alt="" width="250px">
          <p style="color:#fff ;text-align: left;margin-top: 8px;" class="smalltitlehome">Iphone 14 ProMax</p>
          <div style="display:inline-flex;justify-content: flex-end;position: relative;">
            <p style="color:#fff ;text-align: left;position: absolute;left:0 ;" class="smalltitlehome">Giá bán: 18.000.000đ</p>
            <input class="minititlehome" type="button" style="width:75px;text-align: center;" value="Mua ngay">
          </div>
        </div>
        <div id="pdSPBC8"
          style="display:flex ;flex-direction: column;background-color: rgba(103, 80, 164, 0.7);padding: 14px;border-radius: 8px;">
          <img src=".//assets/img/productImg/SRPG41K1.png" alt="" width="250px">
          <p style="color:#fff ;text-align: left;margin-top: 8px;" class="smalltitlehome">Iphone 14 ProMax</p>
          <div style="display:inline-flex;justify-content: flex-end;position: relative;">
            <p style="color:#fff ;text-align: left;position: absolute;left:0 ;" class="smalltitlehome">Giá bán: 18.000.000đ</p>
            <input class="minititlehome" type="button" style="width:75px;text-align: center;" value="Mua ngay">
          </div>
        </div> -->
      </div>
    </div>


  </div>





  <!--Start: Footer-->
  <div id="my-footer">
    <?php
    include("footer.php");
    ?>
  </div>
  <!-- <script src=".//assets/js/footer.js"></script>
  <script lang="javascript">
    const myFooter = document.querySelector("#my-footer");
    myFooter.appendChild(createFooter());
  </script> -->
  <!--End: Footer-->
  <!---->

</body>

</html>