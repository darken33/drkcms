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
  $error="";
  // Controles des rubriques
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
    $requete="INSERT INTO rubrique ( id, categorie , name , description , link , numord , date ) VALUES ('', '$cat', '$nom', '$description' , '$lien', '$numord', '$date');";
    mysql_query($requete);    
//  echo $requete."\n";
  }
  else
  {
    $requete="UPDATE rubrique SET name = '$nom', description = '$description' , link = '$lien', numord = '$numord', date = '$date' WHERE id = '$id' LIMIT 1;";
    mysql_query($requete);    
//  echo $requete."\n";
  }
  
  // Retour à la liste de categories
  $page=$session->parseURL("admin_rubriques.php","cat=$cat");
  header("Location: $page");
  exit();
?>
