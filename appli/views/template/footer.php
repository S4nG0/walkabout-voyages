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
                        <a class="item_fb" href="#" title="Suivez-nous sur Facebook !" target="blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a class="item_tw" href="#" title="Suivez-nous sur Twitter !" target="blank">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a class="item_gp" href="#" title="Suivez-nous sur Google + !" target="blank">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                    <a class="fancybox" href="#newsletter-block">Inscrivez-vous à notre newsletter</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="footer__copyright">
                        <hr />
                        <li>©&nbsp;Walkabout &bull; 2015</li><br>
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
<script type="text/javascript" src="<?php echo js_url('vendors/fancybox-min'); ?>"></script>
<script type="text/javascript" src="<?php echo js_url('vendors/dotimeout'); ?>"></script>
<script type="text/javascript" src="<?php echo js_url('vendors/iconate'); ?>"></script>

<!--Medium editor-->
<script src="<?php echo js_url('vendors/medium/medium-editor'); ?>"></script>
<script src="<?php echo js_url('vendors/medium/handlebars'); ?>"></script>
<script src="<?php echo js_url('vendors/medium/sortable'); ?>"></script>
<script src="<?php echo js_url('vendors/medium/jquery.ui.widget');?>"></script>
<script src="<?php echo js_url('vendors/medium/jquery.iframe-transport');?>"></script>
<script src="<?php echo js_url('vendors/medium/jquery.fileupload');?>"></script>
<script src="<?php echo js_url('vendors/medium/medium-editor-insert-plugin.min');?>"></script>
<script>    
    $(function () {
    $('.medium-editor').mediumInsert({
        editor: new MediumEditor('.medium-editor'), // (MediumEditor) Instance of MediumEditor
        enabled: true, // (boolean) If the plugin is enabled
        addons: { // (object) Addons configuration
        images: { // (object) Image addon configuration
            label: '<span class="fa fa-camera"></span>', // (string) A label for an image addon
            uploadScript: null, // DEPRECATED: Use fileUploadOptions instead
            deleteScript: 'delete.php', // (string) A relative path to a delete script
            preview: true, // (boolean) Show an image before it is uploaded (only in browsers that support this feature)
            captions: true, // (boolean) Enable captions
            captionPlaceholder: 'Type caption for image (optional)', // (string) Caption placeholder
            autoGrid: 3, // (integer) Min number of images that automatically form a grid
            formData: {}, // DEPRECATED: Use fileUploadOptions instead
            fileUploadOptions: { // (object) File upload configuration. See https://github.com/blueimp/jQuery-File-Upload/wiki/Options
                url: 'upload.php', // (string) A relative path to an upload script
                acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i // (regexp) Regexp of accepted file types
            },
            styles: { // (object) Available image styles configuration
                wide: { // (object) Image style configuration. Key is used as a class name added to an image, when the style is selected (.medium-insert-images-wide)
                    label: '<span class="fa fa-align-justify"></span>', // (string) A label for a style
                    added: function ($el) {}, // (function) Callback function called after the style was selected. A parameter $el is a current active paragraph (.medium-insert-active)
                    removed: function ($el) {} // (function) Callback function called after a different style was selected and this one was removed. A parameter $el is a current active paragraph (.medium-insert-active)
                },
                left: {
                    label: '<span class="fa fa-align-left"></span>'
                },
                right: {
                    label: '<span class="fa fa-align-right"></span>'
                },
                grid: {
                    label: '<span class="fa fa-th"></span>'
                }
            },
            actions: { // (object) Actions for an optional second toolbar
                remove: { // (object) Remove action configuration
                    label: '<span class="fa fa-times"></span>', // (string) Label for an action
                    clicked: function ($el) { // (function) Callback function called when an action is selected
                        var $event = $.Event('keydown');

                        $event.which = 8;
                        $(document).trigger($event);   
                    }
                }
            },
            messages: {
                acceptFileTypesError: 'This file is not in a supported format: ',
                maxFileSizeError: 'This file is too big: '
            },
            uploadCompleted: function ($el, data) {} // (function) Callback function called when upload is completed
        },
        embeds: { // (object) Embeds addon configuration
            label: '<span class="fa fa-youtube-play"></span>', // (string) A label for an embeds addon
            placeholder: 'Paste a YouTube, Vimeo, Facebook, Twitter or Instagram link and press Enter', // (string) Placeholder displayed when entering URL to embed
            captions: true, // (boolean) Enable captions
            captionPlaceholder: 'Type caption (optional)', // (string) Caption placeholder
            oembedProxy: 'http://medium.iframe.ly/api/oembed?iframe=1', // (string/null) URL to oEmbed proxy endpoint, such as Iframely, Embedly or your own. You are welcome to use "http://medium.iframe.ly/api/oembed?iframe=1" for your dev and testing needs, courtesy of Iframely. *Null* will make the plugin use pre-defined set of embed rules without making server calls.
            styles: { // (object) Available embeds styles configuration
                wide: { // (object) Embed style configuration. Key is used as a class name added to an embed, when the style is selected (.medium-insert-embeds-wide)
                    label: '<span class="fa fa-align-justify"></span>', // (string) A label for a style
                    added: function ($el) {}, // (function) Callback function called after the style was selected. A parameter $el is a current active paragraph (.medium-insert-active)
                    removed: function ($el) {} // (function) Callback function called after a different style was selected and this one was removed. A parameter $el is a current active paragraph (.medium-insert-active)
                },
                left: {
                    label: '<span class="fa fa-align-left"></span>'
                },
                right: {
                    label: '<span class="fa fa-align-right"></span>'
                }
            },
            actions: { // (object) Actions for an optional second toolbar
                remove: { // (object) Remove action configuration
                    label: '<span class="fa fa-times"></span>', // (string) Label for an action
                    clicked: function ($el) { // (function) Callback function called when an action is selected
                        var $event = $.Event('keydown');

                        $event.which = 8;
                        $(document).trigger($event);   
                    }
                }
            }
        }
    }
    });
});
</script>

<!-- Site's script -->
<script type="text/javascript" src="<?php echo js_url('scripts'); ?>"></script>

</body>
</html>