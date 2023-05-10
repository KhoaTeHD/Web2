<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/payment.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Document</title>
</head>
<style>
    .material-symbols-outlined {
      font-variation-settings:
      'FILL' 0,
      'wght' 500,
      'GRAD' 0,
      'opsz' 30
    }
</style>
<body>
    <div class="payment_container">
        <div class="payment_content">
            <div class="payment_content_header">
                <span class="material-symbols-outlined">account_balance_wallet</span>
                Thông Tin Thanh Toán
            </div>
            <div class="delivery_method">
                Phương thức vận chuyển
            </div>
            <div class="address_label">
                <span class="material-symbols-outlined">home_pin</span>
                Địa chỉ nhận hàng</div>
            <div class="user_address">Võ Quang Đăng Khoa - 0702788734
                <span>273 An Dương Vương, Phường 3, Quận 5, TP. HCM</span>
                <a href="">Thay đổi</a>
            </div>
            <div class="delivery_cards">
                <div class="delivery_card card_active">
                    <div class="delivery_title header_active">
                        Giao hàng nhanh
                    </div>
                    <div class="delivery_price">15.000 đ</div>
                    <div class="delivery_time">
                        Nhận hàng vào 10-11 thg 5
                    </div>
                    <div class="icon_clicked">
                        <span class="material-symbols-outlined">check_small</span>
                    </div>
                </div>
                <div class="delivery_card">
                    <div class="delivery_title">
                        Giao hàng nhanh
                    </div>
                    <div class="delivery_price">15.000 đ</div>
                    <div class="delivery_time">
                        Nhận hàng vào 10-11 thg 5
                    </div>
                    
                </div>
            </div>
            <div class="payment_method">
                Phương thức thanh toán
            </div>
            <div class="payment_cards">
                <div class="payment_cards_row">
                    <div class="payment_card">
                        <div class="payment_icon">
                            <span class="material-symbols-outlined">credit_card</span>
                        </div>
                        <div class="payment_name">Thẻ tín dụng/Ghi nợ</div>
                    </div>
                    <div class="payment_card card_active">
                        <div class="payment_icon header_active">
                            <span class="material-symbols-outlined">payments</span>
                        </div>
                        <div class="payment_name">Thanh toán khi nhận hàng</div>
                        <div class="icon_clicked">
                            <span class="material-symbols-outlined">check_small</span>
                        </div>
                    </div>
                    <div class="payment_card">
                        <div class="payment_icon">
                            <img src="assets/Img/icons/momo.png" alt="">
                        </div>
                        <div class="payment_name">Ví điện tử MoMo</div>
                    </div>
                </div>
                <div class="payment_cards_row">
                    <div class="payment_card">
                        <div class="payment_icon">
                            <img src="assets/Img/icons/zalopay.png" alt="">
                        </div>
                        <div class="payment_name">Ví điện tử ZaloPay</div>
                    </div>
                    <div class="payment_card">
                        <div class="payment_icon">
                            <span class="material-symbols-outlined">account_balance</span>
                        </div>
                        <div class="payment_name">Internet Banking</div>
                    </div>
                    <div class="payment_card">
                        <div class="payment_icon">
                            <span class="material-symbols-outlined">qr_code_scanner</span>
                        </div>
                        <div class="payment_name">VNPAY-QR</div>
                    </div>
                </div>
                
            </div>
            <div class="voucher">
                <div class="voucher_name">
                    <div class="voucher_name_container">
                        <label class="voucher_label">Mừng lễ 30/4 </label>
                        <span class="material-symbols-outlined">close</span>
                    </div>
                    <div class="voucher_discount">
                        -220.000 đ
                    </div>
                </div>

                <div class="voucher_submit">
                    <input type="text" class="voucher_input" placeholder="Nhập mã giảm giá">
                    <button class="submit_button">Áp dụng</button>
                </div>
            </div>
            <div class="button">
                <button class="payment_button">Thanh Toán</button>
            </div>
        </div>
        <div class="product_list_container">
            <div class="product_list_header">
                Danh sách sản phẩm
            </div>
            <div class="product_list">
                <div class="product_item">
                    <div class="product_item_img"><img src="assets/Img/productImg/0001670_white_550.png" alt=""></div>
                    <div class="product_detail">
                        <div class="product_item_name">
                            CASIO WORLD TIME AE-1200WHD-1AVDF – NAM – QUARTZ (PIN) – MẶT SỐ 45 MM, BỘ BẤM GIỜ, CHỐNG NƯỚC 10 ATM
                        </div>
                        <div class="product_item_price_category">
                            <div class="product_item_category">Máy cơ, vàng</div>
                            <div class="product_item_price">30.000.000 đ x 2</div>
                        </div>
                    </div>
                </div>
                <div class="product_item">
                    <div class="product_item_img"><img src="assets/Img/productImg/0001670_white_550.png" alt=""></div>
                    <div class="product_detail">
                        <div class="product_item_name">
                            CASIO WORLD TIME AE-1200WHD-1AVDF – NAM – QUARTZ (PIN) – MẶT SỐ 45 MM, BỘ BẤM GIỜ, CHỐNG NƯỚC 10 ATM
                        </div>
                        <div class="product_item_price_category">
                            <div class="product_item_category">Máy cơ, vàng</div>
                            <div class="product_item_price">30.000.000 đ x 2</div>
                        </div>
                    </div>
                </div>
                <div class="product_item">
                    <div class="product_item_img"><img src="assets/Img/productImg/0001670_white_550.png" alt=""></div>
                    <div class="product_detail">
                        <div class="product_item_name">
                            CASIO WORLD TIME AE-1200WHD-1AVDF – NAM – QUARTZ (PIN) – MẶT SỐ 45 MM, BỘ BẤM GIỜ, CHỐNG NƯỚC 10 ATM
                        </div>
                        <div class="product_item_price_category">
                            <div class="product_item_category">Máy cơ, vàng</div>
                            <div class="product_item_price">30.000.000 đ x 2</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="payment_detail">
                <div class="payment_detail_pricetotal">
                    <span>Tổng tiền hàng:</span>
                    <p> 60.000.000 đ</p>
                </div>
                <div class="payment_detail_pricetotal">
                    <span>Phí vận chuyển:</span>
                    <p> 15.000 đ</p>
                </div>
                <div class="payment_detail_pricetotal">
                    <span>Tổng khuyến mãi:</span>
                    <p> -200.000 đ</p>
                </div>
                <div class="payment_detail_total">
                    <span class="payment_detail_total_label">Tổng thanh toán:</span>
                    <p class="payment_detail_total_label_price"> 59.885.000 đ</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>