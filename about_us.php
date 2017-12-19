<?php 	
require_once('header.php');
require_once('common_sections_site_functions.php');
$home = get_template_directory_uri();

function get_about_us_body_content() {
	get_section_present_restaurant();
	$text_about_chef = '';
	$path_foto = '';
	$attachments = new Attachments( 'my_attachments' );
	if( $attachments->exist() ) :
		$my_index = 0; // index of text about chef
		if( $attachment = $attachments->get_single( $my_index ) ) :
			if( $attachments->type($my_index) == 'text') :
				$text_about_chef = read_content_from_text_file($attachments->url( $my_index ));
			endif;									
		endif;
		$my_index = 1; // index of picture
		if( $attachment = $attachments->get_single( $my_index ) ) :
			if( $attachments->type($my_index) == 'image') :
				$path_foto = $attachments->url( $my_index );
			endif;									
		endif;
	endif;
	get_section_restaurant_chef($text_about_chef, $path_foto);
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