<aside class="sidebar">
	<p>
		<strong><?php the_title(); ?></strong>
		<br><br>
		<?php echo get_theme_mod('endereco'); ?>
		<br><br>
		<?php
	        if(stripos(get_theme_mod('telefone'), ',')){
	            print implode('<br>', explode(',', get_theme_mod('telefone')));
	        } else {
	            print get_theme_mod('telefone');
	        }
		?>		
		<br><br>
		Email: <a href="mailto:<?php echo get_theme_mod('email'); ?>"><?php echo get_theme_mod('email'); ?></a>
	</p>
</aside>