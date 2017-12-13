
<a href="index1.php?status=1">Текущие студенты</a>
<a href="index1.php?status=0">Бывшие студенты</a>

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
if (isset($_GET['status'])){
	$studentsQuery = $db
		->prepare('SELECT * FROM `student` WHERE `status`= :status');
		
	$students = $studentsQuery
		->execute(['status' => $_GET ['status']]);
	$students=$studentsQuery
		->fetchAll(PDO::FETCH_ASSOC);
	Foreach ($students as $student) {
		echo "<p>" . 
			htmlspecialchars($student['lastName']) . "<a href='index3.php?id=" . urlencode($student['id']) . "'> Закончил обучение</a></p>";
	}
}

// выводит количество учащихся студентов
// $result=$db 
	// ->query('SELECT COUNT(*) `count` FROM student WHERE STATUS=1')
	// ->fetch(PDO::FETCH_ASSOC);
	// echo 'У нас учатся ' .  $result['count'] . ' студентов';
	
	