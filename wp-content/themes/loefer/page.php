<?php 
	get_header(); 
?>
<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>
<?php get_template_part('template-parts/webdoor'); ?>
	<section class="content content-<?php echo $post->post_name ?>">
		<div class="container">
			<?php 
				if($post->post_name == 'produtos'){
					get_sidebar();
				}
			?>
			<div>
				<?php
					if($post->post_name == 'produtos'){
						get_template_part('template-parts/products');
					} else {
						the_content();
					}
				?>	
			</div>
		</div>
	</section>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>