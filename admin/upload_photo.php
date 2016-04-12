<?php
require 'prepare.php';

if (! is_logged_in ())
	header ( "Location: login.php" );

$DB = new DB();
if (! $DB->connect ( $config ["db"] ["server"], $config ["db"] ["username"], $config ["db"] ["password"], $config ["db"] ["database"] ))
	fatal_error ( "db connect error" );

$Album = new Album($DB);

$albums = $Album->index();
$album_id = isset($_GET["album"]) ? $_GET["album"] : 0;

require 'html/upload_photo.html.php';
