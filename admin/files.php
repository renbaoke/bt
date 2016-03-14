<?php
require 'prepare.php';

if (! is_logged_in ())
	not_logged_in ();

$File = new File();

var_dump($File->index($root . $config["upload_dir"] . "file/"));