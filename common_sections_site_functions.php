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
		<span class="email-sucesso">Seu e-mail foi enviado com sucesso!</span>
	<?php } else { ?>
		<span class="email-fracasso">Desculpe, ocorreu um erro, seu e-mail não foi enviado!</span>
	<?php } 
}

function get_section_present_restaurant() {
    global $home;
?>
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
<?php
}

function get_section_restaurant_chef($text_about_chef, $path_foto_1, $path_foto_2) {
    global $home;
?>
<div class="d-flex justify-content-center flex-row bg-dark mt-3">
    <div class="col-md-6" align="center">
        <h1 class="mx-auto chamada-principal-branca mt-5">Conheca nosso</h1>
        <h1 class="mx-auto chamada-nome-amarelo">CHEF DE COZINHA</h1>
        <div class="col-md-8 my-5">
            <p class="mx-auto chamada-texto-branco"><?=$text_about_chef?></p>
        </div>
    </div>
    <div class="col-md-6" align="center">
        <div class="image-container">
            <img class="image-restaurant-bottom img-responsive p-4" src="<?=$path_foto_2?>" alt="">
            <img class="image-restaurant-top img-responsive p-4" src="<?=$path_foto_1?>" alt="">
        </div>
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
                    <button type="submit" class="btn btn-block btn-outline-secondary-lg-gray">RESERVAR</button>
                </form>
            </div>
        </div>
    </div>
<?php
}