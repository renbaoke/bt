<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link rel="shortcut icon" href="../smile.ico">
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/change_password.css">
	<title>修改密码</title>
</head>
<body>
<?php require 'html/header.html.php';?>
<div id="change_password">
	<form action="control/change_password.control.php" method="post">
		<div class="input"><span>原密码：</span><input type="password" name="old_password"></div>
		<div class="input"><span>新密码：</span><input type="password" name="new_password"></div>
		<div class="input"><span>重复新密码：</span><input type="password" name="new_password_repeat"></div>
		<div id="submit"><input type="submit" value="修改密码"></div>
	</form>
</div>
</body>
</html>