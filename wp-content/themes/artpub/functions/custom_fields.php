<?php
	add_action('add_meta_boxes', 'my_extra_fields', 1);
	function my_extra_fields() {
		global $post;
	    if ( $post->post_title=='Главная'  ) {
	    	add_meta_box( 'extra_fields', 'Параметры главной', 'extra_fields_mainpage_func', 'page', 'normal', 'high'  );
	    }
	    add_meta_box( 'extra_fields', 'Страница продукта', 'extra_fields_product_menu_func', 'product_menu', 'normal', 'high'  );
	    add_meta_box( 'extra_fields', 'Афиша', 'extra_fields_afisha_menu_func', 'page_afisha', 'normal', 'high'  );
	}
	function extra_fields_afisha_menu_func( $post ){
		?>
			<style>
				.postbox#postcustom{
					display: none;
				}
			</style>
			<h1>Событие афиши</h1>
			<p><b>Дата события, в формате день.месяц.год, например 10.02.2019</b></p>
			<input  type="text" name="extra[sobitie_data]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'sobitie_data', 1);?>" placeholder="Дата события"/><br>
			<p><b>Время события, разделять знаком :</b></p>
			<input  type="text" name="extra[sobitie_time]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'sobitie_time', 1);?>" placeholder="Время события"/><br>
			<p><b>Количество мест</b></p>
			<input  type="text" name="extra[sobitie_kol_mest]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'sobitie_kol_mest', 1);?>" placeholder="Количество мест"/><br>
			<p><b>Цена входа, руб</b></p>
			<input  type="text" name="extra[cena_vhoda]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'cena_vhoda', 1);?>" placeholder="Цена входа, руб"/><br>
			<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
		<?
	}
	function extra_fields_product_menu_func( $post ){
		?>
			<style>
				.postbox#postcustom{
					display: none;
				}
			</style>
			<h1>Редактирование товара</h1>
			<p><b>Количество</b></p>
			<input  type="text" name="extra[tovar_kolvo]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'tovar_kolvo', 1);?>" placeholder="Количество"/><br>
			<p><b>Цена, руб</b></p>
			<input  type="text" name="extra[tovar_cena]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'tovar_cena', 1);?>" placeholder="Цена"/><br>
			<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
		<?
	}
	function extra_fields_mainpage_func( $post ){
		?>
			<style>
				 .edit-post-visual-editor{
					display: none;
				}
				.admblock h2{
					font-weight: bold !important;
					font-size: 18px !important;
				}
				.admblock .socseti{
					display: flex;
					flex-direction: row;
					justify-content: space-between;
				}
				.postbox#postcustom{
					display: none;
				}
			</style>
			<div class="admblock">
				<h1>Настройки главной страницы</h1>
				<h2>Экран 1</h2>
				<p><b>Заголовок</b></p>
				<input  type="text" name="extra[zagolovok]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'zagolovok', 1);?>" placeholder="Заголовок"/><br>
				<p><b>Подзаголовок</b></p>
				<textarea wrap="soft" rows="4" name="extra[podzagolovok]" style="width: 100%"><?php echo get_post_meta($post->ID, 'podzagolovok', 1);?></textarea>
				<input id="image-url1" type="hidden" name="extra[background1]" style="width: 100px"  value="<?php echo get_post_meta($post->ID, 'background1', 1);?>"/><br>
				<input    role="1" type="button" class="buttonupload btn" value="Выберите изображение фона" />
				<div id="upli1">
				<?php if(get_post_meta($post->ID, 'background1', true)):?>
				<?php $img=get_post_meta($post->ID, 'background1', 1); $src = wp_get_attachment_image_src( $img,'full');?>
				<img src="<?php echo $src[0]; ?>" style="height: 100px; width: auto; margin: 10px 0">
				<?php endif;?> 
				</div><!-- upli -->
				<?php if(get_post_meta($post->ID, 'background1', true)):?>
				<br />
				<button  class="delete btn" role="1">Удалить</button>
				<?php endif;?>
				<br> 
				<hr>
				<h2>Экран 2</h2>
				<p><b>Заголовок</b></p>
				<input  type="text" name="extra[zagolovok2]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'zagolovok2', 1);?>" placeholder="Заголовок"/><br>
				<p><b>Список</b></p>
				<input  type="text" name="extra[page2_spisok_item1]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'page2_spisok_item1', 1);?>" placeholder="Пункт списка"/>
				<input  type="text" name="extra[page2_spisok_item2]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'page2_spisok_item2', 1);?>" placeholder="Пункт списка"/>
				<input  type="text" name="extra[page2_spisok_item3]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'page2_spisok_item3', 1);?>" placeholder="Пункт списка"/>
				<input  type="text" name="extra[page2_spisok_item4]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'page2_spisok_item4', 1);?>" placeholder="Пункт списка"/>
				<input  type="text" name="extra[page2_spisok_item5]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'page2_spisok_item5', 1);?>" placeholder="Пункт списка"/>
				<input  type="text" name="extra[page2_spisok_item6]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'page2_spisok_item6', 1);?>" placeholder="Пункт списка"/>
				<input  type="text" name="extra[page2_spisok_item7]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'page2_spisok_item7', 1);?>" placeholder="Пункт списка"/>
				<input  type="text" name="extra[page2_spisok_item8]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'page2_spisok_item8', 1);?>" placeholder="Пункт списка"/>
				<input  type="text" name="extra[page2_spisok_item9]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'page2_spisok_item9', 1);?>" placeholder="Пункт списка"/>
				<input  type="text" name="extra[page2_spisok_item10]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'page2_spisok_item10', 1);?>" placeholder="Пункт списка"/>
				<input  type="text" name="extra[page2_spisok_item11]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'page2_spisok_item11', 1);?>" placeholder="Пункт списка"/>
				<input  type="text" name="extra[page2_spisok_item12]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'page2_spisok_item12', 1);?>" placeholder="Пункт списка"/>
				<input  type="text" name="extra[page2_spisok_item13]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'page2_spisok_item13', 1);?>" placeholder="Пункт списка"/>
				<input  type="text" name="extra[page2_spisok_item14]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'page2_spisok_item14', 1);?>" placeholder="Пункт списка"/>
				<input  type="text" name="extra[page2_spisok_item15]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'page2_spisok_item15', 1);?>" placeholder="Пункт списка"/>
				<textarea wrap="soft" rows="4" name="extra[podzagolovok2]" style="width: 100%"><?php echo get_post_meta($post->ID, 'podzagolovok2', 1);?></textarea>
				<hr>
				<h2>Экран 3</h2>
				<p><b>Текст</b></p>
				<textarea wrap="soft" rows="4" name="extra[text3]" style="width: 100%"><?php echo get_post_meta($post->ID, 'text3', 1);?></textarea>
				<p><b>Название кнопки</b></p>
				<input  type="text" name="extra[knopka_name3]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'knopka_name3', 1);?>" placeholder="Название кнопки"/><br>
				<p><b>Ссылка кнопки</b></p>
				<input  type="text" name="extra[knopka_url3]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'knopka_url3', 1);?>" placeholder="Ссылка кнопки"/><br>
				<input id="image-url3" type="hidden" name="extra[background3]" style="width: 100px"  value="<?php echo get_post_meta($post->ID, 'background3', 1);?>"/><br>
				<input    role="3" type="button" class="buttonupload btn" value="Выберите изображение фона" />
				<div id="upli3">
				<?php if(get_post_meta($post->ID, 'background3', true)):?>
				<?php $img=get_post_meta($post->ID, 'background3', 1); $src = wp_get_attachment_image_src( $img,'full');?>
				<img src="<?php echo $src[0]; ?>" style="height: 100px; width: auto; margin: 10px 0">
				<?php endif;?> 
				</div><!-- upli -->
				<?php if(get_post_meta($post->ID, 'background3', true)):?>
				<br />
				<button  class="delete btn" role="3">Удалить</button>
				<?php endif; ?>
				<br> 
				<hr>
				<h2>Экран 4</h2>
				<p><b>Текст</b></p>
				<textarea wrap="soft" rows="4" name="extra[text4]" style="width: 100%"><?php echo get_post_meta($post->ID, 'text4', 1);?></textarea>
				<p><b>Название кнопки</b></p>
				<input  type="text" name="extra[knopka_name4]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'knopka_name4', 1);?>" placeholder="Название кнопки"/><br>
				<p><b>Ссылка кнопки</b></p>
				<input  type="text" name="extra[knopka_url4]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'knopka_url4', 1);?>" placeholder="Ссылка кнопки"/><br>
				<input id="image-url4" type="hidden" name="extra[background4]" style="width: 100px"  value="<?php echo get_post_meta($post->ID, 'background4', 1);?>"/><br>
				<input    role="4" type="button" class="buttonupload btn" value="Выберите изображение фона" />
				<div id="upli4">
				<?php if(get_post_meta($post->ID, 'background4', true)):?>
				<?php $img=get_post_meta($post->ID, 'background4', 1); $src = wp_get_attachment_image_src( $img,'full');?>
				<img src="<?php echo $src[0]; ?>" style="height: 100px; width: auto; margin: 10px 0">
				<?php endif;?> 
				</div><!-- upli -->
				<?php if(get_post_meta($post->ID, 'background4', true)):?>
				<br />
				<button  class="delete btn" role="4">Удалить</button>
				<?php endif; ?>
				<br> 
				<hr>
				<h2>Экран 5</h2>
				<p><b>Заголовок</b></p>
				<input  type="text" name="extra[zagolovok5]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'zagolovok5', 1);?>" placeholder="Заголовок"/><br>
				<p><b>Подзаголовок</b></p>
				<input  type="text" name="extra[podzagolovok5_1]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'podzagolovok5_1', 1);?>" placeholder="Заголовок"/><br>
				<p><b>Текст</b></p>
				<textarea wrap="soft" rows="4" name="extra[text5_1]" style="width: 100%"><?php echo get_post_meta($post->ID, 'text5_1', 1);?></textarea>
				<p><b>Подзаголовок</b></p>
				<input  type="text" name="extra[podzagolovok5_2]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'podzagolovok5_2', 1);?>" placeholder="Заголовок"/><br>
				<p><b>Текст</b></p>
				<textarea wrap="soft" rows="4" name="extra[text5_2]" style="width: 100%"><?php echo get_post_meta($post->ID, 'text5_2', 1);?></textarea>
				<p><b>Подзаголовок</b></p>
				<input  type="text" name="extra[podzagolovok5_3]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'podzagolovok5_3', 1);?>" placeholder="Заголовок"/><br>
				<p><b>Текст</b></p>
				<textarea wrap="soft" rows="4" name="extra[text5_3]" style="width: 100%"><?php echo get_post_meta($post->ID, 'text5_3', 1);?></textarea>
				<p><b>Подзаголовок</b></p>
				<input  type="text" name="extra[podzagolovok5_4]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'podzagolovok5_4', 1);?>" placeholder="Заголовок"/><br>
				<p><b>Текст</b></p>
				<textarea wrap="soft" rows="4" name="extra[text5_4]" style="width: 100%"><?php echo get_post_meta($post->ID, 'text5_4', 1);?></textarea>
				<p><b>Подзаголовок</b></p>
				<input  type="text" name="extra[podzagolovok5_5]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'podzagolovok5_5', 1);?>" placeholder="Заголовок"/><br>
				<p><b>Текст</b></p>
				<textarea wrap="soft" rows="4" name="extra[text5_5]" style="width: 100%"><?php echo get_post_meta($post->ID, 'text5_5', 1);?></textarea>
				<div class="socseti">
					<div class="socvidget">
						<input id="image-url5" type="hidden" name="extra[soc1]" style="width: 100px"  value="<?php echo get_post_meta($post->ID, 'soc1', 1);?>"/><br>
						<input    role="5" type="button" class="buttonupload btn" value="Выбрать иконку соцсети" />
						<div id="upli5">
						<?php if(get_post_meta($post->ID, 'soc1', true)):?>
						<?php $img=get_post_meta($post->ID, 'soc1', 1); $src = wp_get_attachment_image_src( $img,'full');?>
						<img src="<?php echo $src[0]; ?>" style="height: 100px; width: auto; margin: 10px 0">
						<?php endif;?> 
						</div><!-- upli -->
						<?php if(get_post_meta($post->ID, 'soc1', true)):?>
						<br />
						<button  class="delete btn" role="5">Удалить</button>
						<?php endif; ?>
						<p><b>Ссылка соцсети</b></p>
						<input  type="text" name="extra[soc_url1]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'soc_url1', 1);?>" placeholder="Ссылка соцсети"/><br>
					</div>
					<div class="socvidget">
						<input id="image-url6" type="hidden" name="extra[soc2]" style="width: 100px"  value="<?php echo get_post_meta($post->ID, 'soc2', 1);?>"/><br>
						<input    role="6" type="button" class="buttonupload btn" value="Выбрать иконку соцсети" />
						<div id="upli6">
						<?php if(get_post_meta($post->ID, 'soc2', true)):?>
						<?php $img=get_post_meta($post->ID, 'soc2', 1); $src = wp_get_attachment_image_src( $img,'full');?>
						<img src="<?php echo $src[0]; ?>" style="height: 100px; width: auto; margin: 10px 0">
						<?php endif;?> 
						</div><!-- upli -->
						<?php if(get_post_meta($post->ID, 'soc2', true)):?>
						<br />
						<button  class="delete btn" role="6">Удалить</button>
						<?php endif; ?>
						<p><b>Ссылка соцсети</b></p>
						<input  type="text" name="extra[soc_url2]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'soc_url2', 1);?>" placeholder="Ссылка соцсети"/><br>
					</div>
					<div class="socvidget">
						<input id="image-url7" type="hidden" name="extra[soc3]" style="width: 100px"  value="<?php echo get_post_meta($post->ID, 'soc3', 1);?>"/><br>
						<input    role="7" type="button" class="buttonupload btn" value="Выбрать иконку соцсети" />
						<div id="upli7">
						<?php if(get_post_meta($post->ID, 'soc3', true)):?>
						<?php $img=get_post_meta($post->ID, 'soc3', 1); $src = wp_get_attachment_image_src( $img,'full');?>
						<img src="<?php echo $src[0]; ?>" style="height: 100px; width: auto; margin: 10px 0">
						<?php endif;?> 
						</div><!-- upli -->
						<?php if(get_post_meta($post->ID, 'soc3', true)):?>
						<br />
						<button  class="delete btn" role="7">Удалить</button>
						<?php endif; ?>
						<p><b>Ссылка соцсети</b></p>
						<input  type="text" name="extra[soc_url3]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'soc_url3', 1);?>" placeholder="Ссылка соцсети"/><br>
					</div>
					<div class="socvidget">
						<input id="image-url8" type="hidden" name="extra[soc4]" style="width: 100px"  value="<?php echo get_post_meta($post->ID, 'soc4', 1);?>"/><br>
						<input    role="8" type="button" class="buttonupload btn" value="Выбрать иконку соцсети" />
						<div id="upli8">
						<?php if(get_post_meta($post->ID, 'soc4', true)):?>
						<?php $img=get_post_meta($post->ID, 'soc4', 1); $src = wp_get_attachment_image_src( $img,'full');?>
						<img src="<?php echo $src[0]; ?>" style="height: 100px; width: auto; margin: 10px 0">
						<?php endif;?> 
						</div><!-- upli -->
						<?php if(get_post_meta($post->ID, 'soc4', true)):?>
						<br />
						<button  class="delete btn" role="8">Удалить</button>
						<?php endif; ?>
						<p><b>Ссылка соцсети</b></p>
						<input  type="text" name="extra[soc_url4]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'soc_url4', 1);?>" placeholder="Ссылка соцсети"/><br>
					</div>
					<div class="socvidget">
						<input id="image-url9" type="hidden" name="extra[soc5]" style="width: 100px"  value="<?php echo get_post_meta($post->ID, 'soc5', 1);?>"/><br>
						<input    role="9" type="button" class="buttonupload btn" value="Выбрать иконку соцсети" />
						<div id="upli9">
						<?php if(get_post_meta($post->ID, 'soc5', true)):?>
						<?php $img=get_post_meta($post->ID, 'soc5', 1); $src = wp_get_attachment_image_src( $img,'full');?>
						<img src="<?php echo $src[0]; ?>" style="height: 100px; width: auto; margin: 10px 0">
						<?php endif;?> 
						</div><!-- upli -->
						<?php if(get_post_meta($post->ID, 'soc5', true)):?>
						<br />
						<button  class="delete btn" role="9">Удалить</button>
						<?php endif; ?>
						<p><b>Ссылка соцсети</b></p>
						<input  type="text" name="extra[soc_url5]" style="width: 100%" value="<?php echo get_post_meta($post->ID, 'soc_url5', 1);?>" placeholder="Ссылка соцсети"/><br>
					</div>
				</div>
				<br><br>
				<h2>Мы на карте</h2>
				<p>Для получения кода карты зайдите <a href="https://embedgooglemaps.com/ru/" target="blanc">сюда</a>. Введите одинаково адрес и название и рекомендуемые настройки: Ширина - 950, высота - 700, Zoom - 100м, тип - карта. Нажмите создать свой код и скопируйте сюда сгенерированный код</p>
				<input  type="text" name="extra[map]" style="width: 100%" value='<?php echo get_post_meta($post->ID, 'map', 1);?>' placeholder="Код карты"/>
			</div>
			<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
		<?
	}

		// включаем обновление полей при сохранении
	// включаем обновление полей при сохранении
	// включаем обновление полей при сохранении
	add_action( 'save_post', 'my_extra_fields_update', 0 );

	## Сохраняем данные, при сохранении поста
	function my_extra_fields_update( $post_id ){
		// базовая проверка
		if (
			   empty( $_POST['extra'] )
			|| ! wp_verify_nonce( $_POST['extra_fields_nonce'], __FILE__ )
			|| wp_is_post_autosave( $post_id )
			|| wp_is_post_revision( $post_id )
		)
			return false;

		// Все ОК! Теперь, нужно сохранить/удалить данные
		//$_POST['extra'] = array_map( 'sanitize_text_field', $_POST['extra'] ); // чистим все данные от пробелов по краям
		foreach( $_POST['extra'] as $key => $value ){
			if( empty($value) ){
				delete_post_meta( $post_id, $key ); // удаляем поле если значение пустое
				continue;
			}

			update_post_meta( $post_id, $key, $value ); // add_post_meta() работает автоматически
		}

		return $post_id;
	}
?>
