<?php
if (isset($_GET['action'])) {
		if ($_GET['action'] == 'thembaigiang') {
			$Fun_XBG = new Fun_XemBaiGiang;
			$data = $db->get_name_subject();
			$count = count($data);
			$data_LBG = $db->get_name_LBG();
			$count_LBG = count($data_LBG);
		}
	}
	include_once('views/giaovien/thembaigiang.php');
?>