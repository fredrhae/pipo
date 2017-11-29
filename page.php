<?php 	
$css_escolhido = 'page';
require_once('header.php');
$home = get_template_directory_uri();

$nome = $_POST['form-nome'];
$email = $_POST['form-email'];
$telefone = $_POST['form-telefone'];

$formularioEnviado = isset($nome) && isset($email) && isset($telefone);

if($formularioEnviado) {
	$enviou = enviar_e_checar_email($nome, $email, $telefone);

	if($enviou) { ?>
		<span class="email-sucesso">Seu e-mail foi enviado com sucesso!</span>
	<?php } else { ?>
		<span class="email-fracasso">Desculpe, ocorreu um erro, seu e-mail não foi enviado!</span>
	<?php } 
}
?>

<?php
$post_slug = get_post_field( 'post_name', get_post() );
switch ($post_slug) {
	case 'solucoes':
			$titulo_container_principal = "SOLUÇÕES INTELIGENTES";
		break;
	case 'empresa':
			$titulo_container_principal = "SOBRE A EMPRESA";
		break;
	case 'arquitetos':
		$titulo_container_principal = "ARQUITETOS";
	break;
	case 'projetos':
		$titulo_container_principal = "PROJETOS REALIZADOS";
	break;
}

if( have_posts() ) 
	{
		while( have_posts() ) 
		{
			the_post(); 
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				$imagem_destacada = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			} else {
				$imagem_destacada = $home . '/assets/imagens/background-home.png';
			}
			?>
			<!-- Conteudo principal -->
			<div class="container-principal" style="background-image: url(<?=$imagem_destacada?>);">
				<div class="container vertical-center">
					<div class="row">
						<div class="col-md-12" align="center">
							<h1 class="container-principal-titulo"><?=$titulo_container_principal?></h1>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-3"></div>
						<div class="col-md-6"  align="center">
							<p class="mx-auto container-principal-chamada"><?=get_the_content()?></p>
						</div>
						<div class="col-md-3"></div>
					</div>
					<?php 
					if( is_page('arquitetos') ) 
					{
						get_architects_buttons_chamada_principal();
					}
					?>
				</div>
			</div>
			<?php 
			if( is_page('arquitetos') ) {
				get_architects_body_content();
			} 
			if( is_page('empresa') ) {
				get_empresa_body_content();
			}
			if( is_page('solucoes') ) {
				get_solucoes_body_content();
			} 
			if( is_page('projetos') ) {
				get_projetos_body_content();
			} 
			?>
<?php	}
	}
?>
<?php get_footer();?>

