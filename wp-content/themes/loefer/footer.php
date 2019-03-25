	</main>
	<footer class="footer">
		<?php 
			if($post->post_name != 'empresa'){
				?>
				<div class="about">
					<div class="container">
						<h3><?php echo get_bloginfo( 'title', 'display' ); ?></h3>
						<p><?php echo get_the_excerpt(get_page_by_path('empresa')); ?></p>
					</div>
				</div>
				<?php
			}
		?>
		<div class="container">
			<h2 class="logo"><?php get_template_part('template-parts/logo'); ?></h2>
			<?php get_template_part('template-parts/navigation'); ?>
		</div>
		<?php get_template_part('template-parts/copyright'); ?>
	</footer>
</div>
</body>
</html>