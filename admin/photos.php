<?php
require 'prepare.php';

if (! is_logged_in ())
	header ( "Location: login.php" );

$DB = new DB();
if (! $DB->connect ( $config ["db"] ["server"], $config ["db"] ["username"], $config ["db"] ["password"], $config ["db"] ["database"] ))
	fatal_error ( "db connect error" );

$Album = new Album($DB);
$Photo = new Photo($DB);

$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$album_id = isset($_GET["album"]) ? $_GET["album"] : 0;

$photos = $Photo->index($album_id, $page, $config["photo_page_size"]);
$albums = $Album->index();
$photo_count = $Photo->count($album_id);
$page_count = ceil($photo_count / $config["photo_page_size"]);

require 'html/photos.html.php';
