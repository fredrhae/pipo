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
    $page = get_page_by_path($pageSlug);
    return get_permalink($page->ID);
}

function enviar_e_checar_email_reserva($nome, $email, $telefone, $pessoas, $data, $tipo_evento) {
    return wp_mail( 'fredrhae@gmail.com', 'Reserva restaurante', 
                  'Nome: ' . $nome . "\n" .
                  'Email: ' .  $email . "\n" .
                  'Telefone: ' . $telefone . "\n" .
                  'Data do evento: ' . $data . "\n" .
                  'Quantidade de Pessoas: ' . $pessoas . "\n" . 
                  'Tipo de evento: ' . $tipo_evento . "\n");
}

function enviar_e_checar_sugestao($nome, $email, $sugestao) {
  return wp_mail( 'fredrhae@gmail.com', 'Fale conosco', 
                'Nome: ' . $nome . "\n" .
                'Email: ' .  $email . "\n" .
                'Sugestão: ' . $sugestao . "\n");
}

function enviar_e_checar_email_newsletter($email) {
  return wp_mail( 'fredrhae@gmail.com', 'Assinatura newsletter', 
                'Email do interessado: ' .  $email . "\n");
}


function registrar_menu_programacao() {
    $descricao = 'Usado para listar a programação do restaurante Pipo';
    $singular = 'Programação';
    $plural = 'Programações';
  
    $labels = array(
        'name' => $plural,
        'singular_name' => $singular,
        'view_item' => 'Ver ' . $singular,
        'edit_item' => 'Editar ' . $singular,
        'new_item' => 'Novo ' . $singular,
        'add_new_item' => 'Adicionar nova ' . $singular
    );
  
    $supports = array(
        'title',
        'editor',
        'thumbnail'
    );
  
    $args = array(
        'labels' => $labels,
        'description' => $descricao,
        'public' => true,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => $supports
    );
  
  
    register_post_type( 'programacao', $args);    
}
  
  add_action('init', 'registrar_menu_programacao');

function registrar_depoimento_cliente() {
  $descricao = 'Usado para listar os testemunhos de clientes do Pipo';
  $singular = 'Depoimento de Cliente';
  $plural = 'Depoimentos de Clientes';

  $labels = array(
      'name' => $plural,
      'singular_name' => $singular,
      'view_item' => 'Ver ' . $singular,
      'edit_item' => 'Editar ' . $singular,
      'new_item' => 'Novo ' . $singular,
      'add_new_item' => 'Adicionar novo ' . $singular
  );

  $supports = array(
      'title',
      'editor',
      'thumbnail'
  );

  $args = array(
      'labels' => $labels,
      'description' => $descricao,
      'public' => true,
      'menu_icon' => 'dashicons-testimonial',
      'supports' => $supports
  );


  register_post_type( 'depoimentoCliente', $args);    
}

add_action('init', 'registrar_depoimento_cliente');

function registrar_depoimento_noiva() {
  $descricao = 'Usado para listar os testemunhos de noivas que casaram no Pipo';
  $singular = 'Depoimento de Noiva';
  $plural = 'Depoimentos de Noivas';

  $labels = array(
      'name' => $plural,
      'singular_name' => $singular,
      'view_item' => 'Ver ' . $singular,
      'edit_item' => 'Editar ' . $singular,
      'new_item' => 'Novo ' . $singular,
      'add_new_item' => 'Adicionar novo ' . $singular
  );

  $supports = array(
      'title',
      'editor',
      'thumbnail'
  );

  $args = array(
      'labels' => $labels,
      'description' => $descricao,
      'public' => true,
      'menu_icon' => 'dashicons-testimonial',
      'supports' => $supports
  );


  register_post_type( 'depoimentoNoiva', $args);    
}

add_action('init', 'registrar_depoimento_noiva');

function registrar_menu_entradas() {
    $descricao = 'Usado para listar as entradas servidas no Pipo';
    $singular = 'Entrada';
    $plural = 'Entradas';
  
    $labels = array(
        'name' => $plural,
        'singular_name' => $singular,
        'view_item' => 'Ver ' . $singular,
        'edit_item' => 'Editar ' . $singular,
        'new_item' => 'Novo ' . $singular,
        'add_new_item' => 'Adicionar novo ' . $singular
    );
  
    $supports = array(
        'title',
        'editor',
        'thumbnail'
    );
  
    $args = array(
        'labels' => $labels,
        'description' => $descricao,
        'public' => true,
        'menu_icon' => 'dashicons-post-status',
        'supports' => $supports
    );
  
  
    register_post_type( 'entrada', $args);    
}