<!-- #########   Funcoes relacionadas a pagina arquitetos ############### -->
<?php 
function get_architects_body_content() {
	global $home;
	?>
	<!-- Painel com background branco -->
	<div style="background-color: #ffffff;" class="container">
		<!-- Titulo arquitetos -->
		<div class="row">
			<div class="col-md-12" align="center">
				<p class="chamada-titulos-cinza">Nossos <span class="chamada-titulos-azul">arquitetos parceiros</span></p>
			</div>
		</div>
		<!-- Slider dos arquitetos -->
		<div class="d-flex justify-content-center mb-4">
			<div class="col-md-4">
				<div id="myCarousel" class="carousel slide multi-item-carousel" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="w-100" src="http://placehold.it/300/f44336/000000" alt="First slide" style="height: 300px; width: 300px">
							<div class="carousel-caption d-none d-md-block">
								<h3>Ricardo Teixeira</h3>
								<p>Arquiteto designer de interiores</p>
							</div>
						</div>
						<div class="carousel-item">
							<img class="w-100" src="http://placehold.it/300/e91e63/000000" alt="Second slide" style="height: 300px; width: 300px">
							<div class="carousel-caption d-none d-md-block">
								<h3>Hidelbrando Silva</h3>
								<p>Arquiteto designer de interiores</p>
							</div>
						</div>
						<div class="carousel-item">
							<img class="w-100" src="http://placehold.it/300/9c27b0/000000" alt="Third slide" style="height: 300px; width: 300px">
							<div class="carousel-caption d-none d-md-block">
								<h3>Lorem Ipsum</h3>
								<p>Arquiteto designer de interiores</p>
							</div>
						</div>
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
		<!-- Vantagens arquitetos -->
		<div class="row mb-4">
			<div class="col-md-12" align="left">
				<p class="chamada-titulos-cinza">VANTAGENS E BENEFÍCIOS DE <span class="chamada-titulos-azul">SER UM ASSOCIADO</span></p>
			</div>
		</div>
		<!-- Vantagens de arquiteto associado -->
		<div class="row mb-4">
			<div class="col-lg-4 col-sm-6 portfolio-item">
				<div class="card h-100 border-0">
					<a href="#"><img class="img-responsive ml-3" src="<?=$home?>/assets/imagens/pages/arquitetos/medalha_1_beneficio.png" alt=""></a>
					<div class="card-body">
						<h4 class="card-title">
							<a href="#">Benefício 1</a>
						</h4>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 portfolio-item">
				<div class="card h-100 border-0">
					<a href="#"><img class="img-responsive ml-3" src="<?=$home?>/assets/imagens/pages/arquitetos/trofeu_beneficio.png" alt=""></a>
					<div class="card-body">
						<h4 class="card-title">
							<a href="#">Benefício 2</a>
						</h4>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 portfolio-item">
				<div class="card h-100 border-0">
					<a href="#"><img class="img-responsive ml-3" src="<?=$home?>/assets/imagens/pages/arquitetos/premio_beneficio.png" alt=""></a>
					<div class="card-body">
						<h4 class="card-title">
							<a href="#">Benefício 3</a>
						</h4>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 portfolio-item">
				<div class="card h-100 border-0">
					<a href="#"><img class="img-responsive ml-3" src="<?=$home?>/assets/imagens/pages/arquitetos/medalha_2_beneficio.png" alt=""></a>
					<div class="card-body">
						<h4 class="card-title">
							<a href="#">Benefício 4</a>
						</h4>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 portfolio-item">
				<div class="card h-100 border-0">
					<a href="#"><img class="img-responsive ml-3" src="<?=$home?>/assets/imagens/pages/arquitetos/premiacoes_beneficio.png" alt=""></a>
					<div class="card-body">
						<h4 class="card-title">
							<a href="#">Benefício 5</a>
						</h4>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 portfolio-item">
				<div class="card h-100 border-0">
					<a href="#"><img class="img-responsive ml-3" src="<?=$home?>/assets/imagens/pages/arquitetos/medalhas_beneficio.png" alt=""></a>
					<div class="card-body">
						<h4 class="card-title">
							<a href="#">Benefício 6</a>
						</h4>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
					</div>
				</div>
			</div>
		</div>

		<!-- Torne-se um arquiteto associado -->
		<div class="row mb-4">
			<div class="col-md-12" align="left">
				<p class="chamada-titulos-cinza">TORNE-SE UM <span class="chamada-titulos-azul">PARCEIRO</span></p>
			</div>
		</div>
		<div class="row mb-4">
			<div class="col-md-12">
			<?php
			if($formularioEnviado) {
				$enviou = enviar_e_checar_email($nome, $email, $mensagem);
				if($enviou) { ?>
					<span class="email-sucesso">Seu e-mail foi enviado com sucesso!</span>
				<?php } else { ?>
					<span class="email-fracasso">Desculpe, ocorreu um erro, seu e-mail não foi enviado!</span>
				<?php } 
			}
			?>
			</div>
			<div class="col-md-12">
				<form method="post">
					<div class="col-md-12" >
						<div class="form-nome">
							<input id="form-nome" type="text" placeholder="Seu nome" name="form-nome">
						</div>
					</div>
					<div class="col-md-12" >
						<div class="form-email">
							<input id="form-email" type="email" placeholder="Seu email" name="form-email">
						</div>
					</div>
					<div class="col-md-12" >
						<div class="form-telefone">
							<input id="form-telefone" type="text" placeholder="Seu telefone" name="form-telefone">
						</div>
					</div>
					<div class="col-md-4 col-xs-12" >
						<button type="submit" class="btn btn-block btn-primary">Enviar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php
}

