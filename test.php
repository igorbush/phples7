<?php
if (!file_exists(__DIR__ . '/tests/' . $_GET['test'] . '.json')) {
    header('HTTP/1.1 404 Not Found');
    echo "<body style='background: url(404.png) no-repeat; background-size: cover;'><div style='font-size: 50px;  display: block; text-transform: uppercase; text-align: center; color:#fff; margin: 0 auto;'>Вернитесь на <a href='admin.php'>Главную</a></div></body>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Решение Теста</title>
       <link href="https://fonts.googleapis.com/css?family=Oswald:400,700&amp;subset=cyrillic,latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="wrapper">
		<h1>Добро пожаловать на сайт самотестирования</h1>
		<nav>
			<ul>
				<li><a href="admin.php">Главная</a></li>
				<li><a href="list.php">Список Тестов</a></li>
			</ul>
		</nav>
		<h2>Заполните форму (Строго ФИО) и пройдите тест для получения диплома:</h2>
		<form method="post" action="certificate.php">
		<?php
		echo '<input class="fio" type="text" name="name" placeholder="ФИО (для диплома)"><br>';
		if (!empty($_GET['test'])) 
		{
			$file_dir = "tests/";
			$test_name = $_GET['test'];
			$test = file_get_contents($file_dir . $test_name . '.json');
			$test = json_decode($test, true);
			foreach($test as $qnumber => $qobj)
			{
			    if (isset($qnumber) && isset($qobj['answers']) && isset($qobj['question'])) 
			    {
				    echo '<p class="question">' . $qobj['question'] . '</p>';
				    foreach ($qobj['answers'] as $key => $answer) 
				    {
				        echo '<input class="test-radio" type="radio" name="a' . $qnumber . '" value="' . $key . '"> ';
				        echo $answer . "<br>";
			    	}
				}
			else 
			{
			    echo '<p class="before_button">Недопустимое содержание теста</p>';
			    exit;
			}
			}
		echo '<input type="hidden" name="test" value="' . $test_name . '">';
		echo '<input type="submit" value="Отправить" class="button">';
		}
		?>
		<p class="before_button">*ВНИМАНИЕ! После нажатия на кнопку "ОТПРАВИТЬ", Вам будет сгененирован диплом</p>
		</form>
	</div>
</body>
</html>