add_action('init', 'registrar_menu_entradas');

function registrar_menu_pratos_tinto() {
    $descricao = 'Usado para listar os pratos que harmonizam com vinho tinto do Pipo';
    $singular = 'Prato vinho tinto';
    $plural = 'Pratos vinho tinto';
  
    $labels = array(
        'name' => $plural,
        'singular_name' => $singular,
        'view_item' => 'Ver ' . $singular,
        'edit_item' => 'Editar ' . $singular,
        'new_item' => 'Novo ' . $singular,
        'add_new_item' => 'Adicionar novo ' . $singular
    );
  
    $supports = array(
        'title',
        'editor',
        'thumbnail'
    );
  
    $args = array(
        'labels' => $labels,
        'description' => $descricao,
        'public' => true,
        'menu_icon' => 'dashicons-carrot',
        'supports' => $supports
    );
  
  
    register_post_type( 'pratoTinto', $args);    
}

add_action('init', 'registrar_menu_pratos_tinto');  

function registrar_menu_pratos_branco() {
    $descricao = 'Usado para listar os pratos que harmonizam com vinho branco/rosé do Pipo';
    $singular = 'Prato vinho branco';
    $plural = 'Pratos vinho branco';
  
    $labels = array(
        'name' => $plural,
        'singular_name' => $singular,
        'view_item' => 'Ver ' . $singular,
        'edit_item' => 'Editar ' . $singular,
        'new_item' => 'Novo ' . $singular,
        'add_new_item' => 'Adicionar novo ' . $singular
    );
  
    $supports = array(
        'title',
        'editor',
        'thumbnail'
    );
  
    $args = array(
        'labels' => $labels,
        'description' => $descricao,
        'public' => true,
        'menu_icon' => 'dashicons-visibility',
        'supports' => $supports
    );
  
  
    register_post_type( 'pratoBranco', $args);    
}

add_action('init', 'registrar_menu_pratos_branco');  

function registrar_menu_pratos_infantis() {
    $descricao = 'Usado para listar os pratos infantis servidos no Pipo';
    $singular = 'Prato infantil';
    $plural = 'Pratos infantis';
  
    $labels = array(
        'name' => $plural,
        'singular_name' => $singular,
        'view_item' => 'Ver ' . $singular,
        'edit_item' => 'Editar ' . $singular,
        'new_item' => 'Novo ' . $singular,
        'add_new_item' => 'Adicionar novo ' . $singular
    );
  
    $supports = array(
        'title',
        'editor',
        'thumbnail'
    );
  
    $args = array(
        'labels' => $labels,
        'description' => $descricao,
        'public' => true,
        'menu_icon' => 'dashicons-star-filled',
        'supports' => $supports
    );
  
  
    register_post_type( 'pratoInfantil', $args);    
}
  
add_action('init', 'registrar_menu_pratos_infantis');

function registrar_menu_sobremesas() {
    $descricao = 'Usado para listar as sobremesas do Pipo';
    $singular = 'Sobremesa';
    $plural = 'Sobremesas';
  
    $labels = array(
        'name' => $plural,
        'singular_name' => $singular,
        'view_item' => 'Ver ' . $singular,
        'edit_item' => 'Editar ' . $singular,
        'new_item' => 'Novo ' . $singular,
        'add_new_item' => 'Adicionar nova ' . $singular
    );
  
    $supports = array(
        'title',
        'editor',
        'thumbnail'
    );
  
    $args = array(
        'labels' => $labels,
        'description' => $descricao,
        'public' => true,
        'menu_icon' => 'dashicons-clipboard',
        'supports' => $supports
    );
  
  
    register_post_type( 'sobremesa', $args);    
}
  
add_action('init', 'registrar_menu_sobremesas');

