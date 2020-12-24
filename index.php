<html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<link rel="stylesheet" href="css/photogallery.css?v=<?php echo(microtime(true)); ?>">
<script src="js/gallery.js?v=<?php echo(microtime(true)); ?>"></script>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Image Slider</title>
</head>
<body>

<form enctype="multipart/form-data" action="?" method="post">
	<label>Навзвание фотографии</label><input type="text" id="NameImg" name="NameImg"><br>
    <label for="myfile">Выберете файл:</label><input type="file" id="myfile" name="myfile" /><br>
  <input type="submit" value="Отправить файл" name="OneFile" />
</form>

<?php
require_once('engine/db.php');
require_once('config/config.php');
require_once('engine/resize.php');

require_once('engine/function.php');

$gallery = DownloadImage();

?>

<br>

<div class="smallGallery">
    <? foreach ($gallery as $key_foto => $foto): ?>
        <div>
        <a href="foto_gallery.php?id=<?=$foto['id_gallery']?>" target="_blank" >
            <img src="<?=UPLOAD_SMALL_DIR.$foto['hash_file'] ?>" />
        </a>
        <br>
        <p>Количество просмотров: <?=$foto['view']?></p>
        </div>
    <? endforeach ?>
</div>

<div class="MyFlex">
<div class="leftImage"></div>
<div class="Centrimage"></div>
<div class="RightImage"></div>
</div>

</body>
</html>