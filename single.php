<?php 	
$css_escolhido = 'single';
require_once('header.php');
$home = get_template_directory_uri();    

?>

<?php 
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
        <!-- Conteudo principal da solucao-->
        <div class="container-principal" style="background-image: url(<?=$imagem_destacada?>);">
            <div class="container vertical-center">
                <div class="d-flex flex-row justify-content-center">
                    <div class="col-md-12" align="center">
                        <h1 class="container-principal-titulo"><?=the_title();?></h1>
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-center mt-5">
                   <div class="col-md-8"  align="center">
                       <p class="mx-auto container-principal-chamada"><?=get_the_content();?></p>
                   </div>
                </div>
            </div>
        </div>
        <!-- Chamada para os clientes -->
        <div class="d-flex flex-row justify-content-center my-4">
            <div class="col-md-12" align="center">
                <?php 
                $chamada_solucao = get_the_title();
                $chamada_solucao_dividida = explode(" ", $chamada_solucao);
                $total_palavras = count($chamada_solucao_dividida);
                $index_parada_dividir_palavras = round($total_palavras/2);
                $parte_azul_chamada = "";
                $parte_cinza_chamada = "";               
                for ($i = 0; $i <= $total_palavras; $i++) {
                   if($i < $index_parada_dividir_palavras) {
                       $parte_azul_chamada = $parte_azul_chamada . " " . $chamada_solucao_dividida[$i];
                   } else {
                        $parte_cinza_chamada = $parte_cinza_chamada . " " . $chamada_solucao_dividida[$i];
                   }
                }
                ?>
                <p class="chamada-titulos-cinza"><?php echo $parte_azul_chamada?> <span class="chamada-titulos-azul"><?=$parte_cinza_chamada?></span></p>
                <div class="col-md-6"  align="center">
                        <p class="mx-auto texto-conteudo-cinza"><?=get_the_content()?></p>
                </div>
            </div>
        </div>

        <!-- Carregamento das imagens da solução selecionada -->
        <?php
		$attachments = new Attachments( 'my_attachments' );
        if( $attachments->exist() ) : 
            $counter = 0;
            ?>
            <?php while( $attachments->get() ) :
            // Flag para indicar se a solucao vai ser exibida na direita ou a esquerda
            $alignRight = $counter%2 != 0;?>
            <div class="full-image-background" style="background-image: url(<?=$attachments->url()?>)">
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
                            <h2 class="titulo-solucao mb-4"><?=$attachments->field( 'title' );?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <?php if($alignRight) { ?>
                            <div class="col-md-8 col-xs-8"></div>
                        <?php
                        }
                        ?>
                        <div class="col-md-4 col-xs-8 texto-solucao block-with-text mb-4">
                            <?=$attachments->field('caption');?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $counter = $counter + 1;
            endwhile; 
        endif;
        ?>
        <!-- Slider com clientes satisfeitos -->
        <div class="d-flex justify-content-center my-5">
            <div class="col-md-6 mt-3">
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
} 
get_footer()?>