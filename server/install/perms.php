<?php
  global $HTTP_POST_VARS;
  global $HTTP_GET_VARS;
  global $HTTP_SERVER_VARS;

  // On récupère l'action sur la page
  $step3=(isset($HTTP_POST_VARS['step3'])?$HTTP_POST_VARS['step3']:(isset($HTTP_GET_VARS['step3'])?$HTTP_GET_VARS['step3']:""));

  // Vérification de la provenance
  if (!(isset($step2) and $step2=="Suivant") and
      $step3=="" and
      !(isset($step4) and $step4=="Retour"))
  {
    header("Location: index.php");
    exit;
  }
  // On récupère les variables
  $install_type=(isset($HTTP_POST_VARS['install_type'])?$HTTP_POST_VARS['install_type']:(isset($HTTP_GET_VARS['install_type'])?$HTTP_GET_VARS['install_type']:""));  
  
  // Y a t'il une action particulière
  switch ($step3)
  {
    // On passe à l'étape suivante
    case "Suivant" : include("dbparam.php");
                     exit;
                     break;
    case "Retour"  : include("type_inst.php");
                     exit;
                     break;                 
  }  
?>
<?php  
  // Tester les autorisations du fichier
  $perms_ok=(is_writable(dirname($HTTP_SERVER_VARS['PATH_TRANSLATED']).'/../inc/config.inc.php') or 
             (!file_exists(dirname($HTTP_SERVER_VARS['PATH_TRANSLATED']).'/../inc/config.inc.php') and
              is_writable(dirname($HTTP_SERVER_VARS['PATH_TRANSLATED']).'/../inc'))) 
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
          Permissions de fichiers
        </div>
        <hr />
      </div>
      <br />
      <br />
      <div class="categorie" style="text-align:center; padding-top: 2em;">
        <p>Vérification des permissions des fichiers et dossier</p>
        <form action="perms.php" method="post">
<?php        
  echo '<input type="hidden" name="install_type" value="'.$HTTP_POST_VARS['install_type'].'" />'
?>        
          <p>
<?php
  if ($perms_ok) echo '<img src="yes.gif" alt="*OK*" border="0"> Le fichier includes/config.inc.php est autorisé en écriture<br />';      
  else echo '<img src="no.gif" alt="*KO*" border="0"> '."Le fichier includes/config.inc.php n'est pas autorisé en écriture<br />";      
?>  
          </p>
          <p>
<?php
  if ($perms_ok) echo 'Les permissions des fichiers sont correctes !';
  else echo 'Les permissions des fichiers sont incorrectes, veuillez les changer et réessayer !';
?>
          </p>
          <p id="submitbutton3">
            <input name="step3" value="Retour" type="submit">&nbsp;
<?php
  if ($perms_ok) echo '<input name="step3" value="Suivant" type="submit">';
  else echo '<input name="step3" value="Refaire" type="submit">';
?>
          </p>
        </form>
        <br>
      </div>
      <br />
      <br />
      <hr />
      <div class="footinst">
         Etape 3 - Permissions
      </div>     
    </div>
  </body>
</html>