function get_architects_buttons_chamada_principal() { ?>
	<div class="row mt-3">
	<div class="col-md-4 col-xs-2"></div>
	<div class="col-md-2 col-xs-4" align="center">
		<button type="button" class="btn btn-outline-secondary btn-block">Torne-se um</button>
	</div>
	<div class="col-md-2 col-xs-4" align="center">
		<button type="button" class="btn btn-outline-secondary btn-block">Assista o Vídeo</button>
	</div>
	<div class="col-md-4 col-xs-2"></div>
</div>
<?php
}
?>
<!-- #########   Funcoes relacionadas a pagina empresa ############### -->

<?php 
function get_empresa_body_content() { 
	global $home;	
	?>
<!-- Painel com background branco -->
<div style="background-color: #ffffff;" class="container">
	<!-- Titulo quem somos -->
	<div class="row mb-4">
		<div class="col-md-6">
			<img class="img-fluid" src="<?=$home?>/assets/imagens/pages/empresa/logo_grande.png" alt="">					
		</div>
		<div class="col-md-6 mt-4">
			<h2 class="chamada-titulo-empresa">Quem somos nós</h2>
			<div class="row">
				<div class="col-md-4 px-0">
					<hr style="border-top: 3px solid #13AFE6;"/>
				</div>
				<div class="col-md-8 px-0">
					<hr style="border-top: 3px solid #D1C8C9;"/>
				</div>
			</div>
			<p class="chamada-descricao-empresa">Somos uma empresa de estilo de vida. Inspirada por ideias que prometem mais conforto, comodidade, seguranca e muito mais felicidade para você e sua família.</p>
		</div>
	</div>
	<div class="d-flex flex-row justify-content-center mb-4">
		<div class="col-md-4 col-sm-12 portfolio-item">
			<div class="card h-100 p-4">
				<a href="#" align="center"><img class="card-img-top my-4" align="center" style="width: 100px; height: 100px" src="<?=$home?>/assets/imagens/pages/empresa/missao.png" alt=""></a>
				<div class="card-block">
					<h4 class="card-title chamada-titulos-azul" align="center">Missão</h4>
					<p class="card-text my-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-12 portfolio-item">
			<div class="card h-100 p-4">
				<a href="#" align="center"><img class="card-img-top my-4" align="center" style="width: 143px; height: 100px" src="<?=$home?>/assets/imagens/pages/empresa/visao.png" alt=""></a>
				<div class="card-block">
					<h4 class="card-title chamada-titulos-azul" align="center">Visão</h4>
					<p class="card-text my-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-12 portfolio-item">
			<div class="card h-100 p-4">
				<a href="#" align="center"><img class="card-img-top my-4" align="center" style="width: 88px; height: 100px" src="<?=$home?>/assets/imagens/pages/empresa/valores.png" alt=""></a>
				<div class="card-block">
					<h4 class="card-title chamada-titulos-azul" align="center">Valores</h4>
					<p class="card-text my-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row mb-4">
	<div class="col-md-12" align="center">
		<p class="chamada-titulos-cinza">Conheça a <span class="chamada-titulos-azul">Singular Automações</span></p>
	</div>
</div>
<div class="container-video">
	<iframe src="//www.youtube.com/embed/yCOY82UdFrw" frameborder="0" allowfullscreen class="video"></iframe>
</div>
<?php 
}
?>

