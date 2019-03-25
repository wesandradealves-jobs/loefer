<?php 
	get_header(); 
?>
<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>
<?php get_template_part('template-parts/webdoor'); ?>
	<section class="content content-<?php echo $post->post_name ?>">
		<div class="container">
			<?php 
				if(get_post_type() == 'produtos'){
					get_sidebar();
				}
			?>
			<div>
				<?php
					if(get_field('galeria')){
						echo '<div class="box galeria">'; 
						foreach (get_field('galeria') as $value) {
							echo '<a href="'.$value['imagem'].'" data-lightbox="galeria" data-title="'.get_the_title().'" data-alt="'.get_the_title().'"><img src="'.$value['imagem'].'" /></a>';
						}
						echo '</div>';
					}
					echo '<div class="box">
						<h3><span>Descrição</span></h3><div>';
						the_content();
					echo '</div>
					</div>'; 
				?>	
			</div>
		</div>
	</section>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>