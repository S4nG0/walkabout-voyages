-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- GÃ©nÃ©rÃ© le :  Mer 01 Juillet 2015 Ã  13:49
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de donnÃ©es :  `walkabout-voyages`
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
  `description` varchar(150) NOT NULL,
  `publie` varchar(5) DEFAULT NULL,
  `photos` longtext,
  `idAdministrateur` int(11) NOT NULL,
  PRIMARY KEY (`idActualites`),
  KEY `idAdministrateur` (`idAdministrateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `wa__actualites`
--

INSERT INTO `wa__actualites` (`idActualites`, `titre`, `date`, `texte`, `description`, `publie`, `photos`, `idAdministrateur`) VALUES
(1, '\nDÃ©couvrez notre nouvelle destination : le PÃ©rou !', '2015-03-27', '<p>\n                                Avez-vous toujours rÃªvÃ© de partir Ã  la rencontre d''une culture hors-du-commun ?\n                                Walkabout vous permet de rÃ©aliser ce rÃªve ! DÃ©couvrez notre nouvelle destination, le PÃ©rou, et partez\n                                Ã  la rencontre de la tribu des QuÃ©chuas.\n                            </p>\n                            <p>\n                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.\n                                Minus sint odio illo perferendis quam odit in laborum deserunt libero eum, iure commodi\n                                tempore voluptatibus nihil dicta eveniet magni laudantium consectetur.\n                            </p>\n                            <a href="single-destination.php" class="button pull-left">DÃ©couvrez la destination</a>', 'Avez-vous toujours rÃªvÃ© de partir Ã  la rencontre d''une culture hors-du-commun ?', 'true', 'actus/perou.jpg', 1),
(4, '\nDÃ©couvrez notre nouvelle destination : le PÃ©rou !', '2015-03-27', '<p>\n                                Avez-vous toujours rÃªvÃ© de partir Ã  la rencontre d''une culture hors-du-commun ?\n                                Walkabout vous permet de rÃ©aliser ce rÃªve ! DÃ©couvrez notre nouvelle destination, le PÃ©rou, et partez\n                                Ã  la rencontre de la tribu des QuÃ©chuas.\n                            </p>\n                            <p>\n                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.\n                                Minus sint odio illo perferendis quam odit in laborum deserunt libero eum, iure commodi\n                                tempore voluptatibus nihil dicta eveniet magni laudantium consectetur.\n                            </p>\n                            <a href="single-destination.php" class="button pull-left">DÃ©couvrez la destination</a>', 'Avez-vous toujours rÃªvÃ© de partir Ã  la rencontre d''une culture hors-du-commun ?', 'true', 'actus/perou.jpg', 2),
(5, 'Walkabout possÃ¨de maintenant son propre site internet !', '2015-03-27', '<p>\n                                Amateurs de voyages en immersion rÃ©jouissez-vous ! Walkabout dispose dÃ©sormais de son propre site internet !\n                                Walkabout est une agence de voyage spÃ©cialisÃ©e dans le voyage en immersion. Nous donnons Ã  nos client la possibilitÃ© de vivre une expÃ©rience inoubliable et enrichissante et de la partager avec la communautÃ© des voyageurs Ã  travers un carnet de voyage modulable. Ce carnet constitue un Ã©lÃ©ment central de notre vision du voyage en immersion.\n                            </p>\n                            <p>\n                                N''attendez plus ! DÃ©couvrez maintenant <a href="#">nos destinations</a> ou feuilletez les <a href="#">carnets de nos voyageurs</a> !\n                            </p>', ' Amateurs de voyages en immersion rÃ©jouissez-vous ! Walkabout dispose dÃ©sormais de son propre site internet ! ', 'true', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `wa__administrateur`
--

CREATE TABLE IF NOT EXISTS `wa__administrateur` (
  `idAdministrateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `identifiant` varchar(45) DEFAULT NULL,
  `mdp` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idAdministrateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `wa__administrateur`
--

INSERT INTO `wa__administrateur` (`idAdministrateur`, `nom`, `prenom`, `identifiant`, `mdp`) VALUES
(1, 'CAPI', 'AurÃ©lien', 'T4GAD4', '11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c'),
(2, 'Julien', 'VANDERMEERSCH', 'ju.vdm', '4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2'),
(3, 'lamoot', 'alexandre', 'dev', 'ef260e9aa3c673af240d17a2660480361a8e081d1ffeca2a5ed0e3219fc18567');

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
  `photos` longtext,
  PRIMARY KEY (`idArticles`),
  KEY `idCarnet` (`idCarnet`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `wa__articles`
--

INSERT INTO `wa__articles` (`idArticles`, `idCarnet`, `date`, `ordre`, `titre`, `texte`, `photos`) VALUES
(1, 1, '2015-04-01', '1', 'Mon arrivÃ© au village', '<div class="tb-article--content">\r\n<p class="lead">\r\n    &laquo;&nbsp;Je suis arrivÃ© dans le village dans lequel j''allais Ãªtre hÃ©bergÃ© pendant 2 semaines&nbsp;&raquo;\r\n</p>\r\n\r\n<p>\r\nJ''ai r&eacute;serv&eacute; mon trek &agrave; partir de Cuzco. J''ai pris une agence au hasard qui m''a dit qu''on serait au maximum 20 pour le trek, et on s''est retrouv&eacute; &agrave; 19 (sans compter le guide et les accompagnateurs), r&eacute;sultat en fait du groupement de plusieurs agences, avec certains qui s''attendaient &agrave; &ecirc;tre entre eux, &agrave; 5... Globalement, le groupe &eacute;tait sympathique, chacun &agrave; son rythme. Je me suis bien entendu avec la plupart d''entre eux. On est rest&eacute; 4 jours ensemble.</p>\r\n<img src="http://mesvoyages.net/Images/Perou/Matchup2.JPG" alt="La photo classique du Matchu Picchu, qu''on ne peut s''emp&ecirc;cher de faire pourtant en arrivant tellement c''est beau"/>\r\n<p>Le d&eacute;part de Cuzco se fait en bus jusqu''&agrave; un certain point, le km88, o&ugrave;, le long de la voie de chemin de fer qui va de Cuzco jusqu''&agrave; Matchu Picchu, l''on descend et d''o&ugrave; l''on marche, notre sac sur le dos. La <a name="1"></a>premi&egrave;re journ&eacute;e de marche, commen&ccedil;ant &agrave; 2200 m, est &agrave; peu pr&egrave;s plate jusqu''&agrave; 2750m, et pas trop longue et l''on est arriv&eacute; pr&egrave;s d''une petite maison o&ugrave; les accompagnateurs ont plant&eacute; les tentes, et o&ugrave; l''on a eu un repas fort sympathique. Plus tard, avec la nuit, on s''est demand&eacute; comment on allait dormir et l&agrave;, angoisse... il n''y avait pas assez de place dans les tentes. En fait, ils n''avaient pas pris assez de tentes. Certains sont all&eacute;s dans la petite maison, partageant la salle commune avec la famille qui &eacute;tait l&agrave;, d''autres dans les tentes et j''&eacute;tais sur le balcon devant la maison, dehors, par cette nuit froide. J''ai sorti mon duvet, ma couverture de survie pour me prot&eacute;ger le corps du vent, mes sacs poubelle pour faire un esp&egrave;ce d''abris face au vent, suspendus sur la rambarde du balcon. Je n''avais m&ecirc;me pas assez de place pour les jambes car un second trekker se trouvait aussi sur le balcon, dans l''alignement, ses jambes &agrave; lui d&eacute;passant au dessus de l''escalier. Dur pour une premi&egrave;re nuit, mais j''ai finalement bien dormi. Le lendemain soir, avant de nous coucher, le cuisinier, qui &eacute;tait responsable des tentes (et donc &eacute;tait rendu responsable devant tout le monde de l''oubli par le guide, alors que je pense que c''&eacute;tait le guide qui &eacute;tait responsable de ne pas avoir v&eacute;rifi&eacute;) et &eacute;tait redescendu &agrave; pieds en chercher, &eacute;tait revenu de la m&ecirc;me fa&ccedil;on avec d''autres tentes. Il a fait l''aller-retour (+ du stop jusqu''&agrave; Cuzco) dans la journ&eacute;e !</p>\r\n<img src="http://mesvoyages.net/Images/Perou/Col4200.JPG" alt="Le col &agrave; 4200 m"/>\r\n<p>La <a name="2"></a>seconde journ&eacute;e fut la plus dure, avec une ascension jusqu''&agrave; 4200 m dans la matin&eacute;e, en partant de 2750 m, soient 1450 m de d&eacute;nivel&eacute; d''un trait. C''est dur, mais j''aime cela, et je suis arriv&eacute; au col en bon &eacute;tat, en m&ecirc;me temps que la plupart. Il y a deux autres cols pendant le trek, mais ils ne sont pas trop durs. Certaines jeunes filles, qui faisaient pourtant partie d''un groupe d''Isra&eacute;liens sortant de leur service militaire (un grand classique en voyage que ces jeunes qui veulent se changer les id&eacute;es apr&egrave;s trois ans de service militaire - bien s&ucirc;r l''un d''entre eux n''arr&ecirc;tait pas de manipuler une machette qu''il portait dans son dos &agrave; la Rambo, ce qui mettait mal &agrave; l''aise tout le monde vu qu''en plus il ne souriait jamais, mais bon, on fait avec), ont eu beaucoup de mal, parce qu''avec leur sac (plus volumineux qu''elles) sur le dos ce fut tr&egrave;s dur. Mais leurs copains sont redescendus les aider, apr&egrave;s avoir d&eacute;pos&eacute; leur propre sac au col !</p>\r\n<p>On a mang&eacute; au col, en plein vent et, comme d''habitude, la nourriture fut excellente. Au soir, on s''est retrouv&eacute; en pleine nature, et on a pu dormir dans des tentes. Rien d''autre de sp&eacute;cial &agrave; signaler ce second jour. Le <a name="3"></a>troisi&egrave;me jour, apr&egrave;s le petit d&eacute;jeuner, on est parti vers la suite de notre voyage, pour une journ&eacute;e qui m''a sembl&eacute; longue. On a visit&eacute; un temple solaire, bien orient&eacute;, on a mang&eacute; sur un flanc de montagne orient&eacute; vers le Nord, dans un coin qui s''appelait la vall&eacute;e de la pluie... et il a plut. Puis on a march&eacute;, toujours sur ce flanc de montagne, dans un paysage tr&egrave;s humide, amazonien, avec des lianes, des murs de mousse o&ugrave; l''on peut plonger le bras sans toucher le rocher et un sol glissant. On est pass&eacute; dans des tunnels creus&eacute;s par les Incas suivant une technique ancestrale, utilisant le gonflement du bois mouill&eacute; pour faire exploser la roche. Le soir on est arriv&eacute; pr&egrave;s d''un b&acirc;timent en dur o&ugrave;, tout en dormant dans les tentes, on a pu aller prendre une douche (bienvenue), et manger assis sur une chaise, sur une table.</p>\r\n</div>', 'voyages/perou/03.jpg;voyages/perou/02.jpg;voyages/perou/03.jpg;voyages/perou/04.jpg;voyages/perou/05.jpg;'),
(3, 2, '2014-12-10', '1', 'Jour 1 : Lima', '<div class="tb-article--content">\r\n<p>Ce nâ€™etait pas le point culminant de nos centres dâ€™intÃ©rÃªt, mais nous y avons quand mÃªme passÃ© trente six heures ce qui nous a permis de faire une rapide visite du couvent San Francisco(avec de superbes azuleros) du Museo Postal du patio du MinistÃ¨re Des Affaires EtrangÃ¨res. Nous avons eu le temps dâ€™assister Ã  une cÃ©rÃ©monie sur les marches du Palais du Gouvernement: les maires Ã©taient reÃ§us par le PrÃ©sident de la RÃ©publique (dont la femme est dâ€™origine franÃ§aise, nous a prÃ©cisÃ© un policier postÃ© devant les grilles - Il se trompait, Eliana Karp est d''origine belge :-) De lâ€™autre cÃ´tÃ© de la Plaza de Armas nous avons pu entendre une chorale de plusieurs centaines de jeunes chantant pour le rÃ©tablissement du Pape.</p>\r\n<p>Notre hÃ´tel situÃ© Ã  Miraflores se trouve pas trÃ¨s loin dâ€™un centre commercial moderne et assez luxueux, surplombant la mer au dessus des falaises. De nombreux restaurants servent dâ€™excellents poissons. Pour manger une bonneceviche il vaut mieux choisir les restaurants situÃ©s sur les niveaux les plus Ã©levÃ©s. Câ€™est dans ce centre commercial que nous avons dÃ©couvert les magasins dâ€™alpaga et de vigogne les plus chics.</p>\r\n</div>', ''),
(4, 2, '2014-12-18', '2', 'Jour 2 : Nazca', '<div class="tb-article--content">\r\n<p>La voiture qui nous emmÃ¨ne vers le sud et Nazca traverse des paysages Ã©tonnants, tantÃ´t le long du Pacifique, tantÃ´t sâ€™enfonÃ§ant dans les terres, tantÃ´t lunaires, tantÃ´t laissant penser que la route file dans un gigantesque tableau impressionniste, avec une palette de couleurs tendres variant Ã  lâ€™infini, Ã  chaque virage, Ã  chaque changement de lumiÃ¨re. Nous avons voulu Ã©viter lâ€™arrÃªt aux Ã®les Ballestas.</p>\r\n<p class="lead">La voiture qui nous emmÃ¨ne vers le sud et Nazca traverse des paysages Ã©tonnants</p>\r\n<p>Nous avons fait connaissance avec le Pisco Sur, cette boisson traditionnelle que nous avons vu fabriquer dans une bodega prÃ¨s dâ€™Ica, capitale du Pisco. Le goÃ»t du pisco ne nous a pas convaincu, mais peut-Ãªtre faut-il habituer son palais? Nous en avons cependant achetÃ© une petite fiole qui rejoindra dans un placard Ã  alcool la tequila mexicaine et lâ€™ouzo grec.</p>\r\n<p>En arrivant Ã  Nazca, un petit avion, retenu par lâ€™agence,nous a fait survoler pendant une demi-heure les Ã©tranges lignes. Le pilote prenant soin de tourner au-dessus de chaque dessin dans un sens puis dans lâ€™autre nous a permis de trÃ¨s bien voir ces messages mystÃ©rieux, mais il vaut mieux avoir lâ€™estomac bien accrochÃ© (lâ€™un de nous en a souffert)</p>\r\n</div>', ''),
(5, 2, '2015-05-20', NULL, 'Jour 3', '<div class="tb-article--content">\r\n<p class="lead">Nous faisons Ã©galement plus ample connaissance avec notre guide-interprÃ¨te.</p>\r\n<p>DÃ©part pour Saraguro, Ã  la rencontre de cette communautÃ© dans le petit village de Quisquinchir,  un assez long pÃ©riple en voiture qui nous permet de dÃ©couvrir des paysages andins  sous la brume, mais Ã§a rajoute un peu de magie aux montagnes. Nous faisons Ã©galement plus ample connaissance avec notre guide-interprÃ¨te qui nous raconte lâ€™histoire de son pays. Une pause " fruits " est organisÃ©e et nous voilÃ   devant un Ã©tal de couleurs, saveurs, odeurs Ã  nous "gaver" de fruits connus et inconnus, tous excellents. </p>\r\n<p>ArrivÃ©e le soir dans nos familles, installation et rapide visite des lieux : que de sourires partout !!</p>\r\n</div>', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `wa__carnetdevoyage`
--

CREATE TABLE IF NOT EXISTS `wa__carnetdevoyage` (
  `idCarnetDeVoyage` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `publie` varchar(5) NOT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `idVoyage` int(11) NOT NULL,
  `idDestination` int(11) NOT NULL,
  `image_carnet` varchar(50) NOT NULL,
  `favoris` varchar(5) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`idCarnetDeVoyage`),
  UNIQUE KEY `titre` (`titre`),
  KEY `idUsers` (`idUsers`,`idVoyage`),
  KEY `idVoyage` (`idVoyage`),
  KEY `idDestination` (`idDestination`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `wa__carnetdevoyage`
--

INSERT INTO `wa__carnetdevoyage` (`idCarnetDeVoyage`, `date`, `publie`, `titre`, `description`, `idUsers`, `idVoyage`, `idDestination`, `image_carnet`, `favoris`) VALUES
(1, '2015-03-05', 'true', 'Mon aventure chez les QuÃ©chuas', 'J''ai passÃ© une merveilleuse expÃ©rience chez les QuÃ©chuas du PÃ©rou...', 12, 1, 1, 'cdv1.jpg', 'false'),
(2, '2015-03-05', 'true', 'Moi chez les pÃ©ruviens', 'Une destination magnifique,<br/>et une expÃ©rience de voyage inoubliable', 12, 2, 1, 'carnets/peru.jpg', 'true'),
(3, '2015-03-05', 'true', 'Mon expÃ©rience PÃ©ruvienne', 'Une destination magnifique,<br/>et une expÃ©rience de voyage inoubliable', 2, 2, 1, 'cdv1.jpg', 'false'),
(4, '2015-03-05', 'true', 'Mon aventure au PÃ©rou', 'Une destination magnifique,<br/>et une expÃ©rience de voyage inoubliable', 2, 2, 1, 'carnets/peru.jpg', 'false'),
(5, '2015-06-24', 'true', 'Immersion dans une culture oubliÃ©e', 'Voyage Ã  la dÃ©couverte de la fascinante culture des Incas', 12, 2, 1, 'voyages/perou/banner-list.jpg', 'false'),
(6, '2015-06-16', 'true', 'PÃ©riple chez les danseurs Nyau', 'Mon voyage chez les danseurs Nyau de Mozambique', 12, 2, 1, 'voyages/mozambique/dest-img.jpg', 'false');

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
(1, 1, 2, '2015-04-04', 'Tu m''as vraiment donnÃ© envie de visiter les Quechuas ! Ils ont vraiment l''air d''Ãªtre un peuple facinant. As-tu Ã©tÃ© visitÃ© le temple ? Des amis m''ont dit que c''Ã©tait l''un des plus beaux qu''ils aient vu !', 'true', ''),
(2, 1, 1, '2015-04-04', 'Merci pour ton commentaire !<br/>\r\nOui, j''ai visitÃ© le temple ! Je prÃ©pare actuellement un article Ã  ce sujet.', 'true', ''),
(3, 1, 2, '2015-04-05', 'J''ai hÃ¢te de lire ce que tu en as pensÃ© !', 'true', ''),
(5, 2, 1, '2015-04-04', 'Tu m''as vraiment donnÃ© envie de visiter les Quechuas ! Ils ont vraiment l''air d''Ãªtre un peuple facinant. As-tu Ã©tÃ© visitÃ© le temple ? Des amis m''ont dit que c''Ã©tait l''un des plus beaux qu''ils aient vu !', 'true', ''),
(6, 2, 2, '2015-04-04', 'Merci pour ton commentaire !<br/>\r\nOui, j''ai visitÃ© le temple ! Je prÃ©pare actuellement un article Ã  ce sujet.', 'true', ''),
(7, 2, 1, '2015-04-05', 'J''ai hÃ¢te de lire ce que tu en as pensÃ© !', 'true', ''),
(11, 3, 1, '2015-05-14', 'HÃ© bÃ©h!! Il manque beaucoup de contenu sur ce carnet! ;)', 'true', '{"nom":"CAPI","prenom":"Aur\\u00e9lien","email":null}');

-- --------------------------------------------------------

--
-- Structure de la table `wa__contact`
--

CREATE TABLE IF NOT EXISTS `wa__contact` (
  `idContact` int(11) NOT NULL AUTO_INCREMENT,
  `idVoyage` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `sujet` varchar(45) DEFAULT NULL,
  `message` longtext,
  PRIMARY KEY (`idContact`),
  KEY `idVoyage` (`idVoyage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `wa__destination`
--

CREATE TABLE IF NOT EXISTS `wa__destination` (
  `idDestination` int(11) NOT NULL AUTO_INCREMENT,
  `idPays` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `description` longtext NOT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `coordonnees` varchar(50) NOT NULL,
  `photos` longtext,
  `banner` varchar(50) NOT NULL,
  PRIMARY KEY (`idDestination`),
  KEY `idPays` (`idPays`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `wa__destination`
--

INSERT INTO `wa__destination` (`idDestination`, `idPays`, `titre`, `nom`, `description`, `ville`, `coordonnees`, `photos`, `banner`) VALUES
(1, 3, 'Ã€ la dÃ©couverte des QuÃ©chuas du PÃ©rou', 'Voyage Ã  Lima', 'Dans les montagnes, les Quechuas Ã©lÃ¨vent traditionnellement des lamas et des alpagas pour leur laine et leur viande.\n                                Ces animaux vivent en haute altitude ce qui oblige les hommes Ã  sâ€™Ã©tablir sur des terres arides oÃ¹ rien ne pousse ou presque.\n                                Pourtant, les Quechuas sont Ã©galement agriculteurs. Ils rÃ©ussissent lâ€™exploit de cultiver un vÃ©ritable trÃ©sor : la pomme de terre.\n                                Plus quâ€™un aliment, la pomme de terre est lâ€™emblÃ¨me de la culture andine, elle symbolise la fertilitÃ©. Certaines sont mÃªme sacrÃ©es.\n                                Elles sont offertes Ã  la Pachamama, Â« la terre mÃ¨re Â», pour la remercier de ses bienfaits et implorer sa protection\n                                pour la rÃ©colte Ã  venir.\n                                <br /><br />\n                                Au quotidien, les Quechuas vÃ©nÃ¨rent la nature sous toutes ses formes. Pour eux, les montagnes sont des Dieux et\n                                ils nâ€™hÃ©sitent pas Ã  effectuer un long voyage et Ã  gravir des sommets vertigineux pour recueillir la glace sacrÃ©e\n                                qui bÃ©nira leur troupeau et leur terre.\n                                <br /><br />\n                                Faites lâ€™expÃ©rience de leur culture en vous y immergeant  !', 'Lima', '-12.04,-77.04', 'voyages/perou/01.jpg;voyages/perou/04.jpg;voyages/perou/03.jpg;voyages/perou/02.jpg;voyages/perou/05.jpg;', 'voyages/perou/dest-img.jpg'),
(2, 3, 'Les incas, une culture oubliÃ©e', 'Voyage chez les incas', 'La civilisation inca est une civilisation prÃ©colombienne du groupe andin. Elle prend naissance au dÃ©but du XIIIe siÃ¨cle dans le bassin de Cuzco dans l''actuel PÃ©rou et se dÃ©veloppe ensuite le long de l''ocÃ©an Pacifique et de la cordillÃ¨re des Andes, couvrant la partie occidentale de l''AmÃ©rique du Sud. Ã€ son apogÃ©e, elle s''Ã©tend de la Colombie jusqu''Ã  l''Argentine et au Chili, par-delÃ  l''Ã‰quateur, le PÃ©rou et la Bolivie.\r\n\r\nElle est Ã  l''origine de l''empire inca, l''un des trois grands empires de l''AmÃ©rique prÃ©colombienne. Cet empire avait pour chef suprÃªme le Sapa Inca. L''empire inca fut conquis par les conquistadors espagnols sous les ordres de Francisco Pizarro Ã  partir de 1532.\r\n\r\nL''une des grandes singularitÃ©s de cet empire fut d''avoir intÃ©grÃ©, dans une organisation Ã©tatique originale, la multiplicitÃ© socioculturelle des populations hÃ©tÃ©rogÃ¨nes qui le composaient.', 'Cuzco', '-13.31, -71.58  ', 'voyages/incas/01.jpg;voyages/incas/02.jpg;voyages/incas/03.jpg;', 'voyages/incas/banner-list.jpg');

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
(1, 5, 'TerminÃ©e'),
(2, 14, 'En cours'),
(3, 9, 'En cours'),
(4, 15, 'En cours'),
(7, 19, 'En cours');

-- --------------------------------------------------------

--
-- Structure de la table `wa__infoscomplementaire`
--

CREATE TABLE IF NOT EXISTS `wa__infoscomplementaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idDestination` int(11) NOT NULL,
  `information` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idVoyage` (`idDestination`),
  KEY `idDestination` (`idDestination`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `wa__infoscomplementaire`
--

INSERT INTO `wa__infoscomplementaire` (`id`, `idDestination`, `information`) VALUES
(1, 1, '<h3>Accompagnement</h3>\r\n                                        <p>\r\n                                            1 guide bilingue franÃ§ais/espagnol sur lâ€™ensemble du sÃ©jour + guides locaux selon les spots\r\n                                        </p>'),
(2, 1, '<h3>DÃ©placements</h3><p>\r\n                                            Transport privÃ© ou bus collectif (selon les rÃ©gions traversÃ©es) + balades Ã  pied, en pirogue, Ã  vÃ©lo\r\n                                        </p>'),
(3, 1, '                                        <h3>HÃ©bergement</h3>\r\n                                        <p>\r\n                                            5 nuits Ã  lâ€™hÃ´tel / 5 nuits chez lâ€™habitant / 1 nuit en vol\r\n                                        </p>'),
(4, 1, '                                        <h3>Repas &amp; Boissons</h3>\r\n                                        <p>\r\n                                            Tous les repas sont compris / lâ€™eau minÃ©rale est servie pendant les repas\r\n                                        </p>');

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
(1, 1, 'Habite', 'Chez l''habitant', 'info-pics/pension.png'),
(2, 1, 'Animaux', 'acceptÃ©s', 'info-pics/animals.png'),
(3, 1, 'mÃ©tÃ©o', 'variÃ©', 'info-pics/climat.png'),
(4, 1, 'monnaie', 'nuevo sol', 'info-pics/currency.png'),
(6, 1, 'passport', 'obligatoire', 'info-pics/passport.png');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `wa__newsletter`
--

INSERT INTO `wa__newsletter` (`idNewsletter`, `email`) VALUES
(2, 'capi.aurelien@gmail.com');

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
  `capitale` varchar(45) NOT NULL,
  `monnaie` varchar(45) DEFAULT NULL,
  `Dirigeant(e)` varchar(45) NOT NULL,
  `langues` varchar(45) NOT NULL,
  `population` varchar(45) DEFAULT NULL,
  `superficie` varchar(45) DEFAULT NULL,
  `densitÃ©` varchar(45) DEFAULT NULL,
  `climat` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPays`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `wa__pays`
--

INSERT INTO `wa__pays` (`idPays`, `nom`, `capitale`, `monnaie`, `Dirigeant(e)`, `langues`, `population`, `superficie`, `densitÃ©`, `climat`) VALUES
(2, 'Australie', 'Canberra', 'Dollar australien', 'Ã‰lisabeth II', 'Anglais', '23 500 000 Habitants', '7 686 850 KmÂ²', '3 Hab./kmÂ²', 'variÃ©'),
(3, 'PÃ©rou', 'Lima', 'Nuevo sol', 'Ollanta Humala', 'Espagnol, Quechua et Aymara', '29 907 003 Habitants', '1 285 315 KmÂ²', '22 Hab./kmÂ²', 'variÃ©');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `wa__reservation`
--

INSERT INTO `wa__reservation` (`idReservation`, `idVoyage`, `idUsers`, `nb_personnes`, `date`) VALUES
(5, 1, 1, 2, '2015-01-25'),
(9, 2, 2, 4, '2015-01-25'),
(14, 2, 1, 2, '2015-05-27'),
(15, 2, 12, 2, '2015-05-27'),
(19, 2, 15, 1, '2015-05-27');

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
('8ba5530e257baae500e4559672a527be', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.130 Safari/537.36', 1435750932, 'a:2:{s:9:"user_data";s:0:"";s:4:"user";a:1:{i:0;O:8:"stdClass":17:{s:7:"idUsers";s:2:"12";s:7:"idLevel";s:1:"1";s:4:"mail";s:23:"capi.aurelien@gmail.com";s:3:"mdp";s:64:"11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c";s:3:"nom";s:4:"CAPI";s:6:"prenom";s:9:"AurÃ©lien";s:8:"adresse1";s:16:"654 rue du plouy";s:8:"adresse2";s:0:"";s:2:"CP";s:5:"62232";s:5:"ville";s:6:"HINGES";s:4:"pays";s:6:"FRANCE";s:8:"tel_fixe";s:0:"";s:8:"tel_port";s:0:"";s:14:"date_naissance";s:10:"1992-10-28";s:14:"num_activation";s:18:"3oKvnpMuhP4lNF2Zka";s:6:"active";s:4:"true";s:5:"photo";s:17:"unsigned_user.jpg";}}}'),
('af0a7bde521c775ef52819ff5e526845', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0', 1435749829, 'a:1:{s:4:"user";a:1:{i:0;O:8:"stdClass":17:{s:7:"idUsers";s:2:"12";s:7:"idLevel";s:1:"1";s:4:"mail";s:23:"capi.aurelien@gmail.com";s:3:"mdp";s:64:"11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c";s:3:"nom";s:4:"CAPI";s:6:"prenom";s:9:"AurÃ©lien";s:8:"adresse1";s:16:"654 rue du plouy";s:8:"adresse2";s:0:"";s:2:"CP";s:5:"62232";s:5:"ville";s:6:"HINGES";s:4:"pays";s:6:"FRANCE";s:8:"tel_fixe";s:0:"";s:8:"tel_port";s:0:"";s:14:"date_naissance";s:10:"1992-10-28";s:14:"num_activation";s:18:"3oKvnpMuhP4lNF2Zka";s:6:"active";s:4:"true";s:5:"photo";s:17:"unsigned_user.jpg";}}}');

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
  PRIMARY KEY (`idUsers`),
  KEY `idLevel` (`idLevel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `wa__users`
--

INSERT INTO `wa__users` (`idUsers`, `idLevel`, `mail`, `mdp`, `nom`, `prenom`, `adresse1`, `adresse2`, `CP`, `ville`, `pays`, `tel_fixe`, `tel_port`, `date_naissance`, `num_activation`, `active`, `photo`) VALUES
(1, 1, 'aurelien.capi@gmail.com', '11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c', 'CAPI', 'AurÃ©lien', '654 rue du plouy', '', '62232', 'HINGES', 'FRANCE', '0321640744', '0623974082', '1992-10-28', '7851659894615189', 'true', 'profile2.png'),
(2, 1, 'celine@gmail.com', 'celine', 'Vano', 'CÃ©line', '654 rue du plouy', '', '62232', 'HINGES', 'FRANCE', '0321643775', '0623974082', '1992-10-28', '549846519181915', 'true', 'profile.png'),
(12, 1, 'capi.aurelien@gmail.com', '11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c', 'CAPI', 'AurÃ©lien', '654 rue du plouy', '', '62232', 'HINGES', 'FRANCE', '', '', '1992-10-28', '3oKvnpMuhP4lNF2Zka', 'true', 'unsigned_user.jpg'),
(13, 1, 'julien.vdm@gmail.com', 'f938f74c4081a8994371697781acc42e163d893149dc255cec3bf1c4ce3ab7ab', 'Vandermeersch', 'Julien', '87 rue des Orions', '87 rue des Orions', '59200', 'Tourcoing', 'France', '0301020304', '', '1990-03-10', 'eROhZ3kZpa5YhPCY7X', 'true', 'unsigned_user.jpg'),
(14, 1, 'capi.aurelien@yopmail.fr', '11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c', 'CAPI', 'aurÃ©lien', '654 rue du plouy', '', '62232', 'Hinges', 'fzfqfqzfqfzf', '', '', '1992-10-28', '0xV9E6dv9XR1lcUfCO', 'true', 'unsigned_user.jpg'),
(15, 1, 'aurelien.capi@yopmail.com', '11f8114ae7af9eb95f365e33205ef0bb1941451f4fe84282437b820a1e70784c', 'capi', 'AurÃ©lien', '654 rue du plouy', '', '62232', 'Hinges', 'FRANCE', '', '', '1992-10-28', 'THag5VT6fiojoZiemo', 'true', 'unsigned_user.jpg'),
(16, 1, 'nightrei@hotmail.fr', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646', 'valet', 'kevin', 'khfeiozhoifeh', 'kjdzkjs', '59000', 'oziapoepza', 'reservoir', '', '', '0000-00-00', 'YGhTWxlY6f7tY8MH32', 'false', 'unsigned_user.jpg');

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
  PRIMARY KEY (`idVoyage`),
  KEY `idDestination` (`idDestination`,`idInfos`),
  KEY `idInfos` (`idInfos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `wa__voyage`
--

INSERT INTO `wa__voyage` (`idVoyage`, `idDestination`, `idInfos`, `date_depart`, `date_retour`, `prix`, `nb_places`) VALUES
(1, 1, 2, '2015-03-28', '2015-04-03', 5200, 20),
(2, 1, 2, '2015-05-20', '2015-06-02', 4700, 5);

--
-- Contraintes pour les tables exportÃ©es
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
-- Contraintes pour la table `wa__contact`
--
ALTER TABLE `wa__contact`
  ADD CONSTRAINT `id_contact_voyage` FOREIGN KEY (`idVoyage`) REFERENCES `wa__voyage` (`idVoyage`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `wa__destination`
--
ALTER TABLE `wa__destination`
  ADD CONSTRAINT `id_destination_pays` FOREIGN KEY (`idPays`) REFERENCES `wa__pays` (`idPays`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `id_voyage_destination` FOREIGN KEY (`idDestination`) REFERENCES `wa__destination` (`idDestination`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_voyage_infos` FOREIGN KEY (`idInfos`) REFERENCES `wa__infosdestinations` (`idInfosDestinations`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
