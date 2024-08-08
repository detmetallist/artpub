<?php
	function rus_date($date){
		$month=date('m',strtotime($date));
		$day=date('d',strtotime($date));
		$converter = array(
	        '01' => 'января', 
	        '02' => 'февраля', 
	        '03' => 'марта',
	        '04' => 'апреля',
	        '05' => 'мая',
	        '06' => 'июня',
	        '07' => 'июля',
	        '08' => 'августа',
	        '09' => 'сентября',
	        '10' => 'октября',
	        '11' => 'ноября',
	        '12' => 'декабря'  
	    );
	    $rusmes=strtr($month, $converter);
	    $rusdate=$day.' '.$rusmes;
		return($rusdate);
	}
?>
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
	<div class="button_top"></div>
	<?php $img=get_post_meta($post->ID=9, 'background1', 1); $src = wp_get_attachment_image_src( $img,'full'); ?>
	<section class="section1 menu_section1" style="background-image: url('<?php echo $src[0]; ?>')">
		<div class="container">
			<div class="header">
				<div class="logo"><?php the_custom_logo( $blog_id=0 ); ?></div>
				<div class="main_menu page_menu">
					<ul>
						<li><a href="/">Главная</a></li>
						<li><a href="/lend-menu">Меню</a></li>
						<li><a href="/afisha">Афиша</a></li>
						<li><a href="/category/novosti/">Новости</a></li>
						<li><a href="/category/portfolio/">Портфолио</a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section class="afisha_section">
		<?php 
				global $wpdb;
				$i=1;
				$results = $wpdb->get_results( "SELECT * FROM wp_zakazi order by data_time" );
				foreach ( $results as $row ) {
					$sob_id=$row->sob_id;
					if($kol_mest[$sob_id]){
						$kol_mest[$sob_id]=$kol_mest[$sob_id]+$row->kol_mest;
					} else {
						$sob[$i]=$sob_id;
						$kol_mest[$sob_id]=$row->kol_mest;
						$i++;
					}
				}
		?>
		<?php
			$myposts = get_posts( array(
				'category' => 13,
				'numberposts' => -1,
				'order'       => 'ASC',
			) );
			# выводим записи
			global $post;
			foreach($myposts as $post){
				setup_postdata($post);
				?>
					<div class="afisha_item potfolio_item">
						<h2><? echo get_the_title() ?></h2>
						<p><?php echo rus_date(get_post_meta($post->ID, 'sobitie_data', true)); ?> в <?php echo (get_post_meta($post->ID, 'sobitie_time', true)); ?></p>
						<div class="afisha_img">
							<?php echo the_post_thumbnail('full'); ?>
							<div class="bronirovat">
								<?php the_excerpt();	?>		
							</div>
						</div>
					</div>
				<?
			}
		 ?>
	</section>
</body>
</html>