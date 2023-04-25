
<?php
$link = new mysqli('localhost', 'root', '', 'vutrudidongdb') or die('Kết nối thất bại!');

$sql = sprintf("SELECT * FROM user");
$result = mysqli_query($link, $sql);
$rows = mysqli_fetch_assoc($result);//1 dòng
//$rows = mysqli_fetch_all($result);//all dòng trong bảng

//foreach ($rows as $value) {var_dump($value[1]) ;}
var_dump($rows["FullName"]);

echo "</br>";echo "-------------------------------------";echo "</br>";

?>
<?php

$name = "Hoàng";
$age = 21;
echo ("Xin chào $name. Bạn $age tuổi hả? <br/>");
$mang = [1, 2, 3];
$thanhphan1 = $mang[0];
echo ("Phần tử đầu tiên của mảng là: $thanhphan1. <br/>");


$mangkhongtuantu = ["key1" => 1, "key2" => "hello"];
$truyxuat = $mangkhongtuantu["key2"];
$mangkhongtuantu["key3"] = "hiii";
echo "truy cap thanh cong vao $truyxuat.<br/> Khi dùng var_dump(var) thì sẽ như này: ";
var_dump($mangkhongtuantu);
//them phan tu
$mangkhongtuantu["key3"] = "world";

//mang da chieu
$mangdachieu = [
    "key1" => 1,
    "key2" => "hello",
    "key3" => [
        "sub_child" => "test"
    ]
];
$style = '<style> #abc{color: red;}</style>';
$html = '<a id="abc" href ="https://fb.com">123</a><br/>';
echo $style;
echo ($html);


// for($x = 1; $x <=100 ; $x++){
//     echo "<h2 style="."color:pink;>$x</h2>"."<br/>";
// }

$colors = array("red", "green", "blue", "yellow");
foreach ($colors as $value) {
    echo "Màu $value đây rồi <br/>";
}
foreach ($colors as $key => $value) {
    echo $key . '_' . $value . "<br/>";
}

echo '----------------------------------';

//pthuc $_GET và $_POST 

if (isset($_POST["userName"]) && isset($_POST["passWord"])) {
    echo "Welcome " . $_POST['userName'] . "<br/>";
    echo "Your password is " . $_POST['passWord'] . "<br/>";
    die();
}
?>
