<?
/* header.inc.php - entête pour drkCMS
 * par Philippe Bousquet <Darken33@free.fr> http://darken33.free.fr/
 * Distribué sous licence Gnu General Public License
 */
  require("inc/session.inc.php");
  require("inc/user.inc.php");
  $session=new Session;
  $user=new User;
  $session->close();
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
  else
  {
    $error="$file fichier inconnue";
    echo '          <h1 class="title">'.$CONFIG["titre"].'</h1>'."\n";
  }
?>
        </div>
        <hr />
        <!-- Le DIV navbar -->
<?
  echo '        <div class="navbar">'."\n";
  echo '        |';
  if ($CONFIG["navbar"]=="Oui")
  {
    $requete="SELECT * FROM categorie ORDER BY numord ASC, date DESC;";
    mysql_connect($CONFIG["dbhost"],$CONFIG["dbuser"],$CONFIG["dbpassword"]);
    mysql_select_db($CONFIG["dbdatabase"]);
    $result=mysql_query($requete);
    while ($row=mysql_fetch_array($result))
    {
      echo ' <a class="navbar" href="../index.php?cat='.$row["id"].'">'.$row["name"].'</a> |';
    }
    echo "\n";
  }
  else
  {
    echo ' <a class="navbar" href="../index.php">Retour au site</a> |';
  }
  echo '        </div>'."\n";
?>
      </div>
      <hr />
<?
  if ($error!="")
  {
    echo '      <div class="error">'.$error.'</div>';
    echo '      <hr />'."\n";
  }
?>
