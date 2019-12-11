
<?php
include_once('views/default/header.php');
include_once('models/database/DBconfig.php');
include_once('models/database/DBlogin.php');
include_once('models/function/xembaigiang.php');
$db = new Database;
$db->connect_DB();



if(isset($_GET['controller'])){
	switch($_GET['controller']){
		
		case 'user': include_once('controllers/user/controller.php');
		break;
		case 'product': include_once('controllers/product/product.php');
		break;
	}
}
else{
	header('location: index.php?controller=user&action=login');
}



include_once('views/default/footer.php');
?>















