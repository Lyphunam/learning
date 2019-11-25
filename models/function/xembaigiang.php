<?php
class Fun_XemBaiGiang{
	public function getLink($text){
		$arr = explode('/', $text);
		$n = count($arr);
		unset($arr[$n-1]);
		$result = implode('/', $arr)."/preview";
		echo $result;
	}

	function convertYoutube($string) {
		return preg_replace(
			"/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
			"<iframe width=\"100%\" height=\"500px\" src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
			$string
		);
	}


}
?>