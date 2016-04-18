<?php
// 设置管理员密码
function set_admin_password($file, $password) {
	$password_file = fopen ( $file, "w" ) or fatal_error ( "密码文件丢失 " );
	fwrite ( $password_file, "<?php return \"" . md5 ( $password ) . "\";" );
	fclose ( $password_file );
}
// 配置数据库
function set_db_config($file, $host, $database, $username, $password) {
	$db_config_file = fopen ( $file, "w" ) or fatal_error ( "数据库配置文件丢失 " );
	fwrite ( $db_config_file, "<?php\n" );
	fwrite ( $db_config_file, "return array(\n" );
	fwrite ( $db_config_file, "\t\"server\" => \"" . $host . "\",\n" );
	fwrite ( $db_config_file, "\t\"username\" => \"" . $username . "\",\n" );
	fwrite ( $db_config_file, "\t\"password\" => \"" . $password . "\",\n" );
	fwrite ( $db_config_file, "\t\"database\" => \"" . $database . "\"\n" );
	fwrite ( $db_config_file, ");\n" );
	fclose ( $db_config_file );
}
// 删除文件路径中的不安全字符
function path_escape($path) {
	return str_replace ( "..", "", str_replace ( "../", "", $path ) );
}
// 转义html中的特殊字符
function html_escape($html) {
	return htmlspecialchars ( $html, ENT_HTML5 );
}
// 转义sql中的特殊字符
function sql_escape($value, $wrap = "'") {
	// 去除斜杠
	if (get_magic_quotes_gpc ()) {
		$value = stripslashes ( $value );
	}
	// 如果不是数字则加引号
	if (! is_numeric ( $value )) {
		$value = $wrap . mysql_escape_string ( $value ) . $wrap;
	}
	return $value;
}
// 操作成功提示
function operation_success($message) {
	echo urldecode ( json_encode ( array (
			"success" => true,
			"message" => urlencode ( $message ) 
	) ) );
	die ();
}
// 操作失败提示
function operation_fail($message) {
	echo urldecode ( json_encode ( array (
			"success" => false,
			"message" => urlencode ( $message ) 
	) ) );
	die ();
}
// 致命错误
function fatal_error($message) {
	die ( $message );
}
// 自动加载类文件
function autoload($class) {
	global $root;
	global $config;
	require_once $root . $config ['class_dir'] . strtolower ( $class ) . '.class.php';
}
