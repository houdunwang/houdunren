<?php
$files = glob('uploads/*');
foreach ($files as $f) {
    $file   = "php/".$f;
    $data[] = [
        'url'        => $file,
        'path'       => $file,
        'size'       => filesize($f),
        'name'       => basename($f),
        'createtime' => date('Y-m-d', filemtime($f)),
    ];
}
$json = ['data' => $data,'code'=>0, 'page' => []];
die(json_encode($json));