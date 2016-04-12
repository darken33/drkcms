<?
/* save_article.php - Sauvegarde d'un article pour drkCMS
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
 
  // Controles des rubriques
  if ($titre=="") 
  {
    $error="Veuillez saisir un titre pour l'article.";
  }  
  // S'il y a eu une erreur 
  if ($error!="")
  {
    $page=$session->parseURL("edit_article.php","error=$error&cat=$cat&rub=$rub");
    header("Location: $page");    
    exit();
  }
  
  // On est en creation ou en modification
  $date=date("Y-m-d")." ".date("H:i:s");
  mysql_connect($CONFIG["dbhost"],$CONFIG["dbuser"],$CONFIG["dbpassword"]);
  mysql_select_db($CONFIG["dbdatabase"]);
  if ($id=="")
  {
    $requete="INSERT INTO `article` ( `id`, `categorie` , `rubrique` , `titre` , `intro`, `texte`, `numord` , `date` , `visible`  ) VALUES ('', '$cat', '$rub', '$titre', '$intro', '$texte', '$numord', '$date', '$visible');";
    mysql_query($requete);    
  }
  else
  {
    $requete="UPDATE `article` SET `titre` = '$titre', `intro` = '$intro', `texte` = '$texte', `numord` = '$numord', `date` = '$date', `visible` = '$visible' WHERE `id` = '$id' LIMIT 1;";
    mysql_query($requete);    
  }
  
  // Retour à la liste de categories
  $page=$session->parseURL("admin_articles.php","cat=$cat&rub=$rub");
  header("Location: $page");
  exit();
?>
