function createHeader() {
    const header = document.createElement("header");
    header.innerHTML = `
    <div id="logo-header"></div>
    <div id="menu-header">
        <img class="line-header" src=".//assets/img/Line.png" style="order: 0;" alt="">
        <p class="child-menu-header" style="width: 88px;order: 1;"><a style="color: white; text-decoration: none;" href=".//index.html">Trang chủ</a></p>
        <img class="line-header" src=".//assets/img/Line.png" style="order: 2;" alt="">
        <p class="child-menu-header" style="width: 89px;order: 3;">Sản phẩm</p>
        <img class="line-header" src=".//assets/img/Line.png" style="order: 4;" alt="">
        <p class="child-menu-header" style="width: 113px;order: 5;">Về chúng tôi</p>
        <img class="line-header" src=".//assets/img/Line.png" style="order: 6;" alt="">
        <p class="child-menu-header" style="width: 66px;order: 7;">Liên hệ</p>
    </div>
    <div id="avt-and-icons">
        <img class="icon-header" src=".//assets/img/search.png" style="order: 0;" alt="">
        <img class="line-header" src=".//assets/img/Line.png" style="order: 1;" alt="">
        <img class="icon-header" src=".//assets/img/help.png" style="order: 2;" alt="">
        <img class="line-header" src=".//assets/img/Line.png" style="order: 3;" alt="">
        <img class="icon-header" src=".//assets/img/add_shopping_cart.png" style="order: 4;" alt="">
        <img class="line-header" src=".//assets/img/Line.png" style="order: 5;" alt="">
        <p id="login-signup" style="order: 6;"> <a href=".//login.html">Đăng nhập</a></p>
    </div>
        `;
    return header;
}
//<p id="login-signup" style="order: 6;"> <a href=".//login.html">Đăng nhập</a></p>
//<img id="123456" src=".//assets/img/Samsung.jpg" width="34" height="34" style="border-radius:25px;order: 6;" alt="">
