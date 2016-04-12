<?
/* save_rubrique.php - Sauvegarde d'une rubrique pour drkCMS
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
 
  // Verif existence Rubrique
  mysql_connect($CONFIG["dbhost"],$CONFIG["dbuser"],$CONFIG["dbpassword"]);
  mysql_select_db($CONFIG["dbdatabase"]);
  $requete="SELECT * from `rubrique` WHERE `id` = '$rub'";
  $result=mysql_query($requete);    
  if (mysql_num_rows($result)==0)
  {
    $error="La rubrique est inexistante en base.";
    $page=$session->parseURL("admin_rubriques.php","error=$error&cat=$cat");
    header("Location: $page");    
    exit();
  }
  
  // Verif non existence Articles
  $requete="SELECT * from `article` WHERE `rubrique` = '$rub'";
  $result=mysql_query($requete);    
  if (mysql_num_rows($result)!=0)
  {
    $error="Veuillez d'abord supprimer tous les articles de la rubrique.";
    $page=$session->parseURL("admin_rubriques.php","error=$error&cat=$cat");
    header("Location: $page");    
    exit();
  }

  // Suppression de l'article
  $requete="DELETE FROM `rubrique` WHERE `id` = '$rub'";
  mysql_query($requete);    
  
  // Retour à la liste de categories
  $page=$session->parseURL("admin_rubriques.php","cat=$cat");
  header("Location: $page");
  exit();
?>
