<?php
include './sidebar.php';
include './container-header.php';
?>
<head>
    <link rel="stylesheet" href="assets/CSS/sale.css">
</head>
<script>
    eventForSideBar(1);
    setValueHeader("Doanh Thu");
</script>

<div class="revenue_content">
    <div class="revenue_left_content">
        <div class="filter_content">
            <form action="" method="get">
                <div class="calender_revenue">
                    <input name="date-from" type="date" class="date-picker__date-from">
                    <span class="material-symbols-outlined">arrow_forward</span>
                    <input name="date-to" type="date" class="date-picker__date-to">
                    <button type="submit" name="submit" class="date-picker__filter">Lọc</button>
                </div>
                <script>
                    // let today = new Date();
                    // let dd = String(today.getDate()).padStart(2, '0');
                    // let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                    // let yyyy = today.getFullYear();
                    // today = yyyy + '-' + mm + '-' + dd;
                    // let date_from = document.querySelector('.order-search__date-from');
                    // let date_to = document.querySelector('.order-search__date-to');
                    // date_from.value = today;
                    // date_to.value = today;
                </script>
            </form>
            <div class="date_revenue">
                <button class="day_revenue" onclick="renderChart('date','','');">Ngày</button>
                <button class="month_revenue" onclick="renderChart('month','','');">Tháng</button>
                <button class="year_revenue" onclick="renderChart('year','','');">Năm</button>
            </div>
        </div>
        <div class="revenue_chart">
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <div class="revenue_right_content">
        <div class="revenue_card">

        </div>
        <div class="revenue_card">

        </div>
        <div class="revenue_card">

        </div>
        <div class="revenue_card">

        </div>
        <div class="order_today">

        </div>
        <div class="import_today">

        </div>
        <div class="importVoucher_today">

        </div>
        <div class="profit_today">

        </div>
    </div>
</div>

<!-- <div style="width: 800px; height: 500px">
    <canvas id="myChart"></canvas>
</div> -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="assets/JS/sale.js"></script>

<?php include './container-footer.php' ?>