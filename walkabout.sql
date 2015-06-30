-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 30 Juin 2015 à 11:04
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `walkabout-voyages`
--

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
(1, 3, 'À la découverte des Quéchuas du Pérou', 'Voyage à Lima', 'Dans les montagnes, les Quechuas élèvent traditionnellement des lamas et des alpagas pour leur laine et leur viande.\n                                Ces animaux vivent en haute altitude ce qui oblige les hommes à s’établir sur des terres arides où rien ne pousse ou presque.\n                                Pourtant, les Quechuas sont également agriculteurs. Ils réussissent l’exploit de cultiver un véritable trésor : la pomme de terre.\n                                Plus qu’un aliment, la pomme de terre est l’emblème de la culture andine, elle symbolise la fertilité. Certaines sont même sacrées.\n                                Elles sont offertes à la Pachamama, « la terre mère », pour la remercier de ses bienfaits et implorer sa protection\n                                pour la récolte à venir.\n                                <br /><br />\n                                Au quotidien, les Quechuas vénèrent la nature sous toutes ses formes. Pour eux, les montagnes sont des Dieux et\n                                ils n’hésitent pas à effectuer un long voyage et à gravir des sommets vertigineux pour recueillir la glace sacrée\n                                qui bénira leur troupeau et leur terre.\n                                <br /><br />\n                                Faites l’expérience de leur culture en vous y immergeant  !', 'Lima', '-12.04,-77.04', 'voyages/perou/01.jpg;voyages/perou/04.jpg;voyages/perou/03.jpg;voyages/perou/02.jpg;voyages/perou/05.jpg;', 'voyages/perou/dest-img.jpg'),
(2, 3, 'Les incas, une culture oubliée', 'Voyage chez les incas', 'La civilisation inca est une civilisation précolombienne du groupe andin. Elle prend naissance au début du XIIIe siècle dans le bassin de Cuzco dans l''actuel Pérou et se développe ensuite le long de l''océan Pacifique et de la cordillère des Andes, couvrant la partie occidentale de l''Amérique du Sud. À son apogée, elle s''étend de la Colombie jusqu''à l''Argentine et au Chili, par-delà l''Équateur, le Pérou et la Bolivie.\r\n\r\nElle est à l''origine de l''empire inca, l''un des trois grands empires de l''Amérique précolombienne. Cet empire avait pour chef suprême le Sapa Inca. L''empire inca fut conquis par les conquistadors espagnols sous les ordres de Francisco Pizarro à partir de 1532.\r\n\r\nL''une des grandes singularités de cet empire fut d''avoir intégré, dans une organisation étatique originale, la multiplicité socioculturelle des populations hétérogènes qui le composaient.', 'Cuzco', '-13.31, -71.58  ', 'voyages/incas/01.jpg;voyages/incas/02.jpg;voyages/incas/03.jpg;', 'voyages/incas/banner-list.jpg');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `wa__destination`
--
ALTER TABLE `wa__destination`
  ADD CONSTRAINT `id_destination_pays` FOREIGN KEY (`idPays`) REFERENCES `wa__pays` (`idPays`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
