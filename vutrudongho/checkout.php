<?php
    include 'modules/connectDatabase.php';
    include 'modules/get_product_by_id.php';
    include 'modules/cartFunction.php';
    date_default_timezone_set('Etc/GMT+7');

    if(isset($_POST['UserID'])){
        $conn = connectDatabase();
        
        $result = mysqli_query($conn,"SELECT * FROM `order`");
        $countOrder = mysqli_num_rows($result);
        $countOrderString = sprintf('%08d',$countOrder+1);

        $orderID = "OD" . $countOrderString;

        $userID = $_POST['UserID'];
        $orderDate = date("Y-m-d h:i:s");
        //echo $orderDate;
        $shippingFee = $_POST['ShippingFee'];
        $orderDiscount = $_POST['OrderDiscount'];
        $orderTotal = $_POST['Total'];
        $address = $_POST['Address'];
        $paymentID = $_POST['PaymentID'];
        $voucherID = $_POST['VoucherID'];
        echo $voucherID;

        $cart = mysqli_query($conn,"SELECT * FROM `cart` where UserID ='$userID'");

        if($voucherID === "NULL"){
            $sqlOrder = "INSERT INTO `order` (`OrderID`, `UserID`, `OderDate`, `ShippingFee`, `OrderDiscount`, `OrderTotal`, `Address`, `PaymentID`, `VoucherID`, `OrderStatus`) VALUES ('$orderID', '$userID', '$orderDate', '$shippingFee', '$orderDiscount', '$orderTotal', '$address', '$paymentID', $voucherID, 'S01')";
        }
        else{
            $sqlOrder = "INSERT INTO `order` (`OrderID`, `UserID`, `OderDate`, `ShippingFee`, `OrderDiscount`, `OrderTotal`, `Address`, `PaymentID`, `VoucherID`, `OrderStatus`) VALUES ('$orderID', '$userID', '$orderDate', '$shippingFee', '$orderDiscount', '$orderTotal', '$address', '$paymentID', '$voucherID', 'S01')";
        }
    
        try {
            $conn->begin_transaction();

            $conn->query($sqlOrder);

            while($item = mysqli_fetch_array($cart)){
                $product = get_product_by_id($item['ProductID']);

                if($product['CanDel'] == 1){
                    $conn->query("Update product set CanDel= 0 where ProductID = '". $product['ProductID'] . "' ");
                }

                $Quantity = get_quanty_product_byID($item['ProductID']);
                $inStock = (int) $Quantity['Quantity'];

                
                $lastInStock = $inStock - (int) $item['Quantity'];
                
                if($lastInStock < 0){
                    $conn->rollback();
                    header("Location: cart.php");
                }
                //else{
                    
                $conn->query("INSERT INTO `product_quantity` (`ProductID`, `Date`, `Quantity`) VALUES ('". $product['ProductID'] ."', '$orderDate', '$lastInStock')");
                //}

                $product_Price = $product["PriceToSell"] - (int) $product["PriceToSell"]* (int) $product['Discount']/100;
                
                $conn->query("INSERT INTO `order_line` (`OrderID`, `ProductID`, `Quantity`, `UnitPrice`) VALUES ('$orderID', '". $product['ProductID'] ."', '". $item['Quantity'] ."', '$product_Price')");
                $conn->commit();
            }   
        } catch (Throwable $th) {
            $conn->rollback();
            header("Location: cart.php");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/checkout.css">
    <link rel="stylesheet" href="assets/CSS/header.css">
    <link rel="stylesheet" href="assets/CSS/footer.css">
    <title>Document</title>
</head>
<body>
    <div id="bar-header">
        <?php
        include("components/header.php");
        ?>
    </div>
    <div class="main_container">
        <div class="placement_body">
            <img src="assets/Img/icons/icons8-checkmark-200.png" alt="">
            <h2>Đặt hàng thành công!</h2>
            <p>Cảm ơn bạn đã tin tưởng vutrudongho.vn</p>
            <button>OK</button>
        </div>
    </div>
    <div id="my-footer">
        <?php
        include("components/footer.php");
        ?>
    </div>
</body>
</html>

<?php
    }
    else {
        header("Location: index.php");
    }
?>