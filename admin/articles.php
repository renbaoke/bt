<?php
require 'prepare.php';

if (! is_logged_in ())
	header ( "Location: login.php" );

$DB = new DB ();
if (! $DB->connect ( $config ["db"] ["server"], $config ["db"] ["username"], $config ["db"] ["password"], $config ["db"] ["database"] ))
	fatal_error ( "数据库连接错误" );

$Article = new Article ( $DB );
$ArticleType = new ArticleType ( $DB );

$page = isset ( $_GET ["page"] ) ? $_GET ["page"] : 1;
$type = isset ( $_GET ["type"] ) ? $_GET ["type"] : 0;

$articles = $Article->index ( $type, $page, $config ["article_page_size"] );
$article_types = $ArticleType->index ();
$article_count = $Article->count ( $type );
$page_count = ceil ( $article_count / $config ["article_page_size"] );

require "html/articles.html.php";
