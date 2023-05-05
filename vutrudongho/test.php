<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

<?php
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
$limit = 2;

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

  echo $userID;
}

// hiển thị các liên kết phân trang
for ($page = 1; $page <= $total_pages; $page++) {
    echo '<a href="?page=' . $page . '">' . $page . '</a> ';
  }
  ?>

</body>

</html>