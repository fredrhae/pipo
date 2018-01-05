<?php 	
require_once('header.php');
require_once('common_sections_site_functions.php');
$home = get_template_directory_uri();

function get_contact_body_content(){
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
	$path_foto = '';
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
				$path_foto = $attachments->url( $my_index );
			endif;									
		endif;
	endif;

	get_section_restaurant_chef($text_about_chef, $path_foto);
	get_section_suggestions();
	get_section_newsletter();
}