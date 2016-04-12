<?php
  global $HTTP_POST_VARS;
  global $HTTP_GET_VARS;
  global $HTTP_SERVER_VARS;

  // On récupère l'action sur la page
  $step8=(isset($HTTP_POST_VARS['step8'])?$HTTP_POST_VARS['step8']:(isset($HTTP_GET_VARS['step8'])?$HTTP_GET_VARS['step8']:""));

  // Vérification de la provenance
  if (!(isset($step7) and $step7=="Suivant") and
      $step8=="" and
      !(isset($step9) and $step9=="Retour"))
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
  $install_adminpass=(isset($HTTP_POST_VARS['install_adminpass'])?$HTTP_POST_VARS['install_adminpass']:(isset($HTTP_GET_VARS['install_adminpass'])?$HTTP_GET_VARS['install_adminpass']:""));  
  $install_adminpass2=(isset($HTTP_POST_VARS['install_adminpass2'])?$HTTP_POST_VARS['install_adminpass2']:(isset($HTTP_GET_VARS['install_adminpass2'])?$HTTP_GET_VARS['install_adminpass2']:""));  

  // Y a t'il une action particulière
  switch ($step8)
  {
    // On passe à l'étape suivante
    case "Suivant" : if ($install_adminpass=="" ) $error="Veuillez saisir un mot de passe.";
                     else if ($install_adminpass!=$install_adminpass2) $error="Mot de passe incorrect."; 
                     else 
                     {
                       include("param.php");
                       exit;
                     }  
                     break; 
    case "Retour"  : include("dbinstall.php");
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
          Compte administrateur
        </div>  
        <hr />
      </div>
      <br />
<?php
  if (isset($error))
  {
    echo '<div class="error">ERREUR : '.$error.'</div>'."\n";
  }
?>      
      <br />
      <div class="categorie" style="text-align:center; padding-top: 2em;">
        <p>Veuillez choisir un mot de passe pour la partie administration du site</p>
        <form action="admparam.php" method="post">
<?php  echo '<input type="hidden" name="install_type" value="'.$install_type.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbhost" value="'.$install_dbhost.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbname" value="'.$install_dbname.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbpass" value="'.$install_dbpass.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbprefix" value="'.$install_dbprefix.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbtype" value="'.$install_dbtype.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbuser" value="'.$install_dbuser.'" />'; ?>
         <div style="text-align:left;">
          <table style="margin-left: 30%;">
            <tbody>
              <tr>
                <td>Mot de passe <strong>*</strong>:</td>
                <td><input name="install_adminpass" value="" type="password"></td>
              </tr>
              <tr>
                <td>Confirmation <strong>*</strong>:</td>
                <td><input name="install_adminpass2" value="" type="password"></td>
              </tr>
            </tbody>
          </table>
          </div>
          <p id="submitbutton3">
            <input name="step8" value="Retour" type="submit">
            <input name="step8" value="Suivant" type="submit">
          </p>
        </form>
        <br>
      </div>
      <br />
      <br />
      <hr />
      <div class="footinst">
        Etape 8 - Compte administrateur
      </div>     
    </div>
  </body>
</html>        

