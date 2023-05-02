<?php
include("connectDatabase.php");
include("updateQuantyInCart.php");


if(isset($_GET['ProductID'])){

    // tài khoản Thiều Việt Hoàng
    $_SESSION['current_userID'] = "US000001";

    $userID =  $_SESSION['current_userID'];

    $productID = $_GET['ProductID'];

    //echo $_SESSION['current_userID'];

    $conn = connectDatabase();

    if($conn){
        $cart = mysqli_query($conn,"select * from cart where UserID = '$userID'");
    }

    if(isset($_SESSION)){

        while($item = mysqli_fetch_array($cart)){
            if($item['ProductID'] == $_GET['ProductID']){
                $result = updateQuantyInCart($item['UserID'], $item['ProductID'], ((int) $item['Quantity']) +1 );
                if( $result === true ){
                    $success_msg[] = "Đã thêm sản phẩm vào giỏ hàng";
                    echo true;
                }
                else if( $result === false){
                    $error_msg[] = "Đã có lỗi xảy ra! vui lòng thử lại sau";
                    echo false;
                }
                else{
                    echo $result;
                }
            }
        }
        if(mysqli_query($conn,"Insert into cart (`UserID`, `ProductID`, `Quantity`) VALUES ('$userID', '$productID', '1')")){
            echo true;
            $success_msg[] = "Đã thêm sản phẩm vào giỏ hàng";
        }
    }
    closeDatabase($conn);
}

?>