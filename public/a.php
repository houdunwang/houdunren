<?php
$str = '张三';
$reg = '/../u';
preg_match($reg, $str, $match);
print_r($match);
