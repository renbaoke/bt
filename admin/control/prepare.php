<?php
$root = '../../';
$config = require $root . 'config/config.php';
$config ["db"] = require $root . 'config/db.php';
require $root . 'lib/functions.php';
spl_autoload_register ( 'autoload' );
session_start ();

require '../lib/functions.php';
