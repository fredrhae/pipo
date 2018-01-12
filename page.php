<?php 	
$css_escolhido = 'page';
require_once('header.php');
require_once('landing.php');
require_once('menu.php');
require_once('contact.php');
require_once('about_us.php');
require_once('common_sections_site_functions.php');
$home = get_template_directory_uri();

$restaurant_pages = array('landing','sobre','reservas','contatos','menu','programacao');

// Formulario sugestao
$nome = $_POST['form-nome'];
$email = $_POST['form-email'];
$sugestao = $_POST['form-sugestao'];

$formularioSugestaoEnviado = isset($nome) && isset($email) 
                         && isset($sugestao);
                         
if($formularioSugestaoEnviado) {
	$enviou = enviar_e_checar_sugestao($nome, $email, $sugestao);

	if($enviou) { ?>
		<span class="email-sucesso">Sua sugestão foi enviada com sucesso!</span>
	<?php } else { ?>
		<span class="email-fracasso">Desculpe, ocorreu um erro, sua sugestão não foi enviada!</span>
	<?php } 
}
if( have_posts() ) 
	{
		while( have_posts() ) 
		{
			the_post(); 
			if(in_array($post->post_name,$restaurant_pages)){
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					$imagem_destacada = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				} else {
					$imagem_destacada = $home . '/assets/imagens/background-default.jpg';
				}
				?>
				<!-- Conteudo principal -->
				<div class="container-principal full-image-background-principal-home" style="background-image: url(<?=$imagem_destacada?>);">
					<div class="d-flex justify-content-center flex-column" align="center">
						<div class="col-md-8  align-self-center mt-5">
							<p class="mx-auto chamada-principal-page mt-5 mb-0"><?=get_the_content()?></p>
						<?php 
						if(is_page('landing')) 
						{
						?>
							<p class="mx-auto pl-5 chamada-secundaria-page">INESQUECÍVEIS AQUI</p>
							<?php 						
							get_landing_page_buttons_chamada_principal();
						}
						?>
						</div>
					</div>
				</div>
			<?php
			}
			global $post;
			$post_slug=$post->post_name;
			switch ($post_slug) {
				case 'landing':
					get_landing_page_body_content(); 
					break;
				case 'sobre':
					get_about_us_body_content();
					break;
				case 'reservas':
					get_reserva_page();
					break;
				case 'contatos':
					get_contact_body_content();
					break;
				case 'menu':
					get_menu_body_content();
					break;
				case 'programacao':
					get_programacao_page();
					break;
			}
			?>
<?php	}
	}
?>
<?php get_footer();

function get_section_suggestions() {
    global $home; ?>
    <!-- Secao de sugestoes -->
    <div class="d-flex justify-content-center flex-column mt-5 py-5" align="center">
        <p class="mx-auto chamada-principal-apresentacao">Sugestões</p>
        <p class="mx-auto chamada-nome-vermelho-pequeno">OU DÚVIDAS</p>
    </div>
    <div class="d-flex justify-content-center flex-column mb-5" align="center">
            <?php
                if($formularioEnviado) {
                    $enviou = enviar_e_checar_sugestao($nome, $email, $sugestao);
                    if($enviou) { ?>
                        <span class="email-sucesso">Sua intenção de reserva foi registrada com sucesso!
                            Em breve entraremos em contato.
                        </span>
                    <?php 
                    } else {
                    ?>
                        <span class="email-fracasso">Desculpe, ocorreu um erro, sua intenção de reserva não foi feita!</span>
                    <?php 
                    }
                }
            ?>
            <div class="col-md-4" align="center">
                <form method="post">
                    <div class="form-nome">
                        <input id="form-nome" type="nome" placeholder="Seu nome" name="form-nome">
                    </div>
                    <div class="form-email">
                        <input id="form-email" type="email" placeholder="Seu email" name="form-email">
                    </div>
                    <div class="form-sugestao">
						<textarea id="form-sugestao" type="text" style="overflow:hidden"
						 placeholder="Sua sugestão" name="form-sugestao" class="input w-100 mb-5" rows="10"></textarea>
                    </div>             
                    <button type="submit" class="btn btn-block btn-outline-secondary-lg-gray">RESERVAR</button>
                </form>
            </div>
        </div>
    </div>
<?php
}

