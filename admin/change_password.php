<?php
require 'prepare.php';

if (! is_logged_in ())
	header ( "Location: login.php" );

require 'html/change_password.html.php';
