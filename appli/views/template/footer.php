
    <div class="back-to-top-wrapper">
        <a href="#" class="back-to-top">
            <i class="fa fa-arrow-up"></i>
        </a>
    </div>

    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4 col-md-4 footer__block">
                    <span class="footer__title">Walkabout</span>
                    <ul class="footer__list">
                        <li>10 rue des piats</li>
                        <li>59200 Lille</li>
                        <li>
                            <a href="tel:0301020304">
                                <i class="fa fa-phone"></i>03 01 02 03 04
                            </a>
                        </li>
                        <li>
                            <a href="mailto:contact@walkabout.fr">
                                <i class="fa fa-envelope"></i>contact@walkabout-voyages.fr
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-4 footer__block">
                    <span class="footer__title">Plan du site</span>
                    <ul class="footer__list">
                        <li><a href="<?php echo base_url(); ?>nos-destinations">Nos destinations</a></li>
                        <li><a href="<?php echo base_url(); ?>carnets-de-voyage">Carnets de voyage</a></li>
                        <li><a href="<?php echo base_url(); ?>qui-sommes-nous">Notre esprit</a></li>
                        <li><a href="<?php echo base_url(); ?>contact">Nous contacter</a></li>
                        <li><a href="<?php echo base_url(); ?>nos-actualites">Nos actualités</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-4 footer__block">
                    <span class="footer__title">Tenez-vous informés</span>
                    <div class="footer__social">
                        <a class="item_fb" href="https://www.facebook.com/walkabout.voyage" title="Suivez-nous sur Facebook !" target="blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a class="item_tw" href="https://twitter.com/_Walkabout_" title="Suivez-nous sur Twitter !" target="blank">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a class="item_gp" href="https://plus.google.com/114606485962340409388" title="Suivez-nous sur Google + !" target="blank">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                    <a class="fancybox" href="#newsletter-block">Inscrivez-vous à notre newsletter</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="footer__copyright">
                        <hr>
                        <li>©&nbsp;Walkabout &bull; 2015</li><br />
                        <li><a href="<?php echo base_url(); ?>mentions">Mentions légales</a> &bull; </li>
                        <li><a href="<?php echo base_url(); ?>conditions_generales_de_ventes">Conditions Générales de Vente</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="newsletter-block">
            <h2 class="sep">Inscription à la newsletter Walkabout</h2>
            <?php echo form_open("newsletter/add") ?>
                <label for="newsletter">Votre e-mail</label>
                <input type="email" name="newsletter" id="newsletter" placeholder="Entrez votre e-mail...">
                <input class="button" type="submit" value="Je m'inscris !">
            <?php echo form_close(); ?>
        </div>
    </footer>

<!-- Loader -->

    <div id="spinner">
        <img src="<?php echo img_url("logo-wk-icon.png"); ?>" />
    </div>

<!-- Fin Loader -->

<!-- Jquery & jQUI -->
<script type="text/javascript" src="<?php echo js_url('jquery') ?>"></script>

<!-- Google reCaptcha -->
<script src='<?php echo js_url('vendors/recaptcha'); ?>'></script>

<!-- Vendors -->
<script type="text/javascript" src="<?php echo js_url('vendors/bootstrap.min'); ?>"></script>
<script type="text/javascript" src="<?php echo js_url('vendors/modernizr'); ?>"></script>
<script type="text/javascript" src="<?php echo js_url('vendors/readmore-min'); ?>"></script>
<script type="text/javascript" src="<?php echo js_url('vendors/stellar'); ?>"></script>
<script type="text/javascript" src="<?php echo js_url('vendors/owl.carousel.min'); ?>"></script>
<script type="text/javascript" src="<?php echo js_url('vendors/fancybox/fancybox.min'); ?>"></script>
<script type="text/javascript" src="<?php echo js_url('vendors/fancybox/fancybox-buttons'); ?>"></script>
<script type="text/javascript" src="<?php echo js_url('vendors/fancybox/fancybox-media'); ?>"></script>
<script type="text/javascript" src="<?php echo js_url('vendors/fancybox/fancybox-thumbs'); ?>"></script>
<script type="text/javascript" src="<?php echo js_url('vendors/dotimeout'); ?>"></script>
<script type="text/javascript" src="<?php echo js_url('vendors/iconate'); ?>"></script>
<script type="text/javascript" src="<?php echo js_url('vendors/images-loaded'); ?>"></script>
<script type="text/javascript" src="<?php echo js_url('vendors/masonry.min'); ?>"></script>

<!--Medium editor-->
<script src="<?php echo js_url('vendors/medium/medium-editor'); ?>"></script>
<script src="<?php echo js_url('vendors/medium/handlebars'); ?>"></script>
<script src="<?php echo js_url('vendors/medium/sortable'); ?>"></script>
<script src="<?php echo js_url('vendors/medium/jquery.ui.widget');?>"></script>
<script src="<?php echo js_url('vendors/medium/jquery.iframe-transport');?>"></script>
<script src="<?php echo js_url('vendors/medium/jquery.fileupload');?>"></script>
<script src="<?php echo js_url('vendors/medium/medium-editor-insert-plugin.min');?>"></script>

<!-- Site's script -->
<script type="text/javascript" src="<?php echo js_url('scripts'); ?>"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65852753-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>