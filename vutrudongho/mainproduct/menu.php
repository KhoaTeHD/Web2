<?php
include '../config/connect.php';
$quantity = mysqli_query($conn, "select * from product where status=1");
if ($quantity) {
    $rowcount = mysqli_num_rows($quantity);
} else {
    $rowcount = 0;
}

$sp_asc = mysqli_query($conn, "select * from product where status = 1 ORDER BY PriceToSell ASC");
$sp_desc = mysqli_query($conn, "select * from product where status = 1 ORDER BY PriceToSell DESC");
$sort_option = "";
if(isset($_GET['sort_num'])){
    if($_GET['sort_num'] =="thap-cao"){
        $sort_option = "ASC";
    }elseif($_GET['sort_num']== "cao-thap"){
        $sort_option= "DESC";
    }
}
$sort="select * from product order by PriceToSell $sort_option";
$sort_run = mysqli_query($conn, $sort);
if(mysqli_num_rows($sort_run)>0){ 
    foreach($sort_run as $key => $value){
        
    }
}

?>
<div class="menu">
    <span class="quantity">Có tất cả
        <?php echo "<b> $rowcount </b>" ?> sản phẩm
    </span>
    <!-- <p>Sắp xếp</p> -->
    <form action="" method="GET">
    <div class="dropdown-sort">
        <!-- <button class="drop">Tất cả</button> -->
        <div class="sort">
            <select name="sort_num" class="drop">
                <option value="all">Tất cả</option>
                <option class="select-sort" value="thap-cao" <?php if (isset($_GET['sort_num']) && $_GET['sort_num'] == "thap-cao") {
                    echo "selected";
                } ?>>Giá thấp đến cao</option>
                <option class="select-sort" value="cao-thap" <?php if (isset($_GET['sort_num']) && $_GET['sort_num'] == "cao-thap") {
                    echo "selected";
                } ?>>Giá cao đến thấp</option>
            </select>
            <input type="submit" class="input" value="Sắp xếp">
        </div>
    </div>
    </form>
</div>
