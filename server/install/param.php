<?php
  global $HTTP_POST_VARS;
  global $HTTP_GET_VARS;
  global $HTTP_SERVER_VARS;

  // On récupère l'action sur la page
  $step9=(isset($HTTP_POST_VARS['step9'])?$HTTP_POST_VARS['step9']:(isset($HTTP_GET_VARS['step9'])?$HTTP_GET_VARS['step9']:""));

  // Vérification de la provenance
  if (!(isset($step8) and $step8=="Suivant") and
      $step9=="" and
      !(isset($step10) and $step10=="Retour"))
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
  $install_titre=(isset($HTTP_POST_VARS['install_titre'])?$HTTP_POST_VARS['install_titre']:(isset($HTTP_GET_VARS['install_titre'])?$HTTP_GET_VARS['install_titre']:""));  
  $install_logo=(isset($HTTP_POST_VARS['install_logo'])?$HTTP_POST_VARS['install_logo']:(isset($HTTP_GET_VARS['install_logo'])?$HTTP_GET_VARS['install_logo']:"defaut"));  
  $install_keyword=(isset($HTTP_POST_VARS['install_keyword'])?$HTTP_POST_VARS['install_keyword']:(isset($HTTP_GET_VARS['install_keyword'])?$HTTP_GET_VARS['install_keyword']:""));  
  $install_theme=(isset($HTTP_POST_VARS['install_theme'])?$HTTP_POST_VARS['install_theme']:(isset($HTTP_GET_VARS['install_theme'])?$HTTP_GET_VARS['install_theme']:""));  
  $install_webmaster=(isset($HTTP_POST_VARS['install_webmaster'])?$HTTP_POST_VARS['install_webmaster']:(isset($HTTP_GET_VARS['install_webmaster'])?$HTTP_GET_VARS['install_webmaster']:""));  
  $install_adresse=(isset($HTTP_POST_VARS['install_adresse'])?$HTTP_POST_VARS['install_adresse']:(isset($HTTP_GET_VARS['install_adresse'])?$HTTP_GET_VARS['install_adresse']:""));  
  $install_telephone=(isset($HTTP_POST_VARS['install_telephone'])?$HTTP_POST_VARS['install_telephone']:(isset($HTTP_GET_VARS['install_telephone'])?$HTTP_GET_VARS['install_telephone']:""));  
  $install_icq=(isset($HTTP_POST_VARS['install_icq'])?$HTTP_POST_VARS['install_icq']:(isset($HTTP_GET_VARS['install_icq'])?$HTTP_GET_VARS['install_icq']:""));  
  $install_email=(isset($HTTP_POST_VARS['install_email'])?$HTTP_POST_VARS['install_email']:(isset($HTTP_GET_VARS['install_email'])?$HTTP_GET_VARS['install_email']:""));  
  $install_host=(isset($HTTP_POST_VARS['install_host'])?$HTTP_POST_VARS['install_host']:(isset($HTTP_GET_VARS['install_host'])?$HTTP_GET_VARS['install_host']:""));  
  $install_hostlogo=(isset($HTTP_POST_VARS['install_hostlogo'])?$HTTP_POST_VARS['install_hostlogo']:(isset($HTTP_GET_VARS['install_hostlogo'])?$HTTP_GET_VARS['install_hostlogo']:""));  
  $install_navbar=(isset($HTTP_POST_VARS['install_navbar'])?$HTTP_POST_VARS['install_navbar']:(isset($HTTP_GET_VARS['install_navbar'])?$HTTP_GET_VARS['install_navbar']:""));  
  $install_menu=(isset($HTTP_POST_VARS['install_menu'])?$HTTP_POST_VARS['install_menu']:(isset($HTTP_GET_VARS['install_modhost'])?$HTTP_GET_VARS['install_menu']:""));  
  $install_modadmin=(isset($HTTP_POST_VARS['install_modadmin'])?$HTTP_POST_VARS['install_modadmin']:(isset($HTTP_GET_VARS['install_modadmin'])?$HTTP_GET_VARS['install_modadmin']:""));  
  $install_modthemes=(isset($HTTP_POST_VARS['install_modthemes'])?$HTTP_POST_VARS['install_modthemes']:(isset($HTTP_GET_VARS['install_modthemes'])?$HTTP_GET_VARS['install_modthemes']:""));  
  $install_modwebmaster=(isset($HTTP_POST_VARS['install_modwebmaster'])?$HTTP_POST_VARS['install_modwebmaster']:(isset($HTTP_GET_VARS['install_modwebmaster'])?$HTTP_GET_VARS['install_modwebmaster']:""));  
  $install_modhost=(isset($HTTP_POST_VARS['install_modhost'])?$HTTP_POST_VARS['install_modhost']:(isset($HTTP_GET_VARS['install_modhost'])?$HTTP_GET_VARS['install_modhost']:""));  
  $install_date=(isset($HTTP_POST_VARS['install_date'])?$HTTP_POST_VARS['install_date']:(isset($HTTP_GET_VARS['install_date'])?$HTTP_GET_VARS['install_date']:""));  

  // Y a t'il une action particulière
  switch ($step9)
  {
    // On passe à l'étape suivante
    case "Suivant" : if ($install_titre=="" ) $error="Veuillez saisir un titre pour votre site WEB.";  
                     else if (($install_logo!="" and $install_logo!="defaut") and (!is_file('../'.$install_logo) and !is_file($install_logo))) $error="Le logo $install_logo n'existe pas.";
                     else if ($install_keyword=="") $error="Veuillez saisir au moins un mot clé (pour les moteurs de recherches).";
                     else if (($install_webmaster=="") or ($install_email=="")) $error="Le nom du Webmaster et son email sont obligatoires.";
                     else if (($install_modhost=="on") and ($install_host=="")) $error="Veuillez saisir l'URL de votre hébergeur.";
                     else if (($install_hostlogo!="") and (!is_file('../'.$install_hostlogo) and !is_file($install_hostlogo))) $error="Le logo $install_hostlogo n'existe pas.";
                     else 
                     {
                       include("configw.php");
                       exit;
                     }  
                     break; 
    case "Retour"  : include("admparam.php");
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
          Paramètres du site
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
        <p>Veuillez saisir les paramètres concernant votre site WEB</p>
        <form action="param.php" method="post">
<?php  echo '<input type="hidden" name="install_type" value="'.$install_type.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbhost" value="'.$install_dbhost.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbname" value="'.$install_dbname.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbpass" value="'.$install_dbpass.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbprefix" value="'.$install_dbprefix.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbtype" value="'.$install_dbtype.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbuser" value="'.$install_dbuser.'" />'; ?>
<?php  echo '<input type="hidden" name="install_adminpass" value="'.$install_adminpass.'" />'; ?>
          <div style="text-align:left;">
          <table style="margin-left: 30%;">
            <tbody>
              <tr>
                <td>Titre du site <strong>*</strong>:</td>
                <td><?php echo '<input name="install_titre" value="'.$install_titre.'" type="text" size="30" maxlength="127">'; ?></td>
              </tr>
              <tr>
                <td>Logo du site:</td>
                <td><?php echo '<input name="install_logo" value="'.$install_logo.'" type="text" size="30" maxlength="127">'; ?></td>
              </tr>
              <tr>
                <td>Mots clés séparés par ',' <strong>*</strong>:</td>
                <td><?php echo '<input name="install_keyword" value="'.$install_keyword.'" type="text" size="30" maxlength="127">'; ?></td>
              </tr>
              <tr>
                <td>Thème <strong>*</strong>:</td>
                <td>
                  <select name="install_theme">
<?php                
  $dir=dir('../themes');
  while ($file = $dir->read()) 
  {
    if (($file !='.' && $file!="..") && is_dir('../themes/'.$file)  && is_file('../themes/'.$file.'/style.css'))
    { 
      echo '<option value="themes/'.$file.'"'.(($install_theme=="themes/".$file)?"selected":"").'>'.$file.'</option>';
    }
  }   
?>                  
                  </select>
                </td>
              </tr>
              <tr>
                <td>Webmaster <strong>*</strong>:</td>
                <td><?php echo '<input name="install_webmaster" value="'.$install_webmaster.'" type="text" size="25" maxlength="50">'; ?></td>
              </tr>
              <tr>
                <td style="vertical-align: top">Adresse:</td>
                <td><textarea name="install_adresse" value="" type="text" cols="20" rows="4"><?php echo $install_adresse; ?></textarea></td>
              </tr>
              <tr>
                <td>Téléphone:</td>
                <td><?php echo '<input name="install_telephone" value="'.$install_telephone.'" type="text" size="15" maxlength="25">'; ?></td>
              </tr>
              <tr>
                <td>ICQ:</td>
                <td><?php echo '<input name="install_icq" value="'.$install_icq.'" type="text" size="15" maxlength="25">'; ?></td>
              </tr>
              <tr>
                <td>Email <strong>*</strong>:</td>
                <td><?php echo '<input name="install_email" value="'.$install_email.'" type="text" size="25" maxlength="70">'; ?></td>
              </tr>
              <tr>
                <td>URL Hébergeur:</td>
                <td><?php echo '<input name="install_host" value="'.$install_host.'" type="text" size="30" maxlength="127">'; ?></td>
              </tr>
              <tr>
                <td>Logo Hébergeur:</td>
                <td><?php echo '<input name="install_hostlogo" value="'.$install_hostlogo.'" type="text" size="30" maxlength="255">'; ?></td>
              </tr>
              <tr>
                <td>Afficher la navigation</td>
                <td><?php echo '<input type="checkbox" name="install_navbar" '.(($install_navbar=="on")?"checked":"").'/>'; ?></td>
              </tr>
              <tr>
                <td>Afficher le menu</td>
                <td><?php echo '<input type="checkbox" name="install_menu" '.(($install_menu=="on")?"checked":"").'/>'; ?></td>
              </tr>
              <tr>
                <td>Afficher la date des articles</td>
                <td><?php echo '<input type="checkbox" name="install_date" '.(($install_date=="on")?"checked":"").'/>'; ?></td>
              </tr>
              <tr>
                <td colspan="2" style="text-align: center;">===============</td>
              <tr>
                <td>Module Administration</td>
                <td><input type="checkbox" name="install_modadmin" checked/></td>
              </tr>
              <tr>
                <td>Module Themes</td>
                <td><?php echo '<input type="checkbox" name="install_modthemes"'.(($install_modthemes=="on")?"checked":"").'/>'; ?></td>
              </tr>
              <tr>
                <td>Module Webmaster</td>
                <td><?php echo '<input type="checkbox" name="install_modwebmaster" '.(($install_modwebmaster=="on")?"checked":"").'/>'; ?></td>
              </tr>
              <tr>
                <td>Module Hebergeur</td>
                <td><?php echo '<input type="checkbox" name="install_modhost" '.(($install_modhost=="on")?"checked":"").'/>'; ?></td>
              </tr>
            </tbody>
          </table>
          </div>
          <p id="submitbutton3">
            <input name="step9" value="Retour" type="submit">
            <input name="step9" value="Suivant" type="submit">
          </p>
        </form>
        <br>
      </div>
      <br />
      <br />
      <hr />
      <div class="footinst">
        Etape 9 - Paramètres du site
      </div>     
    </div>
  </body>
</html>        

