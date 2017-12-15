<?php 	
require_once('header.php');
$home = get_template_directory_uri();

$nome = $_POST['form-nome'];
$email = $_POST['form-email'];
$pessoas = $_POST['form-pessoas'];
$data = $_POST['form-data'];
$telefone = $_POST['form-telefone'];

$formularioEnviado = isset($nome) && isset($email) && isset($telefone);

if($formularioEnviado) {
	$enviou = enviar_e_checar_email_reserva($nome, $email, $telefone, $pessoas, $data);

	if($enviou) { ?>
		<span class="email-sucesso">Sua intenção de reserva foi registrada com sucesso!
			Em breve entraremos em contato.
		</span>
	<?php } else { ?>
		<span class="email-fracasso">Desculpe, ocorreu um erro, sua intenção de reserva não foi feita!</span>
	<?php } 
}

function get_landing_page_buttons_chamada_principal() { ?>
	<div class="col-md-8 col-xs-4 mt-5" align="center">
		<button type="button" class="btn btn-outline-secondary-lg-green btn-block">FAÇA UM ORÇAMENTO</button>
	</div>
<?php
}

function get_landing_page_body_content() {
	global $home;
	$id_galeria = 277;	
?>
	<div class="d-flex justify-content-center flex-row flex-wrap bg-dark py-5" align="center">
		<div class="col-md-8">
			<p class="chamada-secundaria-page">PORQUE CASAR NO PIPO É DIFERENTE?</p>
		</div>
	</div>
	<div class="d-flex justify-content-center flex-column mb-5" align="center">
		<p class="chamada-principal-page-gray">Carinho e dedicacao</p>
		<div class="col-md-8">
			<?php
			$text_about_marriages= '';			
			$attachments = new Attachments( 'my_attachments' );
			if( $attachments->exist() ) :
				$my_index = 0; // index of text about marriage
				if( $attachment = $attachments->get_single( $my_index ) ) :
					if( $attachments->type($my_index) == 'text') :
						$text_about_marriages = read_content_from_text_file($attachments->url( $my_index ));
					endif;						
				endif;
			endif;
			?>
			<p class="chamada-secundaria-page-gray"><?=$text_about_marriages?></p>
		</div>
		<div class="d-flex justify-content-center my-5">
			<div class="d-flex align-items-center col-md-3 col-sm-2"><hr class="hr-gray" /></div>
			<div class="col-md-4 col-sm-6">
				<p class="chamada-principal-page-gray">O pipo</p>
			</div>
			<div class="d-flex align-items-center col-md-3 col-sm-2"><hr class="hr-gray" /></div>
		</div>
		<div class="col-md-10">
			<div class="d-flex justify-content-center flex-row" align="center">
				<div class="d-flex justify-content-center flex-column" align="center">
					<img class="img-responsive" src="<?=$home?>/assets/imagens/pages/landing/menu.png" style="width: 90px; height: 104px;">						
					<p class="texto-caracteristicas my-5">CARDÁPIO REQUINTADO</p>
				</div>
				<div class="d-flex justify-content-center flex-column" align="center">
					<img class="img-responsive" src="<?=$home?>/assets/imagens/pages/landing/stove.png" style="width: 90px; height: 104px;">						
					<p class="texto-caracteristicas my-5 w-50">COZINHA DE ALTA QUALIDADE</p>
				</div>
				<div class="d-flex justify-content-center flex-column" align="center">
					<img class="img-responsive" src="<?=$home?>/assets/imagens/pages/landing/percentage.png" style="width: 90px; height: 104px;">						
					<p class="texto-caracteristicas my-5">ÓTIMO CUSTO BENEFÍCIO</p>
				</div>
				<div class="d-flex justify-content-center flex-column" align="center">
					<img class="img-responsive" src="<?=$home?>/assets/imagens/pages/landing/cooker.png" style="width: 90px; height: 104px;">						
					<p class="texto-caracteristicas my-5">CHEF INTERNACIONAL</p>
				</div>
				<div class="d-flex justify-content-center flex-column" align="center">
					<img class="img-responsive" src="<?=$home?>/assets/imagens/pages/landing/champagne.png" style="width: 90px; height: 104px;">						
					<p class="texto-caracteristicas my-5">ESPAÇO SOFISTICADO</p>
				</div>
				<div class="d-flex justify-content-center flex-column" align="center">
					<img class="img-responsive" src="<?=$home?>/assets/imagens/pages/landing/origami-bird.png" style="width: 90px; height: 104px;">						
					<p class="texto-caracteristicas my-5 w-50">RESTAURANTE-GALERIA DE ARTE</p>
				</div>
			</div>
		</div>
	</div>
	<?php
	get_section_know_our_gastronomy();
	?>
	<!-- Secao de casamentos realizados -->
	<div class="d-flex justify-content-start flex-row flex-wrap mb-5" id="form-anchor-fotos">
		<div class="col-md-12" align="center">
			<h1 class="mx-auto chamada-principal-page-gray">Fotos de nossa</h1>
			<h1 class="mx-auto chamada-secundaria-page-gray">GASTRONOMIA</h1>		
		</div>
		<div class="d-flex justify-content-center w-100">
			<div class="btn-group-vertical h-100 mx-3">
				<form method="post" action="#form-anchor-fotos">
					<button class="btn btn-outline-secondary-lg-gray my-2" type="submit" id="entrada" name="fotos_gastronomia" value="entrada"/>
						Entradas</button>
					<button class="btn btn-outline-secondary-lg-gray my-2" type="submit" id="finger" name="fotos_gastronomia" value="finger"/>
						Finger foods</button>
					<button class="btn btn-outline-secondary-lg-gray my-2" type="submit" id="principal" name="fotos_gastronomia" value="principal"/> 
						Prato principal</button>
					<button class="btn btn-outline-secondary-lg-gray my-2" type="submit" id="sobremesa" name="fotos_gastronomia" value="sobremesa"/> 
						Sobremesas</button>
					<button class="btn btn-outline-secondary-lg-gray my-2" type="submit" id="bebida" name="fotos_gastronomia" value="bebida"/> 
						Bebidas</button>
				</form>
			</div>
			<div class="d-flex col-8">
				<?php				
					if(array_key_exists('fotos_gastronomia',$_POST)){
						switch($_POST['fotos_gastronomia']) {
							case 'entrada':
								$id_galeria = 277;
								break;
							case 'finger':
								$id_galeria = 274;
								break;
							default:
								$id_galeria = 277;
								break;
						}
					}
					echo do_shortcode("[foogallery id=" . $id_galeria . "]");
				?>
			</div>
		</div>
	</div>
	<!-- Secao de caracteristicas -->
	<div class="d-flex justify-content-center flex-row flex-wrap">
		<div class="col-md-6 full-image-background" style="background-image: url(<?=$home?>/assets/imagens/pages/landing/cardapio_exemplo.jpg)">
		</div>
		<div class="col-md-6 pl-5 mt-5" align="left">
			<ul class="lista-vantagens">
				<li><p class="lista-vantagens-texto">Menu requintado</p></li>
				<li><p class="lista-vantagens-texto">Chef Internacional</p></li>
				<li><p class="lista-vantagens-texto">Jantar/almoço farto</p></li>
				<li><p class="lista-vantagens-texto">Ótimo custo-benefício</p></li>
				<li><p class="lista-vantagens-texto">Espaço decorado com obras de arte</p></li>
				<li><p class="lista-vantagens-texto">Arquitetura moderna</p></li>
				<li><p class="lista-vantagens-texto">Lounge interno</p></li>
				<li><p class="lista-vantagens-texto">2 horas de piano ao vivo</p></li>
				<li><p class="lista-vantagens-texto">Jardim de 2.400 m²</p></li>
				<li><p class="lista-vantagens-texto">Estacionamento</p></li>
				<li><p class="lista-vantagens-texto">Seguranças</p></li>
				<li><p class="lista-vantagens-texto">Rampas de acessibilidade</p></li>
				<li><p class="lista-vantagens-texto">Toaletes acessíveis</p></li>
				<li><p class="lista-vantagens-texto">Wi-Fi</p></li>				
			</ul>
		</div>
	</div>
	<!-- Secao de casamentos realizados -->
	<div class="d-flex justify-content-center flex-column">
		<div class="col-md-12" align="center">
			<h1 class="mx-auto chamada-principal-page-gray">Casamentos</h1>
			<h1 class="mx-auto chamada-secundaria-page-gray">REALIZADOS</h1>		
		</div>
		<div class="col-md-12 my-5" align="center">
			<div class="d-flex justify-content-center flex-row flex-wrap" align="center">
				<div class="d-flex justify-content-center flex-column px-3" align="center">
					<img class="img-responsive" src="<?=$home?>/assets/imagens/pages/landing/casal_1.png" style="width: 137px; height: 137px;">						
					<p class="texto-caracteristicas my-2">LUCIA E DIEGO</p>
				</div>
				<div class="d-flex justify-content-center flex-column px-3" align="center">
					<img class="img-responsive" src="<?=$home?>/assets/imagens/pages/landing/casal_2.png" style="width: 137px; height: 137px;">						
					<p class="texto-caracteristicas my-2">ARTHUR E ALANA</p>
				</div>
				<div class="d-flex justify-content-center flex-column px-3" align="center">
					<img class="img-responsive" src="<?=$home?>/assets/imagens/pages/landing/casal_3.png" style="width: 137px; height: 137px;">						
					<p class="texto-caracteristicas my-2">JOÃO E NATÁLIA</p>
				</div>
				<div class="d-flex justify-content-center flex-column px-3" align="center">
					<img class="img-responsive" src="<?=$home?>/assets/imagens/pages/landing/casal_4.png" style="width: 137px; height: 137px;">						
					<p class="texto-caracteristicas my-2">MARCOS E BETE</p>
				</div>
			</div>
		</div>
	</div>
				
	<!-- Secao de testemunhos -->
	<div class="container my-5">
		<!-- Titulo testemunhos -->
		<div class="row">
			<div class="col-md-12" align="center">
				<h1 class="mx-auto chamada-apresentacao-pequeno">O que nossas noivas</h1>
				<h1 class="mx-auto chamada-nome-vermelho-pequeno">TEM A DIZER:</h1>		
			</div>
		</div>
		<!-- Slider com clientes satisfeitos -->
		<div class="d-flex justify-content-center mb-4">
			<div class="col-md-6">
				<div id="myCarousel" class="carousel slide multi-item-carousel" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<?php 
						$count_depoimentos = wp_count_posts('depoimentoNoiva');
						for($i = 1; $i < $count_depoimentos; $i++) {?>
							<li data-target="#myCarousel" data-slide-to="<?=$i?>"></li>
						<?php
						}?>
					</ol>
					<div class="carousel-inner">
                        <!-- Carregamento dos depoimentos cadastrados -->
                        <?php 
                        $args = array( 'post_type' => 'depoimentoNoiva', 'order' => 'ASC' );            
                        $loop = new WP_Query( $args );
                        $firstItem = true;
                        if( $loop->have_posts() ) { 
                            ?>
                        <?php while( $loop->have_posts()) {
                            $loop->the_post();
                            $carousel_class = '';
                            if($firstItem){
                                $carousel_class = "carousel-item active";
                                $firstItem = false;
                            } else {
                                $carousel_class = "carousel-item";                         
                            }
                            ?>
                            <div class="<?=$carousel_class?>">
                                <div class="row py-4">
                                    <div class="col-sm-4 text-center">
                                        <img class="img-circle" src="<?=the_post_thumbnail_url()?>" style="width: 150px;height:150px;">
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="mx-auto chamada-texto-cinza"><?=the_content();?></p>
                                        <small><?=the_title();?></small>
                                    </div>
                                </div>
                            </div>
                            <?php
                            } 
                        } ?>
					</div>
					<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Secao de blog 
	-->

	<!-- Secao de FAQs -->
	<div class="d-flex justify-content-center flex-column py-5" align="center">
		<div class="col-md-4 col-sm-6">
			<p class="mx-auto chamada-faqs-gray">FAQ'S</p>
		</div>
		<div class="col-md-8">
			<?php echo do_shortcode("[hrf_faqs]"); ?>
		</div>
	</div>

	<!-- Secao de reservas -->
	<div class="d-flex justify-content-center flex-column flex-wrap py-5" align="center">
		<div class="col-md-4 col-sm-6">
			<p class="mx-auto chamada-orcamento-gray">SOLICITE SEU ORÇAMENTO</p>
		</div>
		<div class="col-md-8 col-sm-12">
			<div class="d-flex justify-content-center flex-row flex-wrap">
				<div class="col-md-6 m-0 p-0">
					<img class="img-responsive h-100" src="<?=$home?>/assets/imagens/pages/landing/noivos_orcamento.png" style="max-height: 360px;">
				</div>
				<div class="col-md-6">
					<form method="post">
						<div class="form-nome">
							<input id="form-nome" type="nome" placeholder="Seu nome" name="form-nome">
						</div>
						<div class="form-email">
							<input id="form-email" type="email" placeholder="Seu email" name="form-email">
						</div>
						<div class="form-telefone">
							<input id="form-telefone" type="telefone" placeholder="Seu telefone" name="form-telefone">
						</div>
						<div class="form-data">
							<input id="form-data" type="datetime-local" placeholder="Data da reserva" name="form-data">
						</div>
						<div class="form-pessoas">
							<input id="form-pessoas" type="number" min="2" max="200" value="2" placeholder="Número de pessoas" name="form-number">
						</div>                
						<button type="submit" class="btn btn-block btn-outline-secondary-lg-gray">ENVIAR</button>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php
}