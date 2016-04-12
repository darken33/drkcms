<?php
  global $HTTP_POST_VARS;
  global $HTTP_GET_VARS;
  global $HTTP_SERVER_VARS;

  // On récupère l'action sur la page
  $step5=(isset($HTTP_POST_VARS['step5'])?$HTTP_POST_VARS['step5']:(isset($HTTP_GET_VARS['step5'])?$HTTP_GET_VARS['step5']:""));

  // Vérification de la provenance
  if (!(isset($step4) and $step4=="Suivant") and
      $step5=="" and
      !(isset($step6) and $step6=="Retour"))
  {
    header("Location: index.php");
    exit;
  }
  // On récupère les variables
  $install_type=(isset($HTTP_POST_VARS['install_type'])?$HTTP_POST_VARS['install_type']:(isset($HTTP_GET_VARS['install_type'])?$HTTP_GET_VARS['install_type']:""));  
  $install_dbtype=(isset($HTTP_POST_VARS['install_dbtype'])?$HTTP_POST_VARS['install_dbtype']:(isset($HTTP_GET_VARS['install_dbtype'])?$HTTP_GET_VARS['install_dbtype']:""));  
  $install_dbhost=(isset($HTTP_POST_VARS['install_dbhost'])?$HTTP_POST_VARS['install_dbhost']:(isset($HTTP_GET_VARS['install_dbhost'])?$HTTP_GET_VARS['install_dbhost']:""));  
  $install_dbuser=(isset($HTTP_POST_VARS['install_dbuser'])?$HTTP_POST_VARS['install_dbuser']:(isset($HTTP_GET_VARS['install_dbuser'])?$HTTP_GET_VARS['install_dbuser']:""));  
  $install_dbpass=(isset($HTTP_POST_VARS['install_dbpass'])?$HTTP_POST_VARS['install_dbpass']:(isset($HTTP_GET_VARS['install_dbpass'])?$HTTP_GET_VARS['install_dbpass']:""));  
  $install_dbname=(isset($HTTP_POST_VARS['install_dbname'])?$HTTP_POST_VARS['install_dbname']:(isset($HTTP_GET_VARS['install_dbname'])?$HTTP_GET_VARS['install_dbname']:""));  
  $install_dbprefix=(isset($HTTP_POST_VARS['install_dbprefix'])?$HTTP_POST_VARS['install_dbprefix']:(isset($HTTP_GET_VARS['install_dbprefix'])?$HTTP_GET_VARS['install_dbprefix']:""));  
  
  // Y a t'il une action particulière
  switch ($step5)
  {
    // On passe à l'étape suivante
    case "Suivant" : include("dbperms.php");
                     exit;
                     break; 
    case "Retour"  : include("dbparam.php");
                     exit;
                     break;                 
  }  
?>  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title>drkCMS - Installation</title> 
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
    <link rel="stylesheet" type="text/css" href="../themes/default/style.css">
  </head> 
  <body>
    <div class="body">
      <div class="head">
        <div class="title">
          <h1 class="title">drkCMS - Installation</h1>
        </div>
        <hr />
        <div class="navbar">
          Verifications sur la Base de Données
        </div>
        <hr />
      </div>
      <br />
      <br />
      <div class="categorie" style="text-align:center; padding-top: 2em;">
        <p>Vérification des paramètres et de l'existence de la base de données</p>
        <form action="dbaccess.php" method="post">
<?php  echo '<input type="hidden" name="install_type" value="'.$install_type.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbhost" value="'.$install_dbhost.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbname" value="'.$install_dbname.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbpass" value="'.$install_dbpass.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbprefix" value="'.$install_dbprefix.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbtype" value="'.$install_dbtype.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbuser" value="'.$install_dbuser.'" />'; ?>
<?php 
  $link=mysql_connect($install_dbhost,$install_dbuser,$install_dbpass);
  if (!$link)
  {
    echo '<img src="no.gif" alt="*KO*" border="0"> La connection au serveur '.$install_dbhost.' a échouée.<br>';
    $error="erreur, ".mysql_errno()." ".mysql_error()."<br />Vérifiez vos paramêtres et réessayez.<br />";
  }
  else
  {
    echo '<img src="yes.gif" alt="*OK*" border="0"> La connection au serveur '.$install_dbhost.' a réussi.<br>';
    $res=mysql_select_db($install_dbname,$link);
    if (!$res)
    {
      echo '<img src="no.gif" alt="*KO*" border="0"> La base de données '.$install_dbname." n'a pas été trouvée.<br>";
      $error="erreur, ".mysql_errno()." ".mysql_error()."<br />Veuillez créer la base de données et réessayez.<br />";      
    }
    else
    {
      echo '<img src="yes.gif" alt="*OK*" border="0"> La base de données '.$install_dbname.' existe.<br>';
    }
  }
?>        
          <p>
<?php
  if (!isset($error) or $error=="") echo "La base existe et les parmètres de connection sont corrects.";
  else echo $error;
?>          
          </p>
          <p id="submitbutton3">
            <input name="step5" value="Retour" type="submit">          
<?php     
  if (!isset($error) or $error=="") echo '<input name="step5" value="Suivant" type="submit">';
  else echo '<input name="step5" value="Refaire" type="submit">';
?>            
          </p>
        </form>
        <br>
      </div>
      <br />
      <br />
      <hr />
      <div class="footinst">
        Etape 5 - Verifications sur la Base de Données
      </div>     
    </div>
  </body>
</html>        

