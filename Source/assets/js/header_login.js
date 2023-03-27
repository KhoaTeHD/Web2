function createHeader() {
    const header = document.createElement("header");
    header.innerHTML = `
    <div id="logo-header"></div>
    <div id="menu-header">
        <p class="child-menu-header" style="order: 1;">VŨ TRỤ DI ĐỘNG</p>

    </div>
    <div id="avt-and-icons">
        <p id="login-signup" style="order: 6;"> <a href="#">Bạn cần hỗ trợ?</a></p>
    </div>
        `;
    return header;
}