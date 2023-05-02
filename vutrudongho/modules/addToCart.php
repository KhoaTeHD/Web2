<?php
include("connectDatabase.php");
include("updateQuantyInCart.php");

if(isset($_POST['addToCart'])){
    // tài khoản Thiều Việt Hoàng
    $_SESSION['current_userID'] = "US000001";

    $userID =  $_POST['UserID'];

    $productID = $_POST['ProductID'];

    //echo $_SESSION['current_userID'];

    $conn = connectDatabase();

    if($conn){
        $cart = mysqli_query($conn,"select * from cart where UserID = '$userID'");
    }

    if(isset($_SESSION)){

        while($item = mysqli_fetch_array($cart)){
            if($item['ProductID'] == $_POST['ProductID']){
                $result = updateQuantyInCart($item['UserID'], $item['ProductID'], ((int) $item['Quantity']) +1 );
                if( $result === true ){
                    echo $_SESSION['current_userID'];

                    $success_msg[] = "Đã thêm sản phẩm vào giỏ hàng";
                }
                else if( $result === false){
                    $error_msg[] = "Đã có lỗi xảy ra! vui lòng thử lại sau";
                }
                else{
                    $warning_msg[] = $result;
                }
            }
        }
        if(mysqli_query($conn,"Insert into cart (`UserID`, `ProductID`, `Quantity`) VALUES ('$userID', '$productID', '1')")){
            
            $success_msg[] = "Đã thêm sản phẩm vào giỏ hàng";
        }
    }
    closeDatabase($conn);
}

?>