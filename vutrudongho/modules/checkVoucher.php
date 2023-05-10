<?php
    include 'connectDatabase.php';

    if(isset($_GET['VoucherID'])){

        $voucherID = $_GET['VoucherID'];
        if($conn = connectDatabase()){
            $result = mysqli_query($conn,"select VoucherName, Discount, Unit, Status from voucher where VoucherID='$voucherID'");
            if(mysqli_num_rows($result) >0){
                $voucher = mysqli_fetch_array($result);
            }
            else{
                echo 0;
                return;
            }
        }

        if($voucher['Status'] == "1"){
            echo $voucher['VoucherName'] . "," . $voucher['Discount'] . "," . $voucher['Unit'];
            return;
        }

        echo 0;
        return;
    }

?>