<?php
require 'prepare.php';

if (! is_logged_in ())
	not_logged_in ();

$DB = new DB ();
if (! $DB->connect ( $config ["db"] ["server"], $config ["db"] ["username"], $config ["db"] ["password"], $config ["db"] ["database"] ))
	fatal_error ( "db connect error" );

$Photo = new Photo ( $DB );

if (isset ( $_GET ["operation"] ))
	switch ($_GET ["operation"]) {
		case "add" : // 添加
			if (! is_uploaded_file ( $_FILES ["photo"] ["tmp_name"] ))
				fatal_error ( "文件上传错误" );
			if (empty ( $_POST ["intro"] ))
				fatal_error ( "未填写简介" );
			
			$is_image = false;
			switch ($_FILES ["photo"] ["type"]) {
				case 'image/pjpeg' :
					$is_image = true;
					break;
				case 'image/jpeg' :
					$is_image = true;
					break;
				case 'image/gif' :
					$is_image = true;
					break;
				case 'image/png' :
					$is_image = true;
					break;
			}
			if (! $is_image)
				operation_fail ( "上传文件不是图片" );
			
			$file_name = date ( "ymdhis" ) . strrchr ( $_FILES ["photo"] ["name"], "." );
			move_uploaded_file ( $_FILES ["photo"] ["tmp_name"], $root . $config ["upload_dir"] . "image/" . $file_name );
			
			if ($Photo->add ( $_POST ["intro"], $file_name, $_POST ["album"] ))
				operation_success ( "上传照片成功" );
			else
				operation_fail ( "上传照片失败" );
			break;
		case "delete" : // 删除
			if (! isset ( $_GET ["id"] ))
				fatal_error ( "参数错误" );
			
			$file = $Photo->get ( $_GET ["id"] );
			if ($Photo->delete ( $_GET ["id"] ) and unlink ( $root . $config ["upload_dir"] . "image/" . $file ["file"] ))
				operation_success ( "删除成功" );
			else
				operation_fail ( "删除失败" );
			break;
		case "update" : // 更新
			if ($Photo->update ( $_POST ["id"], $_POST ["intro"] ))
				operation_success ( "更新成功" );
			else
				operation_fail ( "更新失败" );
			break;
		default :
			fatal_error ( "unkown operation" );
	}