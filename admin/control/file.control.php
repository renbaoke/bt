<?php
require 'prepare.php';

if (! is_logged_in ())
	fatal_error ( "未登录" );

$File = new File ();

if (isset ( $_GET ["operation"] )) {
	switch ($_GET ["operation"]) {
		case "upload" :
			if (! is_uploaded_file ( $_FILES ["file"] ["tmp_name"] ))
				fatal_error ( "文件上传错误" );
			
			if (isset ( $config ["file_sys_encode"] ))
				$_FILES ["file"] ["name"] = iconv ( "utf-8", $config ["file_sys_encode"], $_FILES ["file"] ["name"] );
			
			move_uploaded_file ( $_FILES ["file"] ["tmp_name"], $root . $config ["upload_dir"] . "file/" . $_FILES ["file"] ["name"] );
			operation_success ( "上传文件成功" );
			break;
		case "delete" :
			if (isset ( $config ["file_sys_encode"] ))
				$_GET ["file"] = iconv ( "utf-8", $config ["file_sys_encode"], $_GET ["file"] );
			if (unlink ( $root . $config ["upload_dir"] . "file/" . path_escape ( $_GET ["file"] ) ))
				operation_success ( "删除文件成功" );
			else
				operation_fail ( "删除文件失败" );
			break;
		default :
			fatal_error ( "未知操作" );
	}
}
