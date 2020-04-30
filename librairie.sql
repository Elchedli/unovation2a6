-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  jeu. 30 avr. 2020 à 17:31
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `librairie`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `nom_cat` varchar(30) NOT NULL,
  `desc_cat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`nom_cat`, `desc_cat`) VALUES
('Ecriture', 'Pour Ecrire ou corriger des feuilles');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `adr_client` varchar(150) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `tel_client` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `code`
--

CREATE TABLE `code` (
  `id_code` int(11) NOT NULL,
  `prc_code` int(2) NOT NULL,
  `stringcode` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_com` int(3) NOT NULL,
  `date_com` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `id_liv` int(11) NOT NULL,
  `id_com` int(3) NOT NULL DEFAULT '0',
  `date_liv` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `livreur`
--

CREATE TABLE `livreur` (
  `id_livreur` int(11) NOT NULL,
  `tel_livreur` int(8) NOT NULL,
  `nom_livreur` varchar(30) NOT NULL,
  `ligne_liv` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id_pan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `nom_prod` varchar(100) NOT NULL,
  `prix_prod` float NOT NULL,
  `photo_prod` varchar(200) NOT NULL,
  `desc_prod` varchar(500) NOT NULL,
  `stock` int(3) NOT NULL,
  `nom_cat` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`nom_prod`, `prix_prod`, `photo_prod`, `desc_prod`, `stock`, `nom_cat`) VALUES
