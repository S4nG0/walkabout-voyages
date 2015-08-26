<!DOCTYPE html>
<html lang="fr">

<!-- Efficom - Groupe 2 - CRW 2014/2015 -->
<!-- Walkabout est un projet scolaire à but non-lucratif. Aucun bénéfice ne sera réalisé sur ce projet. -->

<head>

    <meta charset="UTF-8">
    <meta name="description" content="Partez dans des contrées reculées et partagez une expérience inoubliable">
    <title><?php echo "$title - Walkabout"; ?></title>
    <link rel="icon" href="<?php echo img_url('favicon.png'); ?>" type="image/png">
    <link rel="apple-touch-icon" href="<?php echo img_url('apple-touch-icon.png'); ?>">
    <link rel="alternate" hreflang="fr" href="http://fr.walkabout-voyages.fr/" />
    <link href="https://plus.google.com/114606485962340409388" rel="publisher" />
    
    
    <meta property="og:title" content="<?php echo "$title"; ?>" />
    <meta property="og:type" content="The type" />
    <meta property="og:url" content="<?php echo urlencode( "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>" />
    <meta property="og:image" content="<?php if(isset($destination[0]->banner) && $destination[0]->banner != ''){echo img_url($destination[0]->banner);}else{echo img_url("background.jpg");}?>" />
    

    <!-- Viewport -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400,600,700|Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300' rel='stylesheet' type='text/css'>

    <!-- Vendors -->
    <link rel="stylesheet" href="<?php echo css_url('bootstrap.min'); ?>">
    <link rel="stylesheet" href="<?php echo css_url('font-awesome');?>">
    <link rel="stylesheet" href="<?php echo css_url('fancybox');?>">
    <link rel="stylesheet" href="<?php echo css_url('iconate.min');?>">
    <link rel="stylesheet" href="<?php echo css_url('owl.carousel');?>">

    <!--Medium editor-->
    <link rel="stylesheet" href="<?php echo css_url('medium/medium-editor');?>">
    <link rel="stylesheet" href="<?php echo css_url('medium/bootstrap.min');?>">
    <link rel="stylesheet" href="<?php echo css_url('medium/medium-editor-insert-plugin.min');?>">

    <!-- Custom styles -->
    <link rel="stylesheet" href="<?php echo css_url('global');?>">

</head>