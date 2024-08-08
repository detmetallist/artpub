<?php
	$id=$_POST['id'];
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
	$posts = $wpdb->get_results("SELECT `sob_id` FROM `wp_zakazi` WHERE `id`='$id'");
	$sob_id=$posts[0]->sob_id;
	$cena=get_post_meta($sob_id, 'cena_vhoda', true);
	echo $cena;
?>