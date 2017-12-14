<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Главная</title>
	<link href="https://fonts.googleapis.com/css?family=Oswald:400,700&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<link rel="stylesheet" href="styles.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
</head>
<body>
	<div class="wrapper">
		<form action="" method="POST">
			<input type="text" name="question"><br><br>
			<input type="text" name="answer1"><br><br>
			<input type="text" name="answer2"><br><br>
			<input type="text" name="answer3"><br><br>
			<input type="text" name="answer4"><br><br>
			<select name="corrected">
  				<option value="answer1">Ответ 1</option>
  				<option value="answer2">Ответ 2</option>
  				<option value="answer3">Ответ 3</option>
  				<option value="answer4">Ответ 4</option>
			</select><br><br>
			<input type="submit" value="Отправить"><br><br>
		</form>
	</div>
</body>
</html>

<?php 

if (!empty($_POST))
{

echo "<pre>";
print_r($_POST);
echo "</pre>";
	
	$json_test_new = ["question" => $_POST['question'], "answers" => ["answer1" => $_POST['answer1'], "answer2" => $_POST['answer2'], "answer3" => $_POST['answer3'], "answer4" => $_POST['answer4']], "corrected" => $_POST['corrected']];
}

$json_create = json_encode($json_test_new);
$aa = json_decode($json_create, true);

echo "<pre>";
print_r($aa);
echo "</pre>";



echo "<pre>";
print_r(json_decode(file_get_contents('test1.json'), true));
echo "</pre>";
?>


<!-- $json_data = array ('id'=>1,'name'=>"ivan",'country'=>'Russia',"office"=>array("yandex"," management")); -->