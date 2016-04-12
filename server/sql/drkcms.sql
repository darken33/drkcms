# phpMyAdmin MySQL-Dump
# version 2.2.6
# http://phpwizard.net/phpMyAdmin/
# http://www.phpmyadmin.net/ (download page)
#
# Serveur: localhost
# G�n�r� le : Lundi 17 Janvier 2005 � 15:12
# Version du serveur: 3.23.49
# Version de PHP: 4.2.0
# Base de donn�es: `drkcms`
# --------------------------------------------------------

#
# Structure de la table `article`
#

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL auto_increment,
  `categorie` tinyint(4) NOT NULL default '1',
  `rubrique` int(11) NOT NULL default '0',
  `titre` varchar(255) NOT NULL default '',
  `intro` text NOT NULL,
  `texte` text NOT NULL,
  `numord` tinyint(4) NOT NULL default '1',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `visible` char(3) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `rubrique` (`rubrique`)
) TYPE=MyISAM;

#
# Contenu de la table `article`
#

INSERT INTO `article` (`id`, `categorie`, `rubrique`, `titre`, `intro`, `texte`, `numord`, `date`, `visible`) VALUES (10, 1, 1, 'Pr�sentation', '', ' [BR]\r\n [B]drkCMS[/B] est un gestionaire de contenu WEB tels que SPIP (mais largement simplifi�), Ecrit en PHP et fonctionnant sur une base de donn�es MySQL. Il fonctionne sur un mod�le Cat�gories / Rubriques / Articles.\r\n\r\n[ICO]images/puces/icon45.gif[/ICO]\r\n[B][U]Qu\'est ce qu\'un CMS ?[/U][/B][BR]\r\nUn syst�me de Gestion de Contenu (SGC) ou Content Management System (CMS) est un outil permettant de g�n�rer des site WEB structur�s sans pour autant avoir besoin de grandes connaissances dans l\'administration de site WEB. Il permet g�n�ralement de structurer son site web � travers des th�mes, et d\'�crire des articles � l\'int�rieur de ces th�mes. Il n�cessite g�nralement un Gestionnaire de Bases de donn�es (souvent MySQL) et un langage permetant de faire fonctionner l\'outil (souvent PHP). Le plus connus des CMS est SPIP : [LINK]http://www.spip.org[/LINK]\r\n\r\n\r\n[ICO]images/puces/icon45.gif[/ICO]\r\n[B][U]Pourquoi drkCMS ?[/U][/B][BR]\r\ndrkCMS est lui aussi un Gestionnaire de Contenu, mais se veut tres simple et minimal : \r\n[LIST]\r\n[ITEM]peu d\'�lements constitue l\'outil de gestion[/ITEM]\r\n[ITEM]seul l\'administrateur (webmaster) peut structurer le site et ajouter des articles [/ITEM]\r\n[ITEM]la prise en main se veut rapide et efficace [/ITEM]\r\n[/LIST]\r\n\r\nil est cependant relativement puissant et modulaire : \r\n[LIST]\r\n[ITEM]on peut facilement l\'interfacer avec toute autre ressource externe (grace aux rubriques externes)[/ITEM]\r\n[ITEM]on peut facilement y int�grer de nouvelle fonctionalit�s grace aux modules[/ITEM]\r\n[ITEM]il permet grace � son langage interne de g�n�rer des pages respectant le XHTML 1.0 [/ITEM]\r\n[ITEM]on peut facilement param�ter la mise en forme graces aux feuilles de styles CSS 2 [/ITEM]\r\n[/LIST]', 1, '2005-01-17 14:49:11', 'Oui');
INSERT INTO `article` (`id`, `categorie`, `rubrique`, `titre`, `intro`, `texte`, `numord`, `date`, `visible`) VALUES (4, 1, 2, 'Installation', '', ' [BR]\r\n[IMG]images/puces/icon45.gif[/IMG]\r\n[B][U]Configuration Requise[/U][/B][BR]\r\n[LIST] \r\n[ITEM]Un serveur HTTP supportant le PHP4[/ITEM] \r\n[ITEM]Le module PHP4[/ITEM] \r\n[ITEM]Un serveur de base de donn�es MySQL[/ITEM] \r\n[/LIST]\r\n\r\n[IMG]images/puces/icon45.gif[/IMG]\r\n[B][U]Configuration Recommend�e[/U][/B][BR]\r\nIl ne s\'agit pas exactement de la configuration recommend�e, mais plut�t de la configuration sur laquelle, j\'ai d�velopp� drkCMS et qui donc est sure de le supporter :\r\n[LIST]\r\n[ITEM]Apache v0.1.2[/ITEM]\r\n[ITEM]PHP 4 v0.1.2[/ITEM]\r\n[ITEM]MySQL v3.2.125[/ITEM]\r\n[/LIST]\r\n\r\n[IMG]images/puces/icon45.gif[/IMG]\r\n[B][U]Installer drkCMS[/U][/B][BR]\r\nDans un premier temps vous devez d�compresser l\'archive contenant drkCMS, dans le r�pertoire contenant votre site WEB :\r\n[CODE]$ tar xzf drkcms-0.1.tar.gz ./[/CODE]\r\nEnsuite vous devez cr�er votre base de donn�es sous MySQL :\r\n[CODE]$ tar xzf drkcms-0.1.tar.gz ./[/CODE]\r\nEnfin executer sous MySQL le contenu du fichier sql/drkcms.sql :\r\n[CODE]$ tar xzf drkcms-0.1.tar.gz ./[/CODE]\r\nVous pouvez alors suprrimer le r�pertoire sql :\r\n[CODE]$ rm -rf sql/[/CODE]\r\n\r\nLe site n\'est cependant pas tout � fait pret, en effet il faut maintenant param�trer drkCMS pour qu\'il prenne en compte toute les informations relatives � votre site WEB.\r\n\r\nAfin de simplifier au maximum la configuration du votre site, tous les param�tres sont stock�s dans le fichier inc/config.inc.php.', 2, '2005-01-17 13:30:10', 'Oui');
INSERT INTO `article` (`id`, `categorie`, `rubrique`, `titre`, `intro`, `texte`, `numord`, `date`, `visible`) VALUES (5, 1, 2, 'Configuration', '', ' [BR]\r\n[IMG]images/puces/icon45.gif[/IMG]\r\n[B][U]La configuration de base :[/U][/B][BR]\r\nVoici les diff�rents champs modifiables pour la configuration de votre site WEB :\r\n[CODE]\r\n[I]//Ceci indique quel est votre serveur MySQL[/I][BR]  $CONFIG["dbhost"]="localhost";[BR]\r\n[I]//Ceci permet de sp�cifier l\'utilisateur MySQL[/I][BR]\r\n$CONFIG["dbuser"]="root";[BR]\r\n[I]//Ceci permet de sp�cifier le Mot de passe de l\'utilisateur MySQL[/I][BR]\r\n$CONFIG["dbpassword"]="";[BR]\r\n[I]//Ceci est le nom de votre Base MySQL[/I][BR]\r\n$CONFIG["dbdatabase"]="drkcms"; [BR]\r\n[I]//Ceci est le titre de votre site web[/I][BR]\r\n$CONFIG["titre"]="drkCMS - Gestionnaire de Contenue WEB"; [BR]\r\n[I]//Ici on sp�cifie les mots cl�s pour les moteurs de recherches[/I][BR]\r\n$CONFIG["keywords"]="drkCMS, Content, Manager, System, CMS, PHP, MySQL, free, software"; [BR]\r\n[I]//Ici on sp�cifie le r�pertoire du th�me � utiliser[/I][BR]\r\n$CONFIG["theme"]="themes/default"; [BR]\r\n[I]//Ici on sp�cifie le mot de passe pour l\'administration du site[BR]\r\n// (ajout d\'articles, de cat�gories, ...)[/I][BR]\r\n$CONFIG["password"]="admin"; [BR]\r\n[I]//Ici on indique le Nom du Webmaster[/I][BR]\r\n$CONFIG["webmaster"]="Philippe Bousquet"; [BR]\r\n[I]//L\'adresse du Webmaster (Facultatif)[/I][BR]\r\n$CONFIG["adresse"]="28 cours du g�n�ral De Gaulle, 33170 Gradignan"; [BR]\r\n[I]//Le numero de t�l�phone du Webmaster (Facultatif)[/I][BR]\r\n$CONFIG["telephone"]="06.61.99.25.84"; [BR]  [I]//L\'email du Webmaster[/I][BR]\r\n$CONFIG["email"]="Darken33@free.fr"; [BR]\r\n[I]//Ici on indique si l\'on veut afficher la bare de navigation [BR]\r\n// (Inutile si vous ne voulez qu\'une seule Cat�gorie)[/I][BR]\r\n$CONFIG["navbar"]="Oui"; [BR]\r\n[I]//Ici on indique si l\'on veut afficher le menu[/I][BR]\r\n$CONFIG["menu"]="Oui"; [BR]\r\n[I]//Ici on indique si l\'on veut afficher la date de cr�ation des articles.[/I][BR]\r\n$CONFIG["date"]="Oui"; [BR]\r\n[/CODE]\r\n[BR]', 3, '2005-01-17 14:55:45', 'Oui');
INSERT INTO `article` (`id`, `categorie`, `rubrique`, `titre`, `intro`, `texte`, `numord`, `date`, `visible`) VALUES (6, 1, 2, 'Les Modules', '', ' [BR]\r\n[IMG]images/puces/icon45.gif[/IMG]\r\n[B][U]Les Modules de drkCMS[/U][/B][BR]\r\ndrkCMS permet l\'ajout de modules sp�cifique dans le panel Gauche (celui du menu), drkCMS est fournit avec 4 Modules :\r\n[CODE]\r\n[I]//Module permetant la connection � l\'administration du site (Ajout, modification d\'Articles)[/I][BR]\r\n$MODULES[0]="modules/admin.mod.php"; [BR]\r\n[I]//Module affichant un compteur de visite (Sp�cifique � Free.fr)[/I][BR]\r\n$MODULES[1]="modules/visiteurs.mod.php"; [BR]\r\n[I]//Module affichant les infos du Webmaster[/I][BR]\r\n$MODULES[2]="modules/webmaster.mod.php"; [BR]\r\n[I]//Module affichant le logo de l\'hebergeur[/I][BR]\r\n$MODULES[3]="modules/hebergeur.mod.php"; [BR]\r\n[/CODE]\r\n\r\nVous pouvez bien entendu modifier les modules ou ajouter vos propres modules, pour cela il suffit de rajouter un �l�ment dans le tableau : [CODE]  $MODULES[4]="modules/monmodule.php"; [/CODE]', 4, '2005-01-17 14:50:30', 'Oui');
INSERT INTO `article` (`id`, `categorie`, `rubrique`, `titre`, `intro`, `texte`, `numord`, `date`, `visible`) VALUES (7, 1, 4, 'Naviguation', '', ' [BR]\r\n[B]drkCMS[/B] se veut tr�s simple, de ce fait il ne comprend que deux pages :\r\n[LIST]\r\n[ITEM]index.php : page principale, qui liste les articles d\'une rubrique[/ITEM]\r\n[ITEM]article.php : cette page affiche le contenu d\'un article[/ITEM]\r\n[/LIST]\r\n\r\n[IMG]images/puces/icon45.gif[/IMG]\r\n[B][U]La page index.php[/U][/B][BR]\r\nCette page est le point d\'entr�e de drkCMS, elle est d�coup�e en 7 parties :\r\n\r\n[U]La partie Ent�te[/U][BR]\r\nS\'il existe un fichier "baniere.png" dans le r�pertoire du th�me du site, drkCMS affichera celui-ci. Sinon il affcihera le titre du site contenu dans le fichier "inc/config.inc.php ".\r\n\r\n[U]La barre de navigation[/U][BR]\r\nCette barre de navigation (si on demande de l\'afficher) permet de s�lectionner une cat�gorie.\r\n\r\n[U]Le menu[/U][BR]\r\nCe menu permet d\'afficher l\'ensemble des rubriques contenus dans la cat�gorie courante.\r\nLe fait de cliquer sur un �l�ment du menu permet d\'afficher la liste des articles de la rubrique concern�e.\r\n\r\n[U]Les modules[/U][BR]\r\nSous le menu on ins�re tous les modules list�s dans le fichier "inc/config.inc.php".\r\n\r\n[U]Description de la cat�gorie[/U][BR]\r\nSi la cat�gorie en cours poss�de un texte de pr�sentation celui ci est affcih�\r\n\r\n[U]La liste des articles[/U][BR]\r\nCette parti affiche la liste des articles contenus dans la rubrique courante.\r\nSi l\'article poss�de un contenu lorsque l\'on clique sur le titre de l\'article, on se d�branche vers la page "article.php".\r\nSi l\'article contient un texte d\'introduction, celui est affich�.\r\n\r\n[U]Le pied de page[/U][BR]\r\nLe pied de page affiche des information sur drkCMS.\r\n\r\n\r\n[IMG]images/puces/icon45.gif[/IMG]\r\n[B][U]La page article.php[/U][/B][BR]\r\nCette page page permet d\'afficher le contenu d\'un article s�lectionn� � partir de la page index.php, elle est d�coup�e en 6 parties :\r\n\r\n[U]La partie Ent�te[/U][BR]\r\nS\'il existe un fichier "baniere.png" dans le r�pertoire du th�me du site, drkCMS affichera celui-ci. Sinon il affcihera le titre du site contenu dans le fichier "inc/config.inc.php".\r\n\r\n[U]La barre de navigation[/U][BR]\r\nCette barre de navigation (si on demande de l\'afficher) permet de s�lectionner une cat�gorie (on retourne sur la page index.php).\r\n\r\n[U]Le menu[/U][BR]\r\nCe menu permet d\'afficher l\'ensemble des rubriques contenus dans la cat�gorie courante.\r\nLe fait de cliquer sur un �l�ment du menu permet d\'afficher la liste des articles de la rubrique concern�e (on retourne sur la page index.php).\r\n\r\n[U]Les modules[/U][BR]\r\nSous le menu on ins�re tous les modules list�s dans le fichier "inc/config.inc.php".\r\n\r\n[U]Le contenu de l\'article[/U][BR]\r\nDans cette partie on affcihe le contenu complet de l\'article s�lectionn�.\r\n\r\n[U]Le pied de page[/U][BR]\r\nLe pied de page affiche des information sur drkCMS.\r\n', 1, '2005-01-17 14:50:48', 'Oui');
INSERT INTO `article` (`id`, `categorie`, `rubrique`, `titre`, `intro`, `texte`, `numord`, `date`, `visible`) VALUES (8, 1, 4, 'Administration', '', ' [BR]\r\nLe module administration inclus dans [B]drkCSM[/B], permet de se connecter au panneau d\'administration du site. Pour cela il suffit de cliquer sur ce connecter, puis d\'entrer le mot de passe d�finit dans le fichier "inc/config.inc.php" $CONFIG["password"].\r\n\r\n[IMG]images/puces/icon45.gif[/IMG]\r\n[B][U]G�rer ses Cat�gories[/U][/B][BR]\r\nUne fois identifi�s vous vous d�brancher sur la liste des cat�gories (ce sont les titre propos�s dans la barre de navigation du site) disponibles sur votre site et vous pouvez alors : \r\n[LIST]\r\n[ITEM]Ajouter une nouvelle cat�gorie [/ITEM]\r\n[ITEM]Editer une cat�gorie existante [/ITEM]\r\n[ITEM]Supprimer une cat�gorie (celle ci ne doit contenir aucune rubrique, ni aucun article). ATTENTION : aucune confirmation n\'est demand� lorsque vous supprimez une cat�gorie [/ITEM]\r\n[ITEM]G�rer les rubriques contenues dans la cat�gorie [/ITEM]\r\n[/LIST]\r\n\r\nUne Cat�gorie est d�finit par : \r\n[LIST]\r\n[ITEM]Un nom (qui saffiche dans la barre de navigation) [/ITEM]\r\n[ITEM]Un descriptif (vous pouvez ici utiliser le langage interne pour agr�menter votre texte)[/ITEM] \r\n[ITEM]Un numero d\'ordre (qui indique la position de la cat�gorie dans la barre de navigation)[/ITEM] \r\n[/LIST]\r\n\r\n[IMG]images/puces/icon45.gif[/IMG]\r\n[B][U]G�rer ses Rubriques[/U][/B][BR]\r\nCette liste permet de g�rer le menu de la cat�gorie courante, en effet vous pouvez : \r\n[LIST]\r\n[ITEM]Ajouter une nouvelle rubrique [/ITEM]\r\n[ITEM]Editer une rubrique existante [/ITEM]\r\n[ITEM]Supprimer une rubrique (celle ci ne doit contenir aucun article). ATTENTION : aucune confirmation n\'est demand� lorsque vous supprimez une rubrique [/ITEM]\r\n[ITEM]G�rer les articles contenus dans la rubrique [/ITEM]\r\n[/LIST]\r\n\r\nUne Rubrique est d�finit par : \r\n[LIST]\r\n[ITEM]Un nom (qui saffiche dans le menu de la Cat�gorie) [/ITEM]\r\n[ITEM]Un descriptif (vous pouvez ici utiliser le langage interne pour agr�menter votre texte)[/ITEM] \r\n[ITEM]Un lien externe (� renseigner si vous voulez pointer vers une ressource externe � drkCMS) [/ITEM]\r\n[ITEM]Un numero d\'ordre (qui indique la position de la rubrique dans le menu) [/ITEM]\r\n[/LIST]\r\n\r\n[IMG]images/puces/icon45.gif[/IMG]\r\n[B][U]G�rer ses Articles[/U][/B][BR]\r\nCette liste permet de g�rer les articles contenus dans une rubrique, en effet vous pouvez : \r\n[LIST]\r\n[ITEM]Ajouter un nouvel article [/ITEM]\r\n[ITEM]Editer un article[/ITEM] \r\n[ITEM]Supprimer un article. ATTENTION : aucune confirmation n\'est demand� lorsque vous supprimez un article[/ITEM] \r\n[ITEM]Pr�visualiser un article [/ITEM]\r\n[/LIST]\r\n\r\nUn Article est d�finit par : \r\n[LIST]\r\n[ITEM]Un titre (qui saffiche dans la liste des articles) [/ITEM]\r\n[ITEM]Une Introduction (vous pouvez ici utiliser le langage interne pour agr�menter votre texte) [/ITEM]\r\n[ITEM]Un Contenu (vous pouvez ici utiliser le langage interne pour agr�menter votre texte) [/ITEM]\r\n[ITEM]Un numero d\'ordre (qui indique la position de l\'article dans la liste) [/ITEM]\r\n[ITEM]Un Etat Visible/Invisible "Invisible" par d�faut(Permet de ne pas afficher un article en cours d\'edition)[/ITEM] \r\n[/LIST]\r\n\r\n[IMG]images/puces/icon45.gif[/IMG]\r\n[B][U]Le Language interne[/U][/B][BR]\r\nAfin d\'agr�menter vos articles vous pouvez utiliser le langage interne d�velopp� pour drkCMS, vous en aurez une description ici : [LINK]help/drkCMS.html#mozTocId848692[/LINK]\r\n\r\n\r\n\r\n', 2, '2005-01-17 14:50:54', 'Oui');
INSERT INTO `article` (`id`, `categorie`, `rubrique`, `titre`, `intro`, `texte`, `numord`, `date`, `visible`) VALUES (9, 1, 5, 'Auteur', ' [B]Philippe Bousquet[/B][BR]\r\n"R�sidence le Vend�me" Apt 21, [BR]\r\n80 rue des Sabli�res 33000 Bordeaux. [BR]\r\nFrance.[BR]\r\n[B]Tel :[/B] 06.61.99.25.84[BR]\r\n[B]Email :[/B] [MAIL]Darken33@free.fr[/MAIL][BR]\r\n[B]Site :[/B] [LINK]http://darken33.free.fr/[/LINK]\r\n', '', 1, '2005-01-17 14:48:22', 'Oui');
# --------------------------------------------------------

