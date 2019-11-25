<?php
if(isset($_GET['action'])){
	
	switch($_GET['action']){
		
		case 'login': include_once('controllers/user/login.php');
		break;
		case 'add': include_once('controllers/user/add.php');
		break;
		case 'edit': include_once('controllers/user/edit.php');
		break;
		case 'del': include_once('controllers/user/del.php');
		break;
		case 'listed': include_once('controllers/user/listed.php');
		break;
		case 'sinhvien': include_once('controllers/user/sinhvien.php');
		break;
		case 'giaovien': include_once('controllers/user/giaovien.php');
		break;
		case 'xembaigianggv': include_once('controllers/giaovien/xembaigiang.php');
		break;
		case 'nhantingv': include_once('controllers/giaovien/nhantin.php');
		break;
		case 'xembaigiang': include_once('controllers/sinhvien/xembaigiang.php');
		break;
		case 'lambaitap': include_once('controllers/sinhvien/lambaitap.php');
		break;
		case 'baikiemtra': include_once('controllers/sinhvien/baikiemtra.php');
		break;
		case 'nhantin': include_once('controllers/sinhvien/nhantin.php');
		break;
		case 'thembaigiang': include_once('controllers/giaovien/thembaigiang.php');
		break;
		case 'thembaitap': include_once('controllers/giaovien/thembaitap.php');
		break;
		case 'ketquakiemtra': include_once('controllers/giaovien/ketquakiemtra.php');
		break;
		
	}
}
?>