<?php
	$pay=$_GET['pay'];
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
	<div class="popup">
		<div class="popup_over"></div>
		<div class="popup_bron">
			<h2>Заказ брони</h2>
			<form class="form_bron">
				<p>Ваш телефон</p>
				<input type="text" name="tel" placeholder="Телефон" required>
				<p>e-mail, на который придёт билет</p>
				<input type="text" name="email" placeholder="e-mail" required>
				<p>Сколько мест забронировать?</p>
				<input type="text" name="kol_mest" placeholder="Количество мест" required>
				<input type="hidden" name="sobitie_id">
				<button>Забронировать</button>
			</form>
		</div>
		<div class="popup_pay">
			<h2>Оплата</h2>
			<p class="oplata_text"></p>
			<form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml">    
				<input type="hidden" name="receiver" value="<?php echo do_shortcode('[sc name="yandex-money"]'); ?>">    
				<input type="hidden" name="formcomment" value="Оплата брони Арт-паб">    
				<input type="hidden" name="short-dest" value="Оплата брони Арт-паб">    
				<input type="hidden" name="label" value="$order_id">    
				<input type="hidden" name="quickpay-form" value="donate">    
				<input type="hidden" name="targets" value="транзакция {order_id}">    
				<input type="hidden" name="sum" value="" data-type="number">    
				<input type="hidden" name="comment" value="Оплата брони Арт-паб">       
				<input type="hidden" name="need-phone" value="false">    
				<input type="hidden" name="successURL" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/afisha?pay=1' ?>">    
				<input type="hidden" name="need-address" value="false">    
				  <label style="display: none;"><input type="radio" name="paymentType" value="PC">Яндекс.Деньгами</label>    
				  <label style="display: none;"><input type="radio" name="paymentType" value="AC" checked="checked">Банковской картой</label>   
				<button type="submit">Оплатить</button>
			</form>
		</div>
		<div class="popup_thanks"><p>Спасибо за приобретение билета!<br>Проверьте свой e-mail</p></div>
	</div>
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
				$results = $wpdb->get_results( "SELECT * FROM wp_zakazi WHERE pay_status='1' order by data_time" );
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
				'post_type' => 'page_afisha',
				'numberposts' => -1,
				'order'       => 'ASC',
			) );
			# выводим записи
			global $post;
			foreach($myposts as $post){
				setup_postdata($post);
				?>
					<?php if(strtotime(get_post_meta($post->ID, 'sobitie_data', true).' '.get_post_meta($post->ID, 'sobitie_time', true))>time()): ?>
					<div class="afisha_item">
						<h2><? echo get_the_title() ?></h2>
						<p><?php echo rus_date(get_post_meta($post->ID, 'sobitie_data', true)); ?> в <?php echo (get_post_meta($post->ID, 'sobitie_time', true)); ?></p>
						<div class="afisha_img">
							<?php echo the_post_thumbnail('full'); ?>
							<?php 
								if(get_post_meta($post->ID, 'cena_vhoda', true)){
									$cena=get_post_meta($post->ID, 'cena_vhoda', true);
								} else $cena=0;
								if($cena!=0){
									?>
										<div class="bronirovat">
											<?php 
												$sob_id=$post->ID;
												$kol_mest_vsego=get_post_meta($post->ID, 'sobitie_kol_mest', true);
												$kol_mest_ostalos=$kol_mest_vsego-$kol_mest[$sob_id];
											?>
											<p>Стоимость одного места - <?php echo $cena ?>руб.<br>Осталось мест - <?php echo $kol_mest_ostalos; ?><br>Хотите забронировать места?</p>
											<button data-sob-id="<?php echo $post->ID; ?>" data_mest="<?php echo $kol_mest_ostalos; ?>">Забронировать</button>
										</div>
									<?
								}
							?>	
						</div>
					</div>
					<?php endif; ?>
				<?
			}
		 ?>
	</section>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		var pay='<?php echo $pay; ?>';
		if(pay=='1'){
			$(".popup").fadeIn(300).delay(5000).fadeOut(300);
			$(".popup_bron").fadeOut(300);
            $(".popup_pay").fadeOut(300);
            $(".popup_thanks").fadeIn(300).delay(5000).fadeOut(300);
		}
	});
</script>
</html>