<?php $home = get_template_directory_uri();?>
    <footer class="py-3 footer-separator">
    </footer>
    <div class="footer-bs py-5 bg-dark">
        <div class="d-flex justify-content-center">
        	<div class="col-md-2 footer-brand animated fadeInLeft">
                <p style="">Chef, advogado e empresário. Pipo é apaixonado por arte, música, gastronomia, arquitetura e ama viajar. 
                    Visitou os mais diversos restaurantes nos 23 países que conheceu, sempre seguindo o guia Michelin.
                </p>
            </div>
        	<div class="col-md-3 footer-nav animated fadeInUp">
                <a href="#"><h4>Ir para o topo —</h4></a>
                <ul class="pages">
                    <li><a href="<?=get_page_link_by_slug('quem-somos-nos')?>">A Casa</a></li>
                    <li><a href="<?=get_page_link_by_slug('menu')?>">Nosso Menu</a></li>
                    <li><a href="<?=get_page_link_by_slug('eventos')?>">Nossos Eventos</a></li>
                    <li><a href="<?=get_page_link_by_slug('contatos')?>">Contatos</a></li>
                    <li><a href="<?=get_page_link_by_slug('blog')?>">Blog</a></li>
                    <li><a href="<?=get_page_link_by_slug('faca-sua-reserva')?>">Faça sua reserva</a></li>
                    <li><a href="<?=get_page_link_by_slug('faca-sua-reserva')?>">Faça seu evento</a></li>
                </ul>
            </div>
        	<div class="col-md-2 footer-social animated fadeInDown">
                <div class="d-flex justify-content-center flex-column" align="center">
                    <a class="my-3" href="#" style="text-decoration: none">
						<button type="button" class="btn btn-outline-secondary btn-block">Faça sua reserva</button>
					</a>
                    <h4>Siga-nos</h4>
                    <div class="d-flex justify-content-center flex-row">
                        <a class="px-2" href="#">
                            <img src="<?=$home?>/assets/imagens/Facebook.svg" width="30" height="30" alt="">
                        </a>
                        <a class="px-2" href="#">
                            <img src="<?=$home?>/assets/imagens/Instagram.svg" width="30" height="30" alt="">
                        </a>
                        <a class="px-2" href="#">
                            <img src="<?=$home?>/assets/imagens/Instagram.svg" width="30" height="30" alt="">
                        </a>
                        <a class="px-2" href="#">
                            <img src="<?=$home?>/assets/imagens/Instagram.svg" width="30" height="30" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 footer-social animated fadeInLeft">
                <div class="d-flex justify-content-center flex-column">
                    <p style="">Fone:(85) 3051-1340 (85) 98141-4155</p>
                    <p style="">pipoearte@gmail.com</p>
                    <p style="">São Gabriel, 399, Fortaleza/CE</p>
                    <a  style="text-decoration: none; border: none" href="<?=home_url()?>">
                        <img src="<?=$home?>/assets/imagens/logo_footer.png" width="102" height="90" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?= $home?>/assets/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?= $home?>/assets/vendor/popper/popper.min.js"></script>
    <script type="text/javascript" src="<?= $home?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<?php wp_footer();?>
</body>
</html>