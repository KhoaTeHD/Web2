<?php
session_start();

function isAdminLogged() {
	//var_dump($_SESSION['current_username']);
	if(isset($_SESSION['current_username'])) {
		//var_dump($_SESSION['isAdmin']);
		if ($_SESSION['isAdmin'] == true)
			return true;
	}
	
	return false;
}
?>