function get_reserva_page() {
	$text_about_schedule = '';
	$path_picture_schedule = '';				
	$attachments = new Attachments( 'my_attachments' );
	if( $attachments->exist() ) :
		$my_index = 0; // index of text about schedule
		if( $attachment = $attachments->get_single( $my_index ) ) :
			if( $attachments->type($my_index) == 'text') :
				$text_about_schedule = read_content_from_text_file($attachments->url( $my_index ));
			endif;									
		endif;

		$my_index = 1; // index of picture schedule
		if( $attachment = $attachments->get_single( $my_index ) ) :
			if( $attachments->type($my_index) == 'image') :
				$path_picture_schedule = $attachments->url( $my_index );
			endif;									
		endif;
	endif;				
	get_template_part('/templates/present-restaurant');
	get_section_restaurant_reservation_without_background();
	get_section_schedule($text_about_schedule, $path_picture_schedule);
	get_section_newsletter();
}

function get_programacao_page() {
	global $home; 
	$text_about_schedule = '';
	$path_picture_schedule = '';
	$path_picture_dates = '';					
	$attachments = new Attachments( 'my_attachments' );
	if( $attachments->exist() ) :
		$my_index = 0; // index of text about schedule
		if( $attachment = $attachments->get_single( $my_index ) ) :
			if( $attachments->type($my_index) == 'text') :
				$text_about_schedule = read_content_from_text_file($attachments->url( $my_index ));
			endif;									
		endif;

		$my_index = 1; // index of picture schedule
		if( $attachment = $attachments->get_single( $my_index ) ) :
			if( $attachments->type($my_index) == 'image') :
				$path_picture_schedule = $attachments->url( $my_index );
			endif;									
		endif;

		$my_index = 2; // index of picture dates
		if( $attachment = $attachments->get_single( $my_index ) ) :
			if( $attachments->type($my_index) == 'image') :
				$path_picture_dates = $attachments->url( $my_index );
			endif;									
		endif;
	endif;	
	get_section_schedule($text_about_schedule,$path_picture_schedule);
	?>
	<div class="d-flex justify-content-center flex-column full-image-background" style="background-image: url(<?=$path_picture_dates?>)">
		<div class="d-flex justify-content-center my-5">
			<div class="d-flex align-items-center col-md-3 col-xs-2"><hr class="hr-white" /></div>
			<div class="d-flex justify-content-center col-md-3 col-xs-6">
				<p class="chamada-secundaria-titulo">Datas de eventos</p>
			</div>
			<div class="d-flex align-items-center col-md-3 col-xs-2"><hr class="hr-white" /></div>
		</div>
		<!-- Slider com programacoes -->
		<div class="d-flex justify-content-center mb-4">
			<div class="col-md-6">
				<div id="myCarousel" class="carousel slide multi-item-carousel" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<?php 
						$count_programacao = wp_count_posts('programacao');
						for($i = 1; $i < $count_programacao; $i++) {?>
							<li data-target="#myCarousel" data-slide-to="<?=$i?>"></li>
						<?php
						}?>
					</ol>
					<div class="carousel-inner">
						<!-- Carregamento das programacoes cadastradas -->
						<?php 
						$args = array( 'post_type' => 'programacao', 'order' => 'ASC' );            
						$loop = new WP_Query( $args );
						$firstItem = true;
						if( $loop->have_posts() ) { 
							?>
						<?php while( $loop->have_posts()) {
							$loop->the_post();
							$programacao_meta_data = get_post_meta(  get_the_ID() );						
							$carousel_class = '';
							if($firstItem){
								$carousel_class = "carousel-item active";
								$firstItem = false;
							} else {
								$carousel_class = "carousel-item";                         
							}
							?>
							<div class="<?=$carousel_class?>">
								<div class="d-flex justify-content-center flex-column">
									<div class="d-flex justify-content-center">
										<img class="image-schedule img-responsive" 
											 src="<?=$home?>/assets/imagens/pages/schedule/calendar.png">
										<p class="chamada-secundaria-page text-inside-image"> <?= esc_attr( $programacao_meta_data['data_id'][0] ); ?></p>
									</div>
								</div>
								<div class="d-flex justify-content-center flex-column" align="start">
										<span class="chamada-texto-branco mt-3"><?=the_title();?></span>
										<span class="chamada-texto-branco mt-3"><?=the_content();?></span>
								</div>
								<div class="d-flex justify-content-center">
									<a class="my-3" href="<?=get_page_link_by_slug('reservas')?>#reserva-anchor" style="text-decoration: none">
										<button class="btn btn-block btn-outline-secondary-lg-green" style="min-width: 200px;">RESERVAR</button>
									</a>
								</div>
							</div>
							<?php
							} 
						} ?>
					</div>
					<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev" style="transform: translate(-60%,0%);">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next" style="transform: translate(60%,0%);">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<?php
	get_section_testemonials_customers();
	get_section_newsletter();
}