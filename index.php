<?php 	
    $css_escolhido = 'index';
    require_once('header.php');
    $home = get_template_directory_uri(); 
?>
<!-- Secao inicial da home -->
<div class="container-principal">
    <div class="d-flex flex-row">
        <div class="col-md-3 full-image-background-principal-home" style="background-image: url(<?=$home?>/assets/imagens/pages/home/home_chamada_casa.jpg);
                                                            background-position: center top">
            <div class="vertical-center">
                <a class="mx-auto chamada-principal-link" href="#">Nossa</a>
                <h1 class="mx-auto chamada-secundaria" align="right">CASA</h1>
            </div>
        </div>
        <div class="col-md-3 full-image-background-principal-home" style="background-image: url(<?=$home?>/assets/imagens/pages/home/home_chamada_menus.jpg);
                                                        background-position: center top">
            <div class="vertical-center">
                <a class="mx-auto chamada-principal-link" href="#">Deliciosos</a>
                <h1 class="mx-auto chamada-secundaria" align="right">MENUS</h1>
            </div>
        </div>
        <div class="col-md-3 full-image-background-principal-home" style="background-image: url(<?=$home?>/assets/imagens/pages/home/home_chamada_programacao.jpg);
                                                background-position: center top">            
            <div class="vertical-center">
                <a class="mx-auto chamada-principal-link" href="#">Desfrute</a>
                <h1 class="mx-auto chamada-secundaria" align="right">NOSSA PROGRAMAÇÃO</h1>
            </div>
        </div>
        <div class="col-md-3 full-image-background-principal-home" style="background-image: url(<?=$home?>/assets/imagens/pages/home/home_chamada_drinks.jpg);
                                            background-position: right top 40px">            
            <div class="vertical-center">
                <a class="mx-auto chamada-principal-link" href="#">Saborosos</a>
                <h1 class="mx-auto chamada-secundaria" align="right">DRINKS</h1>
            </div>
        </div>
    </div>
</div>
<!-- Secao de apresentar o restaurante -->
<div class="d-flex justify-content-center flex-column my-5" align="center">
    <div class="col-md-6" align="center">
        <p class="mx-auto chamada-principal-apresentacao">Seja Bem Vindo ao</p>
        <p class="mx-auto chamada-nome-vermelho-lg" id="titulo-pipo">PIPO RESTAURANTE</p>
        <p class="mx-auto chamada-slogan">"Vem pro Pipo, aqui é muito mais gostoso!"</p>
        <p class="mx-auto chamada-texto-cinza">Nosso restaurante conta com uma gastronomia autoral, baseada nas experiências e gosto pessoal 
            do proprietário Pipo que decidiu juntar todos os seus hobbies ao construí-lo.
            <br/>
            <br/>
            Chef, advogado e empresário. Pipo é apaixonado por arte, música, gastronomia e arquitetura e ama viajar.
            Visitou os mais diversos restaurantes nos 23 países que conheceu, sempre seguindo o guia Michelin. O Pipo 
            Restaurante conta com uma arquitetura de linhas retas, moderna e composta principalmente de concreto e vidro,
            tudo sobre um lago em um belíssimo jardim de 2400m².</p>
    </div>
    <div class="col-md-6" align="center">
        <div class="image-container">
            <img class="image-restaurant-bottom img-responsive p-4" src="<?=$home?>/assets/imagens/pages/home/fachada_restaurante.jpg" alt="">
            <img class="image-restaurant-top img-responsive p-4" src="<?=$home?>/assets/imagens/pages/home/vista_restaurante.jpg" alt="">
        </div>
    </div>
</div>
<!-- Secao da gastronomia -->
<div class="d-flex justify-content-center flex-row bg-dark mt-3">
    <div class="col-md-6" align="center">
        <h1 class="mx-auto chamada-principal-branca mt-5">Conheca nossa</h1>
        <h1 class="mx-auto chamada-nome-amarelo">GASTRONOMIA</h1>
        <div class="col-md-8 my-5">
            <p class="mx-auto chamada-texto-branco">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus commodo lacinia quam. Nulla facilisi. 
                Morbi quam dui, sodales a porta eget, suscipit quis lacus. Vestibulum molestie interdum lectus, nec gravida quam varius et. 
                Nulla orci purus, aliquam eu feugiat venenatis, placerat ac urna.
                <br/>
                <br/>
                Nulla tellus diam, facilisis placerat dui vitae, hendrerit interdum turpis. Vestibulum accumsan semper pulvinar. Morbi vel lorem a orci 
                dignissim aliquet..</p>
        </div>
        <div class="col-md-6 my-5">
            <a class="my-3" href="#" style="text-decoration: none;">
                <button type="button" class="btn btn-outline-secondary-lg-yellow btn-block">CONHEÇA NOSSO MENU</button>
            </a>
        </div>
    </div>
    <div class="col-md-6 full-image-background" style="background-image: url(<?=$home?>/assets/imagens/pages/home/home_chamada_casa.jpg)">
    </div>
