<?php
    /**
    * Template Name: Contato
    */
?>
<?php 
	get_header(); 
?>
<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>
<?php get_template_part('template-parts/webdoor'); ?>
	<section class="content content-<?php echo $post->post_name ?>">
		<div class="container">
			<?php
				if(get_theme_mod('endereco')||get_theme_mod('telefone')){
					get_sidebar('contato');
				}  
			?>
			<div>
				<form class="contactform" method="POST" action="<?php echo site_url('phpmailer/send.php') ?>">
					<div class="tabs">
						<span>
							<label for="Nome">*Nome</label>
							<input required="required" type="text" name="Nome">
						</span>
						<span>
							<label for="Empresa">*Empresa</label>
							<input required="required" type="text" name="Empresa">
						</span>
						<span>
							<label for="Email">*Email</label>
							<input required="required" type="text" name="Email">
						</span>	
						<span>
							<label for="informacoes">Deseja receber informações por este e-mail?</label>
							<span class="checkbox">
								<label for="informacoes"></label>
								<input type="checkbox" name="informacoes" value="Sim">
							</span>
						</span>
						<?php if(!isset($_GET['f']) || isset($_GET['f']) && $_GET['f']=='contato') : ?>
							<span>
								<label for="Cargo">*Cargo</label>
								<input required="required" type="text" name="Cargo">
							</span>	
						<?php endif; ?>
						<span>
							<label for="Telefone">Telefone</label>
							<input class="telefone" type="text" name="Telefone">
						</span>	
						<!-- opniao -->
						<span class="tabs-content">
							<?php if(!isset($_GET['f']) || isset($_GET['f']) && $_GET['f']=='contato') : ?>
								<input type="hidden" value="contato" name="form_type">
								<span>
									<span>
										<label for="area">*Sobre que áreas deseja fazer um comentário?</label>
										<span class="checkbox">
											<input type="checkbox" name="area[]" value="Nosso Site">
											<label for="area">Nosso Site</label>
										</span>
										<span class="checkbox">
											<input type="checkbox" name="area[]" value="Nossa Empresa">
											<label for="area">Nossa Empresa</label>
										</span>
										<span class="checkbox">
											<input type="checkbox" name="area[]" value="Produtos">
											<label for="area">Produtos</label>
										</span>
										<span class="checkbox">
											<input type="checkbox" name="area[]" value="Serviços">
											<label for="area">Serviços</label>
										</span>
										<span class="checkbox">
											<input type="checkbox" name="area[]" value="Outros">
											<label for="area">Outros</label>
										</span>							
									</span>
								</span>
							<?php elseif(isset($_GET['f']) && $_GET['f']!='contato') : ?>
								<input type="hidden" value="<?php echo $_GET['f']; ?>" name="form_type">
								<span>
									<span>
										<label for="visita">*Gostaria de uma visita de nossos representantes?</label>
										<span class="checkbox">
											<input type="radio" name="visita" value="Sim">
											<label for="visita">Sim</label>
										</span>
										<span class="checkbox">
											<input type="radio" name="visita" value="Não">
											<label for="visita">Não</label>
										</span>				
									</span>
										<?php 
											$avaliacoes = array(
												array('title'=>'*Em sua avaliação, nosso atendimento é:','name'=>'atendimento'),
												array('title'=>'*O conhecimento de nossos profissionais é:','name'=>'profissionais'),
												array('title'=>'*Tempo de resposta para dúvidas ou solicitações é:','name'=>'tempo-resposta'),
												array('title'=>'*Nosso preço, em relação ao custo/benefício é:','name'=>'custo-beneficio'),
												array('title'=>'*Nossas condições comerciais, são:','name'=>'condicoes-comerciais'),
												array('title'=>'*Nossos equipamentos, quanto a precisão:','name'=>'precisao'),
												array('title'=>'*Nossos equipamentos, quanto ao desempenho:','name'=>'desempenho'),
												array('title'=>'*Nossos equipamentos, quanto a confiabilidade:','name'=>'confiabilidade'),
												array('title'=>'*Nossos equipamentos, quanto a qualidade:','name'=>'qualidade')
											);

											foreach ($avaliacoes as $key => $value) {
												echo '
													<span>
														<label for="'.$value['name'].'">'.$value['title'].'</label>
														<span class="checkbox">
															<input type="radio" name="nota['.$value['name'].']" value="Muito bom">
															<label for="nota['.$value['name'].']">Muito bom</label>
														</span>
														<span class="checkbox">
															<input type="radio" name="nota['.$value['name'].']" value="Bom">
															<label for="nota['.$value['name'].']">Bom</label>
														</span>	
														<span class="checkbox">
															<input type="radio" name="nota['.$value['name'].']" value="Regular">
															<label for="nota['.$value['name'].']">Regular</label>
														</span>
														<span class="checkbox">
															<input type="radio" name="nota['.$value['name'].']" value="Ruim">
															<label for="nota['.$value['name'].']">Ruim</label>
														</span>	
														<span class="checkbox">
															<input type="radio" name="nota['.$value['name'].']" value="Muito Ruim">
															<label for="nota['.$value['name'].']">Muito Ruim</label>
														</span>		
														<input type="hidden" name="avaliacoes[]" value="'.$value['title'].'" />									
													</span>
												';
											}
										?>										
								</span>
							<?php endif; ?>
						</span>
						<!--  -->
						<span>
							<label for="Mensagem">*Mensagem</label>
							<textarea required="required" name="Mensagem"></textarea>
						</span>				
					</div>
					<span>
						<button class="btn btn-1">Enviar <?php echo (is_front_page() ? '→' : '') ?></button>
						
					</span>
				</form>				
			</div>
		</div>
	</section>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>