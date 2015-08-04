-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 05 Août 2015 à 00:22
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `wa__actualites`
--

INSERT INTO `wa__actualites` (`idActualites`, `titre`, `date`, `texte`, `btn_name`, `btn_url`, `description`, `publie`, `photos`, `idAdministrateur`) VALUES
(1, 'Découvrez notre nouvelle destination : la grèce !', '2015-08-04', '<p>\r\n                                Avez-vous toujours rêvé de partir à la rencontre d''une culture hors-du-commun ?\r\n                                Walkabout vous permet de réaliser ce rêve ! Découvrez notre nouvelle destination, la grèce, et partez\r\n                                à la rencontre de l''histoire culturelle de ce pays.\r\n                            </p>\r\n                            <p>\r\n                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.\r\n                                Minus sint odio illo perferendis quam odit in laborum deserunt libero eum, iure commodi\r\n                                tempore voluptatibus nihil dicta eveniet magni laudantium consectetur.\r\n                            </p>\r\n                            <a href="/destination" class="button pull-left">Découvrez la destination</a>', '', '', 'Partez à la découverte de l''histoire la plus merveilleuse du monde!', 'true', 'actus/01_athenes.jpg', 1),
(4, 'Découvrez notre nouvelle destination : le Pérou !', '2015-08-04', '<p>\n                                Avez-vous toujours rêvé de partir à la rencontre d''une culture hors-du-commun ?\n                                Walkabout vous permet de réaliser ce rêve ! Découvrez notre nouvelle destination, le Pérou, et partez\n                                à la rencontre de la tribu des Quéchuas.\n                            </p>\n                            <p>\n                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.\n                                Minus sint odio illo perferendis quam odit in laborum deserunt libero eum, iure commodi\n                                tempore voluptatibus nihil dicta eveniet magni laudantium consectetur.\n                            </p>\n                            <a href="single-destination.php" class="button pull-left">Découvrez la destination</a>', '', '', 'Avez-vous toujours rêvé de partir à la rencontre d''une culture hors-du-commun ?', 'true', 'actus/02.jpg', 1),
(5, 'Walkabout possède maintenant son propre site internet !', '2015-08-04', '<p>\r\n                                Amateurs de voyages en immersion réjouissez-vous ! Walkabout dispose désormais de son propre site internet !\r\n                                Walkabout est une agence de voyage spécialisée dans le voyage en immersion. Nous donnons à nos client la possibilité de vivre une expérience inoubliable et enrichissante et de la partager avec la communauté des voyageurs à travers un carnet de voyage modulable. Ce carnet constitue un élément central de notre vision du voyage en immersion.\r\n                            </p>\r\n                            <p>\r\n                                N''attendez plus ! Découvrez maintenant <a href="#">nos destinations</a> ou feuilletez les <a href="#">carnets de nos voyageurs</a> !\r\n                            </p>', '', '', 'Amateurs de voyages en immersion réjouissez-vous ! Walkabout dispose désormais de son propre site internet !', 'false', 'actus/background.jpg', 1),
(6, 'Partez explorer l''Australie', '2015-08-05', 'Venez vivre une expérience inoubliable à travers ce voyage! :)', 'Accéder a la vente', '/nos-destinations/australie-terre-des-kangourous', 'Découvrez notre nouveau voyage en Australie!', 'true', 'actus/entete_img_australie_queensland_surfers_paradise_sean_paul_moss_105798_634.jpg', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `wa__administrateur`
--

INSERT INTO `wa__administrateur` (`idAdministrateur`, `nom`, `prenom`, `email`, `identifiant`, `mdp`) VALUES
(1, 'CAPI', 'Aurélien', 'capi.aurelien@gmail.com', 'T4GAD4', '11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c'),
(2, 'Julien', 'VANDERMEERSCH', '', 'ju.vdm', '4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2'),
(6, 'LAMOOT', 'Alexandre', '', 'dev', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `wa__articles`
--

INSERT INTO `wa__articles` (`idArticles`, `idCarnet`, `date`, `ordre`, `titre`, `texte`, `etat`) VALUES
(1, 1, '2015-04-01', '1', 'Mon arrivé au village', '<p class="lead">\r\n     Je suis arrivé dans le village dans lequel j''allais être hébergé pendant 2 semaines\r\n</p>\r\n\r\n<p>\r\nJ''ai réservé mon trek à partir de Cuzco. J''ai pris une agence au hasard qui m''a dit qu''on serait au maximum 20 pour le trek, et on s''est retrouvé à 19 (sans compter le guide et les accompagnateurs), résultat en fait du groupement de plusieurs agences, avec certains qui s''attendaient à être entre eux, à 5... Globalement, le groupe était sympathique, chacun à son rythme. Je me suis bien entendu avec la plupart d''entre eux. On est resté 4 jours ensemble.</p><div class="medium-insert-images"><figure>\r\n    <img src="http://dev.walkabout-voyages.fr/assets/images/carnets/mon-aventure-chez-les-quechuas/articles/peru(10).jpg" alt="">\r\n        \r\n</figure></div>\r\n<br>\r\n<p>Le départ de Cuzco se fait en bus jusqu''à un certain point, le km88, où, le long de la voie de chemin de fer qui va de Cuzco jusqu''à Matchu Picchu, l''on descend et d''où l''on marche, notre sac sur le dos. La <a name="1"></a>première journée de marche, commençant à 2200 m, est à peu près plate jusqu''à 2750m, et pas trop longue et l''on est arrivé près d''une petite maison où les accompagnateurs ont planté les tentes, et où l''on a eu un repas fort sympathique. Plus tard, avec la nuit, on s''est demandé comment on allait dormir et là, angoisse... il n''y avait pas assez de place dans les tentes. En fait, ils n''avaient pas pris assez de tentes. Certains sont allés dans la petite maison, partageant la salle commune avec la famille qui était là, d''autres dans les tentes et j''étais sur le balcon devant la maison, dehors, par cette nuit froide. J''ai sorti mon duvet, ma couverture de survie pour me protéger le corps du vent, mes sacs poubelle pour faire un espèce d''abris face au vent, suspendus sur la rambarde du balcon. Je n''avais même pas assez de place pour les jambes car un second trekker se trouvait aussi sur le balcon, dans l''alignement, ses jambes à lui dépassant au dessus de l''escalier. Dur pour une première nuit, mais j''ai finalement bien dormi. Le lendemain soir, avant de nous coucher, le cuisinier, qui était responsable des tentes (et donc était rendu responsable devant tout le monde de l''oubli par le guide, alors que je pense que c''était le guide qui était responsable de ne pas avoir vérifié) et était redescendu à pieds en chercher, était revenu de la même façon avec d''autres tentes. Il a fait l''aller-retour (+ du stop jusqu''à Cuzco) dans la journée !<br></p><div class="medium-insert-images"><figure>\r\n    <img class="" src="http://dev.walkabout-voyages.fr/assets/images/carnets/mon-aventure-chez-les-quechuas/articles/banner(2).jpg" alt="">\r\n        \r\n</figure></div><div class="medium-insert-images"><figure>\r\n    <img class="" src="http://dev.walkabout-voyages.fr/assets/images/carnets/mon-aventure-chez-les-quechuas/articles/peru(5).jpg" alt="">\r\n        \r\n</figure></div>\r\n\r\n<p>La <a name="2"></a>seconde journée fut la plus dure, avec une ascension jusqu''à 4200 m dans la matinée, en partant de 2750 m, soient 1450 m de dénivelé d''un trait. C''est dur, mais j''aime cela, et je suis arrivé au col en bon état, en même temps que la plupart. Il y a deux autres cols pendant le trek, mais ils ne sont pas trop durs. Certaines jeunes filles, qui faisaient pourtant partie d''un groupe d''Israéliens sortant de leur service militaire (un grand classique en voyage que ces jeunes qui veulent se changer les idées après trois ans de service militaire - bien sûr l''un d''entre eux n''arrêtait pas de manipuler une machette qu''il portait dans son dos à la Rambo, ce qui mettait mal à l''aise tout le monde vu qu''en plus il ne souriait jamais, mais bon, on fait avec), ont eu beaucoup de mal, parce qu''avec leur sac (plus volumineux qu''elles) sur le dos ce fut très dur. Mais leurs copains sont redescendus les aider, après avoir déposé leur propre sac au col !</p>\r\n<p>On a mangé au col, en plein vent et, comme d''habitude, la nourriture fut excellente. Au soir, on s''est retrouvé en pleine nature, et on a pu dormir dans des tentes. Rien d''autre de spécial à signaler ce second jour. Le <a name="3"></a>troisième jour, après le petit déjeuner, on est parti vers la suite de notre voyage, pour une journée qui m''a semblé longue. On a visité un temple solaire, bien orienté, on a mangé sur un flanc de montagne orienté vers le Nord, dans un coin qui s''appelait la vallée de la pluie... et il a plut. Puis on a marché, toujours sur ce flanc de montagne, dans un paysage très humide, amazonien, avec des lianes, des murs de mousse où l''on peut plonger le bras sans toucher le rocher et un sol glissant. On est passé dans des tunnels creusés par les Incas suivant une technique ancestrale, utilisant le gonflement du bois mouillé pour faire exploser la roche. Le soir on est arrivé près d''un bâtiment en dur où, tout en dormant dans les tentes, on a pu aller prendre une douche (bienvenue), et manger assis sur une chaise, sur une table.</p><div class="medium-insert-images"><figure>\r\n    <img class="" src="http://dev.walkabout-voyages.fr/assets/images/carnets/mon-aventure-chez-les-quechuas/articles/arrivee(3).jpg" alt="">\r\n        \r\n</figure></div>                                                                                    <p><br></p>', 'Publie'),
(5, 3, '2015-07-03', '1', 'Test d''ajout d''article! Ça marche! :)', 'Contenu à ne pas effacer! :) La modification d''article marche enfin! ;) On est super heureux!', 'Brouillon'),
(8, 5, '2015-07-08', '1', NULL, NULL, 'Brouillon'),
(9, 5, '2015-07-08', '2', NULL, NULL, 'Brouillon'),
(10, 2, '2015-07-15', '1', 'Introduction au Pérou', '<p>La quête du mythique Eldorado a attiré au Pérou une noria de conquistadors assoiffés de richesses et de pouvoir, à l’image d’Aguirre, lieutenant de Pizarro et héros du film éponyme de Werner Herzog. Près de cinq siècles plus tard, les légendes de trésors incas courent encore les calles du Pérou, mais ce n’est plus l’or qui fascine les aventuriers : c’est la pierre, dressée en montagnes altières, creusée en vallées sacrées, débitée en murs aux pavés parfaitement joints, témoins du savoir-faire des Incas.</p><p>C’est aussi l’incalculable richesse humaine, physique et culturelle du Pérou que vous viendrez explorer. Bien évidemment, il y a le Machu Picchu et Cuzco, l''ancienne capitale de l’Empire inca. Mais vous découvrirez les vestiges d’autres civilisations qui peuplèrent la région avant l’empire du Soleil : les Nazcas, les Chavíns, les Chimús ou les Moches (prononcez « Motché » !). Sans oublier les fêtes et cérémonies, mêlant en un syncrétisme constamment revisité croyances catholiques et anciens rites précolombiens.</p><p>Entre la côte sableuse et désertique, baignée par le froid courant de Humboldt, les sommets de la cordillera Blanca avec toutes ses possibilités de randonnées, les steppes arides de l’Altiplano peuplées de lamas et vigognes et l’« enfer vert » de la forêt amazonienne, il serait étonnant que vous ne trouviez pas, au Pérou, de quoi satisfaire votre soif d’exotisme. En route pour l’aventure !</p>', 'Brouillon'),
(12, 6, '2015-07-16', '1', 'Bonjour ! :=)', '<p>Test à la con! :) tesfgv<br></p>', 'Publie');

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
(1, '2015-03-05', 'true', 'Mon aventure chez les Quéchuas', 'mon-aventure-chez-les-quechuas', 'J''ai passé une merveilleuse expérience durant ce séjour!', 12, 1, 1, 'carnets/mon-aventure-chez-les-quechuas/15B3406D7A2.jpg', 'false'),
(2, '2015-03-05', 'true', 'Moi chez les péruviens', 'moi-chez-les-peruviens', 'Une destination magnifique,<br/>et une expérience de voyage inoubliable', 15, 2, 1, 'carnets/moi-chez-les-peruviens/yaxhacoucherdesoleil.jpg', 'true'),
(3, '2015-03-05', 'true', 'Mon expérience Péruvienne', 'mon-experience-peruvienne', 'Une destination magnifique,<br/>et une expérience de voyage inoubliable', 2, 2, 1, 'cdv1.jpg', 'false'),
(4, '2015-03-05', 'true', 'Mon aventure au Pérou', 'mon-aventure-au-perou', 'Une destination magnifique,<br/>et une expérience de voyage inoubliable', 2, 2, 1, 'carnets/mon-aventure-au-perou/21.JPG', 'false'),
(5, '2015-06-24', 'false', 'Immersion dans une culture oubliée', 'immersion-dans-une-culture-oubliee', 'Voyage à la découverte de la fascinante culture des Incas', 2, 2, 1, 'voyages/perou/banner-list.jpg', 'false'),
(6, '2015-06-16', 'true', 'Périple chez les danseurs Nyau', 'periple-chez-les-danseurs-nyau', 'Mon voyage chez les danseurs Nyau de Mozambique', 14, 2, 1, 'voyages/mozambique/dest-img.jpg', 'false'),
(7, '2015-07-30', 'false', 'Test de création de carnet', 'test-de-creation-de-carnet', '', 12, 2, 1, '', 'false');

-- --------------------------------------------------------

--
-- Structure de la table `wa__civilite`
--

CREATE TABLE IF NOT EXISTS `wa__civilite` (
  `idCivilite` int(11) NOT NULL AUTO_INCREMENT,
  `civilite` varchar(45) NOT NULL,
  PRIMARY KEY (`idCivilite`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `wa__civilite`
--

INSERT INTO `wa__civilite` (`idCivilite`, `civilite`) VALUES
(1, 'Monsieur'),
(2, 'Madame');

-- --------------------------------------------------------

--
-- Structure de la table `wa__commentaires`
--

CREATE TABLE IF NOT EXISTS `wa__commentaires` (
  `idCommentaires` int(11) NOT NULL AUTO_INCREMENT,
  `idCarnet` int(11) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `date` date NOT NULL,
  `texte` longtext,
  `modere` varchar(5) DEFAULT NULL,
  `data` varchar(500) NOT NULL,
  PRIMARY KEY (`idCommentaires`),
  KEY `idCarnet` (`idCarnet`,`idUsers`),
  KEY `idUsers` (`idUsers`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `wa__commentaires`
--

INSERT INTO `wa__commentaires` (`idCommentaires`, `idCarnet`, `idUsers`, `date`, `texte`, `modere`, `data`) VALUES
(1, 1, 2, '2015-04-04', 'Tu m''as vraiment donné envie de visiter les Quechuas ! Ils ont vraiment l''air d''être un peuple facinant. As-tu été visité le temple ? Des amis m''ont dit que c''était l''un des plus beaux qu''ils aient vu !', 'true', ''),
(2, 1, 1, '2015-04-04', 'Merci pour ton commentaire !<br/>\r\nOui, j''ai visité le temple ! Je prépare actuellement un article à ce sujet.', 'true', ''),
(3, 1, 2, '2015-04-05', 'J''ai hâte de lire ce que tu en as pensé !', 'true', ''),
(5, 2, 1, '2015-04-04', 'Tu m''as vraiment donné envie de visiter les Quechuas ! Ils ont vraiment l''air d''être un peuple facinant. As-tu été visité le temple ? Des amis m''ont dit que c''était l''un des plus beaux qu''ils aient vu !', 'true', ''),
(6, 2, 2, '2015-04-04', 'Merci pour ton commentaire !<br/>\r\nOui, j''ai visité le temple ! Je prépare actuellement un article à ce sujet.', 'true', ''),
(7, 2, 1, '2015-04-05', 'J''ai hâte de lire ce que tu en as pensé !', 'true', ''),
(11, 3, 1, '2015-05-14', 'Hé béh!! Il manque beaucoup de contenu sur ce carnet! ;)', 'true', '{"nom":"CAPI","prenom":"Aur\\u00e9lien","email":null}');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `wa__contact`
--

INSERT INTO `wa__contact` (`idContact`, `nom`, `prenom`, `telephone`, `mail`, `sujet`, `message`, `ouvert`, `date`) VALUES
(3, 'CAPI', 'Aurélien', '0623974082', 'capi.aurelien@gmail.com', 'Destination', 'éèéèéèàààà jbdkzkdkza kd kzakjd za dza kjd ajdkza kjd za dkja zkd nza n,d az dnza ndaz jbdkzkdkza kd kzakjd za dza kjd ajdkza kjd za dkja zkd nza n,d az dnza ndaz jbdkzkdkza kd kzakjd za dza kjd ajdkza kjd za dkja zkd nza n,d az dnza ndaz jbdkzkdkza kd kzakjd za dza kjd ajdkza kjd za dkja zkd nza n,d az dnza ndaz jbdkzkdkza kd kzakjd za dza kjd ajdkza kjd za dkja zkd nza n,d az dnza ndaz jbdkzkdkza kd kzakjd za dza kjd ajdkza kjd za dkja zkd nza n,d az dnza ndaz jbdkzkdkza kd kzakjd za dza kjd ajdkza kjd za dkja zkd nza n,d az dnza ndaz jbdkzkdkza kd kzakjd za dza kjd ajdkza kjd za dkja zkd nza n,d az dnza ndaz', 'false', '2015-07-23');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `wa__destination`
--

INSERT INTO `wa__destination` (`idDestination`, `idPays`, `titre`, `url`, `nom`, `description`, `ville`, `coordonnees`, `photos`, `banner`, `active`) VALUES
(1, 3, 'À la découverte des Quéchuas du Pérou', 'a-la-decouverte-des-quechuas-du-perou', 'Voyage à Lima', 'Dans les montagnes, les Quechuas élèvent traditionnellement des lamas et des alpagas pour leur laine et leur viande.\n                                Ces animaux vivent en haute altitude ce qui oblige les hommes à s’établir sur des terres arides où rien ne pousse ou presque.\n                                Pourtant, les Quechuas sont également agriculteurs. Ils réussissent l’exploit de cultiver un véritable trésor : la pomme de terre.\n                                Plus qu’un aliment, la pomme de terre est l’emblème de la culture andine, elle symbolise la fertilité. Certaines sont même sacrées.\n                                Elles sont offertes à la Pachamama, « la terre mère », pour la remercier de ses bienfaits et implorer sa protection\n                                pour la récolte à venir.\n                                <br /><br />\n                                Au quotidien, les Quechuas vénèrent la nature sous toutes ses formes. Pour eux, les montagnes sont des Dieux et\n                                ils n’hésitent pas à effectuer un long voyage et à gravir des sommets vertigineux pour recueillir la glace sacrée\n                                qui bénira leur troupeau et leur terre.\n                                <br /><br />\n                                Faites l’expérience de leur culture en vous y immergeant  !', 'Lima', '-12.04,-77.04', 'voyages/perou/01.jpg;voyages/perou/04.jpg;voyages/perou/03.jpg;voyages/perou/02.jpg;voyages/perou/05.jpg;', 'voyages/perou/dest-img.jpg', 'true'),
(2, 3, 'Les incas, une culture oubliée', 'les-incas-une-culture-oubliee', 'Voyage chez les incas', 'La civilisation inca est une civilisation précolombienne du groupe andin. Elle prend naissance au début du XIIIe siècle dans le bassin de Cuzco dans l''actuel Pérou et se développe ensuite le long de l''océan Pacifique et de la cordillère des Andes, couvrant la partie occidentale de l''Amérique du Sud. À son apogée, elle s''étend de la Colombie jusqu''à l''Argentine et au Chili, par-delà l''Équateur, le Pérou et la Bolivie.\r\n\r\nElle est à l''origine de l''empire inca, l''un des trois grands empires de l''Amérique précolombienne. Cet empire avait pour chef suprême le Sapa Inca. L''empire inca fut conquis par les conquistadors espagnols sous les ordres de Francisco Pizarro à partir de 1532.\r\n\r\nL''une des grandes singularités de cet empire fut d''avoir intégré, dans une organisation étatique originale, la multiplicité socioculturelle des populations hétérogènes qui le composaient.', 'Cuzco', '-13.53, -71.93  ', 'voyages/incas/01.jpg;voyages/incas/02.jpg;voyages/incas/03.jpg;', 'voyages/incas/banner-list.jpg', 'false'),
(20, 2, 'Australie, terre des kangourous', 'australie-terre-des-kangourous', 'Tour de l''Australie', 'Découvrez cette magnifique île à travers un voyage de 2 semaines, vous pourrez explorer Sydney, l''Uluru, rocher sacré des aborigènes, le lac Hillier,lac particulier aux couleurs roses. Ainsi qu''une balade en hélicoptère au dessus des îles Withsunday et surtout The Pinnacles avec son paysage unique de morceaux de calcaires qui surgissent du sol tel des stalagmites.', 'Sydney', '-28.61,136.58', 'destinations/australie-terre-des-kangourous/lac_hillier.jpg;destinations/australie-terre-des-kangourous/sydney-nuit.jpg;destinations/australie-terre-des-kangourous/the_pinnacles.jpg;destinations/australie-terre-des-kangourous/uluru.jpg;destinations/australie-terre-des-kangourous/whitsundays.jpg;', 'destinations/australie-terre-des-kangourous/cover/1440_900_200912160112583853484.jpg', 'true'),
(21, 5, 'Découverte des monuments de la Grèce antique', 'decouverte-des-monuments-de-la-grece-antique', 'Retour dans l''histoire', 'Voyagez dans le temps avec ce voyage de 3 semaine en Grèce et découvrez ce pays et son histoire extraordinaire.', 'Athènes', '38.27,23.81', 'destinations/decouverte-des-monuments-de-la-grece-antique/01_athenes.jpg;destinations/decouverte-des-monuments-de-la-grece-antique/5360e3ac576a6o.jpg;destinations/decouverte-des-monuments-de-la-grece-antique/athens_02.png;destinations/decouverte-des-monuments-de-la-grece-antique/grece-ile-santorini.jpg;', 'destinations/decouverte-des-monuments-de-la-grece-antique/cover/banner.jpg', 'true');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `wa__details_prix`
--

INSERT INTO `wa__details_prix` (`id`, `idDestination`, `plusoumoins`, `valeur`) VALUES
(1, 1, 'plus', 'Vol international &amp; Taxes d''aéroport'),
(2, 1, 'plus', 'Assistance &amp; Transferts à l''aéroport de destination'),
(3, 1, 'plus', 'Encadrement / Transport / Repas / Hébergement (chambres partagées)'),
(4, 1, 'plus', 'Visites &amp; Activités au programme'),
(5, 1, 'moins', 'Assurances assistance &amp; annulation'),
(6, 1, 'moins', 'Supplément chambre une personne : 100 €'),
(7, 1, 'moins', 'Extras / Boissons / Dépenses personnelles');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `wa__etatreservation`
--

INSERT INTO `wa__etatreservation` (`idEtatReservation`, `idReservation`, `etat`) VALUES
(9, 21, 'En cours'),
(10, 22, 'Terminée'),
(11, 23, 'Terminée'),
(12, 24, 'En cours'),
(13, 25, 'En cours'),
(14, 26, 'En cours'),
(15, 27, 'En cours');

-- --------------------------------------------------------

--
-- Structure de la table `wa__infoscomplementaire`
--

CREATE TABLE IF NOT EXISTS `wa__infoscomplementaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idDestination` int(11) NOT NULL,
  `titre` varchar(250) NOT NULL,
  `value` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idVoyage` (`idDestination`),
  KEY `idDestination` (`idDestination`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `wa__infoscomplementaire`
--

INSERT INTO `wa__infoscomplementaire` (`id`, `idDestination`, `titre`, `value`) VALUES
(1, 1, 'Accompagnement', '                                        1 guide bilingue français/espagnol sur l’ensemble du séjour + guides locaux selon les spots'),
(2, 1, 'Déplacements', 'Transport privé ou bus collectif (selon les régions traversées) + balades à pied, en pirogue, à vélo'),
(3, 1, 'Hébergements', '5 nuits à l’hôtel / 5 nuits chez l’habitant / 1 nuit en vol'),
(4, 1, 'Repas & boissons', 'Tous les repas sont compris / l’eau minérale est servie pendant les repas');

-- --------------------------------------------------------

--
-- Structure de la table `wa__infosdestinations`
--

CREATE TABLE IF NOT EXISTS `wa__infosdestinations` (
  `idInfosDestinations` int(11) NOT NULL AUTO_INCREMENT,
  `idDestination` int(11) NOT NULL,
  `titre` varchar(45) DEFAULT NULL,
  `valeur` varchar(45) DEFAULT NULL,
  `image` varchar(455) NOT NULL,
  PRIMARY KEY (`idInfosDestinations`),
  KEY `idDestination` (`idDestination`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `wa__infosdestinations`
--

INSERT INTO `wa__infosdestinations` (`idInfosDestinations`, `idDestination`, `titre`, `valeur`, `image`) VALUES
(1, 1, 'Habite', 'Chez l''habitant', 'info-pics/pension_white.png'),
(2, 1, 'Animaux', 'acceptés', 'info-pics/animals_white.png'),
(3, 1, 'météo', 'varié', 'info-pics/climat_white.png'),
(4, 1, 'monnaie', 'nuevo sol', 'info-pics/currency_white.png'),
(6, 1, 'passport', 'obligatoire', 'info-pics/passport_white.png');

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
  PRIMARY KEY (`idNewsletter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `wa__pays`
--

INSERT INTO `wa__pays` (`idPays`, `nom`, `code_pays`, `capitale`, `monnaie`, `Dirigeant`, `langues`, `population`, `superficie`, `densité`, `climat`) VALUES
(2, 'Australie', 'AU', 'Canberra', 'Dollar australien', 'Élisabeth II', 'Anglais', '23 500 000 Habitants', '7 686 850 Km²', '3 Hab./km²', 'varié'),
(3, 'Pérou', 'PE', 'Lima', 'Nuevo sol', 'Ollanta Humala', 'Espagnol, Quechua et Aymara', '29 907 003 Habitants', '1 285 315 Km²', '22 Hab./km²', 'varié'),
(4, 'Canada', 'CA', 'Lima', 'Nuevo sol', 'Ollanta Humala', 'Espagnol, Quechua et Aymara', '29 907 003 Habitants', '1 285 315 Km²', '22 Hab./km²', 'varié'),
(5, 'Grèce', 'GR', 'Athènes', 'euro', 'Prokópis Pavlópoulos', 'Grec', '10 815 197 hab.', '131 957 km2', '85,3 hab./km2', 'méditerranéen');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `wa__reservation`
--

INSERT INTO `wa__reservation` (`idReservation`, `idVoyage`, `idUsers`, `nb_personnes`, `date`) VALUES
(21, 2, 12, 5, '2015-07-11'),
(22, 1, 12, 1, '2015-07-15'),
(23, 1, 12, 1, '2015-07-30'),
(24, 1, 12, 1, '2015-07-30'),
(25, 1, 12, 1, '2015-08-04'),
(26, 3, 12, 1, '2015-08-04'),
(27, 7, 12, 10, '2015-08-04');

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
('9237cb3b69667375383f373649608509', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.125 Safari/537.36', 1438721181, ''),
('98a6acac56320fd55b53af51332efb3e', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0', 1438726860, 'a:3:{s:9:"user_data";s:0:"";s:5:"admin";a:1:{i:0;O:8:"stdClass":6:{s:16:"idAdministrateur";s:1:"1";s:3:"nom";s:4:"CAPI";s:6:"prenom";s:9:"Aurélien";s:5:"email";s:23:"capi.aurelien@gmail.com";s:11:"identifiant";s:6:"T4GAD4";s:3:"mdp";s:64:"11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c";}}s:11:"destination";s:1:"2";}'),
('c7a68c955d263761566ad1ccf2f5b5ae', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.125 Safari/537.36', 1438721181, 'a:2:{s:9:"user_data";s:0:"";s:5:"admin";a:1:{i:0;O:8:"stdClass":6:{s:16:"idAdministrateur";s:1:"1";s:3:"nom";s:4:"CAPI";s:6:"prenom";s:9:"Aurélien";s:5:"email";s:23:"capi.aurelien@gmail.com";s:11:"identifiant";s:6:"T4GAD4";s:3:"mdp";s:64:"11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c";}}}'),
('8f3affc82ab1073912fd4f91693b2a07', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0', 1438719375, 'a:1:{s:9:"user_data";s:0:"";}');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `wa__users`
--

INSERT INTO `wa__users` (`idUsers`, `idLevel`, `mail`, `mdp`, `nom`, `prenom`, `slug`, `adresse1`, `adresse2`, `CP`, `ville`, `pays`, `tel_fixe`, `tel_port`, `date_naissance`, `num_activation`, `active`, `photo`, `cover`) VALUES
(1, 1, 'aurelien.capi@gmail.com', '11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c', 'CAPI', 'Aurélien', '1-capi-aurelien', '654 rue du plouy', '', '62232', 'HINGES', 'Italie', '0321640744', '0623974082', '1992-10-28', '7851659894615189', 'false', 'profile2.png', ''),
(2, 1, 'celine@gmail.com', '11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c', 'Vano', 'Céline', '2-vano-celine', '654 rue du plouy', '', '62232', 'HINGES', 'Italie', '0321643775', '0623974082', '1992-10-28', '549846519181915', 'false', 'profile.png', ''),
(12, 1, 'capi.aurelien@gmail.com', '11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c', 'CAPI', 'Aurélien', '12-capi-aurelien', '654 rue du plouy', '', '62232', 'HINGES', 'FRANCE', '', '', '1992-10-28', '3oKvnpMuhP4lNF2Zka', 'true', 'users/12/Voyage_etranger11.jpg', 'users/12/cover/dest-img2111.jpg'),
(13, 1, 'julien.vdm@gmail.com', 'f938f74c4081a8994371697781acc42e163d893149dc255cec3bf1c4ce3ab7ab', 'Vandermeersch', 'Julien', '13-vandermeersch-julien', '87 rue des Orions', '87 rue des Orions', '59200', 'Tourcoing', 'France', '0301020304', '', '1990-03-10', 'eROhZ3kZpa5YhPCY7X', 'false', 'unsigned_user.jpg', ''),
(14, 1, 'capi.aurelien@yopmail.fr', '11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c', 'CAPI', 'aurélien', '14-capi-aurelien', '654 rue du plouy', '', '62232', 'Hinges', 'Belgique', '', '', '1992-10-28', '0xV9E6dv9XR1lcUfCO', 'false', 'unsigned_user.jpg', ''),
(15, 1, 'aurelien.capi@yopmail.com', '11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c', 'capi', 'Aurélien', '15-capi-aurelien', '654 rue du plouy', '', '62232', 'Hinges', 'FRANCE', '', '', '1992-10-28', 'THag5VT6fiojoZiemo', 'false', 'unsigned_user.jpg', ''),
(25, 1, 'alawakbar@yopmail.fr', '11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c', 'CAPI', 'Aurélien', '25-capi-aurelien', '654 rue du plouy', '', '62232', 'HINGES', 'FRANCE', '', '', '0000-00-00', 'TYVsNKTQFaDY8EFEZm', 'false', 'unsigned_user.jpg', '');

-- --------------------------------------------------------

--
-- Structure de la table `wa__voyage`
--

CREATE TABLE IF NOT EXISTS `wa__voyage` (
  `idVoyage` int(11) NOT NULL AUTO_INCREMENT,
  `idDestination` int(11) NOT NULL,
  `idInfos` int(11) NOT NULL,
  `date_depart` date DEFAULT NULL,
  `date_retour` date DEFAULT NULL,
  `prix` float NOT NULL,
  `nb_places` int(3) NOT NULL,
  `active` varchar(10) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`idVoyage`),
  KEY `idDestination` (`idDestination`,`idInfos`),
  KEY `idInfos` (`idInfos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `wa__voyage`
--

INSERT INTO `wa__voyage` (`idVoyage`, `idDestination`, `idInfos`, `date_depart`, `date_retour`, `prix`, `nb_places`, `active`) VALUES
(1, 1, 2, '2016-07-13', '2016-11-11', 5200, 20, 'false'),
(2, 2, 2, '2015-07-16', '2015-06-02', 4700, 10, 'true'),
(3, 20, 2, '2016-08-10', '2016-08-24', 6300, 23, 'true'),
(4, 20, 2, '2015-09-20', '2015-10-02', 5700, 26, 'true'),
(5, 21, 2, '2015-08-23', '2015-09-06', 3600, 15, 'true'),
(6, 21, 2, '2016-07-21', '2016-08-04', 3500, 16, 'true'),
(7, 21, 2, '2015-10-28', '2015-11-12', 6400, 10, 'true'),
(8, 20, 2, '2015-12-12', '2015-12-28', 6800, 8, 'true');

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
-- Contraintes pour la table `wa__infoscomplementaire`
--
ALTER TABLE `wa__infoscomplementaire`
  ADD CONSTRAINT `wa__infoscomplementaire_ibfk_1` FOREIGN KEY (`idDestination`) REFERENCES `wa__destination` (`idDestination`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `id_voyage_destination` FOREIGN KEY (`idDestination`) REFERENCES `wa__destination` (`idDestination`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_voyage_infos` FOREIGN KEY (`idInfos`) REFERENCES `wa__infosdestinations` (`idInfosDestinations`) ON DELETE CASCADE ON UPDATE CASCADE;
