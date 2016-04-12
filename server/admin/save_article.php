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
    $requete="INSERT INTO `".$CONFIG['dbprefix']."article` ( `id`, `categorie` , `rubrique` , `titre` , `intro`, `texte`, `numord` , `date` , `visible`  ) VALUES ('', '$cat', '$rub', '".htmlspecialchars($titre,ENT_QUOTES)."', '".htmlspecialchars($intro,ENT_QUOTES)."', '".htmlspecialchars($texte,ENT_QUOTES)."', '$numord', '$date', '$visible');";
    $res=mysql_query($requete);    
    if (!$res)
    {
      $page=$session->parseURL("edit_article.php","error=".mysql_error()."%20(".mysql_errno().")%20&cat=$cat&rub=$rub");
      header("Location: $page");    
      exit();
    }
  }
  else
  {
    $requete="UPDATE `".$CONFIG['dbprefix']."article` SET `titre` = '".htmlspecialchars($titre,ENT_QUOTES)."', `intro` = '".htmlspecialchars($intro,ENT_QUOTES)."', `texte` = '".htmlspecialchars($texte,ENT_QUOTES)."', `numord` = '$numord', `date` = '$date', `visible` = '$visible' WHERE `id` = '$id' LIMIT 1;";
    $res=mysql_query($requete);    
    if (!$res)
    {
      $page=$session->parseURL("edit_article.php","error=".mysql_error()."%20(".mysql_errno().")%20&cat=$cat&rub=$rub");
      header("Location: $page");    
      exit();
    }
  }
  // Retour à la liste de categories
  $page=$session->parseURL("admin_articles.php","cat=$cat&rub=$rub&art=$art");
  header("Location: $page");
  exit();
?>
