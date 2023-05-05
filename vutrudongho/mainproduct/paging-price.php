<div id="main">
    <?php
    include 'connect.php';
    include("sidebar.php");
    $pricefrom = isset($_GET['from']) ? $_GET['from'] : '';
    $priceto = isset($_GET['to']) ? $_GET['to'] : '';
    $query_run = mysqli_query($conn, "select * from product where PriceToSell between $pricefrom and $priceto");

    $item_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 9;
    $cur_page = !empty($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($cur_page - 1) * $item_page;
    $page = mysqli_query($conn, "select * from product where status=1 order by ProductID asc LIMIT " . $item_page . " OFFSET " . $offset);
    $total = mysqli_query($conn, "select * from product where PriceToSell between $pricefrom and $priceto");
    $total = $total->num_rows;
    $total_page = ceil($total / $item_page);
    //---------
    if (isset($_GET['from']) && isset($_GET['to'])) {
        $pricefrom = $_GET['from'];
        $priceto = $_GET['to'];
        $query = "select * from product where PriceToSell between $pricefrom and $priceto order by ProductID asc LIMIT " . $item_page . " OFFSET " . $offset;
    } else {
        $query = "select * from product where status=1 order by ProductID asc LIMIT " . $item_page . " OFFSET " . $offset;
    }
    $query_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($query_run) > 0) { ?>
        <div class="maincontent">
            <?php foreach ($query_run as $key => $value): ?>
                <div class="card">
                    <div class="product-top">
                        <class="product-thumb">
                            <img src=".//assets/img/productImg/<?php echo $value['ProductImg'] ?>"></img>
                            <button class="info-detail" onclick="location.href='detail_product.php?ProductID=<?php echo $value['ProductID'] ?>'">Xem Thêm</button>
                        </class="product-thumb">
                    </div>
                    <p>
                        <?php echo $value['ProductName'] ?>
                    </p>
                    <span class="price">
                        <strong>
                            <?php echo number_format($value['PriceToSell'], 0, ",", ".") ?> đ
                        </strong>
                        <!-- <strike>40.990.000đ</strike> -->
                    </span>
                </div>
            <?php endforeach ?>
            <div class="pagination">
                <?php
                if ($cur_page > 2) {
                    $first_page = 1;
                    ?>
                    <a class="page-item" href="?page=<?= $first_page ?>">First</a>
                    <?php
                }
                if ($cur_page > 1) {
                    $prev_page = $cur_page - 1;
                    ?>
                    <a class="page-item" href="?page=<?= $prev_page ?>">Prev</a>
                <?php }
                ?>

                <?php for ($num = 1; $num <= $total_page; $num++) { ?>
                    <?php if ($num != $cur_page) { ?>
                        <?php if ($num > $cur_page - 2 && $num < $cur_page + 2) { ?>
                            <a class="page-item" href="?page=<?= $num ?><?php echo ($pricefrom!='') ? "&from=$pricefrom" : ''?><?php echo ($priceto!='') ? "&to=$priceto" : ''?>"><?= $num ?></a>
                        <?php } ?>
                    <?php } else { ?>
                        <strong class="cur-page page-item">
                            <?= $num ?>
                        </strong>
                    <?php } ?>
                <?php } ?>
                <?php
                if ($cur_page < $total_page - 1) {
                    $next_page = $cur_page + 1; ?>
                    <a class="page-item" href="?page=<?= $next_page ?>">Next</a>
                <?php }
                if ($cur_page < $total_page - 2) {
                    $end_page = $total_page;
                    ?>
                    <a class="page-item" href="?page=<?= $end_page ?>">Last</a>
                <?php }
                ?>
            </div>
        </div>
<?php }else{
    echo "Không tìm thấy sản phẩm";
}
 
?>
    