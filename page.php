<?php 	
$css_escolhido = 'page';
require_once('header.php');
require_once('landing.php');
require_once('common_sections_site_functions.php');
$home = get_template_directory_uri();

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
			<div class="container-principal w-100" style="background-image: url(<?=$imagem_destacada?>);">
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
			if( is_page('landing') ) { 
				get_landing_page_body_content(); 
			}
			if( is_page('sobre')){
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
			if( is_page('reservas')){
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
			?>
<?php	}
	}
?>
<?php get_footer();?>