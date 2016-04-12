<?php
// 修改密码
function change_admin_password($password) {
	$password_file = fopen ( "admin_password.php", "w" ) or die ( "admin_password.php does not exist" );
	fwrite ( $password_file, "<?php return \"" . md5 ( $password ) . "\";" );
	fclose ( $password_file );
}
// 是否已登录
function is_logged_in() {
	return isset ( $_SESSION ["logged_in"] ) and $_SESSION ["logged_in"];
}
// 登录
function log_in() {
	$_SESSION ["logged_in"] = true;
}
// 登出
function log_out() {
	if (isset ( $_SESSION ["logged_in"] ))
		unset ( $_SESSION ["logged_in"] );
}
