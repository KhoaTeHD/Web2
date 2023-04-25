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
	if ($row['Password'] == $pass) {
		// dang nhap thanh cong
		echo 'Dang nhap thanh cong';
		$_SESSION['current_username'] = $user;
		$_SESSION['isAdmin'] = true;
		$_SESSION['current_fullName'] = $fullName;
		$_SESSION['current_numberPhone'] = $numberPhone;
		header('location: ../index.php');
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

