function createHeader() {
    const header = document.createElement("header");
    header.innerHTML = `
    <div id="logo-header"></div>
    <div id="menu-header">
        <p class="child-menu-header" style="width: 88px;order: 1;">Đăng nhập</p>

    </div>
    <div id="avt-and-icons">
        <p id="login-signup" style="order: 6;"> <a href="#">Bạn cần hỗ trợ?</a></p>
    </div>
        `;
    return header;
}