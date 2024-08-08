<?
	$sob_id=$_POST['sob_id'];
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
	global $wpdb;
	$wpdb->query("DELETE FROM `wp_zakazi` WHERE id='$sob_id'");
?>