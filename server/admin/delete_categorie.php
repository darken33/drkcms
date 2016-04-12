<?
/* save_categorie.php - Sauvegarde d'une catégorie pour drkCMS
 * par Philippe Bousquet <Darken33@free.fr> http://darken33.free.fr/
 * Distribué sous licence Gnu General Public License
 */

  /****************************************************
   * PATCH 20050209 : utilisations HTTP_POST_VARS     *
   * Par Philippe Bousquet <darken33@free.fr          *
   ****************************************************/
   $cat=(isset($HTTP_POST_VARS["cat"])?$HTTP_POST_VARS["cat"]:(isset($HTTP_GET_VARS["cat"])?$HTTP_GET_VARS["cat"]:""));
 
  require("../inc/config.inc.php");
  // Verifiaction des autorisations
  require("inc/session.inc.php");
  require("inc/user.inc.php");
  $session=new Session;
  $user=new User;
  if (!($user->isValid($session)) && !($user->connect($passwd,$CONFIG["password"],$session)))
  {
    header("Location: index.php?error=Mot%20de%20passe%20incorrect.");
    exit();
  } 
 
  // Verif existence Categorie
  mysql_connect($CONFIG["dbhost"],$CONFIG["dbuser"],$CONFIG["dbpassword"]);
  mysql_select_db($CONFIG["dbdatabase"]);
  $requete="SELECT * from `".$CONFIG['dbprefix']."categorie` WHERE `id` = '$cat'";
  $result=mysql_query($requete);    
  if (mysql_num_rows($result)==0)
  {
    $error="La Categorie est inexistante en base.";
    $page=$session->parseURL("admin_rubriques.php","error=$error");
    header("Location: $page");    
    exit();
  }
  
  // Verif non existence Articles
  $requete="SELECT * from `".$CONFIG['dbprefix']."rubrique` WHERE `categorie` = '$cat'";
  $result=mysql_query($requete);    
  if (mysql_num_rows($result)!=0)
  {
    $error="Veuillez d'abord supprimer toutes les rubriques de la categorie.";
    $page=$session->parseURL("admin_categories.php","error=$error");
    header("Location: $page");    
    exit();
  }
  
  // Suppression de l'article
  $requete="DELETE FROM `".$CONFIG['dbprefix']."categorie` WHERE `id` = '$cat'";
  mysql_query($requete);    
  
  // Retour à la liste de categories
  $page=$session->parseURL("admin_categories.php");
  header("Location: $page");
  exit();
?>
