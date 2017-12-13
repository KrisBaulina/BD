<?php
//изменить статус в таблице запросом
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
if ($db->query('UPDATE `student` SET `status`="0" WHERE `id` = 5')->execute()) {
		echo 'выполнено!';
}else {
	echo 'Ошибка!';
}	



