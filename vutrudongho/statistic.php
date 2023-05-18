<?php
include './sidebar.php';
include './container-header.php';
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    eventForSideBar(0);
    setValueHeader("Thống kê");
</script>
<link rel="stylesheet" href="./assets/CSS/statistic.css">

<div class="statistic">
    <div class="statistic__stock">
        <p class="statistic-stock__header">Truy Vấn Tồn Kho Sản Phẩm</p>
        <div>
            <div class="statistic-stock__search">
                <input type="text" class="statistic-stock-search__input" placeholder="Tên sản phẩm..">
                <div class="statistic-stock-search__close"><span class="material-symbols-outlined">close</span></div>
                <ul class="statistic-stock-search__ul">
                </ul>
                <script>
                    $(document).ready(function() {
                        $('.statistic-stock-search__input').on('input', function() {
                            // Lấy giá trị từ input
                            var inputValue = $(this).val();

                            // Nếu giá trị rỗng thì không gọi Ajax
                            if (inputValue.trim() === '') {
                                $('.statistic-stock-search__close').hide();
                                $('.statistic-stock-search__ul').hide();
                            } else {
                                $('.statistic-stock-search__close').show();
                                $('.statistic-stock-search__ul').show();
                                $.ajax({
                                    url: 'get-product-search-for-inventory.php',
                                    type: 'GET',
                                    dataType: 'json',
                                    data: {
                                        keyWord: inputValue
                                    },
                                    success: function(data) {
                                        // Hiển thị dữ liệu lấy được
                                        var html = '';
                                        $.each(data, function(index, item) {
                                            html += `<li class="statistic-stock-search-ul__item" onclick="setValueSearchForInput('${item.ProductID}', '${item.ProductImg}', '${item.ProductName}');">
                                                        <div class="statistic-stock-search-ul-item__img">
                                                            <img src="./assets/img/productImg/${item.ProductImg}" alt="ảnh đồng hồ">
                                                        </div>
                                                        <p class="statistic-stock-search-ul-item__info">${item.ProductName}</p>
                                                    </li>`;
                                        });
                                        $('.statistic-stock-search__ul').html(html);
                                    },
                                    error: function() {
                                        alert('Lỗi khi lấy dữ liệu');
                                    }
                                });
                            }
                        });

                        $('.statistic-stock-search__close').on('click', function() {
                            $('.statistic-stock-search__input').val('');
                            $('.statistic-stock-search__input').prop("disabled", false);
                            $('.statistic-stock-search__ul').hide();
                            $('.statistic-stock-search__close').hide();
                        });
                    });

                    var setValueSearchForInput = (ProductId, ProductImg, ProductName) => {
                        $('.statistic-stock-search__input').val(ProductName + "_" + ProductId + "_" + ProductImg);
                        $('.statistic-stock-search__ul').hide();
                        $('.statistic-stock-search__input').prop("disabled", true);
                    }
                </script>
            </div>

            <input type="date" class="statistic-stock__date">
            <script>
                var today = new Date();
                var year = today.getFullYear();
                var month = String(today.getMonth() + 1).padStart(2, '0');
                var day = String(today.getDate()).padStart(2, '0');
                var currentDate = year + '-' + month + '-' + day;
                document.querySelector('.statistic-stock__date').value = currentDate;
            </script>

            <button class="statistic-stock__btn" onclick="displayModalStatistic();"><span class="material-symbols-outlined">search</span></button>
        </div>
    </div>

    <div class="modal-statistic">
        <div class="modal-statistic__container">
            <div class="modal-statistic-container__close">
                <span class="material-symbols-outlined">close</span>
            </div>
            <div class="modal-statistic-container__content">
                <p class="modal-statistic-container-content__heading"></p>
                <div class="modal-statistic-container-content_img">
                    <img src="" alt="Ảnh đồng hồ">
                </div>
                <p class="modal-statistic-container-content__name"></p>
                <div style="margin-bottom: 12px;">
                    <label class="modal-statistic-container-content__date">Ngày</label>
                    <label class="modal-statistic-container-content__date-re"></label>
                </div>
                <div>
                    <label class="modal-statistic-container-content__quantity">Tồn kho</label>
                    <label class="modal-statistic-container-content__quantity-re"></label>
                </div>
            </div>
        </div>
    </div>

    <script>
        eventCloseModal('modal-statistic', 'modal-statistic__container', 'modal-statistic-container__close');
    </script>
</div>

<?php include './container-footer.php' ?>