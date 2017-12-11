<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Список Тестов</title>
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
        <h2>Выберите интересующий тест:</h2>
        <?php
        $file_dir = "tests/";
        if ($file_dir = opendir($file_dir)) 
        {
            while (false !== ($entry = readdir($file_dir))) 
            {
                if ($entry != "." && $entry != "..") 
                {
                	$test_name = explode('.',$entry)[0];
        ?>
        <a class ="list-href" href="test.php?test=<?=$test_name?>"><?= $test_name ?></a>
        <?php
                }
            }
            closedir($file_dir);
        }
        ?>
    </div>
</body>
</html>