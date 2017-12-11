<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Главная</title>
	<link href="https://fonts.googleapis.com/css?family=Oswald:400,700&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<link rel="stylesheet" href="styles.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
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
		<h2>Для начала загрузите файл теста:</h2>
		<form method="post" enctype="multipart/form-data" action="admin.php">
			<div class="file-upload">
			     <label>
			          <input type="file" name="uploaded_file">
			          <span>Выбрать файл</span>
			     </label>
			</div>
			<input type="text" id="filename" class="filename" disabled>
			<input type="submit" value="Загрузить" class="button">
		</form>
		<?php
			$file_dir = "tests/";
			if(isset($_FILES['uploaded_file']['name']) && !empty($_FILES['uploaded_file']['name']))
			{
				$filename = htmlspecialchars($_FILES['uploaded_file']['name']);
				$target_file = $file_dir . basename($_FILES['uploaded_file']['name']);
				$file_type = pathinfo($target_file, PATHINFO_EXTENSION);
				if($file_type != "json") 
				{
				    echo "<p class='sub_text'>Ошибка: файл НЕ загружен! Файл должен быть типа .json</p>";
				    exit;
			    }
				if($_FILES['uploaded_file']['error'] === UPLOAD_ERR_OK && move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $target_file))
				{
					echo "<p class=\'sub_text\'>Файл загружен</p>"; 
					header('Location: ' . 'list.php');
				}
				else
				{
					echo "<p class=\'sub_text\'>Файл НЕ загружен</p>";
				}
				
			}
		?>
		<p class="before_button">*ВНИМАНИЕ! После нажатия на кнопку "ЗУГРУЗИТЬ", Вы будете перенаправленны на страницу со списком загруженных тестов</p>
	</div>
	    <script>
			$(document).ready( function() {
		    $(".file-upload input[type=file]").change(function(){
		         var filename = $(this).val().replace(/.*\\/, "");
		         $("#filename").val(filename);
		    });
		});
	</script>
</body>
</html>