</div>
<!-- Secao de eventos -->
<div class="d-flex justify-content-center flex-column full-image-background pt-5" align="center" style="background-image: url(<?=$home?>/assets/imagens/pages/home/fachada_restaurante_2.jpg);">
    <h1 class="mx-auto chamada-principal-branca">Nossos eventos</h1>
    <h1 class="mx-auto chamada-nome-verde">SEMANAIS OU MENSAIS</h1>
    <div class="col-md-5 my-5">
            <p class="mx-auto chamada-texto-branco">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus commodo lacinia quam. Nulla facilisi. 
                Morbi quam dui, sodales a porta eget, suscipit quis lacus. Vestibulum molestie interdum lectus, nec gravida quam varius et. 
                Nulla orci purus, aliquam eu feugiat venenatis, placerat ac urna.
                <br/>
                <br/>
                Nulla tellus diam, facilisis placerat dui vitae, hendrerit interdum turpis. Vestibulum accumsan semper pulvinar. Morbi vel lorem a orci 
                dignissim aliquet..</p>
    </div>
</div>
<!-- Secao de testemunhos -->
<div class="container my-5">
    <!-- Titulo testemunhos -->
    <div class="row">
		<div class="col-md-12" align="center">
            <h1 class="mx-auto chamada-apresentacao-pequeno">O que nosso cliente</h1>
            <h1 class="mx-auto chamada-nome-vermelho-pequeno">TEM A DIZER:</h1>		
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
                            <div class="row py-4">
                                <div class="col-sm-4 text-center">
                                    <img class="img-circle" src="<?=$home?>/assets/imagens/pages/home/cliente1.png" style="width: 150px;height:150px;">
                                </div>
                                <div class="col-sm-8">
                                    <p class="mx-auto chamada-texto-cinza">In imperdiet facilisis tellus ut auctor. Vestibulum posuere lacus sit amet sapien volutpat placerat.
                                        Duis rutrum lacus et augue aliquam, at mattis nunc sollicitudin. In tincidunt magna vel justo blandit consequat. 
                                        Sed bibendum sit amet ipsum sit amet tempor. Maecenas aliquam elit eget laoreet viverra.</p>
                                    <small>João Victor</small>
                                </div>
                            </div>
                        </blockquote>
                    </div>
                    <div class="carousel-item">
                        <blockquote>
                            <div class="row py-4">
                                <div class="col-sm-4 text-center">
                                    <img class="img-circle" src="<?=$home?>/assets/imagens/pages/home/cliente2.png" style="width: 150px;height:150px;">
                                </div>
                                <div class="col-sm-8">
                                    <p class="mx-auto chamada-texto-cinza">In imperdiet facilisis tellus ut auctor. Vestibulum posuere lacus sit amet sapien volutpat placerat. 
                                        Duis rutrum lacus et augue aliquam, at mattis nunc sollicitudin. In tincidunt magna vel justo blandit consequat.
                                        Sed bibendum sit amet ipsum sit amet tempor. Maecenas aliquam elit eget laoreet viverra.</p>
                                    <small>Maria Clara</small>
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
</div>
<!-- Secao de reservas -->
<div class="d-flex justify-content-center flex-column full-image-background py-5" align="center" style="background-image: url(<?=$home?>/assets/imagens/pages/home/fachada_restaurante_completa.jpg);">
    <h1 class="mx-auto chamada-principal-branca">Fazer uma</h1>
    <h1 class="mx-auto chamada-nome-amarelo">RESERVA</h1>
</div>
<div class="d-flex justify-content-center flex-row mb-5">
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
<!-- Secao de newsletter -->
<div class="d-flex justify-content-center flex-column py-5" align="center" style="background-color: #545252">
    <h1 class="mx-auto chamada-principal-branca">Acompanhe nossas</h1>
    <h1 class="mx-auto chamada-nome-verde">NOVIDADES:</h1>
    <p class="mx-auto chamada-texto-branco">Assine nossa newsletter e fique por dentro de 
        todas as novidades da Pipo Restaurante</p>
    <div class="d-flex justify-content-center flex-column">
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
	    <div class="col-md-4" align="center">
	    	<form method="post">
    			<div class="form-email">
	    			<input id="form-email" type="email" placeholder="Seu email" name="form-email">
	    		</div>
    			<button type="submit" class="btn btn-block btn-outline-secondary-lg-green">INSCREVER-SE</button>
	    	</form>
        </div>
    </div>
</div>
<?php get_footer(); ?>
