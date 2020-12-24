<?php

function DownloadImage()
{
if ($_POST['OneFile'])
{
	$flag = false;
	
	$uploaddir = UPLOAD_DIR;
	$uploaddsmalldir = UPLOAD_SMALL_DIR;
	$my_hash_file = hash_file('md5', $_FILES['myfile']['tmp_name']). '.'. end(explode(".", $_FILES['myfile']['name']));
	$my_file_name = $_FILES['myfile']['name'];
	$destination = $uploaddir .'/' . $my_hash_file; 
	$destination_small = $uploaddsmalldir . $my_hash_file;


	
	if (file_exists($destination)) 
		{
			echo "Файл $my_file_name уже загружен <br>";
			$sql = "SELECT * FROM `galery` WHERE hash_file = '$my_hash_file';";
			$result = getRowResult($sql);
			if ($result)
			{
				echo "Файл уже загружен и запись в БД так же существует <br>";
			}
		} 
	else 
		{
			echo "Файл $my_file_name не существует <br>";
		
			if (move_uploaded_file($_FILES['myfile']['tmp_name'],$destination)) 
				{ 
					print "Файл успешно загружен <br>";
					
					
					echo $sql = "INSERT INTO `galery` (`id_galery`, `name_foto`, `hash_file`, `name_file`) VALUES (NULL, '$NameImg', '$my_hash_file', '$my_file_name')";
					executeQuery($sql);
					
					create_thumbnail($destination, $destination_small, 320, 320);
				} 
			else 
				{
				  echo "Произошла ошибка при загрузке файла.
					Некоторая отладочная информация:<br>";
					echo "<pre>";
					print_r($_FILES);
					echo "</pre>";
				}
		}
}

$sql = "Select * from galery ORDER BY view DESC";
return $galery = getAssocResult($sql);
}




?>


