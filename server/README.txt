==============================================================================
drkCMS v0.1
Gestionnaire de Contenu WEB
Copyright (c) 2004-2005 Philippe Bousquet <Darken33@free.fr>
http://darken33.free.fr/
Ce logiciel est distribu� sous licence Gnu General Public License
==============================================================================

1 FONCTIONNALITEES
2 INSTALLATION
3 COPYRIGHT & LICENCE
4 CONTENU DE L'ARCHIVE

------------------------------------------------------------------------------

FONCTIONNALITEES
----------------
Merci d'avoir choisi drkCMS. 
Il s'agit d'un outil permettant de g�n�rer des site WEB structur�s sans pour
autant avoir besoin de grandes connaissances dans l'administration de site
WEB. 

Il permet de structurer son site web � travers des th�mes, et d'�crire des 
articles � l'int�rieur de ces th�mes.

------------------------------------------------------------------------------
 
INSTALLATION
------------
Dans un premier temps vous devez d�compresser l'archive contenant drkCMS, 
dans le r�pertoire contenant votre site WEB :
  $ tar xzf drkcms-0.1.tar.gz ./

Ensuite vous devez cr�er votre base de donn�es sous MySQL
  $ mysql -uroot
  mysql> create database drkcms;
  Query OK, 1 row affected (0.00 sec)

Enfin executer sous MySQL le contenu du fichier sql/drkcms.sql
Vous pouvez alors suprrimer le r�pertoire sql

Vous pouvez maintenant naviguer en tapant l'adresse suivante sur
votre Navigateur :
  http://localhost/drkcms/

------------------------------------------------------------------------------

COPYRIGHT & LICENSE
-------------------
drkCMS Copyright (c) 2004-2005 Philippe Bousquet

Ce logiciel est distribu� selon les termes de la licence Gnu General Public License,
pour plus d'information veuillez consulter le fichier Lincense.txt.

------------------------------------------------------------------------------

STRUCTURE DE L'ARCHIVE
----------------------

drkcms-0.1/
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
