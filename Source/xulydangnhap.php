<?php
require_once('lib_session.php');

$user = $_REQUEST['userName'];
$pass = $_REQUEST['passWord'];

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

$sql = sprintf("SELECT * FROM user WHERE NumberPhone='%s'", $user);
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) == 1) {
	$row = mysqli_fetch_assoc($result);
	$fullName = $row['FullName'];
	$numberPhone = $row['NumberPhone'];
	$email = $row['Email'];
	$houseRoadAddress = $row['HouseRoadAddress'];
	$ward = $row['Ward'];
	$district = $row['District'];
	$province = $row['Province'];
	$status = $row['Status'];
	if ($row['Password'] == $pass) {
		// dang nhap thanh cong
		echo 'Dang nhap thanh cong';
		$_SESSION['current_username'] = $user;
		$_SESSION['isAdmin'] = true;
		$_SESSION['current_fullName'] = $fullName;
		$_SESSION['current_numberPhone'] = $numberPhone;
		$_SESSION['current_email'] = $email;
		$_SESSION['current_houseRoadAddress'] = $houseRoadAddress;
		$_SESSION['current_ward'] = $ward;
		$_SESSION['current_district'] = $district;
		$_SESSION['current_province'] = $province;
		$_SESSION['current_status'] = $status;
		header('location: index.php');
	}
	else {
		echo 'Sai password';
	}
}
else {
	echo ('Ko ton tai user ' . $user);
}

mysqli_close($conn);
?>

