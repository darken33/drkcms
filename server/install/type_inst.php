<?php
  global $HTTP_POST_VARS;
  global $HTTP_GET_VARS;
  global $HTTP_SERVER_VARS;

  // On récupère l'action sur la page
  $step2=(isset($HTTP_POST_VARS['step2'])?$HTTP_POST_VARS['step2']:(isset($HTTP_GET_VARS['step2'])?$HTTP_GET_VARS['step2']:""));

  // Vérification de la provenance
  if (!(isset($step1) and $step1=="Suivant") and
      $step2=="" and
      !(isset($step3) and $step3=="Retour"))
  {
    header("Location: index.php");
    exit;
  }
  // On récupère les variables
  $install_type=(isset($HTTP_POST_VARS['install_type'])?$HTTP_POST_VARS['install_type']:(isset($HTTP_GET_VARS['install_type'])?$HTTP_GET_VARS['install_type']:""));  
  
  // Y a t'il une action particulière
  switch ($step2)
  {
    // On passe à l'étape suivante
    case "Suivant" : if ($install_type=="")
                     {
                       $error="Veuillez sélectionner un type d'installation";
                     }
                     else
                     {
                       include("perms.php");
                       exit;
                     }  
                     break;
    case "Retour"  : include("index.php");
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
          Type d'installation
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
        <p>Selectionnez le type d'installation à lancer</p>
        <form action="type_inst.php" method="post">
          <p>
            <input name="install_type" value="install" selected="" type="radio"> Nouvelle installation :<br />
            Vous installez drkCMS pour la première fois, ou vous souhaitez écraser
            une ancienne version de drkCMS sans conserver vos données 
          </p>
          <p>
            <input name="install_type" value="update-0.1.2" type="radio"> Mise à jour :<br/>
            Votre version actuelle de drkCMS est comprise entre 0.1 et 0.1.2<br>Attention : Pensez à sauvegarder votre base existante.    
          </p>
          <p id="submitbutton3">
            <input name="step2" value="Suivant" type="submit">
          </p>
        </form>
        <br>
      </div>
      <br />
      <br />
      <hr />
      <div class="footinst">
         Etape 2 - Type d'installation
      </div>     
    </div>
  </body>
</html>
