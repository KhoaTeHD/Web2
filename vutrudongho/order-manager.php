<?php
include './sidebar.php';
include './container-header.php';
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    eventForSideBar(4);
    setValueHeader("Đơn Hàng");
</script>

<div class="order">
    <form class="order__search" method="GET" action="order-manager.php">
        <div class="order-search__date">
            <label for="">Ngày lọc</label>
            <input name="date-from" type="date" class="order-search__date-from">
            <span class="material-symbols-outlined">arrow_forward</span>
            <input name="date-to" type="date" class="order-search__date-to">
            <script>
                let today = new Date();
                let dd = String(today.getDate()).padStart(2, '0');
                let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                let yyyy = today.getFullYear();
                today = yyyy + '-' + mm + '-' + dd;
                let date_from = document.querySelector('.order-search__date-from');
                let date_to = document.querySelector('.order-search__date-to');
                date_from.value = today;
                date_to.value = today;
            </script>
        </div>

        <div class="order-search__address">
            <label for="">Tỉnh (Thành)</label>
            <select id="order-province" name="order-province">
            </select>
            
            <label for="" style="margin-right: 24px;">Quận (Huyện)</label>
            <select id="order-district" name="order-district">
                <option value="">-- Quận (Huyện) ---</option>
            </select>
            
            <label for="" style="margin-right: 24px;">Xã (Phường, Thị Trấn)</label>
            <select id="order-ward" name="order-ward">
                <option value="">-- Xã (Phường, Thị Trấn) ---</option>
            </select>
        </div>

        <script>
            //API address
            var callAPI = (api) => {
                return axios.get(api)
                    .then((response) => {
                        renderData(response.data, "order-province");
                    });
            }

            var callApiDistrict = (api) => {
                return axios.get(api)
                    .then((response) => {
                        renderData(response.data.districts, "order-district");
                    });
            }
            var callApiWard = (api) => {
                return axios.get(api)
                    .then((response) => {
                        renderData(response.data.wards, "order-ward");
                    });
            }

            var renderData = (array, select) => {
                let row = '<option disable value="">-- Chọn --</option>';
                array.forEach(element => {
                    row += `<option value='${element.code}/${element.name}'>${element.name}</option>`;
                });
                document.querySelector("#" + select).innerHTML = row;
            }

            var eventForAddressCombobox = () => {
                $("#order-province").on('input', function () {
                    if($("#order-province option:selected").val() != '') {
                        callApiDistrict(host + "p/" + $("#order-province").val().split('/')[0] + "?depth=2");
                    } else {
                        document.querySelector("#order-district").innerHTML = '<option disable value="">-- Chọn --</option>';
                        document.querySelector("#order-ward").innerHTML = '<option disable value="">-- Chọn --</option>';
                    }
                });
                
                $("#order-district").on('input', function () {
                    if($("#order-district option:selected").val() != '') {
                        callApiWard(host + "d/" + $("#order-district").val().split('/')[0] + "?depth=2");
                    } else {
                        document.querySelector("#order-ward").innerHTML = '<option disable value="">-- Chọn --</option>';
                    }
                });
            }

            callAPI('https://provinces.open-api.vn/api/?depth=1');
            eventForAddressCombobox();
        </script>

        <div class="order-search__status">
            <label for="">Trạng thái</label>

            <select name="order-status">
                <option value="">-- Tất cả --</option>
                <?php
                    include "./connectdb.php";
                    $result = mysqli_query($con, "select * from `orderstatus`");
                    while($row = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?= $row['StatusID'] ?>_<?= $row['StatusName'] ?>"><?=$row['StatusName']?></option>
                        <?php
                    }
                    mysqli_close($con);
                ?>
            </select>

            <button type="submit" name="submit" class="order-search__filter">Lọc</button>
        </div>
    </form>
    <table class="order__table">
        <thead>
            <th>Mã đơn</th>
            <th>Người dùng</th>
            <th>Ngày</th>
            <th>Địa điểm</th>
            <th>Hình thức</th>
            <th>Phí giao hàng</th>
            <th>Tổng cộng</th>
            <th>Mã giảm giá</th>
            <th>Giảm giá</th>
            <th>Thành tiền</th>
            <th>Chi tiết</th>
        </thead>
        <tbody>
            <!-- Load danh sach orderlen tu db -->
            <?php
                include './connectdb.php';
                //Khoi tao cac bien phan trang
                $sql = "select * from `order` as o, `payment` as p where o.PaymentID = p.PaymentID";
                $item_per_page = 8;
                $current_page = !empty($_GET['page']) ? $_GET['page']: 1;
                $offset = ($current_page - 1) * $item_per_page;
                $records = mysqli_query($con, "select * from `order`;");
                $num_page = ceil($records->num_rows/$item_per_page);

                $result = mysqli_query($con, "select * from `order` as o, `payment` as p where o.PaymentID = p.PaymentID  order by OrderID desc limit {$item_per_page} offset {$offset};");
                
                if($result->num_rows > 0) {
                    while($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr id="<?= $row['OrderID'] ?>">
                            <td><?= $row['OrderID'] ?></td>
                            <td><?= $row['UserID'] ?></td>
                            <td><?= $row['OderDate'] ?></td>
                            <td><?= $row['Address'] ?></td>
                            <td paymentid = "<?= $row['PaymentID'] ?>"><?= $row['PaymentName'] ?></td>
                            <td><?= $row['ShippingFee'] ?></td>
                            <td><?= $row['OrderTotal'] ?></td>
                            <td><?= $row['VoucherID'] ?></td>
                            <td><?= $row['OrderDiscount'] ?></td>
                            <td><?= $row['OrderTotal'] -  $row['OrderDiscount'] ?></td>
                            <td><span class="material-symbols-outlined">visibility</span></td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="11" style="padding: 16px;">Không có đơn hàng nào để hiển thị!</td>
                    </tr>
                <?php
                }
                mysqli_close($con);
            ?>
        </tbody>
    </table>

    <div class="paging">
        <?php
        if($current_page > 3) {
            ?>
                <a href="?page=1" class="paging__item paging__item--hover">First</a>
            <?php
        }
        for ($num = 1; $num <= $num_page; $num++) {
            if($num != $current_page) {
                if($num > $current_page - 3 && $num < $current_page + 3) {
                ?>
                    <a href="?page=<?= $num ?>" class="paging__item paging__item--hover"><?= $num ?></a>
                <?php
                }
            } else {
                ?>
                <a href="?page=<?= $num ?>" class="paging__item paging__item--active"><?= $num ?></a>
                <?php
            }
        }
        if($current_page < $num_page - 2) {
            ?>
                <a href="?page=<?= $num_page ?>" class="paging__item paging__item--hover">Last</a>
            <?php
        }
        ?>
    </div>

    <div class="modal-order">
        <div class="modal-order__container" autocomplete="off">
            <div class="modal-order-container__close">
                <span class="material-symbols-outlined">close</span>
            </div>
            <div class="modal-order-container__content">
                <p class="modal-order-container-content__heading">Chi tiết đơn hàng</p>

                <div class="modal-order-container-content__info">
                    <div class="modal-order-container-content-info__left">
                        <div>
                            <p class="modal-order-container-content-info__inid">Mã đơn hàng</p>
                            <input class="modal-order-container-content-info__inid-re" readonly style="background-color: #e0dfdf; outline: none;">
                        </div>
    
                        <div>
                            <p class="modal-order-container-content-info__inid">Người dùng</p>
                            <input class="modal-order-container-content-info__inid-re" readonly style="background-color: #e0dfdf; outline: none;">
                        </div>
    
                        <div>
                            <p class="modal-order-container-content-info__inid">Ngày đặt</p>
                            <input class="modal-order-container-content-info__inid-re" readonly style="background-color: #e0dfdf; outline: none;">
                        </div>
                    </div>

                    <div class="modal-order-container-content-info__right">
                        <div>
                            <p class="modal-order-container-content-info__inid">Hình thức</p>
                            <input class="modal-order-container-content-info__inid-re" readonly style="background-color: #e0dfdf; outline: none;">
                        </div>
    
                        <div>
                            <p class="modal-order-container-content-info__inid">Tình trạng</p>
                            <input class="modal-order-container-content-info__inid-re" readonly style="background-color: #e0dfdf; outline: none;">
                        </div>
    
                        <div>
                            <p class="modal-order-container-content-info__inid">Địa chỉ</p>
                            <input class="modal-order-container-content-info__inid-re" readonly style="background-color: #e0dfdf; outline: none;">
                        </div>
                    </div>
                </div>

                <div class="modal-order-container-content__table-wrapper">
                    <table class="modal-order-container-content__table">
                        <thead>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Tổng (VND)</th>
                        </thead>
    
                        <tbody>
                            <tr>
                                <td>Mã sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Đơn giá</td>
                                <td>Số lượng</td>
                                <td>Tổng (VND)</td>
                            </tr>

                            <tr>
                                <td>Mã sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Đơn giá</td>
                                <td>Số lượng</td>
                                <td>Tổng (VND)</td>
                            </tr>

                            <tr>
                                <td>Mã sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Đơn giá</td>
                                <td>Số lượng</td>
                                <td>Tổng (VND)</td>
                            </tr>

                            <tr>
                                <td>Mã sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Đơn giá</td>
                                <td>Số lượng</td>
                                <td>Tổng (VND)</td>
                            </tr>

                            <tr>
                                <td>Mã sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Đơn giá</td>
                                <td>Số lượng</td>
                                <td>Tổng (VND)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="modal-order-container-content__total-container">
                    <div>
                        <p class="modal-order-container-content__total">Tổng đơn</p>
                        <p class="modal-order-container-content__total-re">: 70,000 VND</p>
                    </div>

                    <div>
                        <p class="modal-order-container-content__total">Phí ship</p>
                        <p class="modal-order-container-content__total-re">: 70,000 VND</p>
                    </div>

                    <div>
                        <p class="modal-order-container-content__total">Mã giảm giá</p>
                        <p class="modal-order-container-content__total-re">: 70,000 VND</p>
                    </div>

                    <div>
                        <p class="modal-order-container-content__total">Tổng giảm</p>
                        <p class="modal-order-container-content__total-re">: 70,000 VND</p>
                    </div>

                    <div>
                        <p class="modal-order-container-content__total">Thành tiền</p>
                        <p class="modal-order-container-content__total-re">: 70,000 VND</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        eventCloseModal('modal-order', 'modal-order__container', 'modal-order-container__close');
    </script>
</div>

<?php include './container-footer.php' ?>