function registrar_menu_bebidas() {
  $descricao = 'Usado para listar as bebidas servidas no Pipo';
  $singular = 'Bebida';
  $plural = 'Bebidas';

  $labels = array(
      'name' => $plural,
      'singular_name' => $singular,
      'view_item' => 'Ver ' . $singular,
      'edit_item' => 'Editar ' . $singular,
      'new_item' => 'Novo ' . $singular,
      'add_new_item' => 'Adicionar novo ' . $singular
  );

  $supports = array(
      'title',
      'editor',
      'thumbnail'
  );

  $args = array(
      'labels' => $labels,
      'description' => $descricao,
      'public' => true,
      'menu_icon' => 'dashicons-media-document',
      'supports' => $supports
  );


  register_post_type( 'bebida', $args);    
}

add_action('init', 'registrar_menu_bebidas');

function registrar_menu_finger_food() {
    $descricao = 'Usado para listar as finger foods servidas no Pipo';
    $singular = 'Finger food';
    $plural = 'Finger foods';
  
    $labels = array(
        'name' => $plural,
        'singular_name' => $singular,
        'view_item' => 'Ver ' . $singular,
        'edit_item' => 'Editar ' . $singular,
        'new_item' => 'Novo ' . $singular,
        'add_new_item' => 'Adicionar novo ' . $singular
    );
  
    $supports = array(
        'title',
        'editor',
        'thumbnail'
    );
  
    $args = array(
        'labels' => $labels,
        'description' => $descricao,
        'public' => true,
        'menu_icon' => 'dashicons-thumbs-up',
        'supports' => $supports
    );
  
  
    register_post_type( 'fingerFood', $args);    
}
  
add_action('init', 'registrar_menu_finger_food');

function registrar_lista_vantagens_landing() {
    $descricao = 'Usado para registrar as vantagens de casar no Pipo';
    $singular = 'Vantagem';
    $plural = 'Vantagens';
  
    $labels = array(
        'name' => $plural,
        'singular_name' => $singular,
        'view_item' => 'Ver ' . $singular,
        'edit_item' => 'Editar ' . $singular,
        'new_item' => 'Novo ' . $singular,
        'add_new_item' => 'Adicionar novo ' . $singular
    );
  
    $supports = array(
        'title',
        'editor',
        'thumbnail'
    );
  
    $args = array(
        'labels' => $labels,
        'description' => $descricao,
        'public' => true,
        'menu_icon' => 'dashicons-welcome-write-blog',
        'supports' => $supports
    );
  
  
    register_post_type( 'vantagem', $args);    
}
  
add_action('init', 'registrar_lista_vantagens_landing');

function adicionar_meta_info_preco_menu_bebidas() {
	add_meta_box(
		'preco_bebida',
		'Preço',
		'preco_view',
		'bebida',
		'normal',
		'high'
	);
}

add_action('add_meta_boxes', 'adicionar_meta_info_preco_menu_bebidas');

function adicionar_meta_info_preco_menu_sobremesa() {
	add_meta_box(
		'preco_sobremesa',
		'Preço',
		'preco_view',
		'sobremesa',
		'normal',
		'high'
	);
}

add_action('add_meta_boxes', 'adicionar_meta_info_preco_menu_sobremesa');

function adicionar_meta_info_preco_menu_entrada() {
	add_meta_box(
		'preco_entrada',
		'Preço',
		'preco_view',
		'entrada',
		'normal',
		'high'
	);
}

add_action('add_meta_boxes', 'adicionar_meta_info_preco_menu_entrada');

function adicionar_meta_info_preco_menu_prato_tinto() {
	add_meta_box(
		'preco_prato_tinto',
		'Preço',
		'preco_view',
		'pratoTinto',
		'normal',
		'high'
	);
}

add_action('add_meta_boxes', 'adicionar_meta_info_preco_menu_prato_tinto');

function adicionar_meta_info_preco_menu_prato_branco() {
	add_meta_box(
		'preco_prato_branco',
		'Preço',
		'preco_view',
		'pratoBranco',
		'normal',
		'high'
	);
}

add_action('add_meta_boxes', 'adicionar_meta_info_preco_menu_prato_branco');

function adicionar_meta_info_preco_menu_prato_infantil() {
	add_meta_box(
		'preco_prato_infantil',
		'Preço',
		'preco_view',
		'pratoInfantil',
		'normal',
		'high'
	);
}

