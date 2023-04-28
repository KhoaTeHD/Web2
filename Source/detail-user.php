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
    <link rel="stylesheet" href=".//assets/css/footer.css">
    <link rel="stylesheet" href=".//assets/css/header.css">
</head>
<body>
     <!--Start: Header-->
     <div id="bar-header">
    <?php
      include("bar.php");
    ?>
  </div>
  <!--End: Header-->
<div style="height: 200px;width: 100%;">

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