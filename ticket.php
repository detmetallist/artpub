<?php
	$id=$_GET['id'];
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
	global $wpdb;
	$posts = $wpdb->get_results("SELECT * FROM `wp_zakazi` WHERE id = '$id'");
	$sob_id=$posts[0]->sob_id;
	$cena=get_post_meta($sob_id, 'cena_vhoda', true);
	$kol_mest=$posts[0]->kol_mest;
	$sum=$cena*$kol_mest;
	$phone=$posts[0]->phone;
	$email=$posts[0]->email;
	$img=get_the_post_thumbnail( $sob_id, 'full' );
?>
<div class="ticket">
	<div class="ticket_left"><?php echo $img; ?></div>
	<div class="ticket_right">
		<h1>Билет №<?php echo $id; ?></h1>
		<p>Ваш телефон - <?php echo $phone; ?></p>
		<p>Ваш e-mail - <?php echo $email; ?></p>
		<p>Цена места - <?php echo $cena; ?>руб.</p>
		<p>Количество мест - <?php echo $kol_mest; ?></p>
		<p>Общая сумма - <?php echo $sum; ?>руб.</p>
	</div>
</div>
<style>
	@font-face {
	    font-family: 'Philosopher';
	    src: local('Philosopher'), local('Philosopher'), url('wp-content/themes/artpub/fonts/Philosopher.woff2') format('woff2'), url('wp-content/themes/artpub/fonts/Philosopher.woff') format('woff'), url('wp-content/themes/artpub/fonts/Philosopher.ttf') format('truetype');
	    font-weight: 400;
	    font-style: normal;
	}
	@font-face {
	    font-family: 'roboto';
	    src: local('roboto'), local('roboto'), url('wp-content/themes/artpub/fonts/Roboto.woff2') format('woff2'), url('wp-content/themes/artpub/fonts/Roboto.woff') format('woff'), url('wp-content/themes/artpub/fonts/Roboto.ttf') format('truetype');
	    font-weight: 400;
	    font-style: normal;
	}
	html, body, div, span, applet, object, iframe,
	h1, h2, h3, h4, h5, h6, p, blockquote, pre,
	a, abbr, acronym, address, big, cite, code,
	del, dfn, em, img, ins, kbd, q, s, samp,
	small, strike, strong, sub, sup, tt, var,
	b, u, i, center,
	dl, dt, dd, ol, ul, li,
	fieldset, form, label, legend,
	table, caption, tbody, tfoot, thead, tr, th, td,
	article, aside, canvas, details, embed,
	figure, figcaption, footer, header, hgroup,
	menu, nav, output, ruby, section, summary,
	time, mark, audio, video {
	    margin: 0;
	    padding: 0;
	    border: 0;
	    font-family: Philosopher;
	}
	.ticket{
		display: flex;
		margin:25px auto;
		flex-direction: row;
		width: 1000px;
		border-radius: 20px;
		overflow: hidden;
		box-shadow: 0 0 10px #000;
		height: 490px;
	}
	.ticket_left, .ticket_right{
		width: 50%;
	}
	.ticket_left img{
		width: 100%;
		height: auto;
	}
	.ticket_right{
		background: url('/wp-content/uploads/2019/02/cropped-logo-2.png') bottom center no-repeat;
	}
	.ticket_right h1{
		font-size: 50px;
		text-align: center;
		padding-top: 25px;
		margin-bottom: 25px;
	}
	.ticket_right p{
		font-size: 25px;
		padding-left: 20px;
	}
</style>