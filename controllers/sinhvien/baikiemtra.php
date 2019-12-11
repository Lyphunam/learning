<?php
if (isset($_GET['action'])) {
		if ($_GET['action'] == 'baikiemtra') {
			$datagv = $db->getInfoGV();
			$countgv = count($datagv);
			$datasv = $db->getInfoSV();
			$countsv = count($datasv);
		}
	}
	include_once('views/sinhvien/baikiemtra.php');
?>