#
# Structure de la table `categorie`
#

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE `categorie` (
  `id` tinyint(4) NOT NULL auto_increment,
  `name` varchar(25) NOT NULL default '',
  `description` text NOT NULL,
  `numord` tinyint(4) NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

#
# Contenu de la table `categorie`
#

INSERT INTO `categorie` (`id`, `name`, `description`, `numord`, `date`) VALUES (1, 'Menu', '', 1, '2005-01-17 13:08:06');
# --------------------------------------------------------

#
# Structure de la table `rubrique`
#

DROP TABLE IF EXISTS `rubrique`;
CREATE TABLE `rubrique` (
  `id` int(11) NOT NULL auto_increment,
  `categorie` tinyint(4) NOT NULL default '0',
  `name` varchar(25) NOT NULL default '',
  `description` text NOT NULL,
  `link` varchar(255) NOT NULL default '',
  `numord` tinyint(4) NOT NULL default '1',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

#
# Contenu de la table `rubrique`
#

INSERT INTO `rubrique` (`id`, `categorie`, `name`, `description`, `link`, `numord`, `date`) VALUES (1, 1, 'Accueil', ' [ICO]images/icones/stories.gif[/ICO] Merci d\'avoir choisi [B]drkCMS[/B].\r\nIl s\'agit d\'un outil permettant de g�n�rer des site WEB structur�s sans pour autant avoir besoin de grandes connaissances dans l\'administration de site WEB. Il permet de structurer son site web � travers des th�mes, et d\'�crire des articles � l\'int�rieur de ces th�mes.\r\n\r\nPour plus de renseignement n\'h�sitez pas � me contacter : [MAIL]Darken33@free.fr[/MAIL]', '', 1, '2005-01-17 14:49:32');
INSERT INTO `rubrique` (`id`, `categorie`, `name`, `description`, `link`, `numord`, `date`) VALUES (2, 1, 'Installation', '', '', 2, '2005-01-17 12:56:32');
INSERT INTO `rubrique` (`id`, `categorie`, `name`, `description`, `link`, `numord`, `date`) VALUES (3, 1, 'Manuel Complet', '', 'help/drkCMS.html', 6, '2005-01-17 14:53:45');
INSERT INTO `rubrique` (`id`, `categorie`, `name`, `description`, `link`, `numord`, `date`) VALUES (4, 1, 'Utilisation', '', '', 3, '2005-01-17 14:05:05');
INSERT INTO `rubrique` (`id`, `categorie`, `name`, `description`, `link`, `numord`, `date`) VALUES (5, 1, 'Auteur', '', '', 5, '2005-01-17 14:53:18');
INSERT INTO `rubrique` (`id`, `categorie`, `name`, `description`, `link`, `numord`, `date`) VALUES (6, 1, 'Licence GPL', '', 'License.txt', 4, '2005-01-17 14:53:36');