<!-- #########   Funcoes relacionadas a pagina solucoes ############### -->
<?php 
function get_solucoes_body_content() { 
	global $home;
	?>
	<div class="row my-4">
		<div class="col-md-12" align="center">
			<p class="chamada-titulos-cinza">CONHEÇA TODAS AS <span class="chamada-titulos-azul">NOSSAS SOLUÇÕES</span></p>
		</div>
		<div class="col-md-3"></div>
		<div class="col-md-6"  align="center">
			<p class="mx-auto texto-conteudo-cinza">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce egestas leo a 
				lobortis feugiat. Sed aliquam scelerisque sapien molestie cursus. In id malesuada est, eget porta purus.
				Fusce neque odio, mollis quis dictum eget, ultrices ut nulla. Mauris tellus mauris, lacinia at ultricies eget, congue fermentum diam.</p>
		</div>
		<div class="col-md-3"></div>
	</div>
	<!-- Carregamento das soluções cadastradas -->
	<?php 
	$args = array( 'post_type' => 'solucao', 'order' => 'ASC' );            
	$loop = new WP_Query( $args );
	if( $loop->have_posts() ) { 
		$counter = 0;
		?>
	<?php while( $loop->have_posts()) {
		// Flag para indicar se a solucao vai ser exibida na direita ou a esquerda
		$alignRight = $counter%2 != 0;
		$loop->the_post(); ?>
		<div class="full-image-background" style="background-image: url(<?=the_post_thumbnail_url()?>)">
			<div class="container vertical-center">
				<div class="row">
					<?php if($alignRight) {
						$style_title = "right";
						?>
						<div class="col-md-6 col-xs-4"></div>
					<?php
					} else {
						$style_title = "left";
					}
					?>
					<div class="col-md-6 col-xs-8" align="<?=$style_title?>" >
						<h2 class="titulo-solucao mb-4"><?php the_title();?></h2>
					</div>
				</div>
				<div class="row">
					<?php if($alignRight) { ?>
						<div class="col-md-8 col-xs-8"></div>
					<?php
					}
					?>
					<div class="col-md-4 col-xs-8 texto-solucao block-with-text mb-4">
						<?php the_content();?>
					</div>
				</div>
				<div class="row">
					<?php if($alignRight) { ?>
						<div class="col-md-10 col-xs-8"></div>
					<?php
					}
					?>
					<div class="col-md-2 col-xs-4" align="center">
						<a href="<?= the_permalink();?>" style="text-decoration: none">
							<button type="button" class="btn btn-outline-secondary btn-block">Saiba mais</button>
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php
		$counter = $counter + 1;
		} 
	} 
}?>

