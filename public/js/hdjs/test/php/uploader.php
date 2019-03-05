<?php
$file = 'uploads/'.mt_rand(1,111111).$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'],$file);
$json = ['file' =>'php/'. $file, 'code' => 0];
die(json_encode($json));