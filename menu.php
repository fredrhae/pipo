<?php 	
require_once('header.php');
require_once('common_sections_site_functions.php');
$home = get_template_directory_uri();

function get_menu_body_content(){
	get_template_part('/templates/present-restaurant');
	?>
	<?php
	$attachments = new Attachments( 'my_attachments' );
	if( $attachments->exist() ) :?>
		<!-- Secao de menu de entradas -->
		<div class="d-flex justify-content-center flex-column" align="center">
			<p class="mx-auto chamada-principal-apresentacao">Conheça nossas</p>
			<p class="mx-auto chamada-nome-verde">ENTRADAS</p>
		</div>
		<?php
		$my_index = 0; // index of text about entradas
		if( $attachment = $attachments->get_single( $my_index ) ) :?>
		<div class="d-flex justify-content-center flex-row flex-wrap" style="min-height: 400px;">
			<div class="col-md-6 p-0" align="center"
				style="background-image: url(<?=$attachments->url( $my_index )?>) ; background-size: cover";>
				<div class="d-flex align-items-center h-100">
					<div class="d-flex flex-column px-5">
						<p class="chamada-principal-menu my-5"><?=$attachments->field( 'title', $my_index );?></p>
						<p class="chamada-secundaria-menu"><?=$attachments->field( 'caption', $my_index );?></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 p-0" align="center">
				<!-- Carregamento das entradas cadastradas -->
				<?php 
				$args = array( 'post_type' => 'entrada', 'order' => 'ASC' );            
				$loop = new WP_Query( $args );
				$firstItem = true;
				if( $loop->have_posts() ) { 
					?>
					<?php while( $loop->have_posts()) {
						$loop->the_post();
						$bebida_meta_data = get_post_meta(  get_the_ID() );?>
						<div class="d-flex flex-column mt-3">
							<div class="d-flex justify-content-between flex-row" align="start">
								<div class="mx-2">
									<p class="chamada-principal-item-menu"><?php the_title(); ?></p>
								</div>
								<div class="menu-dotted-separator mb-3"></div>
								<div class="mx-2">
									<p class="chamada-nome-vermelho-pequeno pl-3">R$ <?= esc_attr( $bebida_meta_data['preco_id'][0] ); ?></p>
								</div>
							</div>
							<div class="d-flex align-items-start chamada-secundaria-item-menu ml-2" align="start">
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
		$my_index = 1; // index of text about plates with red wine
		if( $attachment = $attachments->get_single( $my_index ) ) :?>
		<!-- Secao de menu de pratos principais que combinam com vinho tinto -->
		<div class="d-flex justify-content-center flex-column" id="pratos-menu-anchor" align="center">
			<p class="mx-auto chamada-principal-apresentacao">Conheça nossos pratos principais</p>
			<p class="mx-auto chamada-nome-vermelho mt-0">QUE HARMONIZAM COM VINHO TINTO</p>
		</div>
		<div class="d-flex justify-content-center flex-row flex-wrap" style="min-height: 400px;">
			<div class="col-md-6 p-0" align="center">
				<!-- Carregamento dos pratos principais que combinam com vinho tinto cadastrados -->
				<?php 
                $args = array( 'post_type' => 'pratoTinto', 'order' => 'ASC' );            
                $loop = new WP_Query( $args );
                $firstItem = true;
                if( $loop->have_posts() ) { 
                	?>
                	<?php while( $loop->have_posts()) {
						$loop->the_post();
						$bebida_meta_data = get_post_meta(  get_the_ID() );?>
						<div class="d-flex flex-column mt-3">
							<div class="d-flex justify-content-between flex-row" align="start">
								<div class="mx-2">
									<p class="chamada-principal-item-menu"><?php the_title(); ?></p>
								</div>
								<div class="menu-dotted-separator mb-3"></div>
								<div class="mx-2">
									<p class="chamada-nome-verde-pequeno pl-3">R$ <?= esc_attr( $bebida_meta_data['preco_id'][0] ); ?></p>
								</div>
							</div>
							<div class="d-flex align-items-start chamada-secundaria-item-menu ml-2" align="start">
								<?php the_content(); ?>
							</div>
						</div>
					<?php
					} 
				}
				?>
			</div>
			<div class="col-md-6 p-0" align="center"
				style="background-image: url(<?=$attachments->url( $my_index )?>); background-size: cover";>
				<div class="d-flex align-items-center h-100">
					<div class="d-flex flex-column px-5">
						<p class="chamada-principal-menu my-5"><?=$attachments->field( 'title', $my_index );?></p>
						<p class="chamada-secundaria-menu"><?=$attachments->field( 'caption', $my_index );?></p>
					</div>
				</div>
			</div>
		</div>
		<?php
		endif;
		$my_index = 2;
		if( $attachment = $attachments->get_single( $my_index ) ) :?>
		<!-- Secao de menu de pratos que combinam com vinho branco/rosé -->
		<div class="d-flex justify-content-center flex-column" id="pratos-menu-anchor" align="center">
			<p class="mx-auto chamada-principal-apresentacao">Conheça nossos pratos principais</p>
			<p class="mx-auto chamada-nome-verde mt-0">QUE HARMONIZAM COM VINHO BRANCO/ROSÉ</p>
		</div>
		<div class="d-flex justify-content-center flex-row flex-wrap" style="min-height: 400px;">
			<div class="col-md-6 p-0" align="center"
				style="background-image: url(<?=$attachments->url( $my_index )?>); background-size: cover";>
				<div class="d-flex align-items-center h-100">
					<div class="d-flex flex-column px-5">
						<p class="chamada-principal-menu my-5"><?=$attachments->field( 'title', $my_index );?></p>
						<p class="chamada-secundaria-menu"><?=$attachments->field( 'caption', $my_index );?></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 p-0" align="center">
				<!-- Carregamento dos pratos que combinam com vinho branco/rosé cadastrados -->
				<?php 
                $args = array( 'post_type' => 'pratoBranco', 'order' => 'ASC' );            
                $loop = new WP_Query( $args );
                $firstItem = true;
                if( $loop->have_posts() ) { 
                	?>
                	<?php while( $loop->have_posts()) {
						$loop->the_post();
						$bebida_meta_data = get_post_meta(  get_the_ID() );?>
						<div class="d-flex flex-column mt-3">
							<div class="d-flex justify-content-between flex-row" align="start">
								<div class="mx-2">
									<p class="chamada-principal-item-menu"><?php the_title(); ?></p>
								</div>
								<div class="menu-dotted-separator mb-3"></div>
								<div class="mx-2">
									<p class="chamada-nome-vermelho-pequeno pl-3">R$ <?= esc_attr( $bebida_meta_data['preco_id'][0] ); ?></p>
								</div>
							</div>
							<div class="d-flex align-items-start chamada-secundaria-item-menu ml-2" align="start">
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
		<!-- Secao de menu de pratos infantis -->
		<div class="d-flex justify-content-center flex-column" align="center">
			<p class="mx-auto chamada-principal-apresentacao">Conheça nossos</p>
			<p class="mx-auto chamada-nome-vermelho">PRATOS INFANTIS</p>
		</div>
		<?php
		$my_index = 3;
		if( $attachment = $attachments->get_single( $my_index ) ) :?>
		<div class="d-flex justify-content-center flex-row flex-wrap" style="min-height: 400px;">
			<div class="col-md-6 p-0" align="center">
				<!-- Carregamento dos pratos infantis cadastrados -->
				<?php 
				$args = array( 'post_type' => 'pratoInfantil', 'order' => 'ASC' );            
				$loop = new WP_Query( $args );
				$firstItem = true;
				if( $loop->have_posts() ) { 
					?>
					<?php while( $loop->have_posts()) {
						$loop->the_post();
						$bebida_meta_data = get_post_meta(  get_the_ID() );?>
						<div class="d-flex flex-column mt-3">
							<div class="d-flex justify-content-between flex-row" align="start">
								<div class="mx-2">
									<p class="chamada-principal-item-menu"><?php the_title(); ?></p>
								</div>
								<div class="menu-dotted-separator mb-3"></div>
								<div class="mx-2">
									<p class="chamada-nome-verde-pequeno pl-3">R$ <?= esc_attr( $bebida_meta_data['preco_id'][0] ); ?></p>
								</div>
							</div>
							<div class="d-flex align-items-start chamada-secundaria-item-menu ml-2" align="start">
								<?php the_content(); ?>
							</div>
						</div>
					<?php
					} 
				}
				?>
			</div>
			<div class="col-md-6 p-0" align="center"
				style="background-image: url(<?=$attachments->url( $my_index )?>) ; background-size: cover";>
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
		<!-- Secao de menu de sobremesas -->
		<div class="d-flex justify-content-center flex-column" align="center">
			<p class="mx-auto chamada-principal-apresentacao">Conheça nossas</p>
			<p class="mx-auto chamada-nome-verde">SOBREMESAS</p>
		</div>
		<?php
		$my_index = 4; // index of text about desserts
		if( $attachment = $attachments->get_single( $my_index ) ) :?>
		<div class="d-flex justify-content-center flex-row flex-wrap" style="min-height: 400px;">
			<div class="col-md-6 p-0" align="center"
				style="background-image: url(<?=$attachments->url( $my_index )?>) ; background-size: cover";>
				<div class="d-flex align-items-center h-100">
					<div class="d-flex flex-column px-5">
						<p class="chamada-principal-menu my-5"><?=$attachments->field( 'title', $my_index );?></p>
						<p class="chamada-secundaria-menu"><?=$attachments->field( 'caption', $my_index );?></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 p-0" align="center">
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
						<div class="d-flex flex-column mt-3">
							<div class="d-flex justify-content-between flex-row" align="start">
								<div class="mx-2">
									<p class="chamada-principal-item-menu"><?php the_title(); ?></p>
								</div>
								<div class="menu-dotted-separator mb-3"></div>
								<div class="mx-2">
									<p class="chamada-nome-vermelho-pequeno pl-3">R$ <?= esc_attr( $bebida_meta_data['preco_id'][0] ); ?></p>
								</div>
							</div>
							<div class="d-flex align-items-start chamada-secundaria-item-menu ml-2" align="start">
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