<!-- #########   Funcoes relacionadas a pagina projetos ############### -->
<?php 
function get_projetos_body_content() { 
	global $home;
	?>
	<!-- Carregamento dos projetos cadastrados -->
	<?php 
	$args = array( 'post_type' => 'projeto', 'order' => 'ASC' );            
	$loop = new WP_Query( $args );
	if( $loop->have_posts() ) { 
		$counter = 0;
		while( $loop->have_posts()) {
		// Flag para indicar se a solucao vai ser exibida na direita ou a esquerda
		$alignRight = $counter%2 != 0;		
		$loop->the_post(); ?>
		<!-- Parte de carregamento dos projetos -->
		<div class="row w-100 m-0 py-2 px-0">
			<?php if($alignRight) { ?>
				<div class="col-md-6 pr-2 pb-1 px-0">
					<?php
					$attachments = new Attachments( 'my_attachments' );
					if( $attachments->exist() ) : ?>
						<?php while( $attachments->get() ) : ?>
							<img class="img-fluid py-1" src="<?=$attachments->url()?>" alt="">
						<?php endwhile; ?>
					<?php endif; ?>			
				</div>
				<div class="col-md-6 pl-0 py-1 pr-0">
					<div class="d-flex flex-column align-items-center full-image-background h-100" style="background-image: url(<?=the_post_thumbnail_url()?>)">
						<div class="my-auto pt-5">
							<h2 class="titulo-solucao"><?php the_title();?></h2>
						</div>
						<div class="w-50 texto-solucao block-with-text my-auto">
							<?php the_content();?>
						</div>
					</div>
				</div>
			<?php 
			} else {
			?>
				<div class="col-md-6 pr-2 py-1 px-0">
					<div class="d-flex flex-column align-items-center full-image-background h-100" style="background-image: url(<?=the_post_thumbnail_url()?>)">
						<div class="my-auto pt-5">
							<h2 class="titulo-solucao"><?php the_title();?></h2>
						</div>
						<div class="w-50 texto-solucao block-with-text my-auto">
							<?php the_content();?>
						</div>
					</div>
				</div>
				<div class="col-md-6 pl-0 pr-0">
					<?php
					$attachments = new Attachments( 'my_attachments' );
					if( $attachments->exist() ) : ?>
						<?php while( $attachments->get() ) : ?>
							<img class="img-fluid py-1" src="<?=$attachments->url()?>" alt="">
						<?php endwhile; ?>
					<?php endif; ?>			
				</div>
			<?php 
			}
			?>
		</div>
		<?php
		$counter = $counter + 1;
		} 
	}
	?>
	<!-- Chamada para os clientes -->
	<div class="row my-4">
		<div class="col-md-12" align="center">
			<p class="chamada-titulos-cinza"> Nossos clientes, <span class="chamada-titulos-azul">nossa família</span></p>
		</div>
	</div>
	<!-- Slider com clientes satisfeitos -->
	<div class="d-flex justify-content-center mb-4">
		<div class="col-md-6">
			<div id="myCarousel" class="carousel slide multi-item-carousel" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<blockquote>
							<div class="row">
								<div class="col-sm-3 text-center">
									<img class="img-circle" src="<?=$home?>/assets/imagens/pages/projetos/cliente1.png" style="width: 150px;height:150px;">
								</div>
								<div class="col-sm-9">
									<p>PHP: Hypertext Preprocessor, is a general-purpose scripting language that was originally designed for web development. This helps to produce dynamic web pages. It generally runs on a web server , can be embedded into HTML.</p>
									<small>PHP- Basic Concept</small>
								</div>
							</div>
						</blockquote>
					</div>
					<div class="carousel-item">
						<blockquote>
							<div class="row">
								<div class="col-sm-3 text-center">
									<img class="img-circle" src="<?=$home?>/assets/imagens/pages/projetos/cliente2.png" style="width: 150px;height:150px;">
								</div>
								<div class="col-sm-9">
									<p>JQuery is lightweight write less, do more open source Javascript Library, used for interaction between JavaScript and HTML. The JQuery is not a language. The JavaScript is a Language. JQuery is built over JavaScript.The purpose of jQuery is to make it much easier to use JavaScript on your website.</p>
									<small>jQuery- Basic Concept</small>
								</div>
							</div>
						</blockquote>
					</div>
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
	<!-- Chamada para o showroom -->
	<div class="row my-4">
		<div class="col-md-12" align="center">
			<p class="chamada-titulos-cinza"> VISITE <span class="chamada-titulos-azul"> NOSSO SHOWROOM</span></p>
		</div>
	</div>
	<!-- Agendamento de visita e vídeo do showroom -->
	<div class="d-flex justify-content-center mb-4">
		<div class="col-md-4" align="center">
				<form method="post">
					<div class="col-md-12" >
						<div class="form-nome">
							<input id="form-nome" type="text" placeholder="Seu nome" name="form-nome">
						</div>
					</div>
					<div class="col-md-12" >
						<div class="form-email">
							<input id="form-email" type="email" placeholder="Seu email" name="form-email">
						</div>
					</div>
					<div class="col-md-12" >
						<div class="form-data-visita">
							<input id="form-data-visita" type="date" name="form-data-visita">
						</div>
					</div>
					<div class="col-md-12 col-xs-12" >
						<button type="submit" class="btn btn-block btn-primary">Agendar</button>
					</div>
				</form>
		</div>
		<div class="col-md-4" align="center">
		<div class="container-video">
			<iframe src="//www.youtube.com/embed/yCOY82UdFrw" frameborder="0" allowfullscreen class="video"></iframe>
		</div>
		</div>
	</div>
<?php
}
?>