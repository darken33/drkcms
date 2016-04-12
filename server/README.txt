==============================================================================
drkCMS v0.1.5
Gestionnaire de Contenu WEB
Copyright (c) 2004-2008 Philippe Bousquet <Darken33@free.fr>
http://darken33.free.fr/
Ce logiciel est distribué sous licence Gnu General Public License
==============================================================================

1 FONCTIONNALITEES
2 INSTALLATION
3 COPYRIGHT & LICENCE
4 CHANGELOG
5 CONTENU DE L'ARCHIVE

------------------------------------------------------------------------------

FONCTIONNALITEES
----------------
Merci d'avoir choisi drkCMS. 
Il s'agit d'un outil permettant de générer des site WEB structurés sans pour
autant avoir besoin de grandes connaissances dans l'administration de site
WEB. 

Il permet de structurer son site web à travers des thèmes, et d'écrire des 
articles à l'intérieur de ces thèmes.

------------------------------------------------------------------------------
 
INSTALLATION
------------
Dans un premier temps vous devez décompresser l'archive contenant drkCMS, 
dans le répertoire contenant votre site WEB :
  $ tar xzf drkcms-0.1.tar.gz ./

Ensuite vous devez créer votre base de données sous MySQL
  $ mysql -uroot
  mysql> create database drkcms;
  Query OK, 1 row affected (0.00 sec)

Enfin il suffit d'ouvrir l'application dans votre navigateur web, 
et une procedure d'installation automatique va s'exécuter. 
Vous n'avez plus qu'a suivre les instructions : http://localhost/drkcms-0.1.3/install/.

Vous pouvez alors suprimer le répertoire install $ rm -rf install/

Voila c'est terminé. 

------------------------------------------------------------------------------

COPYRIGHT & LICENSE
-------------------
drkCMS Copyright (c) 2004-2008 Philippe Bousquet

Ce logiciel est distribué selon les termes de la licence Gnu General Public License,
pour plus d'information veuillez consulter le fichier Lincense.txt.

------------------------------------------------------------------------------

CHANGELOG
---------
v0.1.5:
  - Correction de bug de connection à la base si le menu est désactivé

v0.1.4:
  - Correction de bugs liés à des WARNING de variables indéfinies
  
v0.1.3:
  - Ajout d'un installateur automatique
  - Ajout du parametrage de thèmes spécifiques pour les utilisateurs
  - Metrologie : ajout tu tempsde creation de la page
  - Amélioration du fichier de configuration
  - Trie dans les images livrées
  - Mise à jour dela documentation
v0.1.2:
  - Correction d'un bug sur l'attribution de varibles $art, $rub et $cat,
    http://darken33.free.fr/flyspray/index.php?do=details&id=2 et 
    http://darken33.free.fr/flyspray/index.php?do=details&id=3.
  - Problèmes de permissions sur certains fichiers.
v0.1.1: 
  - Correction des bugs liés au variables non définies et register_globals = Off
  - Utilisation des tableaux HTTP_POST_VARS et HTTP_GET_VARS
  - Passage de la variable HTTP_USER_AGENT en global

v0.1 :
  - Première version de drkCMS.
  
------------------------------------------------------------------------------

CONTENU DE L'ARCHIVE
--------------------

drkcms-0.1.5
|   article.php
|   index.php
|   License.txt
|   README.txt
|   
+---admin
|   \---inc
|           
+---help
|       
+---images
|   +---icones
|   \---puces
|           
+---inc
|       
+---modules
|       
+---sql
|       
\---themes
    +---default
    +---desert
    +---sarcelle
    \---tempete

==============================================================================