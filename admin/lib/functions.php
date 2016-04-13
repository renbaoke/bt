<?php
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
