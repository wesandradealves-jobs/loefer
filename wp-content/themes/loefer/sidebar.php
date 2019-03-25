<aside class="sidebar">
	<?php 
		$postType = null;
		if(is_archive() || is_category()){
			$postType = (array)get_taxonomy(get_queried_object()->taxonomy)->object_type;
			$postType = $postType[0];
		} elseif($post->post_name == 'produtos'){
			$postType = $post->post_name;
		} elseif(is_single()) {
			$postType = get_post_type();
		}
		$title = get_post_type_object($postType)->label;
	?>
	<h3><?php echo $title; ?></h3>
	<?php 
		$tax_terms = get_terms( $postType.'_categories', 'orderby=name');
		foreach ( $tax_terms as $term ) {
			echo '<h4><a href="'.get_term_link($term->term_id).'">' . $term->name . '</a></h4>';
			$args = array( 
				'post_type' => $postType, 
				'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => $postType.'_categories',
                        'terms' => $term->name,
                        'field' => 'slug',
                        'include_children' => true,
                        'operator' => 'IN'
                    )
                )					
			);
			$query = new WP_Query( $args );
			if($query){
				echo '<ul>';
					while ( $query->have_posts() ) : 
						$query->the_post();
						echo '
			              <li>
			                <a href="'.get_permalink().'">'.get_the_title().'</a>
			              </li>
						';
					endwhile;
				echo '</ul>';	
		        wp_reset_query();
		        wp_reset_postdata();		
			}
		}
		wp_reset_postdata();
	?>
</aside>