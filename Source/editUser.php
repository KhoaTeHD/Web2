<!--Start php xu ly sua thong tin-->
<?php
require_once('lib_session.php');
?>
<?php
if (isset($_REQUEST['btnSubmitEdit'])) {
    $userID = $_SESSION['current_userID'];
    $fullName = $_REQUEST['fullName'];
    $email = $_REQUEST['email'];
    $numberPhone = $_REQUEST['numberPhone'];
    $tinh = $_REQUEST['tinh'];
    $quanHuyen = $_REQUEST['quanHuyen'];
    $phuongXa = $_REQUEST['phuongXa'];
    $diaChiNha = $_REQUEST['diaChiNha'];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vutrudongho";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = sprintf("UPDATE `user` SET `FullName` = '%s', `NumberPhone` = '%s', `Email` = '%s', `HouseRoadAddress` = '%s', `Ward` = '%s', `District` = '%s', `Province` = '%s', `Status` = 1 WHERE `user`.`UserID` = '%s'", $fullName, $numberPhone, $email, $diaChiNha, $phuongXa, $quanHuyen, $tinh, $userID);


    if ($conn->query($sql) === TRUE) {
        //echo "The record editted successfully";
        $sqlReview = sprintf("SELECT * FROM `user` WHERE `UserID`='$userID'");
        $result = mysqli_query($conn, $sqlReview);
        $row = mysqli_fetch_assoc($result);
        $fullName = $row['FullName'];
        $numberPhone = $row['NumberPhone'];
        $email = $row['Email'];
        $houseRoadAddress = $row['HouseRoadAddress'];
        $ward = $row['Ward'];
        $district = $row['District'];
        $province = $row['Province'];
        if($_SESSION['current_numberPhone'] != $numberPhone){
            header("Location: logout.php?isAdmin=1");
        }
        else{
            $_SESSION['current_fullName'] = $fullName;
            $_SESSION['current_numberPhone'] = $numberPhone;
            $_SESSION['current_email'] = $email;
            $_SESSION['current_houseRoadAddress'] = $houseRoadAddress;
            $_SESSION['current_ward'] = $ward;
            $_SESSION['current_district'] = $district;
            $_SESSION['current_province'] = $province;
            header("Location: user.php");
            exit();
        }
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
} ?>

<!--End php xu ly sua thong tin-->