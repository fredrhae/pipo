<?php 	
require_once('header.php');
$home = get_template_directory_uri();

// Formulario reserva
$nome = $_POST['form-nome'];
$email = $_POST['form-email'];
$pessoas = $_POST['form-pessoas'];
$data = $_POST['form-data'];
$telefone = $_POST['form-telefone'];
$tipo_evento = $_POST['form-tipo-evento'];

// Formulario newsletter
$email_newsletter = $_POST['form-email-newsletter'];

$formularioReservaEnviado = isset($nome) && isset($email) 
                         && isset($telefone) && isset($pessoas) 
                         && isset($data) && isset($tipo_evento);
                         
if($formularioReservaEnviado) {
	$enviou = enviar_e_checar_email_reserva($nome, $email, $telefone, $pessoas, $data, $tipo_evento);

	if($enviou) { ?>
		<span class="email-sucesso">Seu e-mail foi enviado com sucesso!</span>
	<?php } else { ?>
		<span class="email-fracasso">Desculpe, ocorreu um erro, seu e-mail não foi enviado!</span>
	<?php } 
}

$formularioNewsletterEnviado = isset($email_newsletter);
if($formularioNewsletterEnviado) {
	$enviou = enviar_e_checar_email_newsletter($email_newsletter);

	if($enviou) { ?>
		<span class="email-sucesso">Seu e-mail foi enviado com sucesso!</span>
	<?php } else { ?>
		<span class="email-fracasso">Desculpe, ocorreu um erro, seu e-mail não foi enviado!</span>
	<?php } 
}


function get_section_know_our_gastronomy() {
    global $home;?>
    <!-- Secao da gastronomia -->
    <div class="d-flex justify-content-center flex-row flex-wrap bg-dark mt-5">
        <div class="col-md-6" align="center">
            <h1 class="mx-auto chamada-principal-branca mt-5">Conheça nossa</h1>
            <h1 class="mx-auto chamada-nome-amarelo">GASTRONOMIA</h1>
            <div class="col-md-8 my-5">
                <p class="mx-auto chamada-texto-branco" align="start">O cardápio é um tanto variado. Um toque peculiar,
                que faz toda a diferença são os ingredientes naturais como: pescados e frutos do mar, que ganham maior 
                destaque no Menu. Temperos puros e leves ganham a prioridade na Gastronomia da casa, visando a utilização 
                máxima das riquezas da terra.
                <br/>
                <br/>
                Venha conhecer a nossa casa, será um prazer lhe servir as mais deliciosas opções, que vão desde o famoso
                Filé Mignon com Risoto de Mel e Parmesão, ao delicioso Tagliatelle com Camarões Grelhados e Abobrinha.
                Vem pro Pipo Restaurante, aqui é muito mais gostoso!</p>
            </div>
            <div class="col-md-6 my-5">
                <a class="my-3" href="<?=get_page_link_by_slug('menu')?>#pratos-menu-anchor" style="text-decoration: none;">
                    <button type="button" class="btn btn-outline-secondary-lg-yellow btn-block">CONHEÇA NOSSO MENU</button>
                </a>
            </div>
        </div>
        <div class="col-md-6 full-image-background" style="background-image: url(<?=$home?>/assets/imagens/pages/home/home_chamada_casa.jpg)">
        </div>
    </div>
<?php
}

function get_section_present_restaurant() {
    global $home;
?>
<!-- Secao de apresentar o restaurante -->
<div class="d-flex justify-content-center flex-column flex-wrap my-5" align="center">
    <div class="row mx-0">
        <div class="d-flex my-5 mx-5 justify-content-center flex-column" align="center">
            <h2 class="mx-auto chamada-principal-apresentacao">Seja Bem Vindo ao</h2>
            <h2 class="mx-auto chamada-nome-vermelho-lg">PIPO RESTAURANTE</h3>
            <h3 class="mx-auto chamada-slogan my-5">"Vem pro Pipo, aqui é muito mais gostoso!"</h3>
            <p class="mx-auto chamada-texto-cinza col-md-6 col-xs-8 mt-5" align="start">Nosso restaurante conta com uma gastronomia autoral, baseada nas experiências e gosto pessoal 
                do proprietário Pipo que decidiu juntar todos os seus hobbies ao construí-lo.
                <br/>
                <br/>
                Chef, advogado e empresário. Pipo é apaixonado por arte, música, gastronomia e arquitetura e ama viajar.
                Visitou os mais diversos restaurantes nos 23 países que conheceu, sempre seguindo o guia Michelin. O Pipo 
                Restaurante conta com uma arquitetura de linhas retas, moderna e composta principalmente de concreto e vidro,
                tudo sobre um lago em um belíssimo jardim de 2400m².</p>
        </div>
    </div>
    <div class="d-flex flex-wrap mb-5" align="center">
        <div class="image-container my-5" style="max-height: 220px;">
            <img class="image-overlay img-fluid p-4"  src="<?=$home?>/assets/imagens/pages/home/fachada_restaurante.png" alt="">
        </div>
    </div>
    <div class="row mx-0 my-5 "></div>
</div>
<?php
}

