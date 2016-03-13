<?php
require 'prepare.php';

if (is_logged_in ())
	has_logged_in ();
else if (isset ( $_SERVER ["HTTP_REFERER"] ) and ($_SERVER ["HTTP_REFERER"] === "http://" . $_SERVER ["SERVER_NAME"] . $_SERVER ["PHP_SELF"]))
	if (verify_admin_password ( $_POST ["password"] )) {
		log_in ();
		has_logged_in ();
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>管理员登录</title>
</head>
<form action="login.php" method="post">
	Password:<input type="password" name="password" autofocus="autofocus" />
	<input type="submit" value="Login" />
</form>
</html>