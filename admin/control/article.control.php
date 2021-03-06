<?php
require 'prepare.php';

if (! is_logged_in ())
	fatal_error ( "未登录" );

$DB = new DB ();
if (! $DB->connect ( $config ["db"] ["server"], $config ["db"] ["username"], $config ["db"] ["password"], $config ["db"] ["database"] ))
	operation_fail ( "数据库连接错误" );

$Article = new Article ( $DB );

if (isset ( $_GET ["operation"] ))
	switch ($_GET ["operation"]) {
		case "add" :
			if (! $Article->add ( $_POST ["title"], $_POST ["body"] ))
				operation_fail ( "添加失败" );
			
			$last_insert_id = $DB->last_insert_id ();
			
			if (! empty ( $_POST ["types"] ))
				foreach ( $_POST ["types"] as $type )
					$Article->add_to_type ( $last_insert_id, $type );
			operation_success ( "添加成功" );
			break;
		case "delete" :
			if (! $Article->delete ( $_GET ["id"] ))
				operation_fail ( "删除失败" );
			
			operation_success ( "删除成功" );
			break;
		case "update" :
			if (! $Article->update ( $_POST ["id"], $_POST ["title"], $_POST ["body"] ))
				operation_fail ( "更新失败" );
			
			$Article->delete_from_all_types ( $_POST ["id"] );
			
			if (! empty ( $_POST ["types"] ))
				foreach ( $_POST ["types"] as $type )
					$Article->add_to_type ( $_POST ["id"], $type );
			
			operation_success ( "更新成功" );
			break;
		default :
			fatal_error ( "未知操作" );
	}