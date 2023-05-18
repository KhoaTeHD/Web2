<?php
// Kết nối cơ sở dữ liệu
include './connectdb.php';

// Kiểm tra kết nối
if (!$con) {
    die('Kết nối không thành công: ' . mysqli_connect_error());
}

// Lấy tham số id từ request GET
$id = $_GET['OrderID'];
$status_id = $_GET['OrderStatusID'];


// Truy vấn dữ liệu từ cơ sở dữ liệu với id tương ứng
$sql = "update `order` set OrderStatus = '$status_id' where OrderID = '$id';";
$result = mysqli_query($con, $sql);

if($result) {
    $response = array(
        'status' => 'success',
        'message' => "Cập nhật trạng thái đơn hàng '$id' thành công!"
    );
} else {
    $response = array(
        'status' => 'error',
        'message' => $e->getMessage()
    );
}

// Trả về dữ liệu dưới dạng JSON
echo json_encode($response);

// Đóng kết nối
mysqli_close($con);
?>