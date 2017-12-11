<?php
$true = 0;
$false = 0;
if (!empty($_POST)) 
{
	$name = htmlspecialchars($_POST['name']);
	$file_dir = "tests/";
	$test_name = $_POST['test'];
	$test = file_get_contents($file_dir . $test_name . '.json');
	$test = json_decode($test, true); 
	    foreach($test as $qnumber => $qobj)
		{ 
	    	if (isset($qnumber) && isset($_POST['a' . $qnumber])) 
	    	{
	    		if( $qobj['corrected'] == $_POST['a' . $qnumber] ) 
	    		{
	        		$true++; 
	    		} 
	    		else 
	    		{
	       			$false++;
				}
			} else 
			{
	    		echo "Вы не ответили на все вопросы";
	    		exit;
			}
		}
	// echo $name;
	// echo 'Правильно: ' . $true . '<br>';
	// echo 'Неправильно: ' . $false . '<br>';
}

if ($true > $false) {
	$result = 'Успешно прошел какой то тест =)';
}
elseif ($true <= $false) {
	$result = 'БЕЗуспешно прошел какой то тест =)';
}

$image = imagecreatetruecolor(960, 688);
$text_color = imagecolorallocate($image, 79, 91, 147);
$inbox = imagecreatefrompng('certificate.png');
$font = __DIR__ . '/roboto-light.ttf';
imagecopy($image, $inbox, 0, 0, 0, 0, 960, 688);
imagettftext($image, 24, 0, 250, 340, $text_color, $font, $name);
imagettftext($image, 20, 0, 255, 400, $text_color, $font, $result);
header("Content-type: image/png");
$img = imagepng($image);
imagedestroy($image);
?>
