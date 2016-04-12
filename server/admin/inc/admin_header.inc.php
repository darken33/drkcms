<?
/* header.inc.php - ent�te pour drkCMS
 * par Philippe Bousquet <Darken33@free.fr> http://darken33.free.fr/
 * Distribu� sous licence Gnu General Public License
 */

  // R�cup�ration de POST ou GET
  $passwd=(isset($HTTP_POST_VARS["passwd"]?$HTTP_POST_VARS["passwd"]:(isset($HTTP_GET_VARS["passwd"]?$HTTP_GET_VARS["passwd"]:""))
 
  require("inc/session.inc.php");
  require("inc/user.inc.php");
  $session=new Session;
  $user=new User;
  if (!($user->isValid($session)) && !($user->connect($passwd,$CONFIG["password"],$session)))
  {
    header("Location: index.php?error=Mot%20de%20passe%20incorrect.");
    exit();
  } 
  echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
<?
echo '    <title>'.$CONFIG["titre"].'</title>'."\n";
?>
    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<?
 echo '    <meta name="keywords" lang="fr" content="'.$CONFIG["keywords"].'" />'."\n";
 if (ereg("MSIE",$HTTP_USER_AGENT))
 {
   echo '    <link rel="stylesheet" href="../'.$CONFIG["theme"].'/style_ie.css" type="text/css" />'."\n";
 }  
 else
 {
   echo '    <link rel="stylesheet" href="../'.$CONFIG["theme"].'/style.css" type="text/css" />'."\n";
 }  
?>
  </head>
  <body>
    <!-- Le DIV body -->
    <div class="body">
      <!-- Le DIV head -->
      <div class="head">
        <!-- Le DIV title -->
        <div class="title">
<?
  $file="../".$CONFIG["theme"]."/baniere.png";
  if (file_exists($file))
  {
    echo '          <img class="title" src="'.$file.'" alt="'.$CONFIG["titre"].'" />'."\n";
  }
  echo '          <h1 class="title">Panneau d\'administration</h1>'."\n";
?>
        </div>
        <hr />