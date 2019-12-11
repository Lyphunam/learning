<?php
if (isset($_GET['action'])) {
		if ($_GET['action'] == 'nhantin') {
			$datagv = $db->getInfoGV();
			$countgv = count($datagv);
			$datasv = $db->getInfoSV();
			$countsv = count($datasv);
		}
	}
	include_once('views/sinhvien/nhantin.php');
?>