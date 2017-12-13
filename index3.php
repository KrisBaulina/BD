<?php
$dbParams=require(
	'db.php'
);
$db=new PDO(
	"mysql:host=localhost;dbname=" . 
		$dbParams['database'] .
		";charset=utf8",
	$dbParams['username'],
	$dbParams['password']
);
$updateQuery= $db->prepare ('UPDATE `student` SET `status`="0" WHERE `id` = :id');
if ($updateQuery-> execute(['id' => $_GET ['id']])){
		echo 'выполнено!';
}else {
	echo 'Ошибка!';
}	
