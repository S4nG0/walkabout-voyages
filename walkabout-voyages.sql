-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 29 Août 2015 à 23:31
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `walkabout-voyages`
--

-- --------------------------------------------------------

--
-- Structure de la table `wa__actualites`
--

CREATE TABLE IF NOT EXISTS `wa__actualites` (
  `idActualites` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(400) NOT NULL,
  `date` date DEFAULT NULL,
  `texte` mediumtext,
  `btn_name` varchar(500) NOT NULL,
  `btn_url` varchar(500) NOT NULL,
  `description` varchar(150) NOT NULL,
  `publie` varchar(5) DEFAULT NULL,
  `photos` longtext,
  `idAdministrateur` int(11) NOT NULL,
  PRIMARY KEY (`idActualites`),
  KEY `idAdministrateur` (`idAdministrateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `wa__actualites`
--

INSERT INTO `wa__actualites` (`idActualites`, `titre`, `date`, `texte`, `btn_name`, `btn_url`, `description`, `publie`, `photos`, `idAdministrateur`) VALUES
(1, 'Créez votre carnet de voyage en ligne sur notre site !', '2015-08-14', 'Cela vous permettra de partager votre expérience  avec votre famille ou avec la communauté Walkabout si vous le souhaitez. Ce carnet est entièrement modulable se qui vous permettra de le personnaliser et de le rendre à votre image. Alors fini le Moleskine et place au carnet de voyage en ligne avec Walkabout !', 'VOIR LES CARNETS DE VOYAGES', 'http://walkabout-voyages.fr/carnets-de-voyage', 'Vous aimez partager vos expériences de voyages mais vous ne savez pas comment faire ? Nous avons la solution pour vous : créez un carnet de voyage !', 'true', 'actus/walkabout.png', 8),
(2, 'Découvrez notre nouvelle destination le Pérou', '2015-08-20', 'Walkabout vous permet de réaliser ce rêve ! Découvrez notre nouvelle destination, le Pérou, et partez à la rencontre de la tribu des Quéchuas. Vous vivrez au coeur de la cordillère des Andes, en immersion la plus totale au sein du peuple indigène Quechua. Vous profiterez de la bonne humeur à toute épreuve de vos hôtes et de la beauté des paysages. Venez vivre une expérience humainement enrichissante !', 'DECOUVRIR LA DESTINATION', '', 'Avez-vous toujours rêvé de partir à la rencontre d''une culture hors du commun ?', 'true', 'actus/featured_old.jpg', 9),
(3, 'Une nouvelle destination chez Walkabout voyages', '2015-08-20', 'Walkabout vous propose de partager la vie des pygmées du Congo. Vous aurez la chance de partager leur gite, leurs parties de chasse et de pêche. Vous pourrez aussi découvrir la faune et la flore extraordinaire de cette région d''Afrique.', 'DECOUVRIR LA DESTINATION', 'http://walkabout-voyages.fr/nos-destinations/les-pygmees-du-congo', 'Partez à la rencontre des Pygmées du Congo', 'true', 'actus/pygmées2.jpg', 9),
(4, 'Bientôt : Les aborigènes d''australie', '2015-08-20', 'Premiers hommes à avoir occupé le sol australien, les Aborigènes sont les autochtones de l’île-continent depuis au moins 40.000 ans.\nDurant des millénaires, ces multiples tribus semi-nomades ont développé en autarcie une culture qui leur est propre, jusqu’au débarquement des colons occidentaux à la fin du XVIIIe siècle.\n"A l’arrivée des colons anglais, les Aborigènes (…) se déplaçaient au sein de larges territoires, explique la spécialiste de l’Australie Maïa Ponsonnet1. Ils vivaient de chasse, de cueillette et de pêche en groupe d’une à quelques dizaines de familles. Premiers hommes à avoir occupé le sol australien, les Aborigènes sont les autochtones de l’île-continent depuis au moins 40.000 ans.\nDurant des millénaires, ces multiples tribus semi-nomades ont développé en autarcie une culture qui leur est propre, jusqu’au débarquement des colons occidentaux à la fin du XVIIIe siècle.\n"A l’arrivée des colons anglais, les Aborigènes (…) se déplaçaient au sein de larges territoires, explique la spécialiste de l’Australie Maïa Ponsonnet1. Ils vivaient de chasse, de cueillette et de pêche en groupe d’une à quelques dizaines de familles.', '', '', 'Walkabout est heureux de vous annoncer sa future destination: Une immersion chez les Aborigènes d''Australie.', 'true', 'actus/aborigene4.jpg', 9);

-- --------------------------------------------------------

--
-- Structure de la table `wa__administrateur`
--

CREATE TABLE IF NOT EXISTS `wa__administrateur` (
  `idAdministrateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(500) NOT NULL,
  `identifiant` varchar(45) DEFAULT NULL,
  `mdp` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idAdministrateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `wa__administrateur`
--

INSERT INTO `wa__administrateur` (`idAdministrateur`, `nom`, `prenom`, `email`, `identifiant`, `mdp`) VALUES
(2, 'Julien', 'VANDERMEERSCH', 'julien.vdm@gmail.com', 'ju.vdm', '4fdee5ff6b9e76f9f7ff8b322c86bd84ce0ee143fb2369646f55c7f978377a34'),
(7, 'Mignot', 'Steph', 'mignotsteph@gmail.com', 's.mignot', '3acbd4b47c3c242c6622647001c218386dbcd3a6054b193ba51e58ab118356b7'),
(8, 'vano', 'celine', 'celine.vano@gmail.com', 'celine', '32a1a0f84ebf6e1726b5009a5dd1a9d5aae077e2d9eb31ef473416050c05a220'),
(9, 'Lamoot', 'Alexandre', 'lamootalexandre@gmail.com', 'dev', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08'),
(10, 'CAPI', 'Aurélien', 'capi.aurelien@gmail.com', 'T4GAD4', '11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c');

-- --------------------------------------------------------

--
-- Structure de la table `wa__articles`
--

CREATE TABLE IF NOT EXISTS `wa__articles` (
  `idArticles` int(11) NOT NULL AUTO_INCREMENT,
  `idCarnet` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `ordre` varchar(45) DEFAULT NULL,
  `titre` text,
  `texte` longtext,
  `etat` varchar(50) NOT NULL DEFAULT 'Brouillon',
  PRIMARY KEY (`idArticles`),
  KEY `idCarnet` (`idCarnet`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `wa__articles`
--

INSERT INTO `wa__articles` (`idArticles`, `idCarnet`, `date`, `ordre`, `titre`, `texte`, `etat`) VALUES
(1, 1, '2015-08-14', '2', 'JOUR 1: Départ de paris', '<p>Ce n’etait pas le point culminant de nos centres d’intérêt, mais nous y avons quand même passé trente six heures ce qui nous a permis de faire une rapide visite du couvent San Francisco(avec de superbes azuleros) du Museo Postal du patio du Ministère Des Affaires Etrangères. Nous avons eu le temps d’assister à une cérémonie sur les marches du Palais du Gouvernement: les maires étaient reçus par le Président de la République (dont la femme est d’origine française, nous a précisé un policier posté devant les grilles - Il se trompait, Eliana Karp est d''origine belge :-) De l’autre côté de la Plaza de Armas nous avons pu entendre une chorale de plusieurs centaines de jeunes chantant pour le rétablissement du Pape.</p><div class="medium-insert-images"><figure>\n    <img src="http://walkabout-voyages.fr/assets/images/carnets/mon-experience-chez-les-pygmees-du-congo/articles/immersion-pygmee(2).jpg" alt="">\n        \n</figure></div><div class="medium-insert-images"><figure>\n    <img k=" alt=">\n        \n</figure></div><blockquote>De l’autre côté de la Plaza de Armas nous avons pu entendre une chorale de plusieurs centaines de jeunes chantant pour le rétablissement du Pape.</blockquote><div class="medium-insert-images"><figure class="">\n    <img src="http://walkabout-voyages.fr/assets/images/carnets/mon-experience-chez-les-pygmees-du-congo/articles/Capture d’écran (27).png" alt="" class="">\n        \n</figure></div><p>Notre hôtel situé à Miraflores se trouve pas très loin d’un centre commercial moderne et assez luxueux, surplombant la mer au dessus des falaises. De nombreux restaurants servent d’excellents poissons. Pour manger une bonneceviche il vaut mieux choisir les restaurants situés sur les niveaux les plus élevés. C’est dans ce centre commercial que nous avons découvert les magasins d’alpaga et de vigogne les plus chics.</p>', 'En attente de modération'),
(3, 1, '2015-08-14', '3', 'Jour 2 : Découverte', '<p class="">La voiture qui nous emmène vers le sud et Nazca traverse des paysages étonnants, tantôt le long du Pacifique, tantôt s’enfonçant dans les terres, tantôt lunaires, tantôt laissant penser que la route file dans un gigantesque tableau impressionniste, avec une palette de couleurs tendres variant à l’infini, à chaque virage, à chaque changement de lumière. Nous avons voulu éviter l’arrêt aux îles Ballestas. Nous avons fait connaissance avec le Pisco Sur, cette boisson traditionnelle que nous avons vu fabriquer dans une bodega près d’Ica, capitale du Pisco. Le goût du pisco ne nous a pas convaincu, mais peut-être faut-il habituer son palais? Nous en avons cependant acheté une petite fiole qui rejoindra dans un placard à alcool la tequila mexicaine et l’ouzo grec.</p><p class="">En arrivant à Nazca, un petit avion, retenu par l’agence,nous a fait survoler pendant une demi-heure les étranges lignes. Le pilote prenant soin de tourner au-dessus de chaque dessin dans un sens puis dans l’autre nous a permis de très bien voir ces messages mystérieux, mais il vaut mieux avoir l’estomac bien accroché (l’un de nous en a souffert)</p><p>Départ pour Saraguro, à la rencontre de cette communauté dans le petit village de Quisquinchir,  un assez long périple en voiture qui nous permet de découvrir des paysages andins  sous la brume, mais ça rajoute un peu de magie aux montagnes. Nous faisons également plus ample connaissance avec notre guide-interprète qui nous raconte l’histoire de son pays. Une pause " fruits " est organisée et nous voilà  devant un étal de couleurs, saveurs, odeurs à nous "gaver" de fruits connus et inconnus, tous excellents. </p><p>Arrivée le soir dans nos familles, installation et rapide visite des lieux : que de sourires partout !!</p><img <="" div="">', 'En attente de modération'),
(4, 2, '2015-08-14', '1', 'Le Jour de mon arrivée', '<p>Je suis arrivé au petit matin au village. La nuit noire et le froid m''ont tout se suite mis dans l''ambiance. Mon séjour allait être une expérience hors du commun. Le 4x4 qui nous transportât était d''un modèle spécialement aménagé pour les grands froid. Le conducteur qui allait être notre guide pendant 2 semaines se nommait <i>Gruschko</i>. Je serai bien incapable de dire de quel origine il était <u>issu</u>. Le voyage démarre</p>', 'En attente de modération'),
(5, 2, '2015-08-14', '3', 'Le deuxième jour', '<p class="">La famille qui m''héberge ainsi que deux autres voyageurs nous a préparé un petit déjeuner typique de la région. Un café bouillant ainsi que de la graisse de phoque en guise de beurre. Il faut dire que le pain ici est assez épais et difficile à avaler. La famille est composée des parents ainsi que de deux filles et d''un garçon. Tous sont très sympathiques. Aucun ne parlent français mais les enfants se débrouillent en anglais. C''est donc en anglais que je discute avec eux, les enfants servant d''interprètes. </p>', 'Publie'),
(7, 1, '2015-08-15', '4', 'Super journée !', '<p class="">On s''éclate !</p>', 'En attente de modération'),
(8, 2, '2015-08-15', '2', 'La partie de pêche', '<p class="">Le mardi suivant notre arrivée, les hommes nous conduisirent sur un lac gel. des trous dans la glace permettent d''y plonger un hameçon. L''attente dans le froid polaire est assez dure à supporter malgré nos équipements. Je me suis occupé des chiens de traîneaux pendant que le reste de l''équipe attendait patiemment la prise de poisson. </p>', 'Publie'),
(9, 4, '2015-08-15', '1', 'Un peuple très accueillant', '<p class="">Notre groupe de voyageurs est installé dans une hutte en bois à l''extrémité nord du village. Les habitants sont pratiquement tous venus nous saluer à notre arrivée. Notre guide nous a expliqué comment se comporter pour ne pas paraître ridicule ou irrévérencieux lors de nos échanges avec les habitants. Ces conseils nous ont permis de nouer des rapports amicaux avec l''ensemble des pygmées. La barrière linguistique nous a forcer à nous adapter aux rituels des signes.  Voilà une journée bien remplie.</p>', 'Publie'),
(10, 2, '2015-08-15', '4', 'La chasse aux phoques', '<p>Deux jours après avoir péché sur le lac gelé, nos hôtes nous ont conduit en traineau à une trentaine de kms du village au bord de l''océan gelé. Ils étaient tous armés d''une carabine car aujourd''hui c''était la journée de la chasse. Nous arrivâmes à l''aurore la température devait être de -50 degrés. Les phoques étaient tous regroupés sur une partie de la côte d''une longueur de 2 kms environ. Les chasseurs nous ont demandé de nous mettre un peu à l''écart. <b>Le carnage a commencé.... </b></p>', 'En attente de modération'),
(11, 2, '2015-08-15', '5', 'Le scooter des neiges', '<p class="">L''un des garçon a un scooter des neiges. Il m''a proposé de l''essayer. J''avoues que je n''étais pas bien rassuré. Mais pour ne pas perdre la face je me suis lancé sur la piste enneigée. 5 minutes après j''étais par terre. J''ai eu très peur, peur de me blessé mais aussi peur de lui casser son bolide. Mais s''il le fallait je recommencerai.</p>', 'En attente de modération'),
(21, 2, '2015-08-19', '6', 'Le dernier jour', '<p class="">voilà c''est fini...</p><img >', 'En attente de modération'),
(22, 2, '2015-08-19', '7', 'le retour', '<p class="">me voilà dans l''avion. J espère revenir.</p><img >', 'En attente de modération'),
(23, 5, '2015-08-19', '1', 'Présentation de quelques collaborateurs', '<p class=""><b>Kevin le chef de produits</b>: "je suis très enthousiaste de partir faire cette expérience avec mes collègues"</p><p class=""><b>Hortense la directrice commerciale</b>: "j''espère pouvoir dormir sous la même hutte que mon amie Patricia,"</p>', 'En attente de modération'),
(24, 6, '2015-08-20', '1', 'test', '<p class="">test</p><p class="">test</p><p class="">test</p><p class="">test</p>', 'En attente de modération'),
(25, 1, '2015-08-25', '5', 'brgrgrg', '<p class="">grgrgrg</p><div class="medium-insert-images"><figure>\n    <img src="http://walkabout-voyages.fr/assets/images/carnets/mon-experience-chez-les-pygmees-du-congo/articles/4188_lookbook_collÞge_67.jpg" alt="">\n        \n</figure></div><p><br></p>', 'En attente de modération');

-- --------------------------------------------------------

--
-- Structure de la table `wa__carnetdevoyage`
--

CREATE TABLE IF NOT EXISTS `wa__carnetdevoyage` (
  `idCarnetDeVoyage` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `publie` varchar(5) NOT NULL DEFAULT 'false',
  `titre` varchar(100) DEFAULT NULL,
  `url` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `idVoyage` int(11) NOT NULL,
  `idDestination` int(11) NOT NULL,
  `image_carnet` varchar(800) NOT NULL,
  `favoris` varchar(5) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`idCarnetDeVoyage`),
  UNIQUE KEY `titre` (`titre`),
  KEY `idUsers` (`idUsers`,`idVoyage`),
  KEY `idVoyage` (`idVoyage`),
  KEY `idDestination` (`idDestination`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `wa__carnetdevoyage`
--

INSERT INTO `wa__carnetdevoyage` (`idCarnetDeVoyage`, `date`, `publie`, `titre`, `url`, `description`, `idUsers`, `idVoyage`, `idDestination`, `image_carnet`, `favoris`) VALUES
(1, '2015-08-14', 'true', 'Mon expérience chez les pygmées du Congo', 'mon-experience-chez-les-pygmees-du-congo', 'Mon aventure chez les pygmées du Congo', 1, 1, 1, 'carnets/mon-experience-chez-les-pygmees-du-congo/Lighthouse.jpg', 'true'),
(2, '2015-08-14', 'true', 'Un voyage inoubliable dans le froid polaire', 'un-voyage-inoubliable-dans-le-froid-polaire', 'Ma vie avec les Inuits', 2, 8, 2, 'carnets/un-voyage-inoubliable-dans-le-froid-polaire/inuits8.jpg', 'false'),
(3, '2015-08-14', 'true', '2 semaines en immersion au groenland', '2-semaines-en-immersion-au-groenland', '', 1, 8, 2, '', 'false'),
(4, '2015-08-15', 'true', 'Une aventure en Afrique avec les pygmées', 'une-aventure-en-afrique-avec-les-pygmees', '', 2, 3, 1, 'carnets/une-aventure-en-afrique-avec-les-pygmees/pygmées5.jpg', 'false'),
(5, '2015-08-19', 'true', 'Je pars avec mon équipe de travail chez les Pygmées', 'je-pars-avec-mon-equipe-de-travail-chez-les-pygmees', 'Un voyage chez les pygmées pour souder mon équipe', 2, 1, 1, 'carnets/je-pars-avec-mon-equipe-de-travail-chez-les-pygmees/groupe.jpg', 'false'),
(6, '2015-08-20', 'false', 'Mon super voyage au Pygmées du Congo', 'mon-super-voyage-au-pygmees-du-congo', '', 3, 2, 1, '', 'false'),
(7, '2015-08-25', 'false', 'Mon voyage chez les pygmées Congo', 'mon-voyage-chez-les-pygmees-congo', 'Mon super voyage de dingue', 1, 2, 1, '', 'false');

-- --------------------------------------------------------

--
-- Structure de la table `wa__civilite`
--

CREATE TABLE IF NOT EXISTS `wa__civilite` (
  `idCivilite` int(11) NOT NULL AUTO_INCREMENT,
  `civilite` varchar(45) NOT NULL,
  PRIMARY KEY (`idCivilite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `wa__commentaires`
--

CREATE TABLE IF NOT EXISTS `wa__commentaires` (
  `idCommentaires` int(11) NOT NULL AUTO_INCREMENT,
  `idCarnet` int(11) NOT NULL,
  `idUsers` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `texte` longtext,
  `modere` varchar(5) DEFAULT NULL,
  `data` varchar(500) NOT NULL,
  PRIMARY KEY (`idCommentaires`),
  KEY `idCarnet` (`idCarnet`,`idUsers`),
  KEY `idUsers` (`idUsers`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `wa__commentaires`
--

INSERT INTO `wa__commentaires` (`idCommentaires`, `idCarnet`, `idUsers`, `date`, `texte`, `modere`, `data`) VALUES
(1, 1, NULL, '2015-08-14', 'Très beau voyage !', 'true', '{"nom":"Vano","prenom":"C\\u00e9line","email":"celine.vano@gmail.com"}'),
(2, 1, 1, '2015-08-14', 'merci :)', 'true', '{"nom":"LAMOOT","prenom":"Alexandre","email":"lamootalexandre@gmail.com"}'),
(3, 1, NULL, '2015-08-15', 'De rien ;)', 'true', '{"nom":"Vano","prenom":"C\\u00e9line","email":"celine.vano@gmail.com"}'),
(4, 1, NULL, '2015-08-15', 'Vous avez utilisé quel appareil pour vos photos ?', 'true', '{"nom":"Vano","prenom":"C\\u00e9line","email":"celine.vano@gmail.com"}'),
(5, 1, NULL, '2015-08-15', 'test', 'suppr', '{"nom":"Vano","prenom":"C\\u00e9line","email":"celine.vano@gmail.com"}'),
(6, 1, NULL, '2015-08-15', 'test', 'suppr', '{"nom":"Vano","prenom":"C\\u00e9line","email":"celine.vano@gmail.com"}'),
(7, 1, NULL, '2015-08-15', 'test', 'suppr', '{"nom":"Vano","prenom":"C\\u00e9line","email":"celine.vano@gmail.com"}'),
(8, 1, NULL, '2015-08-15', 'test', 'suppr', '{"nom":"Vano","prenom":"C\\u00e9line","email":"celine.vano@gmail.com"}'),
(9, 1, NULL, '2015-08-15', 'test', 'suppr', '{"nom":"Vano","prenom":"C\\u00e9line","email":"celine.vano@gmail.com"}'),
(10, 1, NULL, '2015-08-15', 'test', 'suppr', '{"nom":"Vano","prenom":"C\\u00e9line","email":"celine.vano@gmail.com"}'),
(11, 1, NULL, '2015-08-15', 'test', 'suppr', '{"nom":"Vano","prenom":"C\\u00e9line","email":"celine.vano@gmail.com"}'),
(12, 1, NULL, '2015-08-15', 'test', 'suppr', '{"nom":"Vano","prenom":"C\\u00e9line","email":"celine.vano@gmail.com"}'),
(13, 1, NULL, '2015-08-15', 'test', 'suppr', '{"nom":"Vano","prenom":"C\\u00e9line","email":"celine.vano@gmail.com"}'),
(14, 1, 1, '2015-08-15', 'Caca', 'suppr', '{"nom":"LAMOOT","prenom":"Alexandre","email":"lamootalexandre@gmail.com"}'),
(15, 2, 2, '2015-08-19', 'Félicitations pour votre carnet de voyage si remarquablement écrit', 'suppr', '{"nom":"mignot","prenom":"stephane","email":"mignot.steph@wanadoo.fr"}'),
(16, 2, 2, '2015-08-19', 'Vous m''avez donné envie de voyager', 'suppr', '{"nom":"mignot","prenom":"stephane","email":"mignot.steph@wanadoo.fr"}'),
(17, 2, NULL, '2015-08-19', 'c''est vraiment bien rédigé, ça donne envie de partir chez les inuits', 'suppr', '{"nom":"steph","prenom":"steph","email":"mignot.steph@wanadoo.fr"}'),
(18, 1, 2, '2015-08-19', 'Votre carnet de voyage m''a donné envie de partir comme vous, chez les pygmées.', 'true', '{"nom":"mignot","prenom":"stephane","email":"mignot.steph@wanadoo.fr"}'),
(19, 2, NULL, '2015-08-19', 'Super voyage :)', 'false', '{"nom":"LAMOOT","prenom":"Alexandre","email":"lamootalexandre@gmail.com"}'),
(20, 1, 1, '2015-08-27', 'Test', 'false', '{"nom":"LAMOOT","prenom":"Alexandre","email":"lamootalexandre@gmail.com"}');

-- --------------------------------------------------------

--
-- Structure de la table `wa__contact`
--

CREATE TABLE IF NOT EXISTS `wa__contact` (
  `idContact` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `sujet` varchar(45) DEFAULT NULL,
  `message` longtext,
  `ouvert` varchar(25) NOT NULL DEFAULT 'false',
  `date` date NOT NULL,
  PRIMARY KEY (`idContact`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `wa__contact`
--

INSERT INTO `wa__contact` (`idContact`, `nom`, `prenom`, `telephone`, `mail`, `sujet`, `message`, `ouvert`, `date`) VALUES
(1, 'celine', 'vano', '', 'celine.vano@gmail.com', 'Demande d''information sur la destination les-', 'Prix?', 'true', '2015-08-14'),
(2, 'celine', 'vano', '', 'celine.vano@gmail.com', 'Demande d''information sur la destination les-', 'Prix?', 'important', '2015-08-14'),
(3, 'LAMOOT', 'Alexandre', '', 'lamootalexandre@gmail.com', 'Demande d''information sur la destination les-', 'demande de test', 'archives', '2015-08-14'),
(4, 'celine', 'vano', '', 'celine.vano@gmail.com', 'Demande d''information sur la destination les-', 'Prix?', 'archives', '2015-08-14'),
(5, 'mignot', 'stephane', '06000000000000', 'mignotsteph@gmail.com', 'Prix', 'bonjour, est ce qu''on peut payer en dollars ou en toute autres devises?', 'true', '2015-08-14'),
(6, 'mignot', 'stephane', '06000000000000', 'mignotsteph@gmail.com', 'Prix', 'bonjour, est ce qu''on peut payer en dollars ou en toute autres devises?', 'important', '2015-08-14'),
(7, 'vano', 'celine', '', 'celine.vano@gmail.com', 'Destination', 'Faut il un passeport ou un visa pour partir au Congo ?', 'false', '2015-08-15'),
(8, 'mignot', 'stephane', '0600000000', 'mignotsteph@gmail.com', 'Carnet de voyage', 'J''ai vu dans un article du carnet de voyage de M.Mignot chez les Inuits, que votre guide était un imbécile. Vous en avez changé?', 'archives', '2015-08-15'),
(9, 'mignot', 'stephane', '0600000000', 'mignotsteph@gmail.com', 'Carnet de voyage', 'J''ai vu dans un article du carnet de voyage de M.Mignot chez les Inuits, que votre guide était un imbécile. Vous en avez changé?', 'archives', '2015-08-15'),
(10, 'LAMOOT', 'Alexandre', '', 'lamootalexandre@gmail.com', 'Demande d''information sur la destination les-', 'test', 'true', '2015-08-19'),
(11, 'LAMOOT', 'Alexandre', '0320778899', 'lamootalexandre@gmail.com', 'Carnet de voyage', 'J''ai vu dans un article du carnet de voyage de M.Mignot chez les Inuits, que votre guide était un imbécile. Vous en avez changé?', 'false', '2015-08-25'),
(12, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination chez', 'bdbzabdnkjza d az dbozandaz dazbld azhdnazk dza ihdnza dza hjdbk dbaz jdza kd b djaz d ad an', 'false', '2015-08-29'),
(13, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination chez', 'bdbzabdnkjza d az dbozandaz dazbld azhdnazk dza ihdnza dza hjdbk dbaz jdza kd b djaz d ad an', 'false', '2015-08-29'),
(14, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination chez', 'bdbzabdnkjza d az dbozandaz dazbld azhdnazk dza ihdnza dza hjdbk dbaz jdza kd b djaz d ad an', 'false', '2015-08-29'),
(15, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination chez', 'bdbzabdnkjza d az dbozandaz dazbld azhdnazk dza ihdnza dza hjdbk dbaz jdza kd b djaz d ad an', 'false', '2015-08-29'),
(16, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination chez', 'bdbzabdnkjza d az dbozandaz dazbld azhdnazk dza ihdnza dza hjdbk dbaz jdza kd b djaz d ad an', 'false', '2015-08-29'),
(17, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination chez', 'bdbzabdnkjza d az dbozandaz dazbld azhdnazk dza ihdnza dza hjdbk dbaz jdza kd b djaz d ad an', 'false', '2015-08-29'),
(18, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination chez', 'bdbzabdnkjza d az dbozandaz dazbld azhdnazk dza ihdnza dza hjdbk dbaz jdza kd b djaz d ad an', 'false', '2015-08-29'),
(19, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination chez', 'bdbzabdnkjza d az dbozandaz dazbld azhdnazk dza ihdnza dza hjdbk dbaz jdza kd b djaz d ad an', 'false', '2015-08-29'),
(20, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination chez', 'bdbzabdnkjza d az dbozandaz dazbld azhdnazk dza ihdnza dza hjdbk dbaz jdza kd b djaz d ad an', 'false', '2015-08-29'),
(21, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination chez', 'bdbzabdnkjza d az dbozandaz dazbld azhdnazk dza ihdnza dza hjdbk dbaz jdza kd b djaz d ad an', 'false', '2015-08-29'),
(22, 'hhbjj', 'dzda', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination ', 'jbkz adza', 'false', '2015-08-29'),
(23, 'hhbjj', 'test', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination ', 'jbkz adza', 'false', '2015-08-29'),
(24, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination ', 'jbkz adza', 'false', '2015-08-29'),
(25, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination ', 'dnzadznandza  djza jd j kd z dkza d za dazb kjd azd za dlza jdza kdazk', 'false', '2015-08-29'),
(26, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination ', 'dnzadznandza  djza jd j kd z dkza d za dazb kjd azd za dlza jdza kdazk', 'false', '2015-08-29'),
(27, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination ', 'dnzadznandza  djza jd j kd z dkza d za dazb kjd azd za dlza jdza kdazk', 'false', '2015-08-29'),
(28, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination ', 'zadzdzadza dzadzadzadazdad adazdzadza', 'false', '2015-08-29'),
(29, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination Chez', 'zadzdzadza dzadzadzadazdad adazdzadza', 'false', '2015-08-29'),
(30, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination Chez', 'zadzdzadza dzadzadzadazdad adazdzadza', 'false', '2015-08-29'),
(31, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination Chez', 'zadzdzadza dzadzadzadazdad adazdzadza', 'false', '2015-08-29'),
(32, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination Chez', 'zadzdzadza dzadzadzadazdad adazdzadza', 'false', '2015-08-29'),
(33, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination Chez', 'zadzdzadza dzadzadzadazdad adazdzadza', 'false', '2015-08-29'),
(34, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination Chez', 'zadzdzadza dzadzadzadazdad adazdzadza', 'false', '2015-08-29'),
(35, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination Chez', 'zadzdzadza dzadzadzadazdad adazdzadza', 'false', '2015-08-29'),
(36, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination Chez', 'zadzdzadza dzadzadzadazdad adazdzadza', 'false', '2015-08-29'),
(37, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination Chez', 'zadzdzadza dzadzadzadazdad adazdzadza', 'false', '2015-08-29'),
(38, 'CAPI', 'Aurélien', '', 'capi.aurelien@gmail.com', 'Demande d''information sur la destination Chez', 'zadzdzadza dzadzadzadazdad adazdzadza', 'false', '2015-08-29'),
(39, 'Vano', 'Céline', '', 'celine.vano@gmail.com', 'Demande d''information sur la destination Chez', 'Bonjour, je souhaiterai savoir si vous vendez des voyages en Amérique du Sud. \n\nMerci d''avance!\n\nCordialement, \nCéline VANO', 'false', '2015-08-29'),
(40, 'Vano', 'Céline', '', 'celine.vano@gmail.com', 'Demande d''information sur la destination Chez', 'Bonjour, je souhaiterai savoir si vous vendez des voyages en Amérique du Sud. \n\nMerci d''avance!\n\nCordialement, \nCéline VANO', 'false', '2015-08-29');

-- --------------------------------------------------------

--
-- Structure de la table `wa__destination`
--

CREATE TABLE IF NOT EXISTS `wa__destination` (
  `idDestination` int(11) NOT NULL AUTO_INCREMENT,
  `idPays` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `url` varchar(500) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `description` longtext NOT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `coordonnees` varchar(50) NOT NULL,
  `photos` longtext,
  `banner` longtext NOT NULL,
  `active` varchar(6) NOT NULL DEFAULT 'true',
  PRIMARY KEY (`idDestination`),
  KEY `idPays` (`idPays`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `wa__destination`
--

INSERT INTO `wa__destination` (`idDestination`, `idPays`, `titre`, `url`, `nom`, `description`, `ville`, `coordonnees`, `photos`, `banner`, `active`) VALUES
(1, 1, 'Chez les Pygmées du Congo', 'chez-les-pygmees-du-congo', '', 'Walkabout vous propose de partager la vie des pygmées du Congo. Vous aurez la chance de partager leur gite, leurs parties de chasse et de pêche.\nVous pourrez aussi découvrir la faune et la flore extraordinaire de cette région d''Afrique. \nLes pygmées sont les peuples autochtones de la grande forêt équatoriale d’Afrique. La forêt occupe une place fondamentale dans leur culture, leur alimentation et leur histoire. Ils y vivent de chasse et de cueillette et s’y déplacent en petits groupes.\nVivez une expérience inoubliable.', 'isiro', '2.7720642,27.6208305', 'destinations/10-jours-chez-les-pygmees-du-congo/pygmées1.jpg;destinations/10-jours-chez-les-pygmees-du-congo/pygmées.jpg;destinations/10-jours-chez-les-pygmees-du-congo/pygmées2.jpg;destinations/les-pygmees-du-congo/pygmées4.jpg;destinations/les-pygmees-du-congo/pygmées5.jpg;', 'destinations/les-pygmees-du-congo/cover/pygmées3.jpg', 'true'),
(2, 2, '2 semaines chez les Inuits du Groenland', '2-semaines-chez-les-inuits-du-groenland', '', 'Venez vivre une expérience inoubliables chez les Inuits du Groenland. Les Inuits sont les habitants autochtones de l''Arctique nord-américain, du détroit de Béring à l''est du Groenland, un territoire de plus de 6000 kilomètres. En plus de vivre dans l''Arctique canadien, les Inuits vivent aussi dans le nord de l''Alaska et le Groenland,  Jusqu’a récemment, les étrangers appelaient les Inuits «Eskimos».Maintenant, ils préfèrent leur propre terme «Inuit», qui signifie simplement «les gens». \nWalkabout vous propose de partager la vie quotidienne d''une famille Inuit. Vos hotes habitent dans un village traditionnel et vous pourrez accompagner les chasseurs et les pécheurs dans leur quête de nourriture. Les paysages grandioses, la faune si rare et si merveilleuse du pôle nord vous charmeront forcément.', 'upernavik', '72.7868814,-56.1397077', 'destinations/2-semaines-chez-les-inuits-du-groenland/inuits2.jpg;destinations/2-semaines-chez-les-inuits-du-groenland/inuits3.jpg;destinations/2-semaines-chez-les-inuits-du-groenland/inuits4.jpg;destinations/2-semaines-chez-les-inuits-du-groenland/inuits5.jpg;', 'destinations/2-semaines-chez-les-inuits-du-groenland/cover/inuits3.jpg', 'true'),
(3, 3, '2 semaines chez les aborigènes', '2-semaines-chez-les-aborigenes', '', 'Les Aborigènes d’Australie sont les premiers humains connus pour en avoir peuplé la partie continentale. Ils constituent, avec les indigènes du détroit de Torrès, la population autochtone de cet État océanien. Le mot commun aborigène désigne plus généralement celui dont les ancêtres sont les premiers habitants connus de sa terre natale. \nWalkabout vous propose de passer 2 semaines dans une tribu aborigène d''Australie. Vous pourrez découvrir les rites ancestraux de ce peuple. Vous serez logé chez l''habitant. Vous découvrirez aussi la faune et la flore fantastique de ce pays.', 'Kaltukatjara', '-24.8777835,129.0894039', 'destinations/2-semaines-chez-les-aborigenes/aborigene1.jpg;destinations/2-semaines-chez-les-aborigenes/aborigene2.jpg;destinations/2-semaines-chez-les-aborigenes/aborigene4.jpg;destinations/2-semaines-chez-les-aborigenes/aborigene5.jpg;destinations/2-semaines-chez-les-aborigenes/aborigene6.jpg;', 'destinations/2-semaines-chez-les-aborigenes/cover/aborigene2.jpg', 'true'),
(4, 7, '20 jours chez les Mongols', '20-jours-chez-les-mongols', '', 'À l''origine d''un des plus grands empires de tous les temps, qui s''étendit de la mer de Chine jusqu''au-delà de la Volga2 au xiiie siècle et au xive siècle, les Mongols conservent encore leur culture, malgré leur éclatement en quatre entités politiques distinctes ; outre la langue et l''histoire, cette culture profondément originale couvre des domaines tels la musique, la religion, les fêtes, les sports, le mode de vie, et enfin l''organisation sociale.\nNous vous invitons a partager leur quotidien pendant 20 jours', 'oulan-bator', '47.8916501,106.9018714', 'destinations/20-jours-chez-les-mongols/mongol1.jpg;destinations/20-jours-chez-les-mongols/mongol2.jpg;destinations/20-jours-chez-les-mongols/mongol3.jpg;destinations/20-jours-chez-les-mongols/mongol4.jpg;destinations/20-jours-chez-les-mongols/mongol5.jpg;destinations/20-jours-chez-les-mongols/mongol6.jpg;', 'destinations/20-jours-chez-les-mongols/cover/mongol3.jpg', 'true');

-- --------------------------------------------------------

--
-- Structure de la table `wa__details_prix`
--

CREATE TABLE IF NOT EXISTS `wa__details_prix` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idDestination` int(11) NOT NULL,
  `plusoumoins` varchar(5) NOT NULL,
  `valeur` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idVoyage` (`idDestination`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Contenu de la table `wa__details_prix`
--

INSERT INTO `wa__details_prix` (`id`, `idDestination`, `plusoumoins`, `valeur`) VALUES
(46, 1, 'plus', 'le transport par avion. '),
(47, 1, 'plus', 'l''hebergement'),
(48, 1, 'moins', 'les assurances'),
(49, 1, 'moins', 'les excursions en supplement'),
(56, 4, 'plus', 'Le voyage en avion'),
(57, 4, 'plus', 'l''hebergement'),
(58, 4, 'plus', 'les repas '),
(59, 4, 'plus', 'les visites guidées'),
(60, 4, 'plus', 'les assurances'),
(61, 4, 'moins', 'les assurances annulation'),
(62, 4, 'moins', 'les suppléments lors des déplacements');

-- --------------------------------------------------------

--
-- Structure de la table `wa__etatreservation`
--

CREATE TABLE IF NOT EXISTS `wa__etatreservation` (
  `idEtatReservation` int(11) NOT NULL AUTO_INCREMENT,
  `idReservation` int(11) NOT NULL,
  `etat` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idEtatReservation`),
  KEY `idReservation` (`idReservation`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `wa__etatreservation`
--

INSERT INTO `wa__etatreservation` (`idEtatReservation`, `idReservation`, `etat`) VALUES
(1, 1, 'Terminée'),
(2, 2, 'En attente du premier versement'),
(3, 3, 'Terminée'),
(4, 4, 'En attente de réception du dossier'),
(5, 5, 'En attente de confirmation'),
(6, 6, 'En attente de confirmation'),
(7, 7, 'En attente de confirmation');

-- --------------------------------------------------------

--
-- Structure de la table `wa__infosdestinations`
--

CREATE TABLE IF NOT EXISTS `wa__infosdestinations` (
  `idInfosDestinations` int(11) NOT NULL AUTO_INCREMENT,
  `idDestination` int(11) NOT NULL,
  `climat` varchar(100) NOT NULL,
  `monnaie` varchar(100) NOT NULL,
  `animaux` varchar(100) NOT NULL,
  `pension` varchar(100) NOT NULL,
  `passeport` varchar(100) NOT NULL,
  `accompagnement` longtext NOT NULL,
  `deplacement` longtext NOT NULL,
  `hebergement` longtext NOT NULL,
  `repas_boissons` longtext NOT NULL,
  `deroulement` longtext NOT NULL,
  PRIMARY KEY (`idInfosDestinations`),
  KEY `idDestination` (`idDestination`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `wa__infosdestinations`
--

INSERT INTO `wa__infosdestinations` (`idInfosDestinations`, `idDestination`, `climat`, `monnaie`, `animaux`, `pension`, `passeport`, `accompagnement`, `deplacement`, `hebergement`, `repas_boissons`, `deroulement`) VALUES
(1, 1, 'Tropical', 'Franc Congolais', 'non recommandés', 'Compléte', 'Obligatoire', 'Un premier guide sera présent pendant toute la durée du séjour. \nUn deuxième guide vous accompagnera dans la forêt', 'Voiture tout terrain pour rejoindre le village. Puis excursions à pied ou en pirogue.', 'Chez l''habitant et sous la tente lors des excursions.', 'Tout est compris pendant la durée du séjour.', '[{"titre":"Jour n\\u00b02","valeur":"Pr\\u00e9sentation des membres du village avec danse de bienvenue selon les coutumes ancestrales"},{"titre":"Jour n\\u00b03","valeur":"Parcours des for\\u00eats environnantes accompagn\\u00e9s des chasseurs."}]'),
(2, 2, 'Polaire', 'couronne danoise', 'Non Autorisés', 'compléte', 'obligatoire', 'Un guide vous accompagnera pendant tout le séjour', 'Arrivée au village en voiture tous terrains puis déplacement en traineau', 'dans un village situé à 65 kms de Upernavik et en Igloo lors des excursions de plusieurs jours', 'Tout est compris', '[{"titre":"Jour n\\u00b01","valeur":"arriv\\u00e9 \\u00e0 l''a\\u00e9roport vous serez pris en charge par le guide qui vous conduira en voiture tous terrains au village"},{"titre":"Jour n\\u00b02","valeur":"La famille d\\u2019accueil qui vous h\\u00e9bergera vous fera d\\u00e9couvrir le village et les coutumes locales."},{"titre":"Jour n\\u00b03","valeur":"Un voyage en tra\\u00eeneau sera organis\\u00e9 juqu''au lac gel\\u00e9 d''ou vous pourrez admirer l''immensit\\u00e9 du paysage."}]'),
(3, 3, 'desertique', 'Dollar Australien', 'interdits', 'compléte', 'obligatoire', 'un guide sera présent durant toute la durée du séjour', 'le groupe se déplacera en voiture tous terrains', 'logement chez l''habitant', 'tout est compris', '[{"titre":"Jour n\\u00b01","valeur":"Acheminement depuis l''a\\u00e9roport en voiture 4x4"}]'),
(4, 4, 'polaire', 'Tugrik', 'Interdits', 'compléte', 'obligatoire', 'Un guide sera présent pendant toute la durée du séjour', 'en Véhicule tous terrains et à cheval.', 'sous une yourte avec les habitants', 'tout compris', '[{"titre":"Jour n\\u00b01","valeur":"Arriv\\u00e9e au village et  accueil par les habitants"},{"titre":"Jour n\\u00b02","valeur":"Partage d''une journ\\u00e9e avec la famille d''accueil et prise de contact avec les coutumes"},{"titre":"Jour n\\u00b05","valeur":"Visite de la toundra environnante"},{"titre":"Jour n\\u00b010","valeur":"combat de lutte dans la capitale"},{"titre":"Jour n\\u00b013","valeur":"D\\u00e9placement avec les troupeaux de betail"}]');

-- --------------------------------------------------------

--
-- Structure de la table `wa__level`
--

CREATE TABLE IF NOT EXISTS `wa__level` (
  `idLevel` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(45) NOT NULL,
  PRIMARY KEY (`idLevel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `wa__level`
--

INSERT INTO `wa__level` (`idLevel`, `level`) VALUES
(1, '1'),
(2, '2');

-- --------------------------------------------------------

--
-- Structure de la table `wa__newsletter`
--

CREATE TABLE IF NOT EXISTS `wa__newsletter` (
  `idNewsletter` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `nom` varchar(500) NOT NULL,
  `prenom` varchar(500) NOT NULL,
  PRIMARY KEY (`idNewsletter`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51778 ;

--
-- Contenu de la table `wa__newsletter`
--

INSERT INTO `wa__newsletter` (`idNewsletter`, `email`, `nom`, `prenom`) VALUES
(1, 'celine.vano@gmail.com', 'VANO', 'Céline'),
(51777, 'capi.aurelien@gmail.com', 'CAPI', 'Aurélien');

-- --------------------------------------------------------

--
-- Structure de la table `wa__payement`
--

CREATE TABLE IF NOT EXISTS `wa__payement` (
  `idPayement` int(11) NOT NULL AUTO_INCREMENT,
  `idReservation` int(11) NOT NULL,
  `typePayement` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPayement`),
  KEY `idReservation` (`idReservation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `wa__paypal`
--

CREATE TABLE IF NOT EXISTS `wa__paypal` (
  `idPaypal` int(11) NOT NULL AUTO_INCREMENT,
  `idPayement` int(11) NOT NULL,
  `token` varchar(500) NOT NULL,
  `timestamp` varchar(500) NOT NULL,
  `correlationId` varchar(500) NOT NULL,
  `ack` varchar(500) NOT NULL,
  `transactionType` varchar(500) NOT NULL,
  `payementType` varchar(500) NOT NULL,
  `amt` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idPaypal`),
  KEY `idPayement` (`idPayement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `wa__pays`
--

CREATE TABLE IF NOT EXISTS `wa__pays` (
  `idPays` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `code_pays` varchar(5) NOT NULL,
  `capitale` varchar(45) NOT NULL,
  `monnaie` varchar(45) DEFAULT NULL,
  `Dirigeant` varchar(45) NOT NULL,
  `langues` varchar(45) NOT NULL,
  `population` varchar(45) DEFAULT NULL,
  `superficie` varchar(45) DEFAULT NULL,
  `densité` varchar(45) DEFAULT NULL,
  `climat` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPays`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `wa__pays`
--

INSERT INTO `wa__pays` (`idPays`, `nom`, `code_pays`, `capitale`, `monnaie`, `Dirigeant`, `langues`, `population`, `superficie`, `densité`, `climat`) VALUES
(1, 'Congo Kinshasa', 'CD', 'Kinshasa', 'Franc Congolais', 'Joseph Kabila', 'Le français,Le swahili,Le lingala,Le kikongo', '67,51 millions', '2 345 000 km²', '33h /km²', 'chaud et pluvieux'),
(2, 'Groenland', 'GL', 'NUUK', 'couronne dannoise', 'Margrethe II de Danemark', 'Groenlandais', '56 282 hab', '2 166 086 km2', '0,03 hab./km2', 'arctique'),
(3, 'Australie', 'AU', 'Canberra', 'Dollar Australien', 'Peter John Cosgrove', 'Anglais', '23 500 000 hab', '7 692 024 km²', '3 hab./km²', 'tempéré'),
(4, 'Argentine', 'AR', 'Buenos Aires', 'Peso argentin', 'Cristina Fernández de Kirchner', 'espagnol', '43 431 886', '2 766 890 km²', '14 hab./km²', 'tropical'),
(5, 'France', 'FR', 'Paris', 'Euros', 'François Hollande', 'Français', '66,03 millions', '640 679 km²', '26 031 hab. par km2', 'varié'),
(6, 'Koweït', 'KW', 'koweit', 'Dinar koweïtien', 'Sabah al-Ahmad al-Jabir al-Sabah', 'arabe', '3 369 000', '17 818 km2', '115 hab./km2', 'desertique'),
(7, 'Mongolie', 'MN', 'Oulan-Bator', 'Tugrik', 'Elbegdorj Tsakhia', 'mongol', '2 839 000 h', '1 564 116 km2', '1,7 hab./km2', 'extrêmement froid en hiver');

-- --------------------------------------------------------

--
-- Structure de la table `wa__personnalisation`
--

CREATE TABLE IF NOT EXISTS `wa__personnalisation` (
  `idPersonnalisation` int(11) NOT NULL AUTO_INCREMENT,
  `idCarnet` int(11) NOT NULL,
  `couleur_fond` varchar(45) DEFAULT NULL,
  `couleur_texte` varchar(45) DEFAULT NULL,
  `couleur_titre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPersonnalisation`),
  KEY `idCarnet` (`idCarnet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `wa__reservation`
--

CREATE TABLE IF NOT EXISTS `wa__reservation` (
  `idReservation` int(11) NOT NULL AUTO_INCREMENT,
  `idVoyage` int(11) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `nb_personnes` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  PRIMARY KEY (`idReservation`),
  KEY `idVoyage` (`idVoyage`),
  KEY `idUsers` (`idUsers`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `wa__reservation`
--

INSERT INTO `wa__reservation` (`idReservation`, `idVoyage`, `idUsers`, `nb_personnes`, `date`) VALUES
(1, 1, 1, 1, '2015-08-14'),
(2, 8, 2, 1, '2015-08-14'),
(3, 8, 1, 25, '2015-08-14'),
(4, 3, 2, 1, '2015-08-15'),
(5, 1, 2, 13, '2015-08-19'),
(6, 2, 3, 1, '2015-08-20'),
(7, 2, 1, 1, '2015-08-25');

-- --------------------------------------------------------

--
-- Structure de la table `wa__sessions`
--

CREATE TABLE IF NOT EXISTS `wa__sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `wa__sessions`
--

INSERT INTO `wa__sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('edbc52c3c20a778cd00863214c20e9a2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.157 Safari/537.36', 1440875009, ''),
('05ba047cd2d0726123faea8f4508aaaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 1440875743, 'a:1:{s:9:"user_data";s:0:"";}');

-- --------------------------------------------------------

--
-- Structure de la table `wa__test`
--

CREATE TABLE IF NOT EXISTS `wa__test` (
  `idTest` int(11) NOT NULL AUTO_INCREMENT,
  `titre` longtext NOT NULL,
  `explication` longtext NOT NULL,
  `categorie` longtext NOT NULL,
  `testeur` longtext NOT NULL,
  `statut` longtext NOT NULL,
  `etat` longtext NOT NULL,
  `commentaire` longtext NOT NULL,
  PRIMARY KEY (`idTest`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129 ;

--
-- Contenu de la table `wa__test`
--

INSERT INTO `wa__test` (`idTest`, `titre`, `explication`, `categorie`, `testeur`, `statut`, `etat`, `commentaire`) VALUES
(1, 'Faire des erreurs de connexion à la connexion', 'Se connecter en générant des erreurs ( mot de passe incorrect, identifiant inconnu, champs vide, <br/><br/><br/>)', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(2, 'Demander un nouveau mot de passe', '', 'Back office', 'celine vano', '', 'Bug', 'ça fonctionne par contre le design du mail est peut être à revoir.'),
(3, 'Se connecter avec son identifiant', '', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(4, 'Se connecter avec son adresse mail', '', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(5, 'les mentions légales et les conditions générales de vente', 'afficher les pages respectives', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(6, 'inscription à la newsletter', 'inscription à la newsletter présente dans le footer', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(7, 'Vérifier les liens', 'Vérifier les liens du menu horizontal et vertical', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(8, 'Deconnexion', 'Se déconnecter', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(9, 'le défilement des carnets de voyages', 'Home page', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(10, 'l''accès espace utilisateur', 'Home page - l''accés à l''espace utilisateur dans la liste des carnet (nom de la personne)', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(11, 'Vérifier les liens du tableau de bord', 'Vérifier que les liens des 4 boites carnets, réservations, contact et commentaires se font bien', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(12, 'vérification du lien', 'Home page - vérification du lien vers notre esprit', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(13, 'Analyser le dashboard', 'Vérifier que les informations des graphiques sont bonnes', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(14, 'Intégrité des actus', 'Home page - vérifier l''intégrité des actus présents', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(15, 'redirection des destinations', 'redirection des destinations par rapport la carte sur la home', 'Front office', 'Julien', '', 'Marche', ''),
(16, 'Vérifier des carnets', 'Destinations - Vérifier que les carnets aleatoires correspondent à la destination choisie', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(17, 'Google maps pour la localisation', 'Destinations', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(18, 'Réservations', 'Tester les réservations (modification d''un statut, filtres)', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(19, 'le zoom des images', 'Destinations -  le zoom des images dans la page destination', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(20, 'Créer une destination', 'Sans remplir tout les champs afin de générer des erreurs puis en remplissant tout les champs afin de la créer vraiment<br/>', 'Back office', '', '', 'A tester', 'Impossible d’insérer des photos dans la bannière et au bas de la description.'),
(21, 'possibilité de feuilleter le carnet', 'Destinations', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(22, 'le partage des destinations', 'Destinations - le partage de la destination avec vos amis', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(23, 'Rechercher une destination', 'Vérifier que les recherches s''effectuent bien', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(24, 'demande d''information', 'Destinations - demande d''infos par rapport à la destination sans création de compte puis avec', 'Front office', 'celine vano', '', 'Marche pas', 'message d''erreur sur une page blanche ("result":true) à l''envoi du formulaire'),
(25, 'Créer des voyages', 'Sur une destination créer 5 voyages avec des valeurs différentes', 'Back office', '', '', 'A tester', 'Aucun test effectué sur les dates. Par exemple un voyage du 01/01/15 au 15/01/14 est possible. De plus empêcher la saisie de date inférieure à la date actuelle.'),
(26, 'la création de compte', 'Destinations - créer un compte à l''aide de la popup de demande d''infos', 'Front office', 'Alexandre LAMOOT', '', 'Marche pas', 'message d''erreur sur une page blanche ("result":true) à l''envoi du formulaire'),
(27, 'destinations supprimées', 'Destinations - Vérifier sur le front que les destinations supprimés ne s''affichent pas et essayer d''accéder a l''url de cette destination', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(28, 'Rechercher un voyage', 'Effectuer une recherche sur un voyage afin de vérifier que tout se passe bien', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(29, 'poster un commentaire en tant qu''anonyme', 'Carnet de voyage', 'Front office', 'steph', '', 'Marche', ''),
(30, 'Supprimer un voyage', '', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(31, 'Modifier le prix d''un voyage', '', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(32, 'poster un commentaire en utilisant votre compte', 'Carnet de voyage', 'Front office', 'steph', '', 'Marche', ''),
(33, 'Modifier les dates d''un voyage', '', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(34, 'Modifier le nombre de personnes autorisés pour un voyage', '', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(35, 'l’accès a tout les carnets', 'Carnet de voyage - l’accès a tout les carnets depuis cette page ( bouton tout les carnets)', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(36, 'Modifier le détail de prix d''un voyage', 'Tester l''ajout et la suppression', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(37, 'les collapse des articles', 'Carnet de voyage', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(38, 'Supprimer une destination', '', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(39, 'Modifier le titre d''une destination', '', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(40, 'la découverte de nos destination', 'Notre Esprit', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(41, 'Modifier la photo de couverture d''une destiantion', '', 'Back office', 'steph', '', 'Marche', ''),
(42, 'explorer les carnets de voyages', 'Notre Esprit', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(44, 'Vérifier l''intégrité des liens des actus', 'Nos actualités', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(45, 'Modifier les photos la gallerie de la destination', '', 'Back office', 'steph', '', 'Marche', ''),
(46, 'Modifier le déroulement du voyage de la destination ', 'Modifier les accompagnement, les repas, le deroulement, <br/><br/><br/>', 'Back office', 'steph', '', 'Marche', ''),
(47, 'Modifier les valeurs dans les pictos d''une destination', '', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(48, 'Modifier le pays et la ville plus les localisation de la destination', '', 'Back office', 'steph', '', 'Marche', ''),
(49, 'Modifier le texte de présentation de la destination', '', 'Back office', '', '', 'A tester', 'Le changement de présentation fonctionne bien mais il rest tuoujours sur le front. Un chapitre "ce prix comprend" et "ce prix ne comprend pas" qu''on ne retrouve pas dans le bo. '),
(50, 'Restaurer une destination', '', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(51, 'Créer un pays', 'Sans remplir tout les champs afin de générer des erreurs puis en remplissant tout les champs', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(52, 'Liste pays', 'Vérifier que les pays créés s''affichent bien sur la carte', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(53, 'Modification d''un pays', 'Modifier les informations d''un pays', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(54, 'Carnet phare', 'Définir un carnet phare', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(55, 'Visualiser le carnet', 'Tester si le bouton voir le carnet marche', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(56, 'Supprimer un carnet de voyage', '', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(57, 'Faire une recherche d''un carnet de voyage', '', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(58, 'Restaurer un carnet de voyage', 'Vous pouvez restaurer un carnet depuis la corbeille', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(59, 'Pagination des articles', 'vérifier que les liens en bas de page soit bon et que si on clique sur 2 les infos change et le 2 devienne grisé!', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(60, 'Modifier l''etat d''un article', '', 'Back office', '', '', 'A tester', 'La modification de l’état de l''article fonctionne. Cependant aucune possibilité de voir les articles en "demande de modération"'),
(61, 'Supprimer un article', '', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(62, 'Restaurer un article', 'Vous pouvez restaurer un article depuis la corbeille', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(63, 'Rechercher un article', '', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(64, 'En lire plus sur l''article', 'Pouvoir bien lire un article et vérifier que ce soit le bon!', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(65, 'Commentaires - filtres', 'Tester les différents filtres', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(66, 'Commentaire - Pagination', 'Tester la pagination des commentaires tant sur la liste complète que sur la recherche d''un commentaire', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(67, 'Commentaires - Carnet', 'Voir tous les commentaires pour un carnet via le boutton afficher les commentaires de ce carnet', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(68, 'Mettre un commentaire en indésirable', '', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(69, 'Restaurer un commentaire', '', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(70, 'Rechercher un commentaire', '', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(71, 'Créer une actualité', 'En essayant de générer des erreurs puis en remplissant bien les champs', 'Back office', 'steph', '', 'Marche', ''),
(72, 'Rechercher une actualité', 'Vérifier aussi la pagination de cette recherche', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(73, 'Modifier l''image d''une actualité', '', 'Back office', 'steph', '', 'Marche', ''),
(74, 'Modifier une actualité', 'Modifier le contenu d''une actualité (titre,texte et bouton)', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(75, '@ALEX Créer un administrateur (Steph)', 'Tu vas devoir créer l''administrateur Stephane', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(76, '@Steph Créer un administrateur (Céline)', 'Steph, une fois ton compte administrateur créé, tu devras créer l''administratrice Céline', 'Back office', '', '', 'A tester', ''),
(77, '@Céline Administration', 'Une fois ton compte créé Céline, tu devras supprimer le compte administrateur d''Alexandre et le recréer<br/>', 'Back office', '', '', 'A tester', ''),
(78, 'Modifier mon compte', 'Modifier les information de mon compte administrateur', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(79, 'Rechercher un administrateur', '', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(80, 'Rechercher un membre Walkabout', '', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(81, 'Voir les détails d''un membre', '', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(82, 'Désactiver un membre Walkabout', '', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(83, ' Activer un membre Walkabout', '', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(84, 'Contacts - Demandes', 'Tester le système des demandes ( changement de boite de reception, répondre par mail, Recherche)', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(85, 'Contacts - Demandes 2', 'Tester chaque collapse lorsqu''il y a plusieurs demandes<br/>', 'Back office', 'Alexandre LAMOOT', '', 'Marche', ''),
(86, 'Formulaire nous contacter', 'Effectuer des tests en remplissant pas tout les champs ou en erronant des champs (ex l''adresse mail ou aucun sujet, captcha incorrect)', 'Front office', '', 'tests/Capture_du_2015-08-17_23:41:33.png;tests/Capture_du_2015-08-17_23:41:50.png;', 'A tester', 'Le capchat a disparu.\nLorsqu’on envoie le formulaire sans capchat on a un message d’erreur php en haut de la page et une mise en page obsoléte.'),
(87, 'problème de connexion', 'Envoyer des informations incorrectes lors de la demande de connexion', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(88, 'récupération de mot de passe', 'Essayer la récupération de mot de passe<br/> Vous recevrez un mail indiquant votre nouveau mot de passe<br/>', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(89, 'Modification de l''image de profil', '', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(90, 'Accéder à mon mur', 'partie espace voyageur', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(91, 'feuilletez son carnet', 'Possibilité de feuilleter ses carnets depuis son mur', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(92, 'Changer la photo de son mur', '', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(93, 'Créer un carnet de voyage', '', 'Front office', '', '', 'A tester', 'on peut créer un carnet de voyage mais il n''est pas publié et on le retrouve pas dans le bo'),
(94, 'Modifier un article', 'Modifier un article (ajouter photo, supprimer photo, mettre en forme le texte : citations, gras, italique, <br/><br/><br/>)', 'Front office', '', '', 'A tester', 'toujours aucune modération après la modification d''un article. toujours pas de possibilité dajouter des photos...'),
(95, 'Ajouter un article', '', 'Front office', '', '', 'A tester', 'impossible de rajouter des photos... les articles en demande de publication n''apparaissent pas dans le bo'),
(96, 'Supprimer un article', '', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(97, 'Changer l''image de couverture du carnet', '', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(98, 'Changer les renseignement de votre compte', 'mot de passe, newsletter et photo depuis l''onglet "mes informations"', 'Front office', '', '', 'A tester', 'lorsqu''on change le mot de passe et le mail, après validation, ça mouline et on se retrouve sur une page blanche. '),
(99, 'vérification des commandes', 'Vérifier que les commandes s''affichent bien sur le compte', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(100, 'retour des différentes étapes de commande', 'vérifier chaque retour dans les différentes étapes du tunnel de commande<br/>', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(101, 'Annuler la commande', '', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(102, 'Conformités des infos', 'Check out - Vérifier la conformité des informations des dates et des prix (dates de départ pas inférieur a la date actuelle)<br/>', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(103, 'création de compte existante', 'Essayer une création de compte avec une adresse mail déjà existante<br/>', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(104, 'création de compte', 'création de compte avec une nouvelle adresse mail', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(105, 'création de compte incorrecte', ' création de compte avec des champs mals remplis', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(106, 'oubli de mot de passe', 'l''oubli du mot de passe<br/> Vous receverez un mail indiquant votre nouveau mot de passe<br/>', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(107, 'identification check out', 'Identification lorsque vous êtes connecté et non connecté', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(108, 'changement d''adresse', 'le changement d''adresse lors de la 3eme étape', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(109, 'nombre de participant', 'modifier le nombre de participant dans la dernière étape', 'Front office', 'steph', '', 'Marche', ''),
(110, 'nombre supérieure de participant', 'rentrer un nombre supérieur au nombre de place restante', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(111, 'mode de paiement', 'Essayer les différents modes de paiement', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(112, 'conditions générales de vente', 'Afficher les conditions générales de vente (popup) dans le check out', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(113, 'Finalisation de la commande', 'Tester la finalisation de la commande', 'Front office', 'steph', '', 'Marche', ''),
(114, 'oubli de mot de passe', 'Essayer l''oubli de mot de passe depuis l''espace de connexion<br/> Vous recevrez un mail<br/>', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(115, 'Modifier la description d''un carnet', 'Modifier la description d''un carnet de voyage', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(116, 'Client réticent', 'Aller sur la page nos destinations<br/>\nEnsuite le client souhaite aller a la decouverte des quechuas du perou\nLe client décide de reserver ma place pour le Départ : 13 Juillet 2016 •  Retour : 11 Novembre 2016\nIl est nouveau sur le site walkabout et décide de créer un compte<br/>\nUne fois la manipulation faite, il se connecte directement<br/> (blocage compte non activé)\nIl active son compte avec le lien reçu dans son email<br/>\nIl va changer son adresse par 146 rue nationale 59000 Lille\nIl va réserver pour 5 personnes<br/>\nEt vu le prix important, il décide de faire retour jusqu''à l''annulation de la commmande<br/>', 'Mission', 'Alexandre LAMOOT', '', 'Marche', ''),
(117, 'Steph et les mots de passe:', 'Stephane a oublié son mon de passe -> espace de connexion<br />\nCliquez sur Vous avez oublié votre mot de passe<br />\nSteph a reçu son nouveau mot de passe par mail<br />\nIl se connecte à son espace de voyageur<br />\nEnsuite il se dirige vers mes informations pour changer le mot de passe\nrentrer comme nouveau mot de passe "s.mignot"<br />\nEnsuite déconnexion pour reconnexion avec le mot de passe "s.mignot"', 'Mission', '', '', 'A tester', 'Lorsque je change mon mdp que j''ai reçu par mail. le site mouline et je tombe sur une page blanche. Impossible de recevoir le nouveau mdp sur une autre adresse que celle enregistrée. donc si on a aussi oublié son adresse mail impossible de récupérer son mdp.'),
(118, 'Les anonymous:', 'Vous venez de rentrer dans une célèbre communauté de hackeurs "Les anonymous"<br/> Pour cette mission, vous êtes chargé de hacker les données du site walkabout-voyages, et si possible de mettre le site down<br/> Des indices vous seront donnés pour cette progression<br/>\n  Hack d''un compte voyageur:\n  Dans l''espace connexion, entrez dans le champs email votre adresse mail suivi de " '' OR 1=1--" et ce que vous voulez en mot de passe<br/>\n  Hack des adresses url:\n  Relever les urls dans l''espace voyageurs, et rentrer les dans la barre d''adresse en étant déconnecter!!!', 'Mission', 'steph', '', 'Marche', ''),
(120, 'Parcours sans faute', '      <br/> -  Se connecter à l''administration\n      <br/> -  Créer Le Groenland\n      <br/> -  Vérifier qu''il s''affiche bien sur la carte\n      <br/> -  Créer une destination pour Nuuk (Capitale du Groenland)\n      <br/> -  Créer sur cette destination 5 voyages\n      <br/> -  Supprimer un voyage sur 5\n      <br/> -  Modifier le prix du voyage 3\n      <br/> -  Modifier les dates du voyage 2', 'Mission', '', '', 'A tester', 'Impossible de créer la destination. Même problème que celui décrit dans le test d''ajout de destination.'),
(121, 'Le serial killer', '      <br/> -  Se connecter à l''administration\n      <br/> -  Supprimer un voyage\n      <br/> -  Supprimer une destination\n      <br/> -  Supprimer un pays\n      <br/> -  Supprimer un administrateur\n      <br/> -  Supprimer un utilisateur\n      <br/> -  Supprimer un carnet\n      <br/> -  Supprimer un article\n      <br/> -  Supprimer un commentaire\n      <br/> -  Supprimer une actualité', 'Mission', '', '', 'A tester', 'La suppression du pays est impossible. On peut que modifier ou ajouter un pays.'),
(122, 'Mon nom est Jésus', '      <br/> -  Se connecter à l''administration\n      <br/> -  Créer un voyage\n      <br/> -  Créer une destination\n      <br/> -  Créer un pays\n      <br/> -  Créer un administrateur\n      <br/> -  Créer un utilisateur\n      <br/> -  Créer un carnet\n      <br/> -  Créer un article\n      <br/> -  Créer un commentaire', 'Mission', '', '', 'A tester', 'Impossible de créer une destination. Même problème décrit lors du test ajouter une destination.'),
(123, 'Le necrophile', '      Deterrer = Restaurer/Activer\n      <br/> -  Se connecter à l''administration\n      <br/> -  Déterrer une destination\n      <br/> -  Déterrer un commentaire\n      <br/> -  Déterrer un utilisateur mort\n      <br/> -  Déterrer un article', 'Mission', 'steph', '', 'Marche', ''),
(124, 'Le Jean-Pierre Pernaut', '      <br/> -  Se connecter à l''administration\n      <br/> -  Ajouter 3 actualités avec photos et boutons', 'Mission', 'Alexandre LAMOOT', '', 'Marche', ''),
(125, 'Le voyeur', '      <br/> -  Tester l''administration et son responsive design sur tout les navigateurs et appareils possible (chrome, Firefox, IE, Edge, Tablette, Smartphone, Pc portable, PC tour)', 'Mission', '', '', 'A tester', ''),
(126, 'Changement l''ordre des articles', 'Changer l''odre des articles du carnet de voyage avec les flèches', 'Front office', 'Alexandre LAMOOT', '', 'Marche', ''),
(127, 'Btn front demande de publication', 'Il manque le bouton de demande de publication sur le front office ( espace voyageur )', 'Front office', '', '', 'A tester', 'l''article apparait bien en attente de publication sur le fo mais on le trouve pas sur le bo'),
(128, 'Non définition du carnet phare', 'Attention, quand on a pas de carnet phare, on se tape une erreur PHP assez dégueulasse "undefined offset:0".', 'Front office', 'Alexandre LAMOOT', '', 'Marche', '');

-- --------------------------------------------------------

--
-- Structure de la table `wa__users`
--

CREATE TABLE IF NOT EXISTS `wa__users` (
  `idUsers` int(11) NOT NULL AUTO_INCREMENT,
  `idLevel` int(11) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `slug` varchar(500) NOT NULL,
  `adresse1` varchar(150) NOT NULL,
  `adresse2` varchar(150) NOT NULL,
  `CP` varchar(45) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `pays` varchar(100) NOT NULL,
  `tel_fixe` varchar(20) NOT NULL,
  `tel_port` varchar(20) NOT NULL,
  `date_naissance` date NOT NULL,
  `num_activation` varchar(45) NOT NULL,
  `active` varchar(5) NOT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `cover` varchar(500) NOT NULL,
  PRIMARY KEY (`idUsers`),
  KEY `idLevel` (`idLevel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `wa__users`
--

INSERT INTO `wa__users` (`idUsers`, `idLevel`, `mail`, `mdp`, `nom`, `prenom`, `slug`, `adresse1`, `adresse2`, `CP`, `ville`, `pays`, `tel_fixe`, `tel_port`, `date_naissance`, `num_activation`, `active`, `photo`, `cover`) VALUES
(1, 1, 'lamootalexandre@gmail.com', 'acc4480b3254a4f48e7bfa2b3638202aa7af0df00181a7abe357f65dd29b3ad8', 'LAMOOT', 'Alexandre', '1-lamoot-alexandre', '146 rue nationale', '', '59000', 'Lille', 'France', '', '', '1994-10-06', '8OS99xKJjCqEvQIouP', 'true', 'unsigned_user.jpg', 'users/1/cover/Penguins.jpg'),
(2, 1, 'mignot.steph@wanadoo.fr', 'ffd73d6baeb4efb7922347d91daf780335701edb022f86e7363073f714d7e8b0', 'mignot', 'stephane', '2-mignot-stephane', '95, rue de maubeuge', '', '75010', 'paris', 'france', '0303030303', '06000000000000', '1963-12-13', 'UaSCDlv8NjQwTUClHp', 'true', 'users/2/profil1.jpg', ''),
(3, 1, 'groover.dieu@gmail.com', '247bfe3d4e6ce22be4ac2e5dfb34b5e5d4522899a8df38ec8977156ef696b872', 'dieu', 'steven', '3-dieu-steven', '5 bis rue du 4eme RIC', '', '59000', 'Gury', 'France', '', '', '1992-10-26', 'f68CSGhEeIX1Q8Ivi5', 'true', 'unsigned_user.jpg', ''),
(15, 1, 'chloe.roche@club-internet.fr', 'cadc798f6bf24862c1a224fd31492eb3f8214304ac5a10e726569c19969e6429', 'Roche', 'Chloé', '15-roche-chloe', '97 bd Voltaire', '', '62400', 'Béthune', 'france', '', '', '0000-00-00', 'la8URyjA49pqN50udM', 'false', 'unsigned_user.jpg', '');

-- --------------------------------------------------------

--
-- Structure de la table `wa__voyage`
--

CREATE TABLE IF NOT EXISTS `wa__voyage` (
  `idVoyage` int(11) NOT NULL AUTO_INCREMENT,
  `idDestination` int(11) NOT NULL,
  `date_depart` date DEFAULT NULL,
  `date_retour` date DEFAULT NULL,
  `prix` float NOT NULL,
  `nb_places` int(3) NOT NULL,
  `details` longtext NOT NULL,
  `active` varchar(10) NOT NULL DEFAULT 'true',
  PRIMARY KEY (`idVoyage`),
  KEY `idDestination` (`idDestination`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `wa__voyage`
--

INSERT INTO `wa__voyage` (`idVoyage`, `idDestination`, `date_depart`, `date_retour`, `prix`, `nb_places`, `details`, `active`) VALUES
(1, 1, '2015-10-04', '2015-10-14', 5600, 14, '[{"titre":"transports","valeur":"2600"},{"titre":"frais de sejour","valeur":"2000"},{"titre":"accompagnement","valeur":"1000"}]', 'false'),
(2, 1, '2015-10-07', '2015-10-17', 5550, 15, '[{"titre":"transport","valeur":"2500"}]', 'false'),
(3, 1, '2015-12-11', '2015-12-23', 7000, 20, '[{"titre":"transports","valeur":"3000"},{"titre":"frais de sejour","valeur":"4000"}]', 'false'),
(4, 1, '2016-01-07', '2016-01-17', 5000, 15, '[{"titre":"transports","valeur":"2000"},{"titre":"frais de s\\u00e9jour","valeur":"3000"}]', 'true'),
(5, 1, '2016-05-20', '2016-05-30', 5500, 15, '[{"titre":"transports","valeur":"2500"},{"titre":"frais de s\\u00e9jour","valeur":"3000"}]', 'true'),
(6, 1, '2016-06-15', '2016-06-25', 4900, 15, '[{"titre":"transports","valeur":"2500"},{"titre":"frais de s\\u00e9jours","valeur":"2400"}]', 'true'),
(7, 1, '2016-10-25', '2016-11-15', 6000, 15, '[]', 'true'),
(8, 2, '2015-08-15', '2015-09-02', 4500.25, 25, '[]', 'true'),
(9, 2, '2015-08-20', '2015-09-15', 3000, 2, '[]', 'true'),
(10, 1, '2015-01-01', '2014-01-15', 4000, 2, '[]', 'false'),
(11, 1, '2013-01-30', '2014-02-15', 4000, 15, '[]', 'false'),
(12, 1, '2016-01-01', '2016-01-15', 5000, 10, '[]', 'true');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `wa__actualites`
--
ALTER TABLE `wa__actualites`
  ADD CONSTRAINT `id_actu_admin` FOREIGN KEY (`idAdministrateur`) REFERENCES `wa__administrateur` (`idAdministrateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__articles`
--
ALTER TABLE `wa__articles`
  ADD CONSTRAINT `id_article_carnet` FOREIGN KEY (`idCarnet`) REFERENCES `wa__carnetdevoyage` (`idCarnetDeVoyage`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__carnetdevoyage`
--
ALTER TABLE `wa__carnetdevoyage`
  ADD CONSTRAINT `id_carnet_destination` FOREIGN KEY (`idDestination`) REFERENCES `wa__destination` (`idDestination`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_carnet_users` FOREIGN KEY (`idUsers`) REFERENCES `wa__users` (`idUsers`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_carnet_voyage` FOREIGN KEY (`idVoyage`) REFERENCES `wa__voyage` (`idVoyage`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__commentaires`
--
ALTER TABLE `wa__commentaires`
  ADD CONSTRAINT `id_com_carnet` FOREIGN KEY (`idCarnet`) REFERENCES `wa__carnetdevoyage` (`idCarnetDeVoyage`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_com_users` FOREIGN KEY (`idUsers`) REFERENCES `wa__users` (`idUsers`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__destination`
--
ALTER TABLE `wa__destination`
  ADD CONSTRAINT `id_destination_pays` FOREIGN KEY (`idPays`) REFERENCES `wa__pays` (`idPays`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__details_prix`
--
ALTER TABLE `wa__details_prix`
  ADD CONSTRAINT `wa__details_prix_ibfk_1` FOREIGN KEY (`idDestination`) REFERENCES `wa__destination` (`idDestination`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__etatreservation`
--
ALTER TABLE `wa__etatreservation`
  ADD CONSTRAINT `id_etatreservation_reservation` FOREIGN KEY (`idReservation`) REFERENCES `wa__reservation` (`idReservation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__infosdestinations`
--
ALTER TABLE `wa__infosdestinations`
  ADD CONSTRAINT `id_infos_destination` FOREIGN KEY (`idDestination`) REFERENCES `wa__destination` (`idDestination`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__payement`
--
ALTER TABLE `wa__payement`
  ADD CONSTRAINT `id_payement_reservation` FOREIGN KEY (`idReservation`) REFERENCES `wa__reservation` (`idReservation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__paypal`
--
ALTER TABLE `wa__paypal`
  ADD CONSTRAINT `id_paypal_payement` FOREIGN KEY (`idPayement`) REFERENCES `wa__payement` (`idPayement`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__personnalisation`
--
ALTER TABLE `wa__personnalisation`
  ADD CONSTRAINT `id_perso_carnet` FOREIGN KEY (`idCarnet`) REFERENCES `wa__carnetdevoyage` (`idCarnetDeVoyage`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__reservation`
--
ALTER TABLE `wa__reservation`
  ADD CONSTRAINT `wa__reservation_ibfk_1` FOREIGN KEY (`idVoyage`) REFERENCES `wa__voyage` (`idVoyage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `wa__reservation_ibfk_2` FOREIGN KEY (`idUsers`) REFERENCES `wa__users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `wa__users`
--
ALTER TABLE `wa__users`
  ADD CONSTRAINT `id_users_level` FOREIGN KEY (`idLevel`) REFERENCES `wa__level` (`idLevel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `wa__voyage`
--
ALTER TABLE `wa__voyage`
  ADD CONSTRAINT `id_voyage_destination` FOREIGN KEY (`idDestination`) REFERENCES `wa__destination` (`idDestination`) ON DELETE CASCADE ON UPDATE CASCADE;
