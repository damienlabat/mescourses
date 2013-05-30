-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 18 Mai 2013 à 23:07
-- Version du serveur: 5.5.28
-- Version de PHP: 5.4.4-14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `mescourses`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `rayon_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=166 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `name`, `rayon_id`) VALUES
(1, 'biscotte', 1),
(2, 'bonbon', 1),
(3, 'café', 1),
(4, 'choclat poudre', 1),
(5, 'chocolat patissier', 1),
(6, 'chocolat à croquer', 1),
(7, 'compote pomme', 1),
(8, 'compote pomme banane', 1),
(9, 'compote pomme framboise', 1),
(10, 'confiture abricot', 1),
(11, 'confiture framboise', 1),
(12, 'cookies', 1),
(13, 'farine', 1),
(14, 'levure', 1),
(15, 'madeleine', 1),
(16, 'nutella', 1),
(17, 'petit beurre', 1),
(18, 'sucre en morceaux', 1),
(19, 'sucre en poudre', 1),
(20, 'sucre vanillé', 1),
(21, 'eau', 6),
(22, 'jus d''orange', 6),
(23, 'jus de pommes', 6),
(24, 'multi fruits', 6),
(25, 'sirop de cassis', 6),
(26, 'sirop de citron', 6),
(27, 'bifteck', 7),
(28, 'blancs de poulet', 7),
(29, 'brochette', 7),
(30, 'coeur de volaille', 7),
(31, 'collier de veau', 7),
(32, 'côte d''agneau', 7),
(33, 'côte de porc', 7),
(34, 'gigot', 7),
(35, 'haché', 7),
(36, 'magret de canard', 7),
(37, 'merguez', 7),
(38, 'paupiette', 7),
(39, 'poulet', 7),
(40, 'roti de boeuf', 7),
(41, 'roti de porc', 7),
(42, 'saucisse', 7),
(43, 'tournedos', 7),
(44, 'gâteau', 8),
(45, 'pain', 8),
(46, 'pain tranché', 8),
(47, 'tarte', 8),
(48, 'viennoiserie', 8),
(49, 'beurre doux', 10),
(50, 'beuure doux', 10),
(51, 'boudin blanc', 10),
(52, 'camembert', 10),
(53, 'creme dessert', 10),
(54, 'creme fraiche', 10),
(55, 'fromage à tratiner', 10),
(56, 'jambon bayonne', 10),
(57, 'jambon blanc', 10),
(58, 'lait', 10),
(59, 'lardons', 10),
(60, 'mimolette', 10),
(61, 'oeuf', 10),
(62, 'pizza', 10),
(63, 'pâte fraiche', 10),
(64, 'pâte à tarte', 10),
(65, 'pâté', 10),
(66, 'rapé', 10),
(67, 'saucisse de strabourg', 10),
(68, 'yaourt fruits', 10),
(69, 'yaourt nature', 10),
(70, 'coton', 13),
(71, 'couche', 13),
(72, 'petit pot', 13),
(73, 'sucette', 13),
(74, 'abricot', 14),
(75, 'ananas', 14),
(76, 'banane', 14),
(77, 'cerise', 14),
(78, 'citron', 14),
(79, 'fraise', 14),
(80, 'kiwi', 14),
(81, 'mandarine', 14),
(82, 'mangue', 14),
(83, 'melon', 14),
(84, 'orange', 14),
(85, 'pamplemousse', 14),
(86, 'poire', 14),
(87, 'pomme', 14),
(88, 'prune', 14),
(89, 'pêche', 14),
(90, 'reine claude', 14),
(91, 'ail', 16),
(92, 'aubergine', 16),
(93, 'carotte', 16),
(94, 'concombre', 16),
(95, 'courgette', 16),
(96, 'oignons', 16),
(97, 'patate', 16),
(98, 'poireau', 16),
(99, 'poivron', 16),
(100, 'potiron', 16),
(101, 'salade', 16),
(102, 'tomate', 16),
(103, 'brosse à dents', 18),
(104, 'dentifrice', 18),
(105, 'démaquillant', 18),
(106, 'gel douche', 18),
(107, 'maquillage', 18),
(108, 'mouchoirs', 18),
(109, 'serviette hygénique', 18),
(110, 'shampoing', 18),
(111, 'cabillaud', 19),
(112, 'crevette', 19),
(113, 'dorade', 19),
(114, 'julienne', 19),
(115, 'moule', 19),
(116, 'saumon', 19),
(117, 'boulette', 21),
(118, 'champignons', 21),
(119, 'feuilletés', 21),
(120, 'frite', 21),
(121, 'glace', 21),
(122, 'palet de légumes', 21),
(123, 'plat cuisiné', 21),
(124, 'poisson', 21),
(125, 'poisson cuisiné', 21),
(126, 'purée', 21),
(127, 'quiche', 21),
(128, 'sauce poisson', 21),
(129, 'steack', 21),
(130, 'tarte au poireaux', 21),
(131, 'tomate farcie', 21),
(132, 'bière', 24),
(133, 'cidre', 24),
(134, 'rhum', 24),
(135, 'vin', 24),
(136, 'asperges', 25),
(137, 'bouillon de légumes', 25),
(138, 'bouillon de poule', 25),
(139, 'cacahuete', 25),
(140, 'chips', 25),
(141, 'cornichon', 25),
(142, 'flageolet', 25),
(143, 'haricots verts', 25),
(144, 'huile', 25),
(145, 'huile d''olive', 25),
(146, 'lentilles', 25),
(147, 'maquereau', 25),
(148, 'mayonnaise', 25),
(149, 'mousline', 25),
(150, 'moutarde', 25),
(151, 'olives', 25),
(152, 'pain de mie', 25),
(153, 'pain libanais', 25),
(154, 'petits pois carottes', 25),
(155, 'pâte', 25),
(156, 'quinoa', 25),
(157, 'riz', 25),
(158, 'sauce salade', 25),
(159, 'sauce tomate', 25),
(160, 'semoule', 25),
(161, 'soupe légumes', 25),
(162, 'soupe potiron', 25),
(163, 'thon', 25),
(164, 'vinaigre', 25),
(165, 'épice', 25);

-- --------------------------------------------------------

--
-- Structure de la table `liste`
--

CREATE TABLE IF NOT EXISTS `liste` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user` varchar(100) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `IP` varchar(255) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Contenu de la table `liste`
--

