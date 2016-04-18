<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="smile.ico">
<title>系统安装页面</title>
<style type="text/css">
h1 {
	text-align:center;
}
body > div {
	width: 300px;
	margin: auto;
}
body > div div {
	margin-bottom:1em;
}
body > div div > input {
	float:right;
}
</style>
</head>
<body>
	<h1>系统安装</h1>
	<div>
		<form action="install.php">
			<div>
				<span>后台管理密码：</span><input type="text" name="addmin_password" autofocus="autofocus">
			</div>
			<div>
				<span>数据库地址：</span><input type="text" name="db_host">
			</div>
			<div>
				<span>数据库名称：</span><input type="text" name="db_database">
			</div>
			<div>
				<span>数据库用户名：</span><input type="text" name="db_username">
			</div>
			<div>
				<span>数据库密码：</span><input type="text" name="db_password">
			</div>
			<div>
				<input type="submit" value="安装">
			</div>
		</form>
	</div>
</body>
</html>