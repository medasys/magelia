-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 15 Mars 2015 à 15:49
-- Version du serveur :  5.5.41-MariaDB
-- Version de PHP :  5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `medacloud`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `comments` text CHARACTER SET utf8,
  `archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`, `comments`, `archive`) VALUES
(1, 'vps', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `comments` text CHARACTER SET utf8,
  `archive` tinyint(1) NOT NULL DEFAULT '0',
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `comments` text CHARACTER SET utf8,
  `archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `country`
--

INSERT INTO `country` (`id`, `name`, `comments`, `archive`) VALUES
(1, 'Maroc', NULL, 0),
(2, 'France', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `lastname` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `telephone` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `fax` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `website` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `zip_code` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `country` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `newsletter` tinyint(1) NOT NULL DEFAULT '0',
  `customer` tinyint(1) NOT NULL DEFAULT '0',
  `customer_type_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `customer`
--

INSERT INTO `customer` (`id`, `firstname`, `lastname`, `telephone`, `fax`, `email`, `website`, `address`, `zip_code`, `city`, `country`, `newsletter`, `customer`, `customer_type_id`, `country_id`, `archive`) VALUES
(39, 'Ousmane', 'ChÃ©rif', '00212613059078', '', 'o.cherif@medasys.ma', NULL, 'Hay Riad, Rabat', '10090', 'Rabat', NULL, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `customer_type`
--

CREATE TABLE IF NOT EXISTS `customer_type` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `comments` text CHARACTER SET utf8,
  `archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `customer_type`
--

INSERT INTO `customer_type` (`id`, `name`, `comments`, `archive`) VALUES
(1, 'Un particulier', NULL, 0),
(2, 'Une entreprise', NULL, 0),
(3, 'Un auto-entrepreneur', NULL, 0),
(4, 'Une profession liberale', NULL, 0),
(5, 'Un developpeur', NULL, 0),
(6, 'Une administration ou collectivite territoriale', NULL, 0),
(7, 'Une association', NULL, 0),
(8, 'Un integrateur et revendeur', NULL, 0),
(9, 'Un editeur de logiciel', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `distribution`
--

CREATE TABLE IF NOT EXISTS `distribution` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `small_description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `service` tinyint(1) NOT NULL DEFAULT '0',
  `os_id` int(11) DEFAULT NULL,
  `archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `distribution`
--

INSERT INTO `distribution` (`id`, `name`, `image`, `small_description`, `description`, `service`, `os_id`, `archive`) VALUES
(1, 'RedHat', NULL, NULL, NULL, 0, 2, 0),
(2, 'Debian', NULL, NULL, NULL, 0, 2, 0),
(3, 'Ubuntu', NULL, NULL, NULL, 0, 2, 0),
(4, 'CentOS', NULL, NULL, NULL, 0, 2, 0),
(5, 'Fedora', NULL, NULL, NULL, 0, 2, 0),
(6, 'Windows Server', NULL, NULL, NULL, 0, 1, 0),
(8, 'Drupal', 'drupal.jpg', 'CONCEPTION DE SITES WEB', 'La solution d&eacute;di&eacute; &agrave; la cr&eacute;ation de votre site web, distribu&eacute; en mode SaaS cl&eacute; en main.', 1, 2, 0),
(9, 'Wordpress', 'wordpress.png', 'CONCEPTION DE SITES WEB', 'La solution d&eacute;di&eacute; &agrave; la cr&eacute;ation de votre site web, distribu&eacute; en mode SaaS cl&eacute; en main.', 1, 2, 0),
(10, 'Magento', 'magento.jpg', 'CONCEPTION DE SITES WEB', 'La solution d&eacute;di&eacute; &agrave; la cr&eacute;ation de votre site web, distribu&eacute; en mode SaaS cl&eacute; en main.', 1, 2, 0),
(11, 'Dolibarr', 'dolibarr.jpg', 'CONCEPTION DE SITES WEB', 'La solution d&eacute;di&eacute; &agrave; la cr&eacute;ation de votre site web, distribu&eacute; en mode SaaS cl&eacute; en main.', 1, 2, 0),
(12, 'Zimbra', 'zimbra.jpg', 'CONCEPTION DE SITES WEB', 'La solution d&eacute;di&eacute; &agrave; la cr&eacute;ation de votre site web, distribu&eacute; en mode SaaS cl&eacute; en main.', 1, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `history_license`
--

CREATE TABLE IF NOT EXISTS `history_license` (
  `id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `type` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `license_id` int(11) DEFAULT NULL,
  `vm_id` int(11) DEFAULT NULL,
  `archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `history_license`
--

INSERT INTO `history_license` (`id`, `date`, `type`, `license_id`, `vm_id`, `archive`) VALUES
(1, '2015-03-03 05:00:00', 'Installation', 1, 19, 0);

-- --------------------------------------------------------

--
-- Structure de la table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `index` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `language`
--

INSERT INTO `language` (`id`, `name`, `index`, `archive`) VALUES
(1, 'Francais', 'fr', 0),
(2, 'Anglais', 'en', 0);

-- --------------------------------------------------------

--
-- Structure de la table `licence`
--

CREATE TABLE IF NOT EXISTS `licence` (
  `id` int(11) NOT NULL,
  `num` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `activation_date` datetime DEFAULT NULL,
  `expire_date` datetime DEFAULT NULL,
  `comments` text CHARACTER SET utf8,
  `version_id` int(11) DEFAULT NULL,
  `vm_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `licence`
--

INSERT INTO `licence` (`id`, `num`, `month`, `activation_date`, `expire_date`, `comments`, `version_id`, `vm_id`, `customer_id`, `archive`) VALUES
(1, '43ER5-RFD45-TG78YT-E34DZ-SA2ED', 12, '2015-03-03 00:00:00', '2016-03-03 00:00:00', NULL, 20, 19, 39, 0);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `object` varchar(255) DEFAULT NULL,
  `subject` text,
  `comments` text,
  `archive` tinyint(1) DEFAULT '0',
  `support_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `object` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `subject` text CHARACTER SET utf8,
  `archive` tinyint(1) DEFAULT '0',
  `notification_type_id` int(11) DEFAULT NULL,
  `vm_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `notification_type`
--

CREATE TABLE IF NOT EXISTS `notification_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `comments` text CHARACTER SET utf8,
  `urgent` tinyint(1) DEFAULT '0',
  `archive` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_id` int(11) DEFAULT NULL,
  `archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `order`
--

INSERT INTO `order` (`id`, `date`, `customer_id`, `archive`) VALUES
(15, '2015-01-08 20:17:59', 39, 0),
(16, '2015-03-13 16:54:55', NULL, 0),
(17, '2015-03-13 17:19:02', NULL, 0),
(18, '2015-03-13 17:19:40', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `orderline`
--

CREATE TABLE IF NOT EXISTS `orderline` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `expire_command_date` datetime DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `renewal_date` datetime DEFAULT NULL,
  `command_num` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `invoice_num` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `ht_total` double DEFAULT NULL,
  `tva` int(11) DEFAULT NULL,
  `ttc_total` double DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `expire_date` datetime DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `version_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `validate` tinyint(1) NOT NULL DEFAULT '0',
  `archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `orderline`
--

INSERT INTO `orderline` (`id`, `date`, `expire_command_date`, `creation_date`, `renewal_date`, `command_num`, `invoice_num`, `ht_total`, `tva`, `ttc_total`, `month`, `expire_date`, `product_id`, `version_id`, `order_id`, `validate`, `archive`) VALUES
(19, '2015-01-08 15:19:02', NULL, NULL, NULL, NULL, NULL, 600, 20, 600, 12, '0000-00-00 00:00:00', 3, 20, 15, 1, 0),
(25, '2015-03-10 18:23:09', '2015-03-24 18:23:09', NULL, NULL, '201503001', NULL, 4800, 20, 5760, 24, NULL, 4, 1, 15, 0, 0),
(26, '2015-03-12 18:07:29', '2015-03-26 18:07:29', NULL, NULL, '201503002', NULL, 2160, 20, 2592, 12, NULL, 3, 1, 15, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `os`
--

CREATE TABLE IF NOT EXISTS `os` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `os`
--

INSERT INTO `os` (`id`, `name`, `archive`) VALUES
(1, 'Windows', 0),
(2, 'Linux', 0);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `type` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `cpu` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `ram` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `disk` varchar(50) CHARACTER SET utf32 DEFAULT NULL,
  `traffic` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `bandwidth` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `ddos` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `addr_ip` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `upgrade` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `management` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `reboot` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `monitoring` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `sla` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `ha` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `ht_total` double DEFAULT NULL,
  `tva` int(11) DEFAULT NULL,
  `ttc_total` double DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `type`, `cpu`, `ram`, `disk`, `traffic`, `bandwidth`, `ddos`, `addr_ip`, `upgrade`, `management`, `reboot`, `monitoring`, `sla`, `ha`, `ht_total`, `tva`, `ttc_total`, `status`, `category_id`, `archive`) VALUES
(2, 'Silver', '2 vCores', '2 Go', '40 Go', 'Illimite', '100 Mbps', 'Non', '1 IPv4', 'Migration vers un type superieur a tout moment', 'Espace client/SSH/RDP', 'Illimite, a tout moment', '24/7', NULL, 'Oui', 40, 20, 48, 'static', 1, 0),
(3, 'Gold', '3 vCores', '4 Go', '70 Go', 'Illimite', '100 Mbps', 'Non', '1 IPv4', 'Migration vers un type superieur a tout moment', 'Espace client/SSH/RDP', 'Illimite, a tout moment', '24/7', '99.98% redemarrage en 1h, si panne hardware', 'Oui', 60, 20, 72, 'static', 1, 0),
(4, 'Platinium', '4 vCores', '8 Go', '100 Go', 'Illimite', '100 Mbps', 'Oui', '1 IPv4 & 1 IPv6', NULL, 'Espace client/SSH/RDP', 'Illimite, a tout moment', '24/7', '99.98% redemarrage en 10mn, si panne hardware', 'Oui', 80, 20, 96, 'static', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `support`
--

CREATE TABLE IF NOT EXISTS `support` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `comments` text CHARACTER SET utf8,
  `archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `login` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `last_update_cnx` datetime DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `active`, `last_update_cnx`, `customer_id`, `archive`) VALUES
(22, 'o.cherif@medasys.ma', 'f230a03477eebef4f68f085a08d928cf', 1, NULL, 39, 0);

-- --------------------------------------------------------

--
-- Structure de la table `version`
--

CREATE TABLE IF NOT EXISTS `version` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `template_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `service` tinyint(1) NOT NULL DEFAULT '0',
  `licence` tinyint(1) NOT NULL DEFAULT '0',
  `ht_total` double DEFAULT NULL,
  `tva` int(11) DEFAULT NULL,
  `ttc_total` double DEFAULT NULL,
  `distribution_id` int(10) unsigned DEFAULT NULL,
  `archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `version`
--

INSERT INTO `version` (`id`, `name`, `template_name`, `service`, `licence`, `ht_total`, `tva`, `ttc_total`, `distribution_id`, `archive`) VALUES
(1, 'Windows Server 2008 R2 SP1 Web Edition', NULL, 0, 0, 120, 20, 144, 6, 0),
(2, 'Windows Server 2008 R2 SP1 Core Web Edition', NULL, 0, 0, 100, 20, 120, 6, 0),
(4, 'Windows Server 2008 R2 SP1 Core Standard Edition', NULL, 0, 0, NULL, NULL, NULL, 6, 0),
(5, 'Windows Server 2008 R2 SP1 Core Enterprise Edition', NULL, 0, 0, NULL, NULL, NULL, 6, 0),
(6, 'Windows Server 2008 R2 SP1 Core Datacenter Edition', NULL, 0, 0, NULL, NULL, NULL, 6, 0),
(7, 'Windows Server 2008 R2 SP1 Enterprise Edition', NULL, 0, 0, NULL, NULL, NULL, 6, 0),
(8, 'Windows Server 2008 R2 SP1 Datacenter Edition', NULL, 0, 0, NULL, NULL, NULL, 6, 0),
(9, 'Windows Server 2008 Datacenter Edition SP2', NULL, 0, 0, NULL, NULL, NULL, 6, 0),
(11, 'Windows Server 2012 Datacenter Edition', NULL, 0, 0, NULL, NULL, NULL, 6, 0),
(12, 'Windows Server 2012 R2 Standard Edition', NULL, 0, 0, NULL, NULL, NULL, 6, 0),
(13, 'Windows Server 2012 R2 Datacenter Edition', NULL, 0, 0, NULL, NULL, NULL, 6, 0),
(15, 'Fedora 20', NULL, 0, 0, NULL, NULL, NULL, 5, 0),
(16, 'Ubuntu Server 14.04 LTS', NULL, 0, 0, NULL, NULL, NULL, 3, 0),
(17, 'CentOS 6', NULL, 0, 0, NULL, NULL, NULL, 4, 0),
(18, 'CentOS 7', NULL, 0, 0, NULL, NULL, NULL, 4, 0),
(19, 'Debian 7', NULL, 0, 0, NULL, NULL, NULL, 2, 0),
(20, 'RHEL 6.5 Server', 'rhel-6.5-x86_64-puppet', 0, 0, 200, NULL, NULL, 1, 0),
(21, 'Wordpress 3.8.2', 'template_wordpress', 1, 0, NULL, NULL, NULL, 9, 0),
(22, 'Drupal 7.26', 'template_drupal', 1, 0, NULL, NULL, NULL, 8, 0),
(23, 'Magento 1.8', 'template_magento', 1, 0, NULL, NULL, NULL, 10, 0),
(24, 'Zimbra 8.0.4', 'template_zimbra', 1, 0, NULL, NULL, NULL, 12, 0),
(25, 'Dolibarr 3.6.2', 'template_dolibarr', 1, 0, 300, NULL, NULL, 11, 0);

-- --------------------------------------------------------

--
-- Structure de la table `vm`
--

CREATE TABLE IF NOT EXISTS `vm` (
  `id` int(11) NOT NULL,
  `guid` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `id_api` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `id_hyp` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `renewal_date` datetime DEFAULT NULL,
  `hostname` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `ip_addr` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `comments` text CHARACTER SET utf8,
  `orderline_id` int(11) DEFAULT NULL,
  `create_vm` tinyint(1) NOT NULL DEFAULT '0',
  `archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vm`
--

INSERT INTO `vm` (`id`, `guid`, `id_api`, `id_hyp`, `creation_date`, `renewal_date`, `hostname`, `ip_addr`, `comments`, `orderline_id`, `create_vm`, `archive`) VALUES
(19, NULL, NULL, NULL, '2015-01-08 15:19:02', NULL, 'vps-management', '172.16.10.204', NULL, 19, 1, 0),
(20, NULL, NULL, NULL, NULL, NULL, 'test-vm', NULL, NULL, 26, 0, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`), ADD KEY `country_id` (`country_id`);

--
-- Index pour la table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD KEY `country_id` (`country_id`), ADD KEY `customer_type_id` (`customer_type_id`);

--
-- Index pour la table `customer_type`
--
ALTER TABLE `customer_type`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `distribution`
--
ALTER TABLE `distribution`
  ADD PRIMARY KEY (`id`), ADD KEY `os_id` (`os_id`);

--
-- Index pour la table `history_license`
--
ALTER TABLE `history_license`
  ADD PRIMARY KEY (`id`), ADD KEY `id_license` (`license_id`), ADD KEY `id_vm` (`vm_id`);

--
-- Index pour la table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `licence`
--
ALTER TABLE `licence`
  ADD PRIMARY KEY (`id`), ADD KEY `os_id` (`version_id`), ADD KEY `vm_id` (`vm_id`), ADD KEY `customer_id` (`customer_id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`), ADD KEY `id_support` (`support_id`), ADD KEY `id_user` (`user_id`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`), ADD KEY `notification_type_id` (`notification_type_id`), ADD KEY `user_id` (`customer_id`), ADD KEY `vm_id` (`vm_id`);

--
-- Index pour la table `notification_type`
--
ALTER TABLE `notification_type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`), ADD KEY `customer_id` (`customer_id`);

--
-- Index pour la table `orderline`
--
ALTER TABLE `orderline`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `num` (`invoice_num`), ADD UNIQUE KEY `command_num` (`command_num`), ADD KEY `product_id` (`product_id`), ADD KEY `order_id` (`order_id`), ADD KEY `os_id` (`version_id`);

--
-- Index pour la table `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`), ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `login` (`login`), ADD KEY `customer_id` (`customer_id`);

