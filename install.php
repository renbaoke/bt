<?php
echo dirname(__FILE__);
$a = array(1, 2,3 );
$b = array(4,5,6);
$a= array_merge($a, $b);
var_dump($a);