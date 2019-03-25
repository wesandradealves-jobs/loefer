<?php 
	if(wp_get_nav_menu_items('Header')){
		?>
		<nav class="navigation">
			<ul>
				<?php 	
					$page = $post->post_name;
					foreach (wp_get_nav_menu_items('header') as $key => $value) {
						echo '<li class="'.( (get_the_title() == $value->title) ? 'current' : '' ).'" ><a href="'.$value->url.'" title="'.$value->title.'">'.$value->title.'</a>'; 
							if($value->title == "Produtos" && !did_action('get_footer')){
	                            $terms = get_terms( array( 
	                                'taxonomy' => 'produtos_categories',
	                                'hide_empty' => 0,
	                                'order' => 'ASC',
	                                'parent'   => 0
	                            ) );
	                            if($terms){
	                              echo '<ul>';
	                                foreach ($terms as $term) {
	                                  echo '<li>';
	                                  $url_0 = get_term_link($term->term_id, 'produtos_categories');
	                                  echo '<a href="'; 
	                                  print_r($url_0);
	                                  echo '" title="'.$term->name.'">'.$term->name.'</a></li>';
	                                }
	                              echo '</ul>';
	                            }	
							} elseif($value->title == 'Contato' && !did_action( 'get_footer' )){
								?>
								<ul>
									<li><a href="<?php echo get_page_link(get_page_by_path('contato')->ID); ?>/?f=contato">Contato</a></li>
									<li><a href="<?php echo get_page_link(get_page_by_path('contato')->ID); ?>/?f=pos-venda">Logon Pós Venda</a></li>									
								</ul>
								<?php
							}
						echo'</li>';
					}
				?>
				<?php if(!did_action('get_footer')) : ?>
					<li>
			            <button onclick="mobileNavigation(this)" class="hamburger hamburger--collapse" type="button">
			              <span class="hamburger-box">
			                <span class="hamburger-inner"></span>
			              </span>
			            </button> 		
					</li>
				<?php endif; ?>
			</ul>
		</nav>
		<?php
	}
?>