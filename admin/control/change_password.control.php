<?php
require 'prepare.php';

if (! is_logged_in ())
	fatal_error ( "not logged in" );

$password_md5 = require "../config/admin_password.php";
if ($password_md5 === md5 ( $_POST ["old_password"] ) && $_POST ["new_password"] === $_POST ["new_password_repeat"]) {
	$password_file = fopen ( "../config/admin_password.php", "w" ) or fatal_error("password file missing");
	fwrite ( $password_file, "<?php return \"" . md5 ( $_POST ["new_password"]) . "\";" );
	fclose ( $password_file );
	operation_success("修改密码成功");
} else 
	operation_fail("修改密码失败");
