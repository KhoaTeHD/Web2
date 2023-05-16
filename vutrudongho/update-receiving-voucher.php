<?php
try {
    // Kết nối đến cơ sở dữ liệu
    $pdo = new PDO('mysql:host=localhost;dbname=vutrudongho', 'root', '');

    // Lấy tham số id từ request GET
    $reId = $_POST['reId'];
    $supplierId = $_POST['supplierId'];
    $date = $_POST['date'];
    $total = $_POST['total'];
    $receivingDetailString = $_POST['details'];
    
    // Bắt đầu transaction
    $pdo->beginTransaction();

    //Cap nhat ton kho
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    // Cap nhat lai ton kho
    $stmt = $pdo->prepare("select ProductID, Quantity, ReceivingUnitPrice from `receivingdetail` where InID = ?");
    $stmt->execute([$reId]);
    $result = $stmt->fetchAll();
    foreach($result as $row) {
        //Lay so luong hien tai cua san pham
        $stmt = $pdo->prepare('select Quantity from `product_quantity` where ProductID = ? and Date <= NOW() order by Date desc limit 1;');
        $stmt->execute([$row['ProductID']]);
        $current_quantity = $stmt->fetchColumn();

        //Tinh so luong cap nhat
        $update_quantity = $current_quantity - $row['Quantity'];

        $now = date('Y-m-d H:i:s');
        $stmt = $pdo->prepare('insert into `product_quantity` (`ProductID`, `Date`, `Quantity`) values (?, ?, ?);');
        $stmt->execute([$row['ProductID'], $now, $update_quantity]);
    }
    // Xoa chi tiet phieu nhap
    $stmt = $pdo->prepare("delete from `receivingdetail` where InID = ?");
    $stmt->execute([$reId]);
    
    sleep(1);
    // Update phiếu nhập
    $stmt = $pdo->prepare('update `inventoryreceivingvoucher` set SupplierID = ?, Date = ?, Total = ? where InID = ?;');
    $stmt->execute([$supplierId, $date, $total, $reId]);
    
    //Thêm chi tiết phiếu nhập va cap nhat so luong ton kho
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $details = explode('#', $receivingDetailString);
    for($i = 0; $i < count($details); $i++) {
        $detail = explode('@', $details[$i]);
        $stmt = $pdo->prepare('insert into `receivingdetail` (`InID`, `ProductID`, `Quantity`, `ReceivingUnitPrice`) values (?, ?, ?, ?);');
        $stmt->execute([$reId, $detail[0], $detail[1], $detail[2]]);


        //Lay so luong hien tai cua san pham
        $stmt = $pdo->prepare('select Quantity from `product_quantity` where ProductID = ? and Date <= NOW() order by Date desc limit 1;');
        $stmt->execute([$detail[0]]);
        $current_quantity =  $stmt->fetchColumn();

        //Tinh so luong cap nhat
        $update_quantity = $current_quantity + $detail[1];

        //Cap nhat ton kho
        $now = date('Y-m-d H:i:s');
        $stmt = $pdo->prepare('insert into `product_quantity` (`ProductID`, `Date`, `Quantity`) values (?, ?, ?);');
        $stmt->execute([$detail[0], $now, $update_quantity]);

        //Kiem tra xem neu canDel cua sp dang la 1 thi set lai la 0
        $stmt = $pdo->prepare("update `product` set `CanDel` = 0 where ProductID = ? and canDel = 1;");
        $stmt->execute([$detail[0]]);
    }
    
    // Lưu các thay đổi trong transaction
    $pdo->commit();

    $response = array(
        'status' => 'success',
        'message' => "Sửa phiếu nhập có mã '$reId' thành công!"
    );
    
} catch(PDOException $e) {
    // Nếu có lỗi, hoàn tác tất cả các thay đổi trong transaction
    $pdo->rollback();

    $response = array(
        'status' => 'error',
        'message' => $e->getMessage()
    );

} finally {
    // Đóng kết nối
    $pdo = null;
    echo json_encode($response);
}

?>