add_action('add_meta_boxes', 'adicionar_meta_info_preco_menu_prato_infantil');

function adicionar_meta_info_preco_menu_finger_food() {
	add_meta_box(
		'preco_finger_food',
		'Preço',
		'preco_view',
		'fingerFood',
		'normal',
		'high'
	);
}

add_action('add_meta_boxes', 'adicionar_meta_info_preco_menu_finger_food');

function preco_view( $post ) { 
    $preco_meta_data = get_post_meta( $post->ID ); 
    ?>
	<style>
		.preco-metabox {
			display: flex;
			justify-content: space-between;
		}

		.preco-metabox-item {
			flex-basis: 30%;

		}

		.preco-metabox-item label {
			font-weight: 700;
			display: block;
			margin: .5rem 0;

		}

		.input-addon-wrapper {
			height: 30px;
			display: flex;
			align-items: center;
		}

		.input-addon {
			display: block;
			border: 1px solid #CCC;
			border-bottom-left-radius: 5px;
			border-top-left-radius: 5px;
			height: 100%;
			width: 30px;
			text-align: center;
			line-height: 30px;
			box-sizing: border-box;
			background-color: #888;
			color: #FFF;
		}

		.preco-metabox-input {
			height: 100%;
			border: 1px solid #CCC;
			border-left: none;
			margin: 0;
		}

	</style>
	<div class="preco-metabox">
		<div class="preco-metabox-item">
			<label for="preco-preco-input">Preço:</label>
			<div class="input-addon-wrapper">
				<span class="input-addon">R$</span>
				<input id="preco-input" class="preco-metabox-input" type="text" name="preco_id"
				value="<?= number_format($preco_meta_data['preco_id'][0], 2, ',', '.'); ?>">
			</div>
		</div>
	</div>
<?php
}

function salvar_meta_info_preco( $post_id ) {
	if( isset($_POST['preco_id']) ) {
		update_post_meta( $post_id, 'preco_id', sanitize_text_field( $_POST['preco_id'] ) );
	}
}

add_action('save_post', 'salvar_meta_info_preco');

function adicionar_meta_info_date_programacao() {
	add_meta_box(
		'date_programacao',
		'Data',
		'date_view',
		'programacao',
		'normal',
		'high'
	);
}

add_action('add_meta_boxes', 'adicionar_meta_info_date_programacao');

function date_view( $post ) { 
    $date_meta_data = get_post_meta( $post->ID ); 
    ?>
	<style>
		.date-metabox {
			display: flex;
			justify-content: space-between;
		}

		.date-metabox-item {
			flex-basis: 30%;

		}

		.date-metabox-item label {
			font-weight: 700;
			display: block;
			margin: .5rem 0;

		}

		.input-addon-wrapper {
			height: 30px;
			display: flex;
			align-items: center;
		}

		.input-addon {
			display: block;
			border: 1px solid #CCC;
			border-bottom-left-radius: 5px;
			border-top-left-radius: 5px;
			height: 100%;
			width: 30px;
			text-align: center;
			line-height: 30px;
			box-sizing: border-box;
			background-color: #888;
			color: #FFF;
		}

		.date-metabox-input {
			height: 100%;
			border: 1px solid #CCC;
			border-left: none;
			margin: 0;
		}

	</style>
	<div class="date-metabox">
		<div class="date-metabox-item">
			<label for="date-input">Data:</label>
			<div class="input-addon-wrapper">
				<input id="date-input" class="date-metabox-input" type="date" name="data_id"
				value="<?= $date_meta_data['data_id'][0]; ?>">
			</div>
		</div>
	</div>
<?php
}

function salvar_meta_info_date( $post_id ) {
	if( isset($_POST['data_id']) ) {
		update_post_meta( $post_id, 'data_id', sanitize_text_field( $_POST['data_id'] ) );
	}
}

add_action('save_post', 'salvar_meta_info_date');

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
    'post_type'     => array( 'post','page', 'programacao', 'depoimentoCliente' 
                              ,'depoimentoNoiva', 'bebida', 'prato', 'sobremesa'),

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
  return file_get_contents($path_text_file);
}