==============================================================================
drkCMS v0.1.5
Gestionnaire de Contenu WEB
Copyright (c) 2004-2008 Philippe Bousquet <Darken33@free.fr>
http://darken33.free.fr/
Ce logiciel est distribu� sous licence Gnu General Public License
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

Enfin il suffit d'ouvrir l'application dans votre navigateur web, 
et une procedure d'installation automatique va s'ex�cuter. 
Vous n'avez plus qu'a suivre les instructions : http://localhost/drkcms-0.1.3/install/.

Vous pouvez alors suprimer le r�pertoire install $ rm -rf install/

Voila c'est termin�. 

------------------------------------------------------------------------------

COPYRIGHT & LICENSE
-------------------
drkCMS Copyright (c) 2004-2008 Philippe Bousquet

Ce logiciel est distribu� selon les termes de la licence Gnu General Public License,
pour plus d'information veuillez consulter le fichier Lincense.txt.

------------------------------------------------------------------------------

CHANGELOG
---------
v0.1.5:
  - Correction de bug de connection � la base si le menu est d�sactiv�

v0.1.4:
  - Correction de bugs li�s � des WARNING de variables ind�finies
  
v0.1.3:
  - Ajout d'un installateur automatique
  - Ajout du parametrage de th�mes sp�cifiques pour les utilisateurs
  - Metrologie : ajout tu tempsde creation de la page
  - Am�lioration du fichier de configuration
  - Trie dans les images livr�es
  - Mise � jour dela documentation
v0.1.2:
  - Correction d'un bug sur l'attribution de varibles $art, $rub et $cat,
    http://darken33.free.fr/flyspray/index.php?do=details&id=2 et 
    http://darken33.free.fr/flyspray/index.php?do=details&id=3.
  - Probl�mes de permissions sur certains fichiers.
v0.1.1: 
  - Correction des bugs li�s au variables non d�finies et register_globals = Off
  - Utilisation des tableaux HTTP_POST_VARS et HTTP_GET_VARS
  - Passage de la variable HTTP_USER_AGENT en global

v0.1 :
  - Premi�re version de drkCMS.
  
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