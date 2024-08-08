<?php
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 210, 210, true );
	add_filter( 'the_content_more_link', '__return_empty_string' );
	add_theme_support( 'custom-logo' );
	include (TEMPLATEPATH . '/functions/custom_fields.php');
	function load_custom_wp_admin_style() {
        wp_enqueue_script( 'my_custom_script', get_template_directory_uri() . '/js/my_admin_script.js' );
	}
	add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );
	add_action( 'init', 'cpt_register' );
	function cpt_register() {
		register_post_type( 'product_menu' , array(
			'label' => 'Меню продуктов',
			'singular_label' => 'Меню продуктов',
			'public' => true,
			'menu_position' => 6,
			'show_in_menu'        => TRUE,
	        'show_in_nav_menus'   => TRUE,
			'rewrite' => true,
			'has_archive' => true,
			'supports' => array( 'title', 'thumbnail','custom-fields'),
			'taxonomies'          => array( 'category' ),
		) );
		register_post_type( 'page_afisha' , array(
			'label' => 'Афиша',
			'singular_label' => 'Афиша',
			'public' => true,
			'menu_position' => 8,
			'show_in_menu'        => TRUE,
	        'show_in_nav_menus'   => TRUE,
			'rewrite' => true,
			'has_archive' => true,
			'supports' => array( 'title', 'thumbnail','custom-fields'),
			'taxonomies'          => array( 'category' ),
		) );
	}
	add_action('admin_menu', function(){
		add_menu_page( 'Заказы', 'Заказы', 'manage_options', 'site-options', 'admin_zakazy', '', 9 ); 
	} );
	function admin_zakazy() {
		?>
		<style>
			.zakazi_header, .zakazi_tabl p{
				display: flex;
				flex-direction: row;
			}
			.zakazi_header span{
				font-weight: bold;
				display: block;
			}
			.zakazi_header span:nth-child(1), .zakazi_tabl p span:nth-child(1){
				width: 150px;
			}
			.zakazi_header span:nth-child(2), .zakazi_tabl p span:nth-child(2){
				width: 300px;
			}
			.zakazi_header span:nth-child(3), .zakazi_tabl p span:nth-child(3), .zakazi_header span:nth-child(4), .zakazi_tabl p span:nth-child(4), .zakazi_header span:nth-child(5), .zakazi_tabl p span:nth-child(5){
				width: 130px;
			}
			.zakazi_tabl p span:nth-child(4), .zakazi_tabl p span:nth-child(5){
				text-align: center;
			}
			.zakazi_tabl p span{
				display: block;
				padding-top: 37px;
			}
			.zakazi_tabl img{
				width: 100px;
				margin-right: 50px;
				height: 100px;
			}
			.zakazi_tabl p{
				border-radius: 5px;
				box-shadow: 0 0 5px #9c9c9c;
				width: 810px;
				cursor: pointer;
			}
			.zakazi_tabl p:hover, .zakazi_tabl p.zakazi_tabl_active{
				box-shadow: 0 0 5px #689e00;
			}
			.pod_blokom_zakazov{
				display: none;
			}
			.pod_blokom_zakazov .zakaz_header, .pod_blokom_zakazov .zakaz_item{
				display: flex;
				flex-direction: row;
			}
			.pod_blokom_zakazov .zakaz_header span{
				font-weight: bold;
			}
			.pod_blokom_zakazov .zakaz_header span, .pod_blokom_zakazov .zakaz_item span{
				width: 200px;
				display: block;
			}
			.pod_blokom_zakazov .zakaz_item span:nth-child(4),.pod_blokom_zakazov .zakaz_item span:nth-child(5){
				text-align: center;
				width: 130px;
			}
			.pod_blokom_zakazov .zakaz_header span:nth-child(4), .pod_blokom_zakazov .zakaz_header span:nth-child(5){
				width: 130px;
			}
			.popup{
				position: fixed;
				width: 100%;
				height: 100%;
				left: 0;
				top: 0;
				z-index: 100;
				display: none;
			}
			.popup_over{
				width: 100%;
				height: 100%;
				left: 0;
				top: 0;
				background-color: rgba(0,0,0,0.8);
				z-index: 110;
				cursor: pointer;
			}
			.popup_bron{
				width: 500px;
			    position: absolute;
			    top: 0;
			    z-index: 120;
			    background-color: #fff;
			    bottom: 0;
			    margin: auto;
			    height: 400px;
			    left: 0;
			    right: 0;
			    border-radius: 5px;
			    box-shadow: 0px 0px 30px #fff;
			    text-align: center;
			}
			.popup_bron h2{
				font-size: 30px;
				padding-top: 30px;
				margin-bottom: 20px;
				margin: 0;
			}
			.popup_bron form p{
				font-size: 18px;
				margin:0;
			}
			.popup_bron form input{
				font-size: 16px;
				margin-bottom: 10px;
				width: 300px;
			}
			.popup_bron form button{
				margin: 0 auto;
			    display: block;
			    cursor: pointer;
			    font-family: Philosopher;
			    font-weight: bold;
			    font-size: 30px;
			    padding: 12px 24px;
			    background-color: #3b2301;
			    color: #fff;
			    border: none;
			    border-radius: 20px;
			    box-shadow: 0px 0px 15px #3b2301;
			    transition: all 0.2s;
			    margin-top: 25px;
			}
			.popup_bron form button:hover{
				-webkit-transform: scale(1.1);
				transform:scale(1.1);
			}
			.form_bron select{
				width: 300px;
				margin-top: 18px;
			}
			.knopka_udalit{
				border: 1px solid #5c5c5c;
			    border-radius: 5px;
			    padding: 2px 5px;
			    margin-bottom: 8px;
			    cursor: pointer;
			}
			button{
				cursor: pointer;
			}
		</style>
		<div class="wrap">
			<h2><?php echo get_admin_page_title() ?></h2>
			<div class="zakazi_header">
				<span>Картинка события</span>
				<span>Название события</span>
				<span>Дата события</span>
				<span>Количество мест</span>
				<span>Осталось мест</span>
			</div>
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
					$ostalos_mest[$sob_id]=get_post_meta($sob_id, 'sobitie_kol_mest', true)-$kol_mest[$sob_id];
				}
				for($j=1; $j<$i; $j++){
					if($j==1){
						$kusok_zaprosa="ID='".$sob[$j]."'";
					} else {
						$kusok_zaprosa.=" OR ID='".$sob[$j]."'";
					}
				}
				$zapros1="SELECT ID, post_title FROM wp_posts WHERE ".$kusok_zaprosa." ORDER BY ID";
				$results = $wpdb->get_results( $zapros1 );
				foreach ( $results as $row ) {
					$id=$row->ID;
					$title[$id]=$row->post_title;
				}
			?>
			<div class="zakazi_tabl">
				<?php
					for($j=1; $j<$i; $j++){
						$sob_id=$sob[$j];
						if(strtotime(get_post_meta($sob_id, 'sobitie_data', true).' '.get_post_meta($sob_id, 'sobitie_time', true))>time()){
							echo "<div class='block_zakazov'><p data-sob-id='".$sob_id."'>".get_the_post_thumbnail( $sob_id, 'full' )."<span>".$title[$sob_id]."</span><span>".get_post_meta($sob_id, 'sobitie_data', true)." ".get_post_meta($sob_id, 'sobitie_time', true)."</span><span>".$kol_mest[$sob_id]."</span><span>".$ostalos_mest[$sob_id]."</span></p><div class='pod_blokom_zakazov'></div></div>";
						}
					}
				?>
			</div>
			<button class="bronirovat_button">Добавить заказ</button>
			<div class="popup">
				<div class="popup_over"></div>
				<div class="popup_bron">
					<h2>Заказ брони</h2>
					<form class="form_bron">
						<select name="sobitie_id">
		                    <option selected="selected">Выберете событие</option>
		                    <?php 
		                    	for($j=1; $j<$i; $j++){
		                    		$sob_id=$sob[$j];
		                    		if(strtotime(get_post_meta($sob_id, 'sobitie_data', true).' '.get_post_meta($sob_id, 'sobitie_time', true))>time()){
		                    			echo "<option value='".$sob_id."'>".$title[$sob_id].". Осталось мест - ".$ostalos_mest[$sob_id]."</option>";
		                    		}
		                    	}
		                    ?>
		                </select>
						<p>Ваш телефон</p>
						<input type="text" name="tel" placeholder="Телефон" required>
						<p>e-mail, на который придёт билет</p>
						<input type="text" name="email" placeholder="e-mail" required>
						<p>Сколько мест забронировать?</p>
						<input type="text" name="kol_mest" placeholder="Количество мест" required>
						<button>Забронировать</button>
					</form>
				</div>
			</div>
		</div>
		<?
	}



add_filter( 'excerpt_length', function(){
	return 40;
} );
add_filter( 'excerpt_more', 'new_excerpt_more' );
function new_excerpt_more( $more ){
	global $post;
	return '<br><a href="'. get_permalink($post) . '">Читать дальше...</a>';
}

?>