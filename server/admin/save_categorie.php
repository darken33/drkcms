<?
/* save_categorie.php - Sauvegarde d'une catégorie pour drkCMS
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
  $nom=str_replace("'",'&#039;',$nom);
  $description=str_replace("'",'&#039;',$description);
  
  if ($nom=="") 
  {
    $error="Veuillez saisir le nom de la catégorie.";
  }  
  // S'il y a eu une erreur 
  if ($error!="")
  {
    $page=$session->parseURL("edit_categorie.php","error=$error");
    header("Location: $page");    
    exit();
  }
  
  // On est en creation ou en modification
  $date=date("Y-m-d")." ".date("H:i:s");
  mysql_connect($CONFIG["dbhost"],$CONFIG["dbuser"],$CONFIG["dbpassword"]);
  mysql_select_db($CONFIG["dbdatabase"]);
  if ($id=="")
  {
    $requete="INSERT INTO `".$CONFIG['dbprefix']."categorie` ( `id` , `name` , `description` , `numord` , `date` ) VALUES ('', '$nom', '$description', '$numord', '$date');";
    $res=mysql_query($requete);    
    if (!$res)
    {
      $page=$session->parseURL("edit_categorie.php","error=".mysql_error()."%20(".mysql_errno().")%20");
      header("Location: $page");    
      exit();
    }
  }
  else
  {
    $requete="UPDATE `".$CONFIG['dbprefix']."categorie` SET `name` = '$nom', `description` = '$description', `numord` = '$numord', `date` = '$date' WHERE `id` = '$id' LIMIT 1;";
    $res=mysql_query($requete);    
    if (!$res)
    {
      $page=$session->parseURL("edit_categorie.php","error=".mysql_error()."%20(".mysql_errno().")%20&cat=$cat");
      header("Location: $page");    
      exit();
    }
  }
  
  // Retour à la liste de categories
  $page=$session->parseURL("admin_categories.php");
  header("Location: $page");
  exit();
?>
