<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Арт-паб Миля</title>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/style.css" />
	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/script.js"></script>
</head>
	<body>
		<?php $img=get_post_meta($post->ID=9, 'background1', 1); $src = wp_get_attachment_image_src( $img,'full'); ?>
		<section class="section1 menu_section1" style="background-image: url('<?php echo $src[0]; ?>')">
			<div class="container">
				<div class="header">
					<div class="logo"><?php the_custom_logo( $blog_id=0 ); ?></div>
					<div class="main_menu page_menu">
						<ul>
							<li><a href="/">Главная</a></li>
							<li><a href="/lend-menu">Меню</a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<section class="opisanie">
			<?php 
				global $more;
				while ( have_posts() ) : the_post();
					the_content();
				endwhile;
			?>
		</section>
	</body>
</html>