<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/photogalery.css?v=<?php echo(microtime(true)); ?>">
<title>Документ без названия</title>
</head>

<body>
<?php
require_once('engine/db.php');
require_once('config/config.php');
require_once('engine/resize.php');

$id = $_GET['id'];
$sql = "Select * from galery where id_galery = $id;";
$galery = getAssocResult($sql);


$sql = "UPDATE galery SET `view` = `view` + 1 where id_galery = $id";
executeQuery($sql);


?>
<div class="big_image">
<img src="<?=UPLOAD_DIR.$galery[0]['hash_file'] ?>" >

</div>
</body>
</html>