<?php
$url = $_GET['tu'];
$path='https://'.$url;//tu这个的值即为图片的地址
$img = imagecreatefromjpeg($path);
header('Content-Type:image/jpeg;');
//转为jpg格式输出
imagejpeg($img);