('Cartouche d&#039;encre Bleu Schneider 6603', 0.7, 'https://www.tunisianet.com.tn/30952-home/packet-6xcartouches-d-encre-bleu-schneider-6603.jpg', 'Packet 6xÂ Cartouches dâ€™encre standard (internationales) fermÃ©es Ã  lâ€™aide dâ€™une bille - Elles conviennent aux produits Schneider et Ã  la plupart des stylos Ã  plume - Lâ€™ encre bleu royal est effaÃ§able', 57, 'Ecriture'),
('Cartouche d&#039;encre Schneider 6610', 0.15, 'https://www.tunisianet.com.tn/30959-home/cartouche-d-encre-schneider-6610.jpg', 'Cartouches dâ€™encre standard (internationales) fermÃ©es Ã  lâ€™aide dâ€™une bille - Elles conviennent aux produits Schneider et Ã  la plupart des stylos Ã  plume - Lâ€™ encre bleu royal est effaÃ§able', 46, 'Ecriture'),
('Crayon graphite 2B MILAN...', 0.6, 'https://www.tunisianet.com.tn/146592-home/crayon-graphite-2b-milan-forme-triangulaire.jpg', 'Crayon graphite 2B triangulaire - MineÂ de 2.4 mm Ã˜ - Forme triangulaire ergonomiqueÂ - Le graphite 2B est tendre, adaptÃ© au dessin artistique - La mine offre un tracÃ© uniforme et rÃ©siste aux cassures grÃ¢ce au systÃ¨me LPS (Lead Protection System) qui protÃ¨ge la mine en adhÃ©rant au bois - Le bois provient de plantations durables', 82, 'Ecriture'),
('Gomme MILAN 4020', 0.65, 'https://www.tunisianet.com.tn/146610-home/gomme-milan-4020.jpg', 'Gomme MILAN 4020 - Gomme douce en caoutchouc synthÃ©tique - Pour gommer une large gamme de crayons graphite sur tout type de papier - Avec bande en carton bleu et emballÃ©e individuellement - Dimensions : 5.5 x 2.3 x 1.3 cm', 73, 'Ecriture'),
('Gomme Staedlter C35', 0.45, 'https://www.tunisianet.com.tn/18999-home/gomme-staedtler-c35.jpg', 'Gomme STAEDTLERÂ C35 -Â Gomme de qualitÃ© pour un excellent rÃ©sultat d&#039;effaÃ§age - Peu de rÃ©sidus - Emballage de protection cellophane avec amorce pour ouverture facile - Fourreau en carton pour une meilleure prise en main', 47, 'Ecriture'),
('Stylo Ã  bille BIC Cristal...', 0.4, 'https://www.tunisianet.com.tn/73991-home/stylo-a-bille-bic-cristal-medium-1mm-rouge.jpg', 'Stylo Ã  bille BIC Cristal Medium - Encre de qualitÃ©, sÃ©chage rapide et Ã©criture douce - Bille en carbure de tungstÃ¨ne, parfaitement sphÃ©rique et trÃ¨s rÃ©sistante - Pointe moyenne : 1 mm Â - Forme hexagonale pour une meilleure prise en main - Corps translucide Ã  la couleur de l&#039;encre, niveau d&#039;encre visible - CouleurÂ Rouge', 56, 'Ecriture'),
('Stylo Ã  bille Cristal Medium BIC / Bleu', 0.45, 'https://www.tunisianet.com.tn/39154-home/stylo-a-bille-cristal-medium-bic-bleu.jpg', 'Stylo Ã  bille Medium - Epaisseur de trait: 1.0 mm - Couleur BleuÂ - Forme ergonomique pour une tenue confortable et sans fatigue - Ecriture particuliÃ¨rement douce - Corps transparent - Capuchon et embout Ã  la couleur de l&#039;encre - MatiÃ¨reÂ en plastique', 75, 'Ecriture'),
('Stylo Ã  bille Cristal Medium BIC / Rouge', 0.4, 'https://www.tunisianet.com.tn/39156-home/stylo-a-bille-cristal-medium-bic-rouge.jpg', 'Stylo Ã  bille Medium - Epaisseur de trait: 1.0 mm - Couleur RougeÂ - Forme ergonomique pour une tenue confortable et sans fatigue - Ecriture particuliÃ¨rement douce - Corps transparent - Capuchon et embout Ã  la couleur de l&#039;encre - MatiÃ¨reÂ en plastique', 70, 'Ecriture'),
('Stylo Ã  Bille Maped Cap Green Ice Pointe Fine / Noir', 0.4, 'https://www.tunisianet.com.tn/50153-home/stylo-a-bille-maped-cap-green-ice-pointe-fine-noir.jpg', 'Stylo Ã  Bille Maped Cap Green Ice - Pointe Fine - Couleur NoirÂ - Ecriture extra douce et rÃ©guliÃ¨re - Confort: prÃ©hension triangulaire pour une prise en main optimale - Innovation: effet 3D carbone, pour un look branchÃ© - Produit constituÃ© Ã  80% de plastique recyclÃ©e', 17, 'Ecriture'),
('Stylo Ã  Bille Maped Cap Green Ice Pointe Fine / Rouge', 0.4, 'https://www.tunisianet.com.tn/50155-home/stylo-a-bille-maped-cap-green-ice-pointe-fine-rouge.jpg', 'Stylo Ã  Bille Maped Cap Green Ice - Pointe Fine - Couleur RougeÂ - Ecriture extra douce et rÃ©guliÃ¨re - Confort: prÃ©hension triangulaire pour une prise en main optimale - Innovation: effet 3D carbone, pour un look branchÃ© - Produit constituÃ© Ã  80% de plastique recyclÃ©e', 75, 'Ecriture'),
('Stylo Ã  Bille Maped Retractable Medium / Noir', 0.5, 'https://www.tunisianet.com.tn/50149-home/stylo-a-bille-maped-retractable-medium-noir.jpg', 'Stylo Ã  Bille Maped Retractable MediumÂ - Couleur NoirÂ -Â Technologie SOFT BALL garantissant une Ã©criture douce et rÃ©guliÃ¨re - Pointe moyenne Ã  1,0 mm - PrÃ©hension soft jusqu&#039;Ã  la pointe, pour une tenue et un confort optimaux (droitier et gaucher)', 26, 'Ecriture'),
('Stylo Ã  bille Medium iXC Sierra / Rouge', 0.4, 'https://www.tunisianet.com.tn/42022-home/stylo-a-bille-medium-ixc-sierra-rouge.jpg', 'Stylo Ã  bille Medium - Epaisseur de trait: 0.7 mm - Couleur RougeÂ - Forme ergonomique pour une tenue confortable et sans fatigue - Ecriture particuliÃ¨rement douce - Corps transparent - Capuchon Ã  la couleur de l&#039;encre - MatiÃ¨reÂ en plastique', 86, 'Ecriture'),
('Stylo Ã  bille Molin BCN180-50 / Bleu', 0.3, 'https://www.tunisianet.com.tn/46315-home/stylo-a-bille-molin-bcn180-50-bleu.jpg', 'Stylo Ã  bille Medium - Epaisseur de trait: 1.0 mm - Couleur BleuÂ - Forme ergonomique pour une tenue confortable et sans fatigue - Ecriture particuliÃ¨rement douce - Corps transparent - Capuchon et embout Ã  la couleur de l&#039;encre - MatiÃ¨reÂ en plastique', 51, 'Ecriture'),
('Stylo Ã  bille Molin BCN180-50 / Noir', 0.3, 'https://www.tunisianet.com.tn/46318-home/stylo-a-bille-molin-bcn180-50-noir.jpg', 'Stylo Ã  bille Medium - Epaisseur de trait: 1.0 mm - Couleur NoirÂ - Forme ergonomique pour une tenue confortable et sans fatigue - Ecriture particuliÃ¨rement douce - Corps transparent - Capuchon et embout Ã  la couleur de l&#039;encre - MatiÃ¨reÂ en plastique', 26, 'Ecriture'),
('Stylo Ã  bille Molin BCN180-50 / Rouge', 0.3, 'https://www.tunisianet.com.tn/46317-home/stylo-a-bille-molin-bcn180-50-rouge.jpg', 'Stylo Ã  bille Medium - Epaisseur de trait: 1.0 mm - Couleur RougeÂ - Forme ergonomique pour une tenue confortable et sans fatigue - Ecriture particuliÃ¨rement douce - Corps transparent - Capuchon et embout Ã  la couleur de l&#039;encre - MatiÃ¨reÂ en plastique', 35, 'Ecriture'),
('Stylo Ã  bille Molin...', 0.3, 'https://www.tunisianet.com.tn/87756-home/stylo-a-bille-molin-bcn180-50-vert.jpg', 'Stylo Ã  bille Medium - Epaisseur de trait: 1.0 mm - Couleur VertÂ - Forme ergonomique pour une tenue confortable et sans fatigue - Ecriture particuliÃ¨rement douce - Corps transparent - Capuchon et embout Ã  la couleur de l&#039;encre - MatiÃ¨reÂ en plastique', 64, 'Ecriture'),
('Stylo Ã  bille Schneider Tops 505 M / 1.4 mm / Rouge', 0.45, 'https://www.tunisianet.com.tn/31109-home/stylo-a-bille-schneider-tops-505-m-14-mm-bleu.jpg', 'Stylo Ã  bille Tops 505 M - Stylo Ã  bille jetable, capuchon design avec clip, pointe en acier inoxydable et rÃ©sistante Ã  lâ€™usure - Elle garantit lâ€™utilisation de tout le volume dâ€™encre, Ã©crit proprement et sans tache du dÃ©but jusquâ€™Ã  la fin - Couleur Bleu', 85, 'Ecriture'),
('Stylo Ã  bille Staedtler...', 0.65, 'https://www.tunisianet.com.tn/135947-home/stylo-a-bille-staedtler-stick-430-035mm-rouge.jpg', 'Stylo Ã  bille Staedtler Stick 430Â - Couleur Rouge - Largeur de trait moyenne: 0.35 mm - Stylo-bille avec capuchon et clip - SÃ©curitÃ© avion : Ã©quilibrage automatique de la pression empÃªchant l&#039;&#039;encre de fuir', 98, 'Ecriture'),
('Stylo Staedtler Luna Rite-C / 0.5 mm / Bleu', 0.6, 'https://www.tunisianet.com.tn/37501-home/stylo-staedtler-luna-rite-c-05-mm-bleu.jpg', 'Stylo Staedtler Luna Rite-C - Epaisseur de trait: 0.5 mm - Ecriture fluide sans effortÂ - Rechargeable - Couleur Bleu', 31, 'Ecriture'),
('Taille Crayon Simple Ark-573', 0.7, 'https://www.tunisianet.com.tn/150658-home/taille-crayon-simple-ark-573.jpg', 'Taille Crayon Simple Ark-573 - MatiÃ¨re: plastique', 9, 'Ecriture');

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `id_promo` int(2) NOT NULL,
  `Perc_promo` int(3) NOT NULL,
  `dat_promo` date NOT NULL,
  `img_promo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id_rec` int(11) NOT NULL,
  `avis_client` varchar(500) NOT NULL,
  `etat_com` varchar(30) NOT NULL,
  `libelle` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `pseudo_u` varchar(15) NOT NULL,
  `mdp_u` varchar(20) NOT NULL,
  `image_u` varchar(200) NOT NULL,
  `nom_u` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`pseudo_u`, `mdp_u`, `image_u`, `nom_u`) VALUES
('chedli', 'loliman', 'chedli.jpg', 'Chedli Elloumi'),
('hazem', '1234', 'hazem.jpg', 'Hazem Hamdeni'),
('mootez', '1234', 'mootez.jpg', 'Mootez Khemiri'),
('nour', '1234', 'nour.jpg', 'Nour Zidi'),
('ons', '1234', 'ons.jpg', 'Ons Chemakh');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`nom_cat`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id_code`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_com`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id_liv`),
  ADD KEY `liv` (`id_com`);

--
-- Index pour la table `livreur`
--
ALTER TABLE `livreur`
  ADD PRIMARY KEY (`id_livreur`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_pan`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`nom_prod`),
  ADD KEY `cat` (`nom_cat`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id_promo`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id_rec`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`pseudo_u`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `code`
--
ALTER TABLE `code`
  MODIFY `id_code` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_com` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id_liv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `livreur`
--
ALTER TABLE `livreur`
  MODIFY `id_livreur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id_pan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id_promo` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id_rec` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `liv` FOREIGN KEY (`id_com`) REFERENCES `commande` (`id_com`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `cat` FOREIGN KEY (`nom_cat`) REFERENCES `categorie` (`nom_cat`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
