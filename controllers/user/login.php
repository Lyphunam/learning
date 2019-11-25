<?php
	if (isset($_POST['login'])) {
		$user = $_POST['username'];
		$pass = $_POST['password'];
		if ($user && $pass) {
			$dblogin = new DBlogin;
			$dblogin->connect_DB();
			$num1 = $dblogin->get_Data_SV($user,$pass);
			$num2 = $dblogin->get_Data_GV($user,$pass);
			if ($num1 == 1) {
				$table = 'sinhvien';
				$data = $dblogin->getInFoSV($table,$user);
				$_SESSION['sinhvien'] = $user;
				$_SESSION['tensinhvien'] = $data['TENSV'];
				echo "<script>alert('Đăng nhập thành công!')</script>";
				header("location:index.php?controller=user&action=sinhvien");
			}
			else if ($num2 == 1) {
				$table = 'giaovien';
				$data = $dblogin->getInFoGV($table,$user);
				$_SESSION['giaovien'] = $user;
				$_SESSION['tengiaovien'] = $data['TENGIAOVIEN'];
				echo "<script>alert('Đăng nhập thành công!')</script>";
				header("location:index.php?controller=user&action=giaovien");
			}
			else{
				echo "<script>alert('Tên tài khoản hoặc mật khẩu không chính xác!')</script>";
			}
		}
	}
	include_once('views/user/login_view.php');
?>