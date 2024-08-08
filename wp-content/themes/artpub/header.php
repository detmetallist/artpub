<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title('|', true, 'right'); ?></title>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/style.css" />
	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/script.js"></script>
</head>
<body>
	<?php $img=get_post_meta($post->ID, 'background1', 1); $src = wp_get_attachment_image_src( $img,'full'); ?>
	<section class="section1" style="background-image: url('<?php echo $src[0]; ?>')">
		<div class="container">
			<div class="header">
				<div class="logo"><?php the_custom_logo( $blog_id=0 ); ?></div>
				<div class="main_menu">
					<ul>
						<li><a href="#menu">Меню</a></li>
						<li><a href="#afisha">Афиша</a></li>
						<li><a href="#contacts">Контакты</a></li>
						<li><a href="/category/novosti/">Новости</a></li>
						<li><a href="/category/portfolio/">Портфолио</a></li>
					</ul>
				</div>
			</div>
			<div class="zagol"><h1><?php echo get_post_meta($post->ID, 'zagolovok', 1); ?></h1></div>
			<div class="linia"></div>
			<div class="podzagol"><p><?php echo get_post_meta($post->ID, 'podzagolovok', 1); ?></p></div>
		</div>
	</section>