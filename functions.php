<?php

add_theme_support('post-thumbnails');

function get_titulo() {
	if( is_home() ) {
		bloginfo('name');
	} else {
		bloginfo('name');
		echo ' | ';
		the_title();
	}
}

function get_page_link_by_slug($pageSlug) {
    $page = get_page_by_title($pageSlug);
    return get_permalink($page->ID);
}

function enviar_e_checar_email_reserva($nome, $email, $telefone, $pessoas, $data) {
    return wp_mail( 'fredrhae@gmail.com', 'Reserva restaurante', 
                  'Nome: ' . $nome . "\n" .
                  'Email: ' .  $email . "\n" .
                  'Telefone: ' . $telefone . "\n" .
                  'Data do evento:' . $data . "\n" .
                  'Quantidade de Pessoas:' . $pessoas . "\n");
}

function my_attachments( $attachments )
{
  $fields         = array(
    array(
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Title', 'attachments' ),    // label to display
      'default'   => 'title',                         // default value upon selection
    ),
    array(
      'name'      => 'caption',                       // unique field name
      'type'      => 'textarea',                      // registered field type
      'label'     => __( 'Caption', 'attachments' ),  // label to display
      'default'   => 'caption',                       // default value upon selection
    ),
  );

  $args = array(

    // title of the meta box (string)
    'label'         => 'Anexos da pagina',

    // all post types to utilize (string|array)
    'post_type'     => array( 'post','page', 'cardapio', 'programacao'),

    // meta box position (string) (normal, side or advanced)
    'position'      => 'normal',

    // meta box priority (string) (high, default, low, core)
    'priority'      => 'high',

    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => null,  // no filetype limit

    // include a note within the meta box (string)
    'note'          => 'Anexe arquivos aqui!',

    // by default new Attachments will be appended to the list
    // but you can have then prepend if you set this to false
    'append'        => true,

    // text for 'Attach' button in meta box (string)
    'button_text'   => __( 'Anexe imagens e textos', 'attachments' ),

    // text for modal 'Attach' button (string)
    'modal_text'    => __( 'Anexos', 'attachments' ),

    // which tab should be the default in the modal (string) (browse|upload)
    'router'        => 'browse',

    // whether Attachments should set 'Uploaded to' (if not already set)
	  'post_parent'   => false,

    // fields array
    'fields'        => $fields,

  );

  $attachments->register( 'my_attachments', $args ); // unique instance name
}

add_action( 'attachments_register', 'my_attachments' );

function read_content_from_text_file($path_text_file)
{
    if(file_exists($path_text_file)){
      return file_get_contents($robots_file);
    } else {
      return 'Lorem ipsum sobre chefe de cozinha 
      Morbi quam dui, sodales a porta eget, suscipit quis lacus. Vestibulum molestie interdum lectus, nec gravida quam varius et. 
      Nulla orci purus, aliquam eu feugiat venenatis, placerat ac urna.';
    }
}