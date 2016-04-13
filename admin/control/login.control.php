<?php
require 'prepare.php';

if (is_logged_in ())
	header ( "Location: ../index.php" );
else {
	$password_md5 = require "../config/admin_password.php";
	if ($password_md5 === md5 ( $_POST ["password"] )) {
		log_in ();
		header ( "Location: ../index.php" );
	} else
		header ( "Location: ../login.php" );
}
