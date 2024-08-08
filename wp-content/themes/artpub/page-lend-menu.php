<?php
	function rus2translit($string) {
	    $converter = array(
	        'а' => 'a',   'б' => 'b',   'в' => 'v',
	        'г' => 'g',   'д' => 'd',   'е' => 'e',
	        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
	        'и' => 'i',   'й' => 'y',   'к' => 'k',
	        'л' => 'l',   'м' => 'm',   'н' => 'n',
	        'о' => 'o',   'п' => 'p',   'р' => 'r',
	        'с' => 's',   'т' => 't',   'у' => 'u',
	        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
	        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
	        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
	        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
	        
	        'А' => 'A',   'Б' => 'B',   'В' => 'V',
	        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
	        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
	        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
	        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
	        'О' => 'O',   'П' => 'P',   'Р' => 'R',
	        'С' => 'S',   'Т' => 'T',   'У' => 'U',
	        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
	        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
	        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
	        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
	    );
	    return strtr($string, $converter);
	}
	function transliterate($str) {
	    // переводим в транслит
	    $str = rus2translit($str);
	    // в нижний регистр
	    $str = strtolower($str);
	    // заменям все ненужное нам на "-"
	    $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
	    // удаляем начальные и конечные '-'
	    $str = trim($str, "-");
	    return $str;
	}
?>
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
	<div class="button_top"></div>
	<?php $img=get_post_meta($post->ID=9, 'background1', 1); $src = wp_get_attachment_image_src( $img,'full'); ?>
	<section class="section1 menu_section1" style="background-image: url('<?php echo $src[0]; ?>')">
		<div class="container">
			<div class="header">
				<div class="logo"><?php the_custom_logo( $blog_id=0 ); ?></div>
				<div class="main_menu page_menu">
					<ul>
						<li><a href="/">Главная</a></li>
						<?php 
							$sub_cats = get_categories( array(
								'child_of' => 2,
								'hide_empty' => 0
							) );
							if( $sub_cats ){
								foreach( $sub_cats as $cat ){
									echo '<li><a href="#'.transliterate($cat->name).'">'. $cat->name .'</a></li>';
								}
							}
						?>
					</ul>
				</div>
			</div>
		</div>
	</section>
		<?php 
			$sub_cats = get_categories( array(
				'child_of' => 2,
				'hide_empty' => 0
			) );
			if( $sub_cats ){
				foreach( $sub_cats as $cat ){
					echo '<section class="section_menu" id="'.transliterate($cat->name).'">';
					echo '<h2>'. $cat->name .'</h2><ul>';
					$myposts = get_posts( array(
						'post_type' => 'product_menu',
						'numberposts' => -1,
						'category'    => $cat->cat_ID,
						'order'       => 'ASC',
					) );
					# выводим записи
					global $post;
					foreach($myposts as $post){
						setup_postdata($post);
						?>
							<li>
								<div class="menu_it_img"><?php echo the_post_thumbnail('full'); ?></div>
								<p class="prod_name"><? echo get_the_title() ?></p>
								<p class="prod_ob">(<?php echo (get_post_meta($post->ID, 'tovar_kolvo', true)); ?>)</p>
								<p class="prod_cena"><?php echo (get_post_meta($post->ID, 'tovar_cena', true)); ?> руб</p>
							</li>
						<?
					}
					echo '</ul></section>';
				}
			}
		?>
</body>
</html>