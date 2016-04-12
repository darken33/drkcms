<?php
  global $HTTP_POST_VARS;
  global $HTTP_GET_VARS;
  global $HTTP_SERVER_VARS;

  // On récupère l'action sur la page
  $step1=(isset($HTTP_POST_VARS['step1'])?$HTTP_POST_VARS['step1']:(isset($HTTP_GET_VARS['step1'])?$HTTP_GET_VARS['step1']:""));
  
  // Vérification de la provenance
  
  // Y a t'il une action particulière
  switch ($step1)
  {
    // On passe à l'étape suivante
    case "Suivant" : include("type_inst.php");
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
          Bienvenue, dans l'installation de drkCMS
        </div>
        <hr />
      </div>
      <br />
      <br />
      <div class="categorie" style="text-align:center; padding-top: 2em;">
        <p>Merci d'avoir choisi <strong>drkCMS</strong>.</p>
        <form action="index.php" method="post">
          Vous êtes dans l'assistant d'installation de drkCMS v0.1.3,<br />
          celui ci va vous aider à installer et paraméter ce logiciel.<br />
          <br /> 
          Cliquez sur suivant pour continuer l'installation.
          <p>
            <input name="step1" value="Suivant" type="submit" />
          </p>
        </form>
        <br>
      </div>
      <br />
      <br />
      <hr />
      <div class="footinst">
         Etape 1 - Présentation
      </div>     
    </div>
  </body>
</html>
