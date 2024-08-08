<?php
	$sob_id=$_POST['sob_id'];
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
	global $wpdb;
	$posts = $wpdb->get_results("SELECT * FROM `wp_zakazi` WHERE sob_id = '$sob_id'");
	?>
	<div class="zakaz_header">
		<span>Дата и время заказа</span>
		<span>Телефон</span>
		<span>e-mail</span>
		<span>Количество мест</span>
		<span>Статус оплаты</span>
	</div>
	<?
	foreach ( $posts as $row ) {
		$data_time=$row->data_time;
		$phone=$row->phone;
		$email=$row->email;
		$kol_mest=$row->kol_mest;
		$pay_status=$row->pay_status;
		$id=$row->id;
		?>
		<div class="zakaz_tabl">
			<div class="zakaz_item" data-id="<?php echo $id; ?>">
				<span><?php echo $data_time; ?></span>
				<span><?php echo $phone; ?></span>
				<span><?php echo $email; ?></span>
				<span><?php echo $kol_mest; ?></span>
				<span><?php echo $pay_status; ?></span>
				<div class='knopka_udalit'>Удалить</div>
			</div>
		</div>
		<?
	}
	
?>