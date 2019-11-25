
<?php
$User = new User();
$listed = $User->listed();
include_once('views/user/listed_view.php');
?>