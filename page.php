<?php 	
$css_escolhido = 'page';
require_once('header.php');
require_once('landing.php');
require_once('menu.php');
require_once('contact.php');
require_once('about_us.php');
require_once('common_sections_site_functions.php');
$home = get_template_directory_uri();

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
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				$imagem_destacada = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			} else {
				$imagem_destacada = $home . '/assets/imagens/background-default.jpg';
			}
			?>
			<!-- Conteudo principal -->
			<div class="container-principal" style="background-image: url(<?=$imagem_destacada?>);">
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
        <p class="mx-auto chamada-principal-apresentacao">Sugestoes</p>
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
                        <textarea id="form-sugestao" type="text" placeholder="Sua sugestão" name="form-sugestao" class="input w-100 mb-5" rows="10"></textarea>
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
	get_section_present_restaurant();
	get_section_restaurant_reservation_without_background();
	get_section_schedule($text_about_schedule, $path_picture_schedule);
	get_section_newsletter();
}

function get_programacao_page() {
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
	get_section_schedule($text_about_schedule,$path_picture_schedule);
	get_section_testemonials_customers();
	get_section_newsletter();
}
?>