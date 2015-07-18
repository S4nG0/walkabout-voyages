<!-- BREADCRUMBS FOR CHECKOUT -->
<div class="steps-wrapper">
    <ul class="steps">

<?php if( $step == 'choice' ) { ?>

        <li class="active">
            <div class="step-block">
                <span class="step">Choix de la date</span>
                <span class="number">1</span>
            </div>
        </li>

        <li class="disabled">
            <div class="step-block">
                <span class="step">Connexion</span>
                <span class="number">2</span>
            </div>
        </li>

        <li class="disabled">
            <div class="step-block">
                <span class="step">Informations</span>
                <span class="number">3</span>
            </div>
        </li>

        <li class="disabled">
            <div class="step-block">
                <span class="step">Paiement</span>
                <span class="number">4</span>
            </div>
        </li>

<?php }; ?>

<?php if( $step == 'sign-in' ) { ?>

        <li class="validated">
            <div class="step-block">
                <span class="step">Choix de la date</span>
                <span class="number">1</span>
            </div>
        </li>

        <li class="active">
            <div class="step-block">
                <span class="step">Connexion</span>
                <span class="number">2</span>
            </div>
        </li>

        <li class="disabled">
            <div class="step-block">
                <span class="step">Informations</span>
                <span class="number">3</span>
            </div>
        </li>

        <li class="disabled">
            <div class="step-block">
                <span class="step">Paiement</span>
                <span class="number">4</span>
            </div>
        </li>

<?php }; ?>

<?php if( $step == 'informations' || $step == 'inscription' ) { ?>

        <li class="validated">
            <div class="step-block">
                <span class="step">Choix de la date</span>
                <span class="number">1</span>
            </div>
        </li>

        <li class="validated">
            <div class="step-block">
                <span class="step">Connexion</span>
                <span class="number">2</span>
            </div>
        </li>

        <li class="active">
            <div class="step-block">
                <span class="step">Informations</span>
                <span class="number">3</span>
            </div>
        </li>

        <li class="disabled">
            <div class="step-block">
                <span class="step">Paiement</span>
                <span class="number">4</span>
            </div>
        </li>

<?php }; ?>

<?php if( $step == 'payment' ) { ?>

        <li class="validated">
            <div class="step-block">
                <span class="step">Choix de la date</span>
                <span class="number">1</span>
            </div>
        </li>

        <li class="validated">
            <div class="step-block">
                <span class="step">Connexion</span>
                <span class="number">2</span>
            </div>
        </li>

        <li class="validated">
            <div class="step-block">
                <span class="step">Informations</span>
                <span class="number">3</span>
            </div>
        </li>

        <li class="active">
            <div class="step-block">
                <span class="step">Paiement</span>
                <span class="number">4</span>
            </div>
        </li>

<?php }; ?>

    </ul>
</div>