<?php
require 'prepare.php';

if (! is_logged_in ())
	fatal_error ( "not logged in" );

$DB = new DB ();
if (! $DB->connect ( $config ["db"] ["server"], $config ["db"] ["username"], $config ["db"] ["password"], $config ["db"] ["database"] ))
	fatal_error ( "db connect error" );

$Hyperlink = new Hyperlink ( $DB );

if (isset ( $_GET ["operation"] ))
	switch ($_GET ["operation"]) {
		case "add" : // 添加
			if (! $Hyperlink->add ( $_POST ["title"] , $_POST ["http"]))
				operation_fail ( "添加失败" );
			
			operation_success ( "添加成功" );
			break;
		case "delete" : // 删除
			if (! $Hyperlink->delete ( $_GET ["id"] ))
				operation_fail ( "删除失败" );
			operation_success ( "删除成功" );
			break;
		case "update" : // 更新
			if (! $Hyperlink->update ( $_POST ["id"], $_POST ["title"], $_POST ["http"]))
				operation_fail ( "更新失败" );
			
			operation_success ( "更新成功" );
			break;
		default :
			fatal_error ( "unkown operation" );
	}