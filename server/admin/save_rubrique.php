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
  $nom=(isset($HTTP_POST_VARS["nom"])?$HTTP_POST_VARS["nom"]:(isset($HTTP_GET_VARS["nom"])?$HTTP_GET_VARS["nom"]:""));
  $description=(isset($HTTP_POST_VARS["description"])?$HTTP_POST_VARS["description"]:(isset($HTTP_GET_VARS["description"])?$HTTP_GET_VARS["description"]:""));
  $numord=(isset($HTTP_POST_VARS["numord"])?$HTTP_POST_VARS["numord"]:(isset($HTTP_GET_VARS["numord"])?$HTTP_GET_VARS["numord"]:""));
  $id=(isset($HTTP_POST_VARS["id"])?$HTTP_POST_VARS["id"]:(isset($HTTP_GET_VARS["id"])?$HTTP_GET_VARS["id"]:""));
  $cat=(isset($HTTP_POST_VARS["cat"])?$HTTP_POST_VARS["cat"]:(isset($HTTP_GET_VARS["cat"])?$HTTP_GET_VARS["cat"]:""));
  $lien=(isset($HTTP_POST_VARS["lien"])?$HTTP_POST_VARS["lien"]:(isset($HTTP_GET_VARS["lien"])?$HTTP_GET_VARS["lien"]:""));
  $error=(isset($HTTP_POST_VARS["error"])?$HTTP_POST_VARS["error"]:(isset($HTTP_GET_VARS["error"])?$HTTP_GET_VARS["error"]:""));
  $passwd=(isset($HTTP_POST_VARS["passwd"])?$HTTP_POST_VARS["passwd"]:(isset($HTTP_GET_VARS["passwd"])?$HTTP_GET_VARS["passwd"]:""));

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
    $error="Veuillez saisir le nom de la rubrique.";
  }  
  // S'il y a eu une erreur 
  if ($error!="")
  {
    $page=$session->parseURL("edit_rubrique.php","error=$error&cat=$cat");
    header("Location: $page");    
    exit();
  }
  
  // On est en creation ou en modification
  $date=date("Y-m-d")." ".date("H:i:s");
  mysql_connect($CONFIG["dbhost"],$CONFIG["dbuser"],$CONFIG["dbpassword"]);
  mysql_select_db($CONFIG["dbdatabase"]);
  if ($id=="")
  {
    $requete="INSERT INTO ".$CONFIG['dbprefix']."rubrique ( id, categorie , name , description , link , numord , date ) VALUES ('', '$cat', '$nom', '$description' , '$lien', '$numord', '$date');";
    $res=mysql_query($requete);    
    if (!$res)
    {
      $page=$session->parseURL("edit_rubrique.php","error=".mysql_error()."%20(".mysql_errno().")%20&cat=$cat");
      header("Location: $page");    
      exit();
    }
//  echo $requete."\n";
  }
  else
  {
    $requete="UPDATE ".$CONFIG['dbprefix']."rubrique SET name = '$nom', description = '$description' , link = '$lien', numord = '$numord', date = '$date' WHERE id = '$id' LIMIT 1;";
    $res=mysql_query($requete);    
    if (!$res)
    {
      $page=$session->parseURL("edit_rubrique.php","error=".mysql_error()."%20(".mysql_errno().")%20&cat=$cat&rub=$rub");
      header("Location: $page");    
      exit();
    }
//  echo $requete."\n";
  }
  
  // Retour à la liste de categories
  $page=$session->parseURL("admin_rubriques.php","cat=$cat");
  header("Location: $page");
  exit();
?>