function get_section_restaurant_chef($text_about_chef, $path_foto) {
    global $home;
?>
<div class="d-flex align-items-stretch flex-row flex-wrap bg-dark mb-5">
    <div class="row mx-0 mt-5">
        <div class="col-md-6 col-xs-12" align="center">
            <h1 class="mx-auto chamada-principal-branca mt-5">Conheça nosso</h1>
            <h1 class="mx-auto chamada-nome-amarelo">CHEF DE COZINHA</h1>
            <div class="col-md-8 my-5">
                <p class="mx-auto chamada-texto-branco" align="start"><?=$text_about_chef?></p>
            </div>
        </div>
        <div class="col-md-6 col-xs-12" align="center">
            <div class="image-container">
                <img class="image-overlay img-fluid p-4 mx-0 mt-5 p-0" src="<?=$path_foto?>" alt="">
            </div>
        </div>
    </div>

</div>
<?php
}

function get_section_schedule($text_about_programacao, $path_picture_schedule) {
    global $home;
?>
<div class="d-flex align-items-stretch flex-row flex-wrap mb-5" style="min-height: 500px;">
    <div class="col-md-6" align="center">
        <h1 class="mx-auto chamada-principal-apresentacao mt-5">Conheça nossas</h1>
        <h1 class="mx-auto chamada-nome-vermelho-pequeno">PROGRAMAÇÕES</h1>
        <div class="col-md-8 my-5">
            <p class="mx-auto chamada-texto-cinza" align="start"><?=$text_about_programacao?></p>
        </div>
        <?php 
        global $post;
        $post_slug=$post->post_name;
        if($post_slug != 'programacao') 
        {
        ?>
            <a class="my-3" href="<?=get_page_link_by_slug('programacao')?>" style="text-decoration: none">
                <button type="button" class=" col-md-6 btn btn-outline-secondary-lg-gray btn-block">VEJA NOSSA PROGRAMAÇÃO</button>
            </a>
        <?php
        }
        ?>
    </div>
    <div class="col-md-6" align="center">
        <img class="img-fluid p-4 w-100 h-100 m-0 p-0" src="<?=$path_picture_schedule?>" alt="">
    </div>
</div>
<?php
}

