<?
/* delete_article.php - Suppression d'un article pour drkCMS
 * par Philippe Bousquet <Darken33@free.fr> http://darken33.free.fr/
 * Distribué sous licence Gnu General Public License
 */
 
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
  $requete="SELECT * from `article` WHERE `id` = '$art'";
  $result=mysql_query($requete);    
  if (mysql_num_rows($result)==0)
  {
    $error="L'article est inxistant en base.";
    $page=$session->parseURL("admin_articles.php","error=$error&cat=$cat&rub=$rub");
    header("Location: $page");    
    exit();
  }
  
  // Suppression de l'article
  $requete="DELETE FROM `article` WHERE `id` = '$art'";
  mysql_query($requete);    
  
  // Retour à la liste de categories
  $page=$session->parseURL("admin_articles.php","cat=$cat&rub=$rub");
  header("Location: $page");
  exit();
?>
