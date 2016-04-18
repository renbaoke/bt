<?php
require 'class/db.class.php';
require 'lib/functions.php';

$my_url = "http://" . $_SERVER ["HTTP_HOST"] . $_SERVER ["PHP_SELF"];
$from_url = isset ( $_SERVER ["HTTP_REFERER"] ) ? $_SERVER ["HTTP_REFERER"] : "";

if ($my_url === $from_url) {
	if (! empty ( $_POST ["addmin_password"] ))
		set_admin_password ( "admin/config/admin_password.php", sql_escape ( $_POST ["addmin_password"], "" ) );
	
	$DB = new DB ();
	$db_host = sql_escape ( $_POST ["db_host"], "" );
	$db_database = sql_escape ( $_POST ["db_database"], "" );
	$db_username = sql_escape ( $_POST ["db_username"], "" );
	$db_password = sql_escape ( $_POST ["db_password"], "" );
	
	if (! $DB->connect ( $db_host, $db_username, $db_password, $db_database )) {
		echo "数据库连接错误！";
	} else {
		set_db_config ( "config/db.php", $db_host, $db_database, $db_username, $db_password );
		
		$sql_file = fopen ( "tables.sql", "r" );
		$sqls = explode(';', fread ( $sql_file, filesize ( "tables.sql" ) ));
		fclose($sql_file);
		
		foreach ($sqls as $sql) {
			if (!$DB->put($sql)) {
				echo "创建数据表失败";
				break;
			}
		}

		header ( "Location: admin/" );
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="smile.ico">
<title>系统安装页面</title>
<style type="text/css">
h1 {
	text-align: center;
}

body>div {
	width: 300px;
	margin: auto;
}

body>div div {
	margin-bottom: 1em;
}

body>div div>input {
	float: right;
}
</style>
</head>
<body>
	<h1>系统安装</h1>
	<div>
		<form action="install.php" method="post">
			<div>
				<span>后台管理密码：</span><input type="text" name="addmin_password"
					autofocus="autofocus">
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