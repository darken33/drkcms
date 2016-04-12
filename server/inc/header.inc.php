<?
/* header.inc.php - entête pour drkCMS
 * par Philippe Bousquet <Darken33@free.fr> http://darken33.free.fr/
 * Distribué sous licence Gnu General Public License
 */

  /****************************************************
   * PATCH 20050209 : global HTTP_USER_AGENT          *
   * Par Philippe Bousquet <darken33@free.fr          *
   ****************************************************/
   global $HTTP_USER_AGENT;
   global $HTTP_COOKIE_VARS;
   global $HTTP_POST_VARS;

  function utime ()
	{
		$time = explode( " ", microtime());
		$usec = (double)$time[0];
		$sec = (double)$time[1];
		return $sec + $usec;
	}
   
  $start = utime(); 
 if (isset($HTTP_POST_VARS['settheme'])) setcookie("theme_drkCMS",$HTTP_POST_VARS['seltheme'],time()+31536000);
 
   $theme_drkCMS = ((isset($HTTP_POST_VARS['seltheme']))?$HTTP_POST_VARS['seltheme']:((isset($HTTP_COOKIE_VARS['theme_drkCMS']))?$HTTP_COOKIE_VARS['theme_drkCMS']:$CONFIG['theme']));
   $error = ((isset($HTTP_POST_VARS['error']))?$HTTP_POST_VARS['error']:((isset($HTTP_COOKIE_VARS['error']))?$HTTP_COOKIE_VARS['error']:""));
   
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
   echo '    <link rel="stylesheet" href="'.$theme_drkCMS.'/style_ie.css" type="text/css" />'."\n";
 }  
 else
 {
   echo '    <link rel="stylesheet" href="'.$theme_drkCMS.'/style.css" type="text/css" />'."\n";
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
          &nbsp;
<?
  if ($CONFIG['logo']=="defaut") $file=$theme_drkCMS."/baniere.png";
  else $file=$CONFIG['logo'];
  if ($file!="" and file_exists($file))
  {
    echo '          <img class="title" src="'.$file.'" alt="'.$CONFIG["titre"].'" title="'.$CONFIG["titre"].'" />'."\n";
  }        
  else
  {
    echo '          <h1 class="title">'.$CONFIG["titre"].'</h1>'."\n";
  }
?>          
        </div>
        <hr />
        <!-- Le DIV navbar -->
<?
  echo '        <div class="navbar">'."\n";
  if ($CONFIG["navbar"]=="Oui")
  {        
    echo '        |';
    $requete="SELECT * FROM ".$CONFIG['dbprefix']."categorie ORDER BY numord ASC, date DESC;";
    mysql_connect($CONFIG["dbhost"],$CONFIG["dbuser"],$CONFIG["dbpassword"]);
    mysql_select_db($CONFIG["dbdatabase"]);
    $result=mysql_query($requete);
    while ($row=mysql_fetch_array($result))
    {
      echo ' <a class="navbar" href="index.php?cat='.$row["id"].'">'.$row["name"].'</a> |';
    }
    echo "\n";
  }      
  else
  {
    echo date("d/m/Y")." - ".date("H:i:s");
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
