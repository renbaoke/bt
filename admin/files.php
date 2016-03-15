<?php
require 'prepare.php';

if (! is_logged_in ())
	not_logged_in ();

$File = new File ();

$current_dir = isset ( $_GET ["dir"] ) ? path_escape ( $_GET ["dir"] ) . "/" : "./";
$current_dir_encode = isset ( $config ["file_sys_encode"] ) ? iconv ( "utf-8", $config ["file_sys_encode"], $current_dir ) : $current_dir;

$files = $File->index ( $root . $config ["upload_dir"] . "file/" . $current_dir_encode );
$file_count = count ( $files );

foreach ( $files as $key => $file ) {
	if (isset ( $config ["file_sys_encode"] ))
		$files [$key] ["name"] = iconv ( $config ["file_sys_encode"], "utf-8", $file ["name"] );
	
	$files [$key] ["ctime"] = date ( "Y/m/s", $file ["ctime"] );
	
	if ($file ["size"] > 1024 * 1024 * 1024)
		$files [$key] ["size"] = ceil ( $file ["size"] / 1024 / 1024 / 1024 ) . "GB";
	else if ($file ["size"] > 1024 * 1024)
		$files [$key] ["size"] = ceil ( $file ["size"] / 1024 / 1024 ) . "MB";
	else if ($file ["size"] > 1024)
		$files [$key] ["size"] = ceil ( $file ["size"] / 1024 ) . "KB";
	else
		$files [$key] ["size"] = $file ["size"] . "B";
}

require 'html/files.html.php';
