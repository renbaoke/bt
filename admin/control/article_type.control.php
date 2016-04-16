<?php
require 'prepare.php';

if (! is_logged_in ())
	fatal_error ( "未登录" );

$DB = new DB ();
if (! $DB->connect ( $config ["db"] ["server"], $config ["db"] ["username"], $config ["db"] ["password"], $config ["db"] ["database"] ))
	operation_fail ( "数据库连接错误" );

$ArticleType = new ArticleType ( $DB );

if (isset ( $_GET ["operation"] ))
	switch ($_GET ["operation"]) {
		case "add" :
			if (empty ( $_POST ["name"] ) || ! $ArticleType->add ( $_POST ["name"] ))
				operation_fail ( "添加失败" );
			
			operation_success ( "添加成功" );
			break;
		case "delete" :
			if (! $ArticleType->delete ( $_GET ["id"] ))
				operation_fail ( "删除失败" );
			operation_success ( "删除成功" );
			break;
		case "update" :
			if (empty($_POST ["id"]) || empty($_POST ["name"]))
				operation_fail ( "更新失败" );
			if (! $ArticleType->update ( $_POST ["id"], $_POST ["name"] ))
				operation_fail ( "更新失败" );
			
			operation_success ( "更新成功" );
			break;
		default :
			fatal_error ( "未知操作" );
	}