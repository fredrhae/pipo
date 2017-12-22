<!DOCTYPE html>
<html>
<head>
    <?php $home = get_template_directory_uri();?>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Singular Automacoes">
    <meta name="author" content="Frederico Rhae">
    <title>
        <?php get_titulo(); ?>
    </title>

    <!-- Loading styles --> 
    <link rel="stylesheet" type="text/css" href="<?= $home?>/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $home?>/assets/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?= $home?>/assets/css/footer.css">
    <link rel="stylesheet" type="text/css" href="<?= $home?>/assets/css/comum.css">
    <link rel="stylesheet" type="text/css" href="<?= $home;?>/assets/css/<?= $css_escolhido; ?>.css">
    <?php wp_head();?>
</head>

<body>
<header>
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?=home_url()?>">
                <img class="img-responsive w-100 h-100" src="<?=$home?>/assets/imagens/logo_menu.png" width="80" height="70" alt="">
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item px-1">
                        <a class="nav-link" href="<?=home_url()?>">HOME</a>
                    </li>
                    <li class="nav-item px-1">
                        <a class="nav-link" href="<?=get_page_link_by_slug('sobre')?>">SOBRE NÓS</a>
                    </li>
                    <li class="nav-item px-1">
                        <a class="nav-link" href="<?=get_page_link_by_slug('landing')?>">NOSSOS EVENTOS</a>
                    </li>
                    <li class="nav-item px-1">
                        <a class="nav-link" href="<?=get_page_link_by_slug('menu')?>">MENU</a>
                    </li>
                    <li class="nav-item px-1">
                        <a class="nav-link" href="<?=get_page_link_by_slug('contatos')?>">CONTATOS</a>
                    </li>
                    <li class="nav-item px-1">
                        <a class="nav-link" href="<?=get_page_link_by_slug('programacao')?>">PROGRAMAÇÃO</a>
                    </li>
                    <li class="nav-item pl-3">
                        <a class="my-3" href="<?=get_page_link_by_slug('reservas')?>" style="text-decoration: none">
                            <button type="button" class="btn btn-outline-secondary btn-block">Reservas</button>
                        </a>
                    </li>
                    <li class="nav-item pl-3">
                        <a class="my-3" href="<?=get_page_link_by_slug('landing')?>#orcamento-anchor" style="text-decoration: none">
                            <button type="button" class="btn btn-outline-secondary btn-block" style="min-width: 150px">Faça seu evento</button>
                        </a>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" href="<?=get_page_link_by_slug('blog')?>">BLOG</a>
                    </li>-->
                </ul>
            </div>
        </div>
    </nav>
</header>