INSERT INTO `liste` (`id`, `slug`, `name`, `user`, `IP`, `content`, `created_at`) VALUES
(1, 'default', 'mes courses', '', '', '[{"k":"25","n":"Epicerie sucr\\u00e9e","a":[{"k":"151","n":"biscotte"},{"k":"165","n":"bonbon"},{"k":"163","n":"caf\\u00e9"},{"k":"162","n":"choclat poudre"},{"k":"160","n":"chocolat patissier"},{"k":"161","n":"chocolat \\u00e0 croquer"},{"k":"157","n":"compote pomme"},{"k":"158","n":"compote pomme banane"},{"k":"159","n":"compote pomme framboise"},{"k":"153","n":"confiture abricot"},{"k":"152","n":"confiture framboise"},{"k":"155","n":"cookies"},{"k":"166","n":"farine"},{"k":"167","n":"levure"},{"k":"156","n":"madeleine"},{"k":"164","n":"nutella"},{"k":"154","n":"petit beurre"},{"k":"168","n":"sucre en morceaux"},{"k":"169","n":"sucre en poudre"},{"k":"170","n":"sucre vanill\\u00e9"}]},{"k":"12","n":"boisson","a":[{"k":"134","n":"eau"},{"k":"130","n":"jus d\\u0027orange"},{"k":"129","n":"jus de pommes"},{"k":"131","n":"multi fruits"},{"k":"133","n":"sirop de cassis"},{"k":"132","n":"sirop de citron"}]},{"k":"9","n":"boucherie","a":[{"k":"128","n":"bifteck"},{"k":"119","n":"blancs de poulet"},{"k":"123","n":"brochette"},{"k":"124","n":"coeur de volaille"},{"k":"117","n":"collier de veau"},{"k":"115","n":"c\\u00f4te d\\u0027agneau"},{"k":"126","n":"c\\u00f4te de porc"},{"k":"116","n":"gigot"},{"k":"112","n":"hach\\u00e9"},{"k":"125","n":"magret de canard"},{"k":"122","n":"merguez"},{"k":"120","n":"paupiette"},{"k":"118","n":"poulet"},{"k":"114","n":"roti de boeuf"},{"k":"113","n":"roti de porc"},{"k":"121","n":"saucisse"},{"k":"127","n":"tournedos"}]},{"k":"1","n":"boulangerie","a":[{"k":"5","n":"g\\u00e2teau"},{"k":"1","n":"pain"},{"k":"3","n":"pain tranch\\u00e9"},{"k":"4","n":"tarte"},{"k":"2","n":"viennoiserie"}]},{"k":"6","n":"cr\\u00eamerie","a":[{"k":"71","n":"beurre doux"},{"k":"70","n":"beuure doux"},{"k":"65","n":"boudin blanc"},{"k":"60","n":"camembert"},{"k":"57","n":"creme dessert"},{"k":"58","n":"creme fraiche"},{"k":"62","n":"fromage \\u00e0 tratiner"},{"k":"69","n":"jambon bayonne"},{"k":"68","n":"jambon blanc"},{"k":"54","n":"lait"},{"k":"73","n":"lardons"},{"k":"61","n":"mimolette"},{"k":"53","n":"oeuf"},{"k":"63","n":"pizza"},{"k":"64","n":"p\\u00e2te fraiche"},{"k":"67","n":"p\\u00e2te \\u00e0 tarte"},{"k":"72","n":"p\\u00e2t\\u00e9"},{"k":"59","n":"rap\\u00e9"},{"k":"66","n":"saucisse de strabourg"},{"k":"55","n":"yaourt fruits"},{"k":"56","n":"yaourt nature"}]},{"k":"15","n":"espace b\\u00e9b\\u00e9","a":[{"k":"149","n":"coton"},{"k":"147","n":"couche"},{"k":"148","n":"petit pot"},{"k":"150","n":"sucette"}]},{"k":"4","n":"fruits","a":[{"k":"34","n":"abricot"},{"k":"40","n":"ananas"},{"k":"26","n":"banane"},{"k":"33","n":"cerise"},{"k":"38","n":"citron"},{"k":"27","n":"fraise"},{"k":"31","n":"kiwi"},{"k":"29","n":"mandarine"},{"k":"39","n":"mangue"},{"k":"32","n":"melon"},{"k":"28","n":"orange"},{"k":"30","n":"pamplemousse"},{"k":"25","n":"poire"},{"k":"24","n":"pomme"},{"k":"37","n":"prune"},{"k":"36","n":"p\\u00eache"},{"k":"35","n":"reine claude"}]},{"k":"5","n":"l\\u00e9gumes","a":[{"k":"50","n":"ail"},{"k":"44","n":"aubergine"},{"k":"47","n":"carotte"},{"k":"52","n":"concombre"},{"k":"43","n":"courgette"},{"k":"45","n":"oignons"},{"k":"48","n":"patate"},{"k":"42","n":"poireau"},{"k":"49","n":"poivron"},{"k":"51","n":"potiron"},{"k":"46","n":"salade"},{"k":"41","n":"tomate"}]},{"k":"14","n":"parfumerie \\/ hygi\\u00e8ne","a":[{"k":"143","n":"brosse \\u00e0 dents"},{"k":"142","n":"dentifrice"},{"k":"146","n":"d\\u00e9maquillant"},{"k":"140","n":"gel douche"},{"k":"145","n":"maquillage"},{"k":"141","n":"mouchoirs"},{"k":"144","n":"serviette hyg\\u00e9nique"},{"k":"139","n":"shampoing"}]},{"k":"8","n":"poissonnerie","a":[{"k":"110","n":"cabillaud"},{"k":"108","n":"crevette"},{"k":"106","n":"dorade"},{"k":"111","n":"julienne"},{"k":"109","n":"moule"},{"k":"107","n":"saumon"}]},{"k":"3","n":"surgel\\u00e9s","a":[{"k":"19","n":"boulette"},{"k":"15","n":"champignons"},{"k":"6","n":"feuillet\\u00e9s"},{"k":"10","n":"frite"},{"k":"9","n":"glace"},{"k":"11","n":"palet de l\\u00e9gumes"},{"k":"21","n":"pizza"},{"k":"20","n":"plat cuisin\\u00e9"},{"k":"13","n":"poireau"},{"k":"8","n":"poisson"},{"k":"17","n":"poisson cuisin\\u00e9"},{"k":"14","n":"poivron"},{"k":"16","n":"pur\\u00e9e"},{"k":"23","n":"quiche"},{"k":"12","n":"sauce poisson"},{"k":"18","n":"steack"},{"k":"22","n":"tarte au poireaux"},{"k":"7","n":"tomate farcie"}]},{"k":"13","n":"vins \\/ alcools","a":[{"k":"137","n":"bi\\u00e8re"},{"k":"135","n":"cidre"},{"k":"138","n":"rhum"},{"k":"136","n":"vin"}]},{"k":"7","n":"\\u00e9picerie","a":[{"k":"78","n":"asperges"},{"k":"103","n":"bouillon de l\\u00e9gumes"},{"k":"102","n":"bouillon de poule"},{"k":"95","n":"cacahuete"},{"k":"94","n":"chips"},{"k":"101","n":"cornichon"},{"k":"79","n":"flageolet"},{"k":"76","n":"haricots verts"},{"k":"105","n":"huile"},{"k":"104","n":"huile d\\u0027olive"},{"k":"77","n":"lentilles"},{"k":"83","n":"maquereau"},{"k":"99","n":"mayonnaise"},{"k":"90","n":"mousline"},{"k":"100","n":"moutarde"},{"k":"98","n":"olives"},{"k":"91","n":"pain de mie"},{"k":"92","n":"pain libanais"},{"k":"75","n":"petits pois carottes"},{"k":"74","n":"p\\u00e2te"},{"k":"93","n":"p\\u00e2t\\u00e9"},{"k":"82","n":"quinoa"},{"k":"81","n":"riz"},{"k":"87","n":"sauce salade"},{"k":"85","n":"sauce tomate"},{"k":"80","n":"semoule"},{"k":"97","n":"soupe l\\u00e9gumes"},{"k":"96","n":"soupe potiron"},{"k":"88","n":"thon"},{"k":"84","n":"tomate"},{"k":"86","n":"vinaigre"},{"k":"89","n":"\\u00e9pice"}]}]', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `rayon`
--

CREATE TABLE IF NOT EXISTS `rayon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=27 ;

--
-- Contenu de la table `rayon`
--

INSERT INTO `rayon` (`id`, `name`) VALUES
(1, 'épicerie sucrée'),
(2, 'auto / brico / sport'),
(3, 'autre'),
(4, 'bazar / art de la table'),
(5, 'bazar ménager'),
(6, 'boisson'),
(7, 'boucherie'),
(8, 'boulangerie'),
(9, 'charcuterie'),
(10, 'crêmerie'),
(11, 'dorguerie'),
(12, 'electroménager'),
(13, 'espace bébé'),
(14, 'fruits'),
(15, 'jouets'),
(16, 'légumes'),
(17, 'papeterie'),
(18, 'parfumerie / hygiène'),
(19, 'poissonnerie'),
(20, 'pâtisserie'),
(21, 'surgelés'),
(22, 'textile'),
(23, 'traiteur'),
(24, 'vins / alcools'),
(25, 'épicerie'),
(26, 'Epicerie sucrée');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
