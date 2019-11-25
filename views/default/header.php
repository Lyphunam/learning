<?php
ob_start();
session_start();
$page = $_SERVER['PHP_SELF'];
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php
if(isset($_GET['action'])){
		switch ($_GET['action']) {
			case 'login':
				echo '<title>TCU - Learning</title>';
				echo '<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">';
				echo '<link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">';
				echo '<link rel="stylesheet" href="assets/libs/css/style.css">';
				echo '<link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">';
				echo '<link rel="stylesheet" href="assets/css/mycss.css">';
				break;
			case 'sinhvien':
				echo '<title>Sinh viên</title>';
				echo ' <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">';
				echo '<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">';
				echo '<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">';
				echo '<link rel="stylesheet" href="assets/css/style.css">';
				break;
			case 'giaovien':
				echo '<title>Giáo viên</title>';
				echo ' <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">';
				echo '<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">';
				echo '<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">';
				echo '<link rel="stylesheet" href="assets/css/style.css">';
				break;
			case 'xembaigianggv':
				echo '<title>Xem bài giảng giáo viên</title>';
				echo ' <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">';
				echo '<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">';
				echo '<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">';
				echo '<link rel="stylesheet" href="assets/css/style.css">';
				break;
			case 'thembaigiang':
				echo '<title>Thêm bài giảng</title>';
				echo '<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">';
				echo ' <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">';
				echo '<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">';
				echo '<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">';
				echo '<link rel="stylesheet" href="assets/css/style.css">';
				break;
			case 'thembaitap':
				echo '<title>Thêm bài tập</title>';
				echo '<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">';
				echo ' <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">';
				echo '<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">';
				echo '<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">';
				echo '<link rel="stylesheet" href="assets/css/style.css">';
				break;	
			case 'ketquakiemtra':
				echo '<title>Kết quả kiểm tra</title>';
				echo '<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">';
				echo ' <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">';
				echo '<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">';
				echo '<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">';
				echo '<link rel="stylesheet" href="assets/css/style.css">';
				break;	
			case 'nhantingv':
				echo '<title>Nhắn tin giáo viên</title>';
				echo ' <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">';
				echo '<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">';
				echo '<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">';
				echo '<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">';
				echo '<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">';
				echo '<link rel="stylesheet" href="assets/vendors/icheck/skins/all.css">';
				echo '<link rel="stylesheet" href="assets/css/style.css">';
				echo '<link rel="stylesheet" type="text/css" href="assets/css/stylechat.css">';
				break;
			case 'xembaigiang':
				echo '<title>Xem bài giảng</title>';
				echo ' <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">';
				echo '<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">';
				echo '<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">';
				echo '<link rel="stylesheet" href="assets/vendors/icheck/skins/all.css">';
				echo '<link rel="stylesheet" href="assets/css/style.css">';
				break;
			case 'lambaitap':
				echo '<title>Làm bài tập</title>';
				echo ' <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">';
				echo '<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">';
				echo '<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">';
				echo '<link rel="stylesheet" href="assets/vendors/icheck/skins/all.css">';
				echo '<link rel="stylesheet" href="assets/css/style.css">';
				break;
			case 'baikiemtra':
				echo '<title>Bài kiểm tra</title>';
				echo ' <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">';
				echo '<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">';
				echo '<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">';
				echo '<link rel="stylesheet" href="assets/vendors/icheck/skins/all.css">';
				echo '<link rel="stylesheet" href="assets/css/style.css">';
				echo '<link rel="stylesheet" href="assets/css/stylekiemtra.css">';
				break;
			case 'nhantin':
				echo '<title>Nhắn tin</title>';
				if (isset($_POST['ntsv'])) {
					echo '<meta http-equiv="refresh" content="1"';
				}
				echo ' <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">';
				echo '<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">';
				echo '<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">';
				echo '<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">';
				echo '<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">';
				echo '<link rel="stylesheet" href="assets/vendors/icheck/skins/all.css">';
				echo '<link rel="stylesheet" href="assets/css/style.css">';
				echo '<link rel="stylesheet" type="text/css" href="assets/css/stylechat.css">';
				break;
		}
	}
?>
</head>
<body>
	  
  
    