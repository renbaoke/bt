<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="../smile.ico">
<link rel="stylesheet" type="text/css" href="css/articles.css">
<title>我的文章</title>
</head>
<?php require 'html/header.html.php';?>
<form action="control/change_password.control.php" method="post">
	<input type="password" name="old_password" />
	<input type="password" name="new_password" />
	<input type="password" name="new_password_repeat" />
	<input type="submit" value="修改密码" />
</form>
</html>