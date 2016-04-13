<?php
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
		$value = $wrap . mysql_real_escape_string ( $value ) . $wrap;
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
	echo urldecode ( json_encode ( array (
			"success" => false,
			"message" => urlencode ( $message ) 
	) ) );
	die ();
}
// 自动加载类文件
function autoload($class) {
	global $root;
	global $config;
	require_once $root . $config ['class_dir'] . strtolower ( $class ) . '.class.php';
}
