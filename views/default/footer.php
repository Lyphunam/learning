<?php
	if (isset($_GET['action'])) {
		switch ($_GET['action']) {
			case 'login':
				echo '<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>';
				echo '<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>';
				break;
			case 'sinhvien':
				echo '<script src="assets/vendors/js/vendor.bundle.base.js"></script>';
				echo '<script src="assets/vendors/js/vendor.bundle.addons.js"></script>';
				echo '<script src="assets/js/off-canvas.js"></script>';
				echo '<script src="assets/js/misc.js"></script>';
				echo '<script src="assets/js/dashboard.js"></script>';
				echo '<script src="assets/js/myjs.js"></script>';
				echo '<script src="assets/js/jschat.js"></script>';
				break;
			case 'giaovien':
				echo '<script src="assets/vendors/js/vendor.bundle.base.js"></script>';
				echo '<script src="assets/vendors/js/vendor.bundle.addons.js"></script>';
				echo '<script src="assets/js/off-canvas.js"></script>';
				echo '<script src="assets/js/misc.js"></script>';
				echo '<script src="assets/js/dashboard.js"></script>';
				echo '<script src="assets/js/myjs.js"></script>';
				echo '<script src="assets/js/jschatgv.js"></script>';
				break;
			case 'xembaigianggv':
				echo '<script src="assets/vendors/js/vendor.bundle.base.js"></script>';
				echo '<script src="assets/vendors/js/vendor.bundle.addons.js"></script>';
				echo '<script src="assets/js/off-canvas.js"></script>';
				echo '<script src="assets/js/misc.js"></script>';
				echo '<script src="assets/js/dashboard.js"></script>';
				echo '<script src="assets/js/myjs.js"></script>';
				echo '<script src="assets/js/jschatgv.js"></script>';
				break;
			case 'thembaigiang':
				echo '<script src="assets/vendors/js/vendor.bundle.base.js"></script>';
				echo '<script src="assets/vendors/js/vendor.bundle.addons.js"></script>';
				echo '<script src="assets/js/off-canvas.js"></script>';
				echo '<script src="assets/js/misc.js"></script>';
				echo '<script src="assets/js/dashboard.js"></script>';
				echo '<script src="assets/js/myjs.js"></script>';
				echo '<script src="assets/js/jsbaigiang.js"></script>';
				echo '<script src="assets/js/jschatgv.js"></script>';
				break;
			case 'thembaigiangsv':
				echo '<script src="assets/vendors/js/vendor.bundle.base.js"></script>';
				echo '<script src="assets/vendors/js/vendor.bundle.addons.js"></script>';
				echo '<script src="assets/js/off-canvas.js"></script>';
				echo '<script src="assets/js/misc.js"></script>';
				echo '<script src="assets/js/dashboard.js"></script>';
				echo '<script src="assets/js/myjs.js"></script>';
				echo '<script src="assets/js/jsbaigiang.js"></script>';
				echo '<script src="assets/js/jschatgv.js"></script>';
				break;
			case 'thembaitap':
				echo '<script src="assets/vendors/js/vendor.bundle.base.js"></script>';
				echo '<script src="assets/vendors/js/vendor.bundle.addons.js"></script>';
				echo '<script src="assets/js/off-canvas.js"></script>';
				echo '<script src="assets/js/misc.js"></script>';
				echo '<script src="assets/js/dashboard.js"></script>';
				echo '<script src="assets/js/myjs.js"></script>';
				echo '<script src="assets/js/jsbaitap.js"></script>';
				echo '<script src="assets/js/jschatgv.js"></script>';
				break;
			case 'ketquakiemtra':
				echo '<script src="assets/vendors/js/vendor.bundle.base.js"></script>';
				echo '<script src="assets/vendors/js/vendor.bundle.addons.js"></script>';
				echo '<script src="assets/js/off-canvas.js"></script>';
				echo '<script src="assets/js/misc.js"></script>';
				echo '<script src="assets/js/dashboard.js"></script>';
				echo '<script src="assets/js/myjs.js"></script>';
				echo '<script src="assets/js/jsbaitap.js"></script>';
				echo '<script src="assets/js/jschatgv.js"></script>';
				break;
			case 'nhantingv':
				echo '<script src="assets/vendors/js/vendor.bundle.base.js"></script>';
				echo '<script src="assets/vendors/js/vendor.bundle.addons.js"></script>';
				echo '<script src="assets/js/off-canvas.js"></script>';
				echo '<script src="assets/js/misc.js"></script>';
				echo '<script src="assets/js/myjs.js"></script>';
				echo '<script src="assets/js/jquery-3.3.1.min.js"></script>';
				echo '<script src="assets/js/jschatgv.js"></script>';
				break;
			case 'xembaigiang':
				echo '<script src="assets/vendors/js/vendor.bundle.base.js"></script>';
				echo '<script src="assets/vendors/js/vendor.bundle.addons.js"></script>';
				echo '<script src="assets/js/off-canvas.js"></script>';
				echo '<script src="assets/js/misc.js"></script>';
				echo '<script src="assets/js/myjs.js"></script>';
				echo '<script src="assets/js/jschat.js"></script>';
				break;
			case 'lambaitap':
				echo '<script src="assets/vendors/js/vendor.bundle.base.js"></script>';
				echo '<script src="assets/vendors/js/vendor.bundle.addons.js"></script>';
				echo '<script src="assets/js/off-canvas.js"></script>';
				echo '<script src="assets/js/misc.js"></script>';
				echo '<script src="assets/js/myjs.js"></script>';
				echo '<script src="assets/js/jschat.js"></script>';
				break;
			case 'baikiemtra':
				echo '<script src="assets/vendors/js/vendor.bundle.base.js"></script>';
				echo '<script src="assets/vendors/js/vendor.bundle.addons.js"></script>';
				echo '<script src="assets/js/off-canvas.js"></script>';
				echo '<script src="assets/js/misc.js"></script>';
				echo '<script src="assets/js/myjs.js"></script>';
				echo '<script src="assets/js/jschat.js"></script>';
				echo '<script src="assets/js/jskiemtra.js"></script>';
				break;
			case 'nhantin':
				echo '<script src="assets/vendors/js/vendor.bundle.base.js"></script>';
				echo '<script src="assets/vendors/js/vendor.bundle.addons.js"></script>';
				echo '<script src="assets/js/off-canvas.js"></script>';
				echo '<script src="assets/js/misc.js"></script>';
				echo '<script src="assets/js/myjs.js"></script>';
				echo '<script src="assets/js/jquery-3.3.1.min.js"></script>';
				echo '<script src="assets/js/jschat.js"></script>';
				break;
		}
	}
?>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>