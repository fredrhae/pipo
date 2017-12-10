<?php 	
    $css_escolhido = 'index';
    require_once('header.php');
    require_once('common_sections_site_functions.php');
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
<?php 
get_section_present_restaurant();
?>

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
<?php
get_section_testemonials_customers();
get_section_restaurant_reservation();
get_section_newsletter();
get_footer(); ?>