function get_section_restaurant_reservation() {
    global $home; ?>
    <!-- Secao de reservas -->
    <div class="d-flex justify-content-center flex-column full-image-background mt-5 py-5" align="center" style="background-image: url(<?=$home?>/assets/imagens/pages/home/fachada_restaurante_completa.jpg);">
        <h1 class="mx-auto chamada-principal-branca">Fazer uma</h1>
        <h1 class="mx-auto chamada-nome-amarelo">RESERVA</h1>
    </div>
    <div class="d-flex justify-content-center flex-column mb-5" align="center">
            <?php
                if($formularioEnviado) {
                    $enviou = enviar_e_checar_email_reserva($nome, $email, $telefone, $pessoas, $data);
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
                    <div class="form-telefone">
                        <input id="form-telefone" type="telefone" placeholder="Seu telefone" name="form-telefone">
                    </div>
                    <div class="form-data">
                        <input id="form-data" type="datetime-local" placeholder="Data da reserva" name="form-data">
                    </div>
                    <div class="form-pessoas">
                        <input id="form-pessoas" type="number" min="2" max="50" value="2" placeholder="Número de pessoas" name="form-number">
                    </div>
                    <div class="form-tipo-evento">
						<select id="form-tipo-evento" name="form-tipo-evento">
							<option value="casamento">Casamento</option>
							<option value="aniversario">Aniversário</option>
							<option value="formatura">Formatura</option>
						</select>
					</div>             
                    <button type="submit" class="btn btn-block btn-outline-secondary-lg-gray">RESERVAR</button>
                </form>
            </div>
        </div>
    </div>
<?php
}

function get_section_restaurant_reservation_without_background() {
    global $home; ?>
    <!-- Secao de reservas -->
    <div id="reserva-anchor" class="d-flex justify-content-center flex-column mt-5 py-5" align="center">
        <p class="mx-auto chamada-principal-apresentacao">Fazer uma</p>
        <p class="mx-auto chamada-nome-vermelho-pequeno">RESERVA</p>
    </div>
    <div class="d-flex justify-content-center flex-column mb-5" align="center">
            <?php
                if($formularioEnviado) {
                    $enviou = enviar_e_checar_email_reserva($nome, $email, $telefone, $pessoas, $data);
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
                    <div class="form-telefone">
                        <input id="form-telefone" type="telefone" placeholder="Seu telefone" name="form-telefone">
                    </div>
                    <div class="form-data">
                        <input id="form-data" type="datetime-local" placeholder="Data da reserva" name="form-data">
                    </div>
                    <div class="form-pessoas">
                        <input id="form-pessoas" type="number" min="2" max="50" value="2" placeholder="Número de pessoas" name="form-number">
                    </div>                
                    <button type="submit" class="btn btn-block btn-outline-secondary-lg-gray">RESERVAR</button>
                </form>
            </div>
        </div>
    </div>
<?php
}

function get_section_newsletter() {
    global $home;
    ?>
    <!-- Secao de newsletter -->
    <div class="d-flex justify-content-center flex-column py-5" align="center" style="background-color: #545252">
        <h1 class="mx-auto chamada-principal-branca">Acompanhe nossas</h1>
        <h1 class="mx-auto chamada-nome-verde">NOVIDADES:</h1>
        <p class="mx-auto chamada-texto-branco">Assine nossa newsletter e fique por dentro de 
            todas as novidades da Pipo Restaurante</p>
        <div class="d-flex justify-content-center flex-column">
            <?php
            if($formularioNewsletterEnviado) {
                $enviou = enviar_e_checar_email_newsletter($email);
                if($enviou) { ?>
                    <span class="email-sucesso">Seu e-mail foi cadastrado com sucesso!</span>
                <?php } else { ?>
                    <span class="email-fracasso">Desculpe, ocorreu um erro, seu e-mail não foi cadastrado!</span>
                <?php } 
            }
            ?>
            </div>
            <div class="col-md-4" align="center">
                <form method="post">
                    <div class="form-email">
                        <input id="form-email-newsletter" type="email" placeholder="Seu email" name="form-email-newsletter">
                    </div>
                    <button type="submit" class="btn btn-block btn-outline-secondary-lg-green">INSCREVER-SE</button>
                </form>
            </div>
        </div>
    </div>
<?php
}

function get_section_testemonials_customers() {?>
    <!-- Secao de testemunhos -->
    <div class="container my-5">
        <!-- Titulo testemunhos -->
        <div class="row mx-0">
            <div class="col-md-12" align="center">
                <h1 class="mx-auto chamada-apresentacao-pequeno">O que nosso cliente</h1>
                <h1 class="mx-auto chamada-nome-vermelho-pequeno">TEM A DIZER:</h1>		
            </div>
        </div>
        <!-- Slider com clientes satisfeitos -->
        <div class="d-flex justify-content-center mb-4">
            <div class="col-md-6">
                <div id="myCarousel" class="carousel slide multi-item-carousel" data-ride="carousel">
                    <ol class="carousel-indicators carousel-indicators-testemonials">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <?php 
                        $count_depoimentos = wp_count_posts('depoimentoCliente');
                        for($i = 1; $i < $count_depoimentos; $i++) {?>
                            <li data-target="#myCarousel" data-slide-to="<?=$i?>"></li>
                        <?php
                        }?>
                    </ol>
                    <div class="carousel-inner">
                        <!-- Carregamento dos depoimentos cadastrados -->
                        <?php 
                        $args = array( 'post_type' => 'depoimentoCliente', 'order' => 'ASC' );            
                        $loop = new WP_Query( $args );
                        $firstItem = true;
                        if( $loop->have_posts() ) { 
                            while( $loop->have_posts()) {
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
                                <div class="row mx-0 py-4">
                                    <div class="col-sm-4 text-center">
                                        <img class="img-circle" src="<?=the_post_thumbnail_url()?>" style="width: 150px;height:150px;border-radius:50%">
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
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev" style="transform: translate(60%,0%);">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next" style="transform: translate(60%,0%);">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php
} 