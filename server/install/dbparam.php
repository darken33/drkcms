<?php
  global $HTTP_POST_VARS;
  global $HTTP_GET_VARS;
  global $HTTP_SERVER_VARS;

  // On récupère l'action sur la page
  $step4=(isset($HTTP_POST_VARS['step4'])?$HTTP_POST_VARS['step4']:(isset($HTTP_GET_VARS['step4'])?$HTTP_GET_VARS['step4']:""));

  // Vérification de la provenance
  if (!(isset($step3) and $step3=="Suivant") and
      $step4=="" and
      !(isset($step5) and $step5=="Retour"))
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
  switch ($step4)
  {
    // On passe à l'étape suivante
    case "Suivant" : if ($install_dbtype=="" ) $error="Veuillez sélectionner un type de Base de Données.";
                     else if ($install_dbhost=="") $error="Veuillez entrer un Serveur pour la base de données.";
                     else if ($install_dbuser=="") $error="Veuillez entrer un Utilisateur pour la connection à la base de données.";
                     else if ($install_dbname=="") $error="Veuillez entrer un Nom de base de données.";    
                     else
                     {
                       include("dbaccess.php");
                       exit;
                     }  
                     break; 
    case "Retour"  : include("perms.php");
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
          Base de données
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
        <p>
          Si cela n'a pas été fait, veuillez créer une base de données et un user pour drkCMS<br>
          <br>
          Les permissions nécessaires sont CREATE, DROP, DELETE, UPDATE, SELECT et INSERT.
        </p>
        <form action="dbparam.php" method="post">
<?php  echo '<input type="hidden" name="install_type" value="'.$install_type.'" />'; ?>
          <div style="text-align:left;">
          <table style="margin-left: 30%;">
            <tbody>
              <tr>
                <td style="text-align: right;">Database type <strong>*</strong>:</td>
                <td>
                  <select name="install_dbtype">
                    <option value="mysql">MySQL</option>
                  <!--  <option value="pgsql">PostgreSQL</option> -->
                  </select>
                </td>
              </tr>
              <tr>
                <td style="text-align: right;">Host <strong>*</strong>:</td>
                <td>
<?php
  echo '<input name="install_dbhost" value="'.$install_dbhost.'" type="text">';
?>                  
                </td>
              </tr>
              <tr>
                <td style="text-align: right;">User <strong>*</strong>:</td>
                <td>
<?php
  echo '<input name="install_dbuser" value="'.$install_dbuser.'" type="text">';
?>                  
                </td>
              </tr>
              <tr>
                <td style="text-align: right;">Password:</td>
                <td>
<?php
  echo '<input name="install_dbpass" value="'.$install_dbpass.'" type="password">';
?>                  
                </td>
              </tr>
              <tr>
                <td style="text-align: right;">Database <strong>*</strong>:</td>
                <td>
<?php
  echo '<input name="install_dbname" value="'.$install_dbname.'" type="text">';
?>                  
                </td>
              </tr>          
              <tr>
                <td style="text-align: right;">Prefix:</td>
                <td>
<?php
  echo '<input name="install_dbprefix" value="'.$install_dbprefix.'" type="text">';
?>                  
                </td>
              </tr>          
            </tbody>
          </table>
          </div>
          <p id="submitbutton3">
            <input name="step4" value="Retour" type="submit">&nbsp;
            <input name="step4" value="Suivant" type="submit">
          </p>
        </form>
        <br>
      </div>
      <br />
      <br />
      <hr />
      <div class="footinst">
        Etape 4 - Bases de données
      </div>     
    </div>
  </body>
</html>        

