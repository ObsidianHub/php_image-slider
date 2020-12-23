<?php

require_once('engine/db.php');
require_once('config/config.php');

$sql = "Select * from galery;";
$image = getAssocResult($sql);

$var3 = $_POST['vars'];

$var3 = isset($var3) ? $var3 : 0;

$varL = ($var3 - 1 >= 0) ? $var3 - 1 : count($image)-1;
$varR = ($var3 + 1 <= count($image)-1) ? $var3 + 1 : 0;
$img = UPLOAD_DIR . $image[$var3][hash_file];
$varRand = rand(0,count($image)-1);

$send = [
 varL => "<a href=\"javascript:Photogalery($varL)\">Предыдущая картинка</a>",
 varR => "<a href=\"javascript:Photogalery($varR)\">Следующая картинка</a>",
 Centrimage => "<a href=\"javascript:Photogalery($varRand)\"><div class=\"image\"><img height=\"80%\" src=\"$img\"/></div></a>",
 leftImage => '#leftImage'
];

echo json_encode($send);

?>

