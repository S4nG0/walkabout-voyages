<div class="steps-wrapper">

    <ul class="steps">

<?php if( $page == 'choice' ) { ?>

        <li class="active">
            <div class="step-block">
                <i class="fa fa-globe"></i>
                <span class="step">Date de départ</span>
            </div>
        </li>

        <li class="disabled">
            <div class="step-block">
                <i class="fa fa-sign-in"></i>
                <span class="step">Connexion</span>
            </div>
        </li>

        <li class="disabled">
            <div class="step-block">
                <i class="fa fa-info-circle"></i>
                <span class="step">Informations</span>
            </div>
        </li>

        <li class="disabled">
            <div class="step-block">
                <i class="fa fa-money"></i>
                <span class="step">Paiement</span>
            </div>
        </li>

<?php }; ?>

<?php if( $page == 'sign-in' ) { ?>

        <li class="active">
            <div class="step-block">
                <i class="fa fa-globe"></i>
                <span class="step">Date de départ</span>
            </div>
        </li>

        <li class="active">
            <div class="step-block">
                <i class="fa fa-sign-in"></i>
                <span class="step">Connexion</span>
            </div>
        </li>

        <li class="disabled">
            <div class="step-block">
                <i class="fa fa-info-circle"></i>
                <span class="step">Informations</span>
            </div>
        </li>

        <li class="disabled">
            <div class="step-block">
                <i class="fa fa-money"></i>
                <span class="step">Paiement</span>
            </div>
        </li>

<?php }; ?>

<?php if( $page == 'informations' || $page == 'inscription' ) { ?>

        <li class="active">
            <div class="step-block">
                <i class="fa fa-globe"></i>
                <span class="step">Date de départ</span>
            </div>
        </li>

        <li class="active">
            <div class="step-block">
                <i class="fa fa-sign-in"></i>
                <span class="step">Connexion</span>
            </div>
        </li>

        <li class="active">
            <div class="step-block">
                <i class="fa fa-info-circle"></i>
                <span class="step">Informations</span>
            </div>
        </li>

        <li class="disabled">
            <div class="step-block">
                <i class="fa fa-money"></i>
                <span class="step">Paiement</span>
            </div>
        </li>

<?php }; ?>

<?php if( $page == 'payment' ) { ?>

        <li class="active">
            <div class="step-block">
                <i class="fa fa-globe"></i>
                <span class="step">Date de départ</span>
            </div>
        </li>

        <li class="active">
            <div class="step-block">
                <i class="fa fa-sign-in"></i>
                <span class="step">Connexion</span>
            </div>
        </li>

        <li class="active">
            <div class="step-block">
                <i class="fa fa-info-circle"></i>
                <span class="step">Informations</span>
            </div>
        </li>

        <li class="active">
            <div class="step-block">
                <i class="fa fa-money"></i>
                <span class="step">Paiement</span>
            </div>
        </li>

<?php }; ?>

    </ul>
</div>