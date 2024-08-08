<?php get_header(); ?>
	<section class="section2">
		<div class="container">
			<h2><?php echo get_post_meta($post->ID, 'zagolovok2', 1); ?></h2>
			<ul>
				<?php 
					if(((get_post_meta($post->ID, 'page2_spisok_item1', 1)))&&(get_post_meta($post->ID, 'page2_spisok_item1', 1)!=''))
						echo "<li>".get_post_meta($post->ID, 'page2_spisok_item1', 1)."</li>";
					if(((get_post_meta($post->ID, 'page2_spisok_item2', 1)))&&(get_post_meta($post->ID, 'page2_spisok_item2', 1)!=''))
						echo "<li>".get_post_meta($post->ID, 'page2_spisok_item2', 1)."</li>";
					if(((get_post_meta($post->ID, 'page2_spisok_item3', 1)))&&(get_post_meta($post->ID, 'page2_spisok_item3', 1)!=''))
						echo "<li>".get_post_meta($post->ID, 'page2_spisok_item3', 1)."</li>";
					if(((get_post_meta($post->ID, 'page2_spisok_item4', 1)))&&(get_post_meta($post->ID, 'page2_spisok_item4', 1)!=''))
						echo "<li>".get_post_meta($post->ID, 'page2_spisok_item4', 1)."</li>";
					if(((get_post_meta($post->ID, 'page2_spisok_item5', 1)))&&(get_post_meta($post->ID, 'page2_spisok_item5', 1)!=''))
						echo "<li>".get_post_meta($post->ID, 'page2_spisok_item5', 1)."</li>";
					if(((get_post_meta($post->ID, 'page2_spisok_item6', 1)))&&(get_post_meta($post->ID, 'page2_spisok_item6', 1)!=''))
						echo "<li>".get_post_meta($post->ID, 'page2_spisok_item6', 1)."</li>";
					if(((get_post_meta($post->ID, 'page2_spisok_item7', 1)))&&(get_post_meta($post->ID, 'page2_spisok_item7', 1)!=''))
						echo "<li>".get_post_meta($post->ID, 'page2_spisok_item7', 1)."</li>";
					if(((get_post_meta($post->ID, 'page2_spisok_item8', 1)))&&(get_post_meta($post->ID, 'page2_spisok_item8', 1)!=''))
						echo "<li>".get_post_meta($post->ID, 'page2_spisok_item8', 1)."</li>";
					if(((get_post_meta($post->ID, 'page2_spisok_item9', 1)))&&(get_post_meta($post->ID, 'page2_spisok_item9', 1)!=''))
						echo "<li>".get_post_meta($post->ID, 'page2_spisok_item9', 1)."</li>";
					if(((get_post_meta($post->ID, 'page2_spisok_item10', 1)))&&(get_post_meta($post->ID, 'page2_spisok_item10', 1)!=''))
						echo "<li>".get_post_meta($post->ID, 'page2_spisok_item10', 1)."</li>";
					if(((get_post_meta($post->ID, 'page2_spisok_item11', 1)))&&(get_post_meta($post->ID, 'page2_spisok_item11', 1)!=''))
						echo "<li>".get_post_meta($post->ID, 'page2_spisok_item11', 1)."</li>";
					if(((get_post_meta($post->ID, 'page2_spisok_item12', 1)))&&(get_post_meta($post->ID, 'page2_spisok_item12', 1)!=''))
						echo "<li>".get_post_meta($post->ID, 'page2_spisok_item12', 1)."</li>";
					if(((get_post_meta($post->ID, 'page2_spisok_item13', 1)))&&(get_post_meta($post->ID, 'page2_spisok_item13', 1)!=''))
						echo "<li>".get_post_meta($post->ID, 'page2_spisok_item13', 1)."</li>";
					if(((get_post_meta($post->ID, 'page2_spisok_item14', 1)))&&(get_post_meta($post->ID, 'page2_spisok_item14', 1)!=''))
						echo "<li>".get_post_meta($post->ID, 'page2_spisok_item14', 1)."</li>";
					if(((get_post_meta($post->ID, 'page2_spisok_item15', 1)))&&(get_post_meta($post->ID, 'page2_spisok_item15', 1)!=''))
						echo "<li>".get_post_meta($post->ID, 'page2_spisok_item15', 1)."</li>";
				?>
			</ul>
			<div class="section2_el section2_el1"></div>
			<div class="section2_el section2_el2"></div>
			<div class="section2_el section2_el3"></div>
			<div class="section2_el section2_el4"></div>
			<div class="section2_el section2_el5"></div>
		</div>
	</section>
	<?php $img=get_post_meta($post->ID, 'background3', 1); $src = wp_get_attachment_image_src( $img,'full'); ?>
	<section class="section3" style="background-image: url('<?php echo $src[0]; ?>')" id="menu">
		<div class="container">
			<p><?php echo get_post_meta($post->ID, 'text3', 1); ?></p>
			<a href="<?php echo get_post_meta($post->ID, 'knopka_url3', 1); ?>"><?php echo get_post_meta($post->ID, 'knopka_name3', 1); ?></a>
		</div>
	</section>
	<?php $img=get_post_meta($post->ID, 'background4', 1); $src = wp_get_attachment_image_src( $img,'full'); ?>
	<section class="section4" style="background-image: url('<?php echo $src[0]; ?>')" id="afisha">
		<div class="container">
			<p><?php echo get_post_meta($post->ID, 'text4', 1); ?></p>
			<a href="<?php echo get_post_meta($post->ID, 'knopka_url4', 1); ?>"><?php echo get_post_meta($post->ID, 'knopka_name4', 1); ?></a>
		</div>
	</section>
	<section class="section5" id="contacts">
		<div class="left">
			<div class="container">
				<h2><?php echo get_post_meta($post->ID, 'zagolovok5', 1); ?></h2>
				<?php
					if(((get_post_meta($post->ID, 'podzagolovok5_1', 1)))&&(get_post_meta($post->ID, 'podzagolovok5_1', 1)!=''))
						echo "<h3>".get_post_meta($post->ID, 'podzagolovok5_1', 1)."</h3>";
					if(((get_post_meta($post->ID, 'text5_1', 1)))&&(get_post_meta($post->ID, 'text5_1', 1)!=''))
						echo "<p>".get_post_meta($post->ID, 'text5_1', 1)."</p><br>";
					if(((get_post_meta($post->ID, 'podzagolovok5_2', 1)))&&(get_post_meta($post->ID, 'podzagolovok5_2', 1)!=''))
						echo "<h3>".get_post_meta($post->ID, 'podzagolovok5_2', 1)."</h3>";
					if(((get_post_meta($post->ID, 'text5_2', 1)))&&(get_post_meta($post->ID, 'text5_2', 1)!=''))
						echo "<p>".get_post_meta($post->ID, 'text5_2', 1)."</p><br>";
					if(((get_post_meta($post->ID, 'podzagolovok5_3', 1)))&&(get_post_meta($post->ID, 'podzagolovok5_3', 1)!=''))
						echo "<h3>".get_post_meta($post->ID, 'podzagolovok5_3', 1)."</h3>";
					if(((get_post_meta($post->ID, 'text5_3', 1)))&&(get_post_meta($post->ID, 'text5_3', 1)!=''))
						echo "<p>".get_post_meta($post->ID, 'text5_3', 1)."</p><br>";
					if(((get_post_meta($post->ID, 'podzagolovok5_4', 1)))&&(get_post_meta($post->ID, 'podzagolovok5_4', 1)!=''))
						echo "<h3>".get_post_meta($post->ID, 'podzagolovok5_4', 1)."</h3>";
					if(((get_post_meta($post->ID, 'text5_4', 1)))&&(get_post_meta($post->ID, 'text5_4', 1)!=''))
						echo "<p>".get_post_meta($post->ID, 'text5_4', 1)."</p><br>";
					if(((get_post_meta($post->ID, 'podzagolovok5_5', 1)))&&(get_post_meta($post->ID, 'podzagolovok5_5', 1)!=''))
						echo "<h3>".get_post_meta($post->ID, 'podzagolovok5_5', 1)."</h3>";
					if(((get_post_meta($post->ID, 'text5_5', 1)))&&(get_post_meta($post->ID, 'text5_5', 1)!=''))
						echo "<p>".get_post_meta($post->ID, 'text5_5', 1)."</p>";
				 ?>
				<div class="soc_block">
					<?php
						if(((get_post_meta($post->ID, 'soc1', 1)))&&(get_post_meta($post->ID, 'soc1', 1)!='')){
							$img=get_post_meta($post->ID, 'soc1', 1); $src = wp_get_attachment_image_src( $img,'full');
							echo '<a href="'.get_post_meta($post->ID, 'soc_url1', 1).'" target="blanc"><img src="'.$src[0].'"></a>';
						}
						if(((get_post_meta($post->ID, 'soc2', 1)))&&(get_post_meta($post->ID, 'soc2', 1)!='')){
							$img=get_post_meta($post->ID, 'soc2', 1); $src = wp_get_attachment_image_src( $img,'full');
							echo '<a href="'.get_post_meta($post->ID, 'soc_url2', 1).'" target="blanc"><img src="'.$src[0].'"></a>';
						}
						if(((get_post_meta($post->ID, 'soc3', 1)))&&(get_post_meta($post->ID, 'soc3', 1)!='')){
							$img=get_post_meta($post->ID, 'soc3', 1); $src = wp_get_attachment_image_src( $img,'full');
							echo '<a href="'.get_post_meta($post->ID, 'soc_url3', 1).'" target="blanc"><img src="'.$src[0].'"></a>';
						}
						if(((get_post_meta($post->ID, 'soc4', 1)))&&(get_post_meta($post->ID, 'soc4', 1)!='')){
							$img=get_post_meta($post->ID, 'soc4', 1); $src = wp_get_attachment_image_src( $img,'full');
							echo '<a href="'.get_post_meta($post->ID, 'soc_url4', 1).'" target="blanc"><img src="'.$src[0].'"></a>';
						}
						if(((get_post_meta($post->ID, 'soc5', 1)))&&(get_post_meta($post->ID, 'soc5', 1)!='')){
							$img=get_post_meta($post->ID, 'soc5', 1); $src = wp_get_attachment_image_src( $img,'full');
							echo '<a href="'.get_post_meta($post->ID, 'soc_url5', 1).'" target="blanc"><img src="'.$src[0].'"></a>';
						}
					 ?>
				</div>
			</div>
		</div>
		<div class="right">
			<?php echo get_post_meta($post->ID, 'map', 1); ?>
		</div>
	</section>
</body>
</html>