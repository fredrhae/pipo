<?php 	
$css_escolhido = 'page';
require_once('header.php');
require_once('landing.php');
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
					get_sobre_nos_page();
					break;
				case 'reservas':
					get_reserva_page();
					break;
				case 'contatos':
					get_contatos_page();
					break;
				case 'menu':
					get_menu_page();
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

function get_contatos_page(){
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

		$my_index = 1; // index of picture chef 1
		if( $attachment = $attachments->get_single( $my_index ) ) :
			if( $attachments->type($my_index) == 'image') :
				$path_picture_schedule = $attachments->url( $my_index );
			endif;									
		endif;
	endif;				
	$text_about_chef = '';
	$path_foto_1 = '';
	$path_foto_2 = '';
	$attachments = new Attachments( 'my_attachments' );
	if( $attachments->exist() ) :
		$my_index = 0; // index of text about chef
		if( $attachment = $attachments->get_single( $my_index ) ) :
			if( $attachments->type($my_index) == 'text') :
				$text_about_chef = read_content_from_text_file($attachments->url( $my_index ));
			endif;									
		endif;
		$my_index = 1; // index of picture chef 1
		if( $attachment = $attachments->get_single( $my_index ) ) :
			if( $attachments->type($my_index) == 'image') :
				$path_foto_1 = $attachments->url( $my_index );
			endif;									
		endif;
		$my_index = 2; // index of picture chef 2
		if( $attachment = $attachments->get_single( $my_index ) ) :
			if( $attachments->type($my_index) == 'image') :
				$path_foto_2 = $attachments->url( $my_index );
			endif;									
		endif;
	endif;

	get_section_restaurant_chef($text_about_chef, $path_foto_1, $path_foto_2);
	get_section_suggestions();
	get_section_newsletter();
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

		$my_index = 1; // index of picture chef 1
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

function get_sobre_nos_page() {
	get_section_present_restaurant();
	$text_about_chef = '';
	$path_foto_1 = '';
	$path_foto_2 = '';
	$attachments = new Attachments( 'my_attachments' );
	if( $attachments->exist() ) :
		$my_index = 0; // index of text about chef
		if( $attachment = $attachments->get_single( $my_index ) ) :
			if( $attachments->type($my_index) == 'text') :
				$text_about_chef = read_content_from_text_file($attachments->url( $my_index ));
			endif;									
		endif;
		$my_index = 1; // index of picture chef 1
		if( $attachment = $attachments->get_single( $my_index ) ) :
			if( $attachments->type($my_index) == 'image') :
				$path_foto_1 = $attachments->url( $my_index );
			endif;									
		endif;
		$my_index = 2; // index of picture chef 2
		if( $attachment = $attachments->get_single( $my_index ) ) :
			if( $attachments->type($my_index) == 'image') :
				$path_foto_2 = $attachments->url( $my_index );
			endif;									
		endif;
	endif;
	get_section_restaurant_chef($text_about_chef, $path_foto_1, $path_foto_2);
	?>
	<div class="d-flex justify-content-center flex-column my-5" align="center">
		<div class="col-md-6 my-5" align="center">
			<p class="mx-auto chamada-principal-apresentacao mt-5">Conheca</p>
			<p class="mx-auto chamada-nome-vermelho-pequeno">POR DENTRO</p>
		</div>
		<div class="col-md-12">
			<iframe src="https://www.google.com/maps/embed?pb=!1m0!4v1512536354870!6m8!1m7!1s_zO4TgHq9CV8Htxbh65n2A!2m2!1d-3.751269329031429!2d-38.49344931980673!3f181.73383235236457!4f-7.88470002632296!5f0.7820865974627469" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
	<?php
	get_section_restaurant_reservation();
}

function get_menu_page() {
	get_section_present_restaurant();
	?>
	<?php
	$attachments = new Attachments( 'my_attachments' );
	if( $attachments->exist() ) :
		$my_index = 0; // index of text about plates
		if( $attachment = $attachments->get_single( $my_index ) ) :?>
		<!-- Secao de menu de pratos -->
		<div class="d-flex justify-content-center flex-column mt-5" align="center">
			<p class="mx-auto chamada-principal-apresentacao my-0">Conheca nossos</p>
			<p class="mx-auto chamada-nome-verde mt-0">PRATOS</p>
		</div>
		<div class="d-flex justify-content-center flex-row" style="min-height: 600px;">
			<div class="col-md-6 col-sm-12" align="center"
				style="background-image: url(<?=$attachments->url( $my_index )?>)";>
				<div class="d-flex align-items-center h-100">
					<div class="d-flex flex-column px-5">
						<p class="chamada-principal-menu my-5"><?=$attachments->field( 'title', $my_index );?></p>
						<p class="chamada-secundaria-menu"><?=$attachments->field( 'caption', $my_index );?></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-12" align="center">
				<!-- Carregamento dos pratos cadastrados -->
				<?php 
                $args = array( 'post_type' => 'prato', 'order' => 'ASC' );            
                $loop = new WP_Query( $args );
                $firstItem = true;
                if( $loop->have_posts() ) { 
                	?>
                	<?php while( $loop->have_posts()) {
						$loop->the_post();
						$bebida_meta_data = get_post_meta(  get_the_ID() );?>
						<div class="d-flex flex-column">
							<div class="d-flex justify-content-between flex-row">
								<div class="mx-2">
									<p class="chamada-principal-item-menu"><?php the_title(); ?></p>
								</div>
								<div class="mx-2">
									<p class="chamada-nome-vermelho-pequeno pl-3">R$ <?= esc_attr( $bebida_meta_data['preco_id'][0] ); ?></p>
								</div>
							</div>
							<div class="d-flex align-items-start chamada-secundaria-item-menu ml-1">
								<?php the_content(); ?>
							</div>
						</div>
					<?php
					} 
				}
				?>
			</div>
		</div>
		<?php
		endif;?>
		<!-- Secao de menu de sobremesas -->
		<div class="d-flex justify-content-center flex-column" align="center">
			<p class="mx-auto chamada-principal-apresentacao">Conheca nossas</p>
			<p class="mx-auto chamada-nome-vermelho">SOBREMESAS</p>
		</div>
		<?php
		$my_index = 1; // index of text about desserts
		if( $attachment = $attachments->get_single( $my_index ) ) :?>
		<div class="d-flex justify-content-center flex-row" style="min-height: 600px;">
			<div class="col-md-6 col-sm-12" align="center">
				<!-- Carregamento das sobremesas cadastradas -->
				<?php 
				$args = array( 'post_type' => 'sobremesa', 'order' => 'ASC' );            
				$loop = new WP_Query( $args );
				$firstItem = true;
				if( $loop->have_posts() ) { 
					?>
					<?php while( $loop->have_posts()) {
						$loop->the_post();
						$bebida_meta_data = get_post_meta(  get_the_ID() );?>
						<div class="d-flex flex-column">
							<div class="d-flex justify-content-between flex-row">
								<div class="mx-2">
									<p class="chamada-principal-item-menu"><?php the_title(); ?></p>
								</div>
								<div class="mx-2">
									<p class="chamada-nome-verde-pequeno pl-3">R$ <?= esc_attr( $bebida_meta_data['preco_id'][0] ); ?></p>
								</div>
							</div>
							<div class="d-flex align-items-start chamada-secundaria-item-menu ml-1">
								<?php the_content(); ?>
							</div>
						</div>
					<?php
					} 
				}
				?>
			</div>
			<div class="col-md-6 col-sm-12" align="center"
				style="background-image: url(<?=$attachments->url( $my_index )?>)";>
				<div class="d-flex align-items-center h-100">
					<div class="d-flex flex-column px-5">
						<p class="chamada-principal-menu my-5"><?=$attachments->field( 'title', $my_index );?></p>
						<p class="chamada-secundaria-menu"><?=$attachments->field( 'caption', $my_index );?></p>
					</div>
				</div>
			</div>
		</div>
		<?php
		endif;?>
		<!-- Secao de menu de bebidas -->
		<div class="d-flex justify-content-center flex-column" align="center">
			<p class="mx-auto chamada-principal-apresentacao">Conheca nossos</p>
			<p class="mx-auto chamada-nome-verde">DRINKS</p>
		</div>
		<?php
		$my_index = 2; // index of text about drinks
		if( $attachment = $attachments->get_single( $my_index ) ) :?>
		<div class="d-flex justify-content-center flex-row" style="min-height: 600px;">
			<div class="col-md-6 col-sm-12" align="center"
				style="background-image: url(<?=$attachments->url( $my_index )?>)";>
				<div class="d-flex align-items-center h-100">
					<div class="d-flex flex-column px-5">
						<p class="chamada-principal-menu my-5"><?=$attachments->field( 'title', $my_index );?></p>
						<p class="chamada-secundaria-menu"><?=$attachments->field( 'caption', $my_index );?></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-12" align="center">
				<!-- Carregamento das bebidas cadastradas -->
				<?php 
				$args = array( 'post_type' => 'bebida', 'order' => 'ASC' );            
				$loop = new WP_Query( $args );
				$firstItem = true;
				if( $loop->have_posts() ) { 
					?>
					<?php while( $loop->have_posts()) {
						$loop->the_post();
						$bebida_meta_data = get_post_meta(  get_the_ID() );?>
						<div class="d-flex flex-column">
							<div class="d-flex justify-content-between flex-row">
								<div class="mx-2">
									<p class="chamada-principal-item-menu"><?php the_title(); ?></p>
								</div>
								<div class="mx-2">
									<p class="chamada-nome-vermelho-pequeno pl-3">R$ <?= esc_attr( $bebida_meta_data['preco_id'][0] ); ?></p>
								</div>
							</div>
							<div class="d-flex align-items-start chamada-secundaria-item-menu ml-1">
								<?php the_content(); ?>
							</div>
						</div>
					<?php
					} 
				}
				?>
			</div>
		</div>
		<?php
		endif;
	endif;
	?>
	<?php
	get_section_restaurant_reservation();
}
?>