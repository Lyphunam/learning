<?php
if (isset($_GET['action'])) {
		if ($_GET['action'] == 'thembaitap') {
			$Fun_XBG = new Fun_XemBaiGiang;
			$data = $db->get_name_subject();
			$count = count($data);
		}
	}
	include_once('views/giaovien/thembaitap.php');
?>