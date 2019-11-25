<?php
error_reporting();

if (isset($_POST['tin_nhan']) && !empty($_POST['tin_nhan']) && isset($_POST['may']) && !empty($_POST['may'])) {
	$tin_nhan = $_POST['tin_nhan'];
	$may = $_POST['may'];
	$may1 = $_POST['may1'];
	$may2 = $_POST['may2'];
	$name1 = $may1.$may2.".txt";
	$name2 = $may2.$may1.".txt";
	if (file_exists("../../assets/chat/".$name1)) {
		$name = $name1;
		if ($may == $may2) {
		$fileName = "../../assets/chat/".$name;
		$fs = fopen($fileName, 'a') or die("can't open file"); //Mở tập tin ở chế độ overite
		fwrite($fs, "may1-".$tin_nhan."\n");
		}
		if ($may == $may1) {
			$fileName = "../../assets/chat/".$name;
			$fs = fopen($fileName, 'a') or die("can't open file"); //Mở tập tin ở chế độ overite
			fwrite($fs, "may2-".$tin_nhan."\n");
		}
	}
	else{
		$fs = fopen("../../assets/chat/".$name2, "a");
		$name = $name2;
		if ($may == $may1) {
		$fileName = "../../assets/chat/".$name;
		$fs = fopen($fileName, 'a') or die("can't open file"); //Mở tập tin ở chế độ overite
		fwrite($fs, "may1-".$tin_nhan."\n");
		}
		if ($may == $may2) {
			$fileName = "../../assets/chat/".$name;
			$fs = fopen($fileName, 'a') or die("can't open file"); //Mở tập tin ở chế độ overite
			fwrite($fs, "may2-".$tin_nhan."\n");
		}
	}

	
	fclose($fs);
}


?>	