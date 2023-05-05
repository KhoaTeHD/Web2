<?php
require_once('lib_session.php');
?>
<?php
$userID = $_SESSION['current_userID'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vutrudongho";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// số lượng mục hiển thị trên mỗi trang
$limit = 3;

// truy vấn cơ sở dữ liệu để lấy số lượng tổng mục
$query = sprintf("SELECT COUNT(*)FROM user;");
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$total_items = $row[0];

// tính toán tổng số trang
$total_pages = ceil($total_items / $limit);

// xác định trang hiện tại
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// tính toán vị trí bắt đầu và số lượng mục cần lấy
$start = ($current_page - 1) * $limit;

// truy vấn cơ sở dữ liệu để lấy dữ liệu
$query = sprintf("SELECT * FROM user LIMIT $start, $limit;");
$result = mysqli_query($conn, $query);

// hiển thị dữ liệu
while ($row = mysqli_fetch_array($result)) {
  $userID = $row['UserID'];
  $fullName = $row['FullName'];
  $numberPhone = $row['NumberPhone'];
  $email = $row['Email'];
  $passwordUser = $row['Password'];
  $houseRoadAddress = $row['HouseRoadAddress'];
  $ward = $row['Ward'];
  $district = $row['District'];
  $province = $row['Province'];
  $status = $row['Status'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href=".//assets/css/my_order.css">
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
    include(".//components/header.php");
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
        <ul id="primary3">
          <li style="margin-bottom: 16px;"><a href="user_information.php">Thông tin tài khoản</a></li>
          <li><a href="my_order.php">Quản lý đơn hàng</a></li>
        </ul>

      </div>
      <div id="content-user">
        <p style="margin-bottom: 4px;margin-top: 4px;margin-left: 4px;">Đơn hàng đã mua</p>
        <div class="component_order"
          style="display: flex;flex-direction: column;width: 100%;height: 24%;align-items: center;background-color: #fff;margin-bottom: 8px;">
          <div class="header-component-order"
            style="display: inline-flex;padding: 8px 8px 8px 8px;align-items: left;width: 100%;">
            <p style="display:block;text-align: right;">Đã giao hàng</p>
          </div>
          <hr style="width: 100%;">
          <div class="main-component-order"
            style="display:flex;flex-direction: row;justify-content: space-between;align-items: center;width: 95%;margin-top: 4px;">
            <img src=".//assets/Img/productImg/0001670_white_550.png" alt="" width="75">
            <p style="width: 40%;">Seiko 5 Field Sports Style SRPG29K1 – Nam – Automatic (Tự Động) – Mặt Số 39.4mm,
              Chống Nước 10ATM, Bộ Máy In-House</p>
            <p>170000 VNĐ</p>
            <p>Số lượng: 1</p>
          </div>
        </div>

        <div class="component_order"
          style="display: flex;flex-direction: column;width: 100%;height: 24%;align-items: center;background-color: #fff;margin-bottom: 8px;">
          <div class="header-component-order"
            style="display: inline-flex;padding: 8px 8px 8px 8px;align-items: left;width: 100%;">
            <p style="display:block;text-align: right;">Đã giao hàng</p>
          </div>
          <hr style="width: 100%;">
          <div class="main-component-order"
            style="display:flex;flex-direction: row;justify-content: space-between;align-items: center;width: 95%;margin-top: 4px;">
            <img src=".//assets/Img/productImg/0001670_white_550.png" alt="" width="75">
            <p style="width: 40%;">Seiko 5 Field Sports Style SRPG29K1 – Nam – Automatic (Tự Động) – Mặt Số 39.4mm,
              Chống Nước 10ATM, Bộ Máy In-House</p>
            <p>170000 VNĐ</p>
            <p>Số lượng: 1</p>
          </div>
        </div>

        <div class="component_order"
          style="display: flex;flex-direction: column;width: 100%;height: 24%;align-items: center;background-color: #fff;">
          <div class="header-component-order"
            style="display: inline-flex;padding: 8px 8px 8px 8px;align-items: left;width: 100%;">
            <p style="display:block;text-align: right;">Đã giao hàng</p>
          </div>
          <hr style="width: 100%;">
          <div class="main-component-order"
            style="display:flex;flex-direction: row;justify-content: space-between;align-items: center;width: 95%;margin-top: 4px;">
            <img src=".//assets/Img/productImg/0001670_white_550.png" alt="" width="75">
            <p style="width: 40%;">Seiko 5 Field Sports Style SRPG29K1 – Nam – Automatic (Tự Động) – Mặt Số 39.4mm,
              Chống Nước 10ATM, Bộ Máy In-House</p>
            <p>170000 VNĐ</p>
            <p>Số lượng: 1</p>
          </div>
        </div>
        <div id="numberPhanTrang"
          style="width: 100%;display: flex;flex-direction:row;align-items: center;justify-content: center;margin-top: 8px;">
          <p style="padding: 4px;">
            <?php
            // hiển thị các liên kết phân trang
            for ($page = 1; $page <= $total_pages; $page++) {
              echo '<a class="number-ptrang-'.$page.'" onclick="changeColor()" style="text-decoration: none;padding: 4px 8px;background-color:#ccc;" href="?page=' . $page . '">' . $page . '</a> ';
            }
            ?>
          </p>
        </div>

      </div>
    </div>
  </div>
  <!--Start: Footer-->
  <div id="my-footer" style="position: absolute;">
    <?php
    include(".//components/footer.php");
    ?>
  </div>
  <!--End: Footer-->
  <script>
function changeColor() {
  var currentPage = parseInt(new URLSearchParams(window.location.search).get('page')); // Lấy trang hiện tại từ tham số truy vấn '?page'

  if (currentPage) {
    var currentElement = document.querySelector('.number-ptrang-' + currentPage); // Chọn phần tử tương ứng với trang hiện tại

    if (currentElement) {
      currentElement.style.backgroundColor = "orange"; // Thay đổi màu nền của phần tử thành màu cam
    }
  }
}

  </script>
</body>

</html>