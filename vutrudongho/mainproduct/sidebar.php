<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <title>Document</title>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 30000000,
                values: [0, 30000000],
                slide: function (event, ui) {
                    $("#amount").val("đ" + addPlus(ui.values[0]).toString() + " - đ" + addPlus(ui.values[1]));
                    $('.price_from').val(ui.values[0]);
                    $('.price_to').val(ui.values[1]);
                }
            });
            $("#amount").val("đ" + addPlus($("#slider-range").slider("values", 0)) +
                " - đ" + addPlus($("#slider-range").slider("values", 1)));
        });
        function addPlus(nStr) {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + '.' + '$2');
            }
            return x1 + x2;
        }
    </script>
</head>
<?php
include 'connect.php';
$brand = mysqli_query($conn, "select * from brand where status = 1");
$color = mysqli_query($conn, "select DISTINCT Color from product where status=1 ORDER BY Color ASC");
// $price_min = mysqli_query($conn,"select MIN(PriceToSell) from product");
// $price_max = mysqli_query($conn,"select MAX(PriceToSell) from product");
$gender = mysqli_query($conn, "select DISTINCT Gender from product where status=1 ORDER BY Gender ASC");
$model = mysqli_query($conn, "select DISTINCT Model from product where status=1");
?>

<body>
    <div class="side-bar">
        <ul class="list-price">
            <form method="GET">
                <p class="range">
                    <label for="amount">Khoảng giá</label>
                    <input type="text" id="amount" readonly style="border:0; color:#E50914; font-weight:bold;">
                </p>
                <div id="slider-range">
                    <input type="hidden" class="price_from" name="from" value="<?php if (isset($_GET['from'])) {
                        echo $_GET['from'];
                    } else {
                        echo "0";
                        
                    } ?>">
                    <input type="hidden" class="price_to" name="to" value="<?php if (isset($_GET['to'])) {
                        echo $_GET['to'];
                    } else {
                       echo "30000000";
                    } ?>">
                    <input type="submit" class="sort" value="Lọc">
                </div>
            </form>
        </ul>
        <ul class="list-brand">
            <div class="dropdown">
                <button class="dropbtn">Thương hiệu</button>
                <div class="dropdown-content">
                    <?php foreach ($brand as $key => $value): ?>
                        <a href="?brand=<?php echo $value['BrandName'] ?>&idBrand=<?php echo $value['BrandID'] ?>"><?php echo $value['BrandName'] ?></a>
                    <?php endforeach ?>
                </div>
            </div>
        </ul>
        <ul class="list-color">
            <div class="dropdown">
                <button class="dropbtn">Màu sắc</button>
                <div class="dropdown-content">
                <?php foreach ($color as $key => $value): ?>
                        <a href="?color=<?php echo $value['Color'] ?>"><?php echo $value['Color'] ?></a>
                    <?php endforeach ?>
                </div>
            </div>
        </ul>
        <ul class="list-gender">
            <div class="dropdown">
                <button class="dropbtn">Giới tính</button>
                <div class="dropdown-content">
                <?php foreach ($gender as $key => $value): ?>
                        <a href="?gender=<?php echo $value['Gender'] ?>"><?php echo $value['Gender'] ?></a>
                    <?php endforeach ?>
                </div>
            </div>
        </ul>
        <ul class="list-model">
            <div class="dropdown">
                <button class="dropbtn">Bộ máy</button>
                <div class="dropdown-content">
                <?php foreach ($model as $key => $value): ?>
                        <a href="?model=<?php echo $value['Model'] ?>"><?php echo $value['Model'] ?></a>
                    <?php endforeach ?>
                </div>
            </div>
        </ul>
    </div>
</body>

</html>