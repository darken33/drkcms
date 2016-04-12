==============================================================================
drkCMS v0.1.2
Gestionnaire de Contenu WEB
Copyright (c) 2004-2005 Philippe Bousquet <Darken33@free.fr>
http://darken33.free.fr/
Ce logiciel est distribué sous licence Gnu General Public License
==============================================================================

1 FONCTIONNALITEES
2 INSTALLATION
3 GANGELOG
4 COPYRIGHT & LICENCE
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

Enfin executer sous MySQL le contenu du fichier sql/drkcms.sql
Vous pouvez alors suprrimer le répertoire sql

Vous pouvez maintenant naviguer en tapant l'adresse suivante sur
votre Navigateur :
  http://localhost/drkcms/

------------------------------------------------------------------------------
 
CHANGELOG
---------

v0.1.2 :
- Correction d'un bug sur l'attribution de varibles $art, $rub et $cat
  (http://darken33.free.fr/flyspray/index.php?do=details&id=2)
  (http://darken33.free.fr/flyspray/index.php?do=details&id=2)
- Problèmes de permissions sur certains fichiers

v0.1.1 :
- Correction des bugs liés au variables non définies et register_globals = Off
- Utilisation des tableaux HTTP_POST_VARS et HTTP_GET_VARS
- Passage de la variable HTTP_USER_AGENT en global

v0.1 :
- Version initiale

------------------------------------------------------------------------------

COPYRIGHT & LICENSE
-------------------
drkCMS Copyright (c) 2004-2005 Philippe Bousquet

Ce logiciel est distribué selon les termes de la licence Gnu General Public License,
pour plus d'information veuillez consulter le fichier Lincense.txt.

------------------------------------------------------------------------------

STRUCTURE DE L'ARCHIVE
----------------------

drkcms-0.1.1/
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
