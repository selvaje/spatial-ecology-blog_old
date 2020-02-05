<?php
global $moWpnsUtility,$dirName;
if( isset( $_GET[ 'tab' ] ) ) {
		$active_tab = $_GET[ 'tab' ];
} else {
		$active_tab = 'default';
}
include_once $dirName . 'views'.DIRECTORY_SEPARATOR.'login_spam.php';
?>