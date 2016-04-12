<?
/* modules.inc.php - chargement des modules pour drkCMS
 * par Philippe Bousquet <Darken33@free.fr> http://darken33.free.fr/
 * Distribué sous licence Gnu General Public License
 */
 
 for ($i=0; $i<count($MODULES); $i++)
 {
   require($MODULES[$i]);
 }
?>