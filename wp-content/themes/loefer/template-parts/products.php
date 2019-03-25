<?php
	$tag = (is_front_page()) ? 'section' : 'div';
	
	$template = '<'.$tag.' class="vitrine"> 
			<div class="container">
				<ul>';

	if(is_front_page()){
	    $query = get_terms( array( 
	        'taxonomy' => 'produtos_categories',
	        'hide_empty' => 0,
	        'order' => 'ASC',
	        'parent'   => 0
	    ) );	
	} elseif($post->post_name == 'produtos'){
		$query_args = array(
	        'post_type' => $post->post_name,
	        'posts_per_page' => -1,
	        'ORDER' => 'ASC'
        );
        $query = new WP_Query( $query_args );
	} else {
		$query = true;
	}

    if($query){
    	if(is_front_page()) {
			foreach ($query as $q) :
				$template .= '<li onclick="document.location='."'".get_term_link($q->term_id)."'".';return false;">
					<div class="thumbnail">
						<img src="'.get_field('thumbnail', $q).'" alt="'.$q->name.'">
					</div>
					<h3><span>'.$q->name.'</span></h3>';
					if($q->description){
						$template .= '<p>'.$q->description.'</p>';
					}
					echo '
				</li>';
			endforeach;
    	} elseif($post->post_name == 'produtos'){
    		while ( $query->have_posts() ) : 
    			$query->the_post();
					$template .= '<li onclick="document.location='."'".get_the_permalink()."'".';return false;">
						<div class="thumbnail">
							<img src="'.wp_get_attachment_url(get_post_thumbnail_id(get_the_id()), 'full').'" >
						</div>
						<h3><span>'.get_the_title().'</span></h3>';
						if(get_the_excerpt()){
							$template .= '<p>'.get_the_excerpt().'</p>';
						}
						echo '
					</li>';    			
    		endwhile;
    	} else {
    		if ( have_posts () ) : 
    			while (have_posts()) : the_post();
					$template .= '<li onclick="document.location='."'".get_the_permalink()."'".';return false;">
						<div class="thumbnail">
							<img src="'.wp_get_attachment_url(get_post_thumbnail_id(get_the_id()), 'full').'" >
						</div>
						<h3><span>'.get_the_title().'</span></h3>';
						if(get_the_excerpt()){
							$template .= '<p>'.get_the_excerpt().'</p>';
						}
						echo '
					</li>';
				endwhile;
			else : 
				echo '<li>Nenhum post encontrado.</li>';
			endif;
    	}
    }

	$template .= '</ul>
		</div>
	</'.$tag.'>';    

	echo $template;
?>