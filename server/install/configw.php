<?php
  global $HTTP_POST_VARS;
  global $HTTP_GET_VARS;
  global $HTTP_SERVER_VARS;

  // On récupère l'action sur la page
  $step10=(isset($HTTP_POST_VARS['step10'])?$HTTP_POST_VARS['step10']:(isset($HTTP_GET_VARS['step10'])?$HTTP_GET_VARS['step10']:""));

  // Vérification de la provenance
  if (!(isset($step9) and $step9=="Suivant") and
      $step10=="")
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
  $install_logo=(isset($HTTP_POST_VARS['install_logo'])?$HTTP_POST_VARS['install_logo']:(isset($HTTP_GET_VARS['install_logo'])?$HTTP_GET_VARS['install_logo']:""));  
  $install_keyword=(isset($HTTP_POST_VARS['install_keyword'])?$HTTP_POST_VARS['install_keyword']:(isset($HTTP_GET_VARS['install_keyword'])?$HTTP_GET_VARS['install_keyword']:""));  
  $install_theme=(isset($HTTP_POST_VARS['install_theme'])?$HTTP_POST_VARS['install_theme']:(isset($HTTP_GET_VARS['install_theme'])?$HTTP_GET_VARS['install_theme']:""));  
  $install_webmaster=(isset($HTTP_POST_VARS['install_webmaster'])?$HTTP_POST_VARS['install_webmaster']:(isset($HTTP_GET_VARS['install_webmaster'])?$HTTP_GET_VARS['install_webmaster']:""));  
  $install_adresse=(isset($HTTP_POST_VARS['install_adresse'])?$HTTP_POST_VARS['install_adresse']:(isset($HTTP_GET_VARS['install_adresse'])?$HTTP_GET_VARS['install_adresse']:""));  
  $install_telephone=(isset($HTTP_POST_VARS['install_telephone'])?$HTTP_POST_VARS['install_telephone']:(isset($HTTP_GET_VARS['install_telephone'])?$HTTP_GET_VARS['install_telephone']:""));  
  $install_email=(isset($HTTP_POST_VARS['install_email'])?$HTTP_POST_VARS['install_email']:(isset($HTTP_GET_VARS['install_email'])?$HTTP_GET_VARS['install_email']:""));  
  $install_host=(isset($HTTP_POST_VARS['install_host'])?$HTTP_POST_VARS['install_host']:(isset($HTTP_GET_VARS['install_host'])?$HTTP_GET_VARS['install_host']:""));  
  $install_hostlogo=(isset($HTTP_POST_VARS['install_hostlogo'])?$HTTP_POST_VARS['install_hostlogo']:(isset($HTTP_GET_VARS['install_hostlogo'])?$HTTP_GET_VARS['install_hostlogo']:""));  
  $install_navbar=(isset($HTTP_POST_VARS['install_navbar'])?$HTTP_POST_VARS['install_navbar']:(isset($HTTP_GET_VARS['install_navbar'])?$HTTP_GET_VARS['install_navbar']:""));  
  $install_menu=(isset($HTTP_POST_VARS['install_menu'])?$HTTP_POST_VARS['install_menu']:(isset($HTTP_GET_VARS['install_modhost'])?$HTTP_GET_VARS['install_menu']:""));  
  $install_modadmin=(isset($HTTP_POST_VARS['install_modadmin'])?$HTTP_POST_VARS['install_modadmin']:(isset($HTTP_GET_VARS['install_modadmin'])?$HTTP_GET_VARS['install_modadmin']:""));  
  $install_modthemes=(isset($HTTP_POST_VARS['install_modthemes'])?$HTTP_POST_VARS['install_modthemes']:(isset($HTTP_GET_VARS['install_modthemes'])?$HTTP_GET_VARS['install_modthemes']:""));  
  $install_modwebmaster=(isset($HTTP_POST_VARS['install_modwebmaster'])?$HTTP_POST_VARS['install_modwebmaster']:(isset($HTTP_GET_VARS['install_modwebmaster'])?$HTTP_GET_VARS['install_modwebmaster']:""));  
  $install_modhost=(isset($HTTP_POST_VARS['install_modhost'])?$HTTP_POST_VARS['install_modhost']:(isset($HTTP_GET_VARS['install_modhost'])?$HTTP_GET_VARS['install_modhost']:""));  

  // Y a t'il une action particulière
  switch ($step10)
  {
    // On passe à l'étape suivante
    case "Suivant" : include("end.php");
                     exit;
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
          Sauvegarder les parametres
        </div>  
        <hr />
      </div>
      <br />
      <br />
      <div class="categorie" style="text-align:center; padding-top: 2em;">
         <form action="configw.php" method="post">
<?php echo '<input type="hidden" name="install_type" value="'.$install_type.'" />'; ?>
<?php echo '<input type="hidden" name="install_dbhost" value="'.$install_dbhost.'" />'; ?>
<?php echo '<input type="hidden" name="install_dbname" value="'.$install_dbname.'" />'; ?>
<?php echo '<input type="hidden" name="install_dbpass" value="'.$install_dbpass.'" />'; ?>
<?php echo '<input type="hidden" name="install_dbprefix" value="'.$install_dbprefix.'" />'; ?>
<?php echo '<input type="hidden" name="install_dbtype" value="'.$install_dbtype.'" />'; ?>
<?php echo '<input type="hidden" name="install_dbuser" value="'.$install_dbuser.'" />'; ?>
<?php echo '<input type="hidden" name="install_adminpass" value="'.$install_adminpass.'" />'; ?>
<?php echo '<input name="install_titre" value="'.$install_titre.'" type="hidden">'; ?>
<?php echo '<input name="install_logo" value="'.$install_logo.'" type="hidden">'; ?>
<?php echo '<input name="install_keyword" value="'.$install_keyword.'" type="hidden">'; ?>
<?php echo '<input name="install_theme" value="'.$install_theme.'" type="hidden">'; ?>
<?php echo '<input name="install_webmaster" value="'.$install_webmaster.'" type="hidden">'; ?>
<?php echo '<input name="install_adresse" value="'.$install_adresse.'" type="hidden">'; ?>
<?php echo '<input name="install_telephone" value="'.$install_telephone.'" type="hidden">'; ?>
<?php echo '<input name="install_icq" value="'.$install_icq.'" type="hidden" size="15">'; ?>
<?php echo '<input name="install_email" value="'.$install_email.'" type="hidden">'; ?>
<?php echo '<input name="install_host" value="'.$install_host.'" type="hidden">'; ?>
<?php echo '<input name="install_hostlogo" value="'.$install_hostlogo.'" type="hidden">'; ?>
<?php echo '<input type="hidden" name="install_navbar" value="'.$install_navbar.'"/>'; ?>
<?php echo '<input type="hidden" name="install_menu" value="'.$install_menu.'"/>'; ?>
<?php echo '<input type="hidden" name="install_date" value="'.$install_date.'"/>'; ?>
<?php echo '<input type="hidden" name="install_modadmin" value="'.$install_modadmin.'"/>'; ?>
<?php echo '<input type="hidden" name="install_modthemes" value="'.$install_modthemes.'"/>'; ?>
<?php echo '<input type="hidden" name="install_modwebmaster" value="'.$install_modwebmaster.'"/>'; ?>
<?php echo '<input type="hidden" name="install_modhost" value="'.$install_modhost.'"/>'; ?>
         </td>
          <p>
<?php
  $line[0]='<?'."\n";
  $line[1]='/* config.inc.php - configuration pour drkCMS'."\n";
  $line[2]=' * Générer par l installateur de drkCMS'."\n";
  $line[3]=' */'."\n\n";
  $line[4]='/* NE PAS EDITER */'."\n\n";
  $line[5]='$CONFIG["version"]="0.1.3";'."\n";
  $line[6]='$CONFIG["dbtype"]="'.$install_dbtype.'";'."\n";
  $line[7]='$CONFIG["dbhost"]="'.$install_dbhost.'";'."\n";
  $line[8]='$CONFIG["dbdatabase"]="'.$install_dbname.'";'."\n";
  $line[9]='$CONFIG["dbuser"]="'.$install_dbuser.'";'."\n";
  $line[10]='$CONFIG["dbpassword"]="'.$install_dbpass.'";'."\n";
  $line[11]='$CONFIG["dbprefix"]="'.$install_dbprefix.'";'."\n";
  $line[12]='$CONFIG["password"]="'.md5($install_adminpass).'";'."\n";
  $line[13]='$CONFIG["titre"]="'.$install_titre.'";'."\n";
  $line[14]='$CONFIG["logo"]="'.$install_logo.'";'."\n";
  $line[15]='$CONFIG["keywords"]="'.$install_keyword.'";'."\n";
  $line[16]='$CONFIG["theme"]="'.$install_theme.'";'."\n";
  $line[17]='$CONFIG["webmaster"]="'.$install_webmaster.'";'."\n";
  $line[18]='$CONFIG["adresse"]="'.nl2br($install_adresse).'";'."\n";
  $line[19]='$CONFIG["telephone"]="'.$install_telephone.'";'."\n";
  $line[20]='$CONFIG["email"]="'.$install_email.'";'."\n";
  $line[21]='$CONFIG["icq"]="'.$install_icq.'";'."\n";
  $line[22]='$CONFIG["host"]="'.$install_host.'";'."\n";
  $line[23]='$CONFIG["host_logo"]="'.$install_hostlogo.'";'."\n";
  $line[24]='$CONFIG["navbar"]="'.(($install_navbar=="on")?"Oui":"Non").'";'."\n";
  $line[25]='$CONFIG["menu"]="'.(($install_menu=="on")?"Oui":"Non").'";'."\n";
  $line[26]='$CONFIG["date"]="'.(($install_date=="on")?"Oui":"Non").'";'."\n\n";
  
  $i=0;
  $l=27;
  if ($install_modadmin=="on") $line[$l++]='$MODULES['.$i++.']="modules/admin.mod.php";'."\n";
  if ($install_modthemes=="on") $line[$l++]='$MODULES['.$i++.']="modules/themes.mod.php";'."\n";
  if ($install_modwebmaster=="on") $line[$l++]='$MODULES['.$i++.']="modules/webmaster.mod.php";'."\n";
  if ($install_modhost=="on") $line[$l++]='$MODULES['.$i++.']="modules/hebergeur.mod.php";'."\n";
  $line[$l++]="\n/* FIN FICHIER */\n\n?>";
  
  $fd=fopen("../inc/config.inc.php","w");
  if ($fd) 
  {
    for ($j = 0; $j < sizeof($line); $j++)
    {
      if (!fwrite($fd,$line[$j]))
      {
        $error="Impossible d'ecrire dans le fichier config.inc.php.";
        break;
      }      
    }  
  }
  else $error="Impossible d'ouvrir le fichier config.inc.php.";

  if  (!isset($error)) echo '<img src="yes.gif" alt="*OK*" border="0"> Le fichier de configuration a été créé (inc/config.inc.php)<br>';
  else echo '<img src="no.gif" alt="*KO*" border="0"> Problème durant l\'écriture du fichier de configuration (inc/config.inc.php)<br>';
?>                      
          </p>
          <p>
<?php
  if  ($error) echo $error;
  else echo 'L\'écriture du fichier de configuration s\'est terminée avec succés.';
?>            
          </p>
          <p id="submitbutton3">
            <input name="step10" value="Retour" type="submit">
<?php
  if  ($error) echo '<input name="step10" value="Refaire" type="submit">';
  else echo '<input name="step10" value="Suivant" type="submit">';
?>  
          </p>
        </form>
        <br>
      </div>
      <br />
      <br />
      <hr />
      <div class="footinst">
        Etape 10 - Sauvegarder les parametres
      </div>     
    </div>
  </body>
</html>        

