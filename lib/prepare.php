<?php
// 设置自动加载
function autoload($class) {
    require_once '../class/' . strtolower($class) . '.class.php';
}
spl_autoload_register('autoload');
// 加载库函数
require_once '../lib/functions.php';
// 加载配置文件
$config = require '../config/config.php';
//
session_start();