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
    <div id="mainDonHang" style="height: 500px;"></div>
  <!--Start: Footer-->
  <div id="my-footer">
  <?php
    include("footer.php");
    ?>
  </div>
  <!--End: Footer-->
</body>
</html>