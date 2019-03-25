<?php get_header(); ?>
	<?php 
		get_template_part('template-parts/webdoor'); 
	?>	
	<section class="content">
		<div class="container">
			<?php get_sidebar(); ?>
			<div>
				<?php get_template_part('template-parts/products'); ?>	
			</div>
		</div>
	</section>	
<?php get_footer(); ?>