--
-- Index pour la table `version`
--
ALTER TABLE `version`
  ADD PRIMARY KEY (`id`), ADD KEY `distribution_id` (`distribution_id`);

--
-- Index pour la table `vm`
--
ALTER TABLE `vm`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `hostname` (`hostname`), ADD KEY `orderline_id` (`orderline_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT pour la table `customer_type`
--
ALTER TABLE `customer_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `distribution`
--
ALTER TABLE `distribution`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `history_license`
--
ALTER TABLE `history_license`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `licence`
--
ALTER TABLE `licence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `notification_type`
--
ALTER TABLE `notification_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `orderline`
--
ALTER TABLE `orderline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `os`
--
ALTER TABLE `os`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `version`
--
ALTER TABLE `version`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `vm`
--
ALTER TABLE `vm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `city`
--
ALTER TABLE `city`
ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `customer`
--
ALTER TABLE `customer`
ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
ADD CONSTRAINT `customer_ibfk_3` FOREIGN KEY (`customer_type_id`) REFERENCES `customer_type` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `history_license`
--
ALTER TABLE `history_license`
ADD CONSTRAINT `history_license_ibfk_1` FOREIGN KEY (`license_id`) REFERENCES `licence` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
ADD CONSTRAINT `history_license_ibfk_2` FOREIGN KEY (`vm_id`) REFERENCES `vm` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `licence`
--
ALTER TABLE `licence`
ADD CONSTRAINT `licence_ibfk_1` FOREIGN KEY (`version_id`) REFERENCES `version` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
ADD CONSTRAINT `licence_ibfk_2` FOREIGN KEY (`vm_id`) REFERENCES `vm` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
ADD CONSTRAINT `licence_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`support_id`) REFERENCES `support` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`notification_type_id`) REFERENCES `notification_type` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`vm_id`) REFERENCES `vm` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
ADD CONSTRAINT `notification_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `order`
--
ALTER TABLE `order`
ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `orderline`
--
ALTER TABLE `orderline`
ADD CONSTRAINT `orderline_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
ADD CONSTRAINT `orderline_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
ADD CONSTRAINT `orderline_ibfk_4` FOREIGN KEY (`version_id`) REFERENCES `version` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `version`
--
ALTER TABLE `version`
ADD CONSTRAINT `version_ibfk_1` FOREIGN KEY (`distribution_id`) REFERENCES `distribution` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `vm`
--
ALTER TABLE `vm`
ADD CONSTRAINT `vm_ibfk_1` FOREIGN KEY (`orderline_id`) REFERENCES `orderline` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
