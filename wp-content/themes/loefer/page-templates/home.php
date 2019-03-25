<?php
    /**
    * Template Name: Home
    */
?>
<?php get_header(); ?>
<?php 
	$meta_query = [
		'relation'		=> 'AND',
		[
			'key'			=> 'banner_destacar',
			'compare'		=> '=',
			'value'			=> true,
		],
	];
    $query = new WP_Query( array(
      'post_type'              => array( 'produtos' ),
      'order' => 'DESC',  
      'meta_query' => $meta_query,
    ) );
    if($query) : 
    	?>
    	<section class="banner">
		    <div class="owl-carousel">
		    	<?php  
		        while ( $query->have_posts() ) : $query->the_post();    
		        	?>
		        	<div class="item" style="background-image:url(<?php echo get_field('banner')['imagem_destaque'] ?>)">
		        		<div class="container">
		        			<div>
			        			<h2><?php the_title(); ?></h2>
			        			<div class="excerpt">
				        			<?php the_excerpt(); ?>
			        			</div>
			        			<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" class="btn btn-1">Saiba Mais</a>	
		        			</div>
		        			<?php if(wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full')): ?>
								<div>
									<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>" alt="<?php the_title(); ?>"/>
								</div>
							<?php endif; ?>
		        		</div>
		        	</div>
		        	<?php
		        endwhile;
		        ?>
		    </div>
		</section>
        <?php
    endif;
	wp_reset_postdata(); 
	wp_reset_query(); 
?>
<?php 
	get_template_part('template-parts/products');
?>
<?php get_footer(); ?>