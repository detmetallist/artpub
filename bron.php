<?php
	$tel=$_POST['tel'];
	$email=$_POST['email'];
	$sob_id=$_POST['sobitie_id'];
	$kol_mest=$_POST['kol_mest'];
	$time=date('Y-m-d H:i:s');
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
	global $wpdb;
	$wpdb->query("INSERT INTO `wp_zakazi` (`sob_id`, `phone`, `email`, `kol_mest`, `data_time`) VALUES ('$sob_id', '$tel', '$email' , '$kol_mest', NOW())");
	$posts = $wpdb->get_results("SELECT `id` FROM `wp_zakazi` ORDER BY `id` DESC LIMIT 1");
	$id=$posts[0]->id;
	$cena=get_post_meta($sob_id, 'cena_vhoda', true);
	$text="Номер заказа - ".$id."\r\n Телефон - ".$tel."\r\n e-mail - ".$email."\r\n Событие - ".get_the_title($sob_id)."\r\n Количество мест - ".$kol_mest."\r\n Цена билета - ".$cena." руб.\r\n Сумма заказа - ".$cena*$kol_mest." руб.";
	send_mail(get_option( 'admin_email' ), 'Заказ билета', $text);
	echo $id;

	function send_mail($mail, $subject, $text)
	{
	    global $config;
	    mail($mail, $subject, $text, "From: noreply@".$_SERVER['HTTP_HOST'] . "\r\n" . "Reply-To: noreply@" . $_SERVER['HTTP_HOST'] . "\r\n" . "Content-type: text/plain; charset=utf-8\r\n" . "X-Mailer: PHP/" . phpversion());
	}
?>