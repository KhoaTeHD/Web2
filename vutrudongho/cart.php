<?php
    include 'modules/connectDatabase.php';
    include 'modules/get_product_by_id.php';
    session_start();
    // TEST
    $_SESSION['current_userID'] = "US000001";

    if($_SESSION['current_userID']){
        
        $userID = $_SESSION['current_userID'];
    
        if($conn = connectDatabase()){
            $cart = mysqli_query($conn,"select * from cart where UserID='$userID' ");
        }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/cart.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Document</title>
</head>
<style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 600,
  'GRAD' 0,
  'opsz' 48;
}
</style>
<body>
    <div class="cart">
        <div class="cart_body">
            <div class="cart_header">
                <span class="material-symbols-outlined">shopping_bag</span>
                <div>Giỏ hàng</div>
            </div>
            <div class="cart_title">
                <div class="cart_title_stt">STT</div>
                <div class="cart_title_name">Sản phẩm</div>
                <div class="cart_title_Category">Phân loại</div>
                <div class="cart_title_unitprice">Đơn giá</div>
                <div class="cart_title_quantity">Số lượng</div>
                <div class="cart_title_total">Thành tiền</div>
                <div class="cart_title_bin"></div>
            </div>
            <div class="cart_detail">
                <?php
                    $stt = 0;
                    while($item = mysqli_fetch_array($cart)){ 
                        $stt++;
                        $product = get_product_by_id($item["ProductID"]);
                ?>
                        <div class="cart_item">
                            <div class="cart_item_stt"><?php echo $stt ?></div>
                            <div class="cart_item_name">
                                <img src="assets/Img/productImg/<?php echo $product["ProductImg"] ?>" alt="">
                                <p><?php echo $product["ProductName"] ?></p>
                            </div>
                            <div class="cart_item_category"><?php echo $product["Model"] ?>, <?php echo $product["Color"] ?></div>
                            <div class="cart_item_unitprice"><?php echo number_format($product["PriceToSell"]) ?> đ</div>
                            <div class="cart_item_quantity">
                                <span class="minus_btn material-symbols-outlined" data-id="<?php echo $item["ProductID"] ?>" >indeterminate_check_box</span>
                                <p id="<?php echo $item["ProductID"] ?>"><?php echo $item["Quantity"] ?><p></p>
                                <span class="add_btn material-symbols-outlined" data-id="<?php echo $item["ProductID"] ?>" >add_box</span>
                            </div>
                            <div class="cart_item_total"><?php echo number_format(   $product["PriceToSell"]*$item["Quantity"]   ) ?> đ</div>
                            <span class="material-symbols-outlined red_bin">delete</span>
                        </div>

                <?php
                    }
                ?>
            <div class="cart_totalprice">
                <p>Tổng cộng:</p>
                <p>100.000.000 đ</p>
            </div>
            <div class="button">
                <button class="confirm_button">Mua Ngay</button>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        var add_btn = document.getElementsByClassName("add_btn");
        for (var i =0; i< add_btn.length; i++){
            add_btn[i].addEventListener("click",function(event){
                var target = event.target;
                var id = target.getAttribute("data-id");

                var quantity =document.getElementById(id);

                var sumQuanty = parseInt(quantity.innerText) +1;

                var xml = new XMLHttpRequest();
                xml.onreadystatechange = function (){
                    if(this.readyState == 4 && this.status == 200){
                        var s = String(this.responseText);

                        if(s == 1){
                            quantity.innerText = sumQuanty;
                        }
                        else if ( s !=0) {
                            swal(this.responseText.toString(), "", "warning");
                        }
                    }
                }
                xml.open("GET","modules/updateCart.php?ProductID="+id+"&Quantity="+sumQuanty,true);
                xml.send();
            })
        }

        var minus_btn = document.getElementsByClassName("minus_btn");
        for (var i =0; i< add_btn.length; i++){
            minus_btn[i].addEventListener("click",function(event){
                var target = event.target;
                var id = target.getAttribute("data-id");

                var quantity =document.getElementById(id);

                var sumQuanty = parseInt(quantity.innerText) -1;
                if(sumQuanty != 0){
                    var xml = new XMLHttpRequest();
                    xml.onreadystatechange = function (){
                        if(this.readyState == 4 && this.status == 200){
                            var s = String(this.responseText);
                            
                            if(s == 1){
                                quantity.innerText = sumQuanty;
                            }
                        }
                    }
                    xml.open("GET","modules/updateCart.php?ProductID="+id+"&Quantity="+sumQuanty,true);
                    xml.send();
                }
            })
        }
    </script>
    
</body>
</html>

<?php

    }
?>