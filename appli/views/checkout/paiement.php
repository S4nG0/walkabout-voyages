<?php
$page = 'checkout';
$step = 'payment';
?>

<body class="checkout">

<div class="main banner">
    <div class="container-fluid noPadding">
    <?php
        set_include_path(dirname(__FILE__)."/../");
        include 'template/menu.php';
    ?>
    </div>
</div>

<div class="content">
    <div class="container-fluid noPadding">
        <div class="row noPadding">
            <!-- Etapes de commande -->
            <?php include 'etapes.php'; ?>
        </div>
    </div>
    <div class="container">
        <!-- Choice block -->
        <div class="row">
            <div class="payment-block">

                <?php echo form_open('checkout/conclusion'); ?>

                    <div class="recap-block">
                        <h1>Récapitulatif de la réservation</h1>
                        <?php if($cgv == true){ ?>
                            <script>alert('Vous devez accepter les conditions générales de ventes afin de pouvoir finaliser votre commande.');</script>
                        <?php } ?>
                        <p class="small hidden-lg hidden-md hidden-sm">
                            Attention : sur petits écrans (smartphones ou certaines tablettes), n'oubliez pas de préciser le nombre de participants en déplaçant le tableau ci-dessous vers la gauche&nbsp;!
                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Destination choisie</td>
                                        <td>Prix</td>
                                        <td>Participants</td>
                                        <td class="price__total"><span class="price pull-right">Total</span></td>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>
                                        <h3><?php echo $destination->titre; ?></h3>
                                        <p><?php echo $pays->nom; ?>&nbsp;&bull;&nbsp;du <?php echo $voyage->date_depart; ?> au <?php echo $voyage->date_retour; ?></p>
                                    </td>
                                    <td>
                                        <span class="price" id="price"><span id="prix_personne"><?php echo $voyage->prix; ?></span><sup> €</sup></span>
                                    </td>
                                    <td>
                                        <div class="participants noselect">
                                            <span class="substractParticipants">
                                                <i class="fa fa-minus" title="Supprimer un participant"></i>
                                            </span>
                                            <span id="nombre_participants">1</span>
                                            <span class="addParticipants">
                                                <i class="fa fa-plus" title="Ajouter un participant"></i>
                                            </span>
                                            <input type="hidden" name="nb_personne" id="nb_personne" value="1"/>
                                            <br /><span class="small">(places restantes : <?php echo $nb_places_restantes; ?>)</span>
                                            <input type="hidden" id="nb_places" value="<?php echo $nb_places_restantes; ?>"/>
                                        </div>
                                    </td>
                                    <td class="price__total">
                                        <span class="price" id="total">
                                            <span class="pull-right" id="result_total"><?php echo $voyage->prix; ?><sup>&nbsp;€</sup></span>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                        </div>
                    </div>

                    <div class="payment-method-block clearfix">
                        <h1>Mode de paiement</h1>
                        <p class="small">
                            Remarque : le paiement d'une avance de 10% du prix final est nécessaire pour pouvoir réserver votre place. Cette avance sera déduit immédiatement de votre compte et vous sera remboursé en cas d'annulation. Le reste du paiement sera déduit à la conclusion du dossier.
                        </p>
                        <ul class="methods">
                            <li class="method">
                                <div class="icon-wrapper">
                                    <i class="fa fa-paypal"></i>
                                    <span>Paypal</span>
                                    <input type="radio" name="payment-method" value="pm-paypal" id="pm-paypal" checked>
                                    <label for="pm-paypal"><span></span></label>
                                </div>
                            </li>
                            <li class="method">
                                <div class="icon-wrapper">
                                    <i class="fa fa-cc-visa"></i>
                                    <span>Visa&nbsp;/&nbsp;Master Card</span>
                                    <input type="radio" name="payment-method" value="pm-cc" id="pm-cc">
                                    <label for="pm-cc"><span></span></label>
                                </div>
                            </li>
                            <li class="method">
                                <div class="icon-wrapper">
                                    <i class="fa fa-bank"></i>
                                    <span>Virement bancaire</span>
                                    <input type="radio" name="payment-method" value="pm-bank" id="pm-bank">
                                    <label for="pm-bank"><span></span></label>
                                </div>
                            </li>
                        </ul>
                        <hr>
                    </div>

                    <div class="terms-and-conditions-block">
                        <input type="checkbox" name="gtc" id="gtc">
                        <label for="gtc"><span></span>En cochant cette case, vous confirmez avoir lu et accepté les&nbsp;
                            <a class="fancybox" href="#cgv-pop-up">conditions&nbsp;générales&nbsp;de&nbsp;vente</a>&nbsp;de Walkabout.</label>
                        <input class="button black" id="submit_commande" type="submit" value="Je finalise ma réservation !">
                    </div>

                    <div id="cgv-pop-up">
                        <div class="cgv-pop-up__content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <h2 class="sep text-center">Conditions Générales de Vente</h2>
                                        <p>walkabout-voyages.fr (ci-après dénommé « Le site ») est édité par la Société Walkabout, SARL au capital de XXXX euros, dont le siège social se trouve à Lille (59000) – 10, rue des piats, identifiée au RCS de Lille sous le n°XXX XXX XXX, numéro de TVA intracommunautaire n° FRXXXXXXXX (ci-après dénommée « la Société Walkabout »). Toutes les commandes effectuées sur le site sont soumises aux présentes conditions générales de vente. La Société Walkabout se réserve le droit d’adapter ou de modifier à tout moment les présentes, la version des conditions générales de vente applicable à toute transaction étant celle figurant en ligne sur le site www.walkabout-voyages.fr au moment de la commande.</p>
                                        <h3 class="text-center">Le Client</h3>
                                        <p>Le Client déclare être une personne physique, âgée d’au moins 18 ans et avoir la capacité juridique ou être titulaire d’une autorisation parentale lui permettant d’effectuer une commande sur le site. Lors de l’enregistrement des données personnelles du Client dans la rubrique “mon compte”, ce dernier doit s’assurer de l’exactitude et de l’exhaustivité des données obligatoires qu’il fournit. En cas d’erreur dans le libellé des coordonnées du destinataire, la Société Walkabout ne saurait être tenue responsable de l’impossibilité de livrer le produit. La Société Walkabout se réserve le droit d’annuler toute commande lorsque l’adresse IP du client sera domiciliée dans un pays différent de l’adresse de facturation et/ou de livraison.</p>
                                        <h3 class="text-center">Présentation des produits</h3>
                                        <p>Les descriptions, dimensions et visuels de produits ne sont pas contractuels.</p>
                                        <h3 class="text-center">Prix de vente</h3>
                                        <p>Les prix des produits présents sur le site sont indiqués en Euros, toutes taxes comprises. Ils ne comprennent pas les frais d'expédition qui sont à la charge du client. Les prix de vente peuvent à tout moment être modifiés sur le site.</p>
                                        <h3 class="text-center">Règlement de la commande</h3>
                                        <p>Le règlement des achats s’effectue par carte bancaire, chèque ou compte Paypal. Le Client accède à un espace dédié mis à disposition par le service Paypal, lequel assure la sécurité et l’enregistrement de l’ordre de paiement.</p>
                                        <h3 class="text-center">Droit de rétractation</h3>
                                        <p>Le Client particulier dispose d’un droit de rétractation, qu’il peut exercer sans motif, dans un délai de sept jours francs à compter de la livraison de la commande qui s’exercera par le retour à ses frais des produits neufs (dans leur emballage d’origine, non utilisés, non déballés) accompagnés du numéro de commande à l’adresse suivante :</p>
                                        <ul>
                                            <li>walkabout-voyages.fr</li>
                                            <li>10, rue des piats</li>
                                            <li>59000 Lille</li>
                                        </ul>
                                        <p>La Société Walkabout remboursera au Client les sommes déjà versées, déduction faite des frais d’expédition, dans les conditions visées à l’article Remboursement.</p>
                                        <h3 class="text-center">Remboursement</h3>
                                        <p>Le remboursement des produits sera effectué par la Société Walkabout dans un délai maximum de 30 jours après la demande. Le remboursement s’effectuera suivant le même mode de règlement choisi par le client au moment de sa commande ou par la remise de bon d’achat.</p>
                                        <h3 class="text-center">Droit applicable</h3>
                                        <p>Toute commande emporte de plein droit adhésion du client aux conditions générales de vente. Ces conditions générales de vente sont régies par le droit français. En cas de litige, seuls les Tribunaux de Lille seront seuls compétents. ?En cas de difficulté ou de réclamation à l’occasion d’une commande, le client peut s’adresser au Service Client (sur notre page de contact) afin de trouver une solution à l'amiable.</p>
                                        <h3 class="text-center">Données personnelles</h3>
                                        <p>Les informations collectées par la Société Walkabout lors d’une commande du client sont nécessaires à la gestion de la transaction et à cet effet pourront être communiquées en tout ou partie aux prestataires de la Société Walkabout intervenant dans le cadre de l’exécution de la commande. Le client est informé que ces mêmes données à caractère personnel pourront également être collectées par un organisme en charge de l’analyse des commandes et de la lutte contre la fraude à la carte bancaire. Conformément à la loi Informatique et Libertés n°78-17 du 6 janvier 1978, le client dispose d’un droit d’accès, de rectification, d’opposition et de suppression aux données le concernant. Le présent site a fait l'objet d'une déclaration à la CNIL – en date du 13 janvier 2012 – récépissé de déclaration n° 1558419.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                <?php echo form_close(); ?>
                <div class="buttons-block">
                    <a class="button prev" href="<?php echo base_url()."checkout/informations"; ?>">Retour</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.onload = function (){

        var price = <?php echo $voyage->prix; ?>;

        $('.addParticipants').on('click', function(){

            var value = $('#nombre_participants').text();
            if(value == <?php echo $nb_places_restantes; ?>){
                alert('Le nombre de places restantes a été atteint. Vous ne pouvez pas assigner plus de participants.');
            }else{
                value++;
                $('#nombre_participants').text(value);
                $('#nb_personne').val(value);
                var total = price * value;
                $('#result_total').text(total);
            }
        });

        $('.substractParticipants').on('click', function(){
            var value = $('#nombre_participants').text();
            if(value == 1){
                alert('Le nombre de participants ne peut pas être inférieur à 1');
            }else{
                value--;
                $('#nombre_participants').text(value);
                $('#nb_personne').val(value);
                var total = price * value;
                $('#result_total').text(total);
            }
        });
    }
</script>