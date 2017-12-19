<?php 	
require_once('header.php');
require_once('common_sections_site_functions.php');
$home = get_template_directory_uri();

function get_menu_body_content(){
    get_section_present_restaurant();
	?>
	<?php
	$attachments = new Attachments( 'my_attachments' );
	if( $attachments->exist() ) :
		$my_index = 0; // index of text about plates
		if( $attachment = $attachments->get_single( $my_index ) ) :?>
		<!-- Secao de menu de pratos -->
		<div class="d-flex justify-content-center flex-column mt-5" align="center">
			<p class="mx-auto chamada-principal-apresentacao mt-5">Conheca nossos</p>
			<p class="mx-auto chamada-nome-verde mt-0">PRATOS</p>
		</div>
		<div class="d-flex justify-content-center flex-row flex-wrap" style="min-height: 600px;">
			<div class="col-md-6" align="center"
				style="background-image: url(<?=$attachments->url( $my_index )?>)";>
				<div class="d-flex align-items-center h-100">
					<div class="d-flex flex-column px-5">
						<p class="chamada-principal-menu my-5"><?=$attachments->field( 'title', $my_index );?></p>
						<p class="chamada-secundaria-menu"><?=$attachments->field( 'caption', $my_index );?></p>
					</div>
				</div>
			</div>
			<div class="col-md-6" align="center">
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
		<div class="d-flex justify-content-center flex-row flex-wrap" style="min-height: 600px;">
			<div class="col-md-6" align="center">
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
			<div class="col-md-6" align="center"
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
		<div class="d-flex justify-content-center flex-row flex-wrap" style="min-height: 600px;">
			<div class="col-md-6" align="center"
				style="background-image: url(<?=$attachments->url( $my_index )?>)";>
				<div class="d-flex align-items-center h-100">
					<div class="d-flex flex-column px-5">
						<p class="chamada-principal-menu my-5"><?=$attachments->field( 'title', $my_index );?></p>
						<p class="chamada-secundaria-menu"><?=$attachments->field( 'caption', $my_index );?></p>
					</div>
				</div>
			</div>
			<div class="col-md-6" align="center">
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