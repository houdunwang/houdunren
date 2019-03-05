<?php
include __DIR__.'/vendor/autoload.php';
\houdunwang\oss\Oss::config(include __DIR__.'/config/oss.php');
$sign =  \houdunwang\oss\Oss::sign();
echo($sign);
