<?php
require 'prepare.php';

if (! is_logged_in ())
	header ( "Location: login.php" );

$DB = new DB();
if (! $DB->connect ( $config ["db"] ["server"], $config ["db"] ["username"], $config ["db"] ["password"], $config ["db"] ["database"] ))
	fatal_error ( "db connect error" );

$Hyperlink = new Hyperlink ($DB);
$hyperlinks = $Hyperlink->index();

require 'html/hyperlink.html.php';
