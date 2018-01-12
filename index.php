<?php 	
    $css_escolhido = 'index';
    require_once('header.php');
    require_once('common_sections_site_functions.php');
    $home = get_template_directory_uri(); 
?>
<!-- Secao inicial da home -->
<div class="container-principal">
    <div class="row mx-0">
        <div class="col-md-3 col-xs-12 full-image-background-principal-home" style="background-image: url(<?=$home?>/assets/imagens/pages/home/home_chamada_casa.jpg);
                                                            background-position: center top">
            <div class="vertical-center">
                <a class="mx-auto chamada-principal-link" href="<?=get_page_link_by_slug('sobre')?>">Nossa</a>
                <h1 class="mx-auto chamada-secundaria" align="right">CASA</h1>
            </div>
        </div>
        <div class="col-md-3 col-xs-12 full-image-background-principal-home" style="background-image: url(<?=$home?>/assets/imagens/pages/home/home_chamada_menus.jpg);
                                                        background-position: center top">
            <div class="vertical-center">
                <a class="mx-auto chamada-principal-link" href="<?=get_page_link_by_slug('menu')?>#pratos-menu-anchor">Deliciosos</a>
                <h1 class="mx-auto chamada-secundaria" align="right">MENUS</h1>
            </div>
        </div>
        <div class="col-md-3 col-xs-12 full-image-background-principal-home" style="background-image: url(<?=$home?>/assets/imagens/pages/home/home_chamada_programacao.jpg);
        <div style="background-color: #ffffff;" class="container-fluid">   background-position: center top">            
            <div class="vertical-center">
                <a class="mx-auto chamada-principal-link" href="<?=get_page_link_by_slug('programacao')?>">Desfrute</a>
                <h1 class="mx-auto chamada-secundaria" align="right">NOSSA PROGRAMAÇÃO</h1>
            </div>
        </div>
        <div class="col-md-3 col-xs-12 full-image-background-principal-home" style="background-image: url(<?=$home?>/assets/imagens/pages/home/home_chamada_drinks.jpg);
                                            background-position: right top 40px">            
            <div class="vertical-center">
                <a class="mx-auto chamada-principal-link" href="<?=get_page_link_by_slug('menu')?>#drinks-menu-anchor">Saborosos</a>
                <h1 class="mx-auto chamada-secundaria" align="right">DRINKS</h1>
            </div>
        </div>
    </div>
</div>
<?php 
get_template_part('/templates/present-restaurant');
get_section_know_our_gastronomy();
?>

<!-- Secao de eventos -->
<div class="d-flex justify-content-center flex-column full-image-background mt-0 pt-5" 
    align="center" style="background-image: url(<?=$home?>/assets/imagens/pages/home/fachada_restaurante_2.jpg);">
    <h1 class="mx-auto chamada-principal-branca">Nossos eventos</h1>
    <h1 class="mx-auto chamada-nome-verde">SEMANAIS OU MENSAIS</h1>
    <div class="col-md-5 mt-5" align="start">
            <p class="mx-auto chamada-texto-branco">Nossa programação conta com eventos semanais e mensais, que vão desde
             a música ao vivo com ênfase nas apresentações de violino, piano e jazz, até grandes exibições de Ópera.             
             Se você tiver sorte, poderá até assistir a uma apresentação do próprio Pipo, que é tenor e canta músicas clássicas, 
             boleros espanhóis, músicas francesa e italiana. A casa aposta nos clássicos para tornar as refeições sempre agradáveis.
                <br/>
                <br/>
                A programação geralmente é organizada pelo renomado maestro Gladson Carvalho, da Orquestra Filarmônica do Ceará. 
                Vem pro Pipo, aqui é muito mais gostoso!</p>
    </div>

    <div class="col-md-4 col-xs-4 mb-5">
            <a href="<?=get_page_link_by_slug('programacao')?>" style="text-decoration: none">
                <button type="submit" class="btn btn-block btn-outline-secondary-lg-green">VEJA NOSSA PROGRAMAÇÃO</button>
            </a>
        </div>
</div>
<?php
get_section_testemonials_customers();
get_section_restaurant_reservation();
get_section_newsletter();
get_footer(); ?>
