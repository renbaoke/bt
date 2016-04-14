<?php
require 'prepare.php';

if (! is_logged_in ())
	header ( "Location: login.php" );

$is_edit = isset ( $_GET ["id"] );

// 连接数据库
$DB = new DB ();
if (! $DB->connect ( $config ["db"] ["server"], $config ["db"] ["username"], $config ["db"] ["password"], $config ["db"] ["database"] ))
	fatal_error ( "数据库连接错误" );
	
// 获取文件类型列表
$ArticleType = new ArticleType ( $DB );
$article_types = $ArticleType->index ();

// 获取文章
if ($is_edit) {
	$Article = new Article ( $DB );
	$article = $Article->get ( $_GET ["id"] );
}

require 'html/edit_article.html.php';