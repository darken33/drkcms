<?
/* delete_article.php - Suppression d'un article pour drkCMS
 * par Philippe Bousquet <Darken33@free.fr> http://darken33.free.fr/
 * Distribué sous licence Gnu General Public License
 */

  /****************************************************
   * PATCH 20050209 : utilisations HTTP_POST_VARS     *
   * Par Philippe Bousquet <darken33@free.fr          *
   ****************************************************/
   $cat=(isset($HTTP_POST_VARS["cat"])?$HTTP_POST_VARS["cat"]:(isset($HTTP_GET_VARS["cat"])?$HTTP_GET_VARS["cat"]:""));
   $rub=(isset($HTTP_POST_VARS["rub"])?$HTTP_POST_VARS["rub"]:(isset($HTTP_GET_VARS["rub"])?$HTTP_GET_VARS["rub"]:""));
   $art=(isset($HTTP_POST_VARS["art"])?$HTTP_POST_VARS["art"]:(isset($HTTP_GET_VARS["art"])?$HTTP_GET_VARS["art"]:""));
 
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
 
  // Verif existence Article
  mysql_connect($CONFIG["dbhost"],$CONFIG["dbuser"],$CONFIG["dbpassword"]);
  mysql_select_db($CONFIG["dbdatabase"]);
  $requete="SELECT * from `".$CONFIG['dbprefix']."article` WHERE `id` = '$art'";
  $result=mysql_query($requete);    
  if (mysql_num_rows($result)==0)
  {
    $error="L'article est inxistant en base.";
    $page=$session->parseURL("admin_articles.php","error=$error&cat=$cat&rub=$rub");
    header("Location: $page");    
    exit();
  }
  
  // Suppression de l'article
  $requete="DELETE FROM `".$CONFIG['dbprefix']."article` WHERE `id` = '$art'";
  mysql_query($requete);    
  
  // Retour à la liste de categories
  $page=$session->parseURL("admin_articles.php","cat=$cat&rub=$rub");
  header("Location: $page");
  exit();
?>
