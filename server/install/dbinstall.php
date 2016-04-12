<?php
  global $HTTP_POST_VARS;
  global $HTTP_GET_VARS;
  global $HTTP_SERVER_VARS;

  // On récupère l'action sur la page
  $step7=(isset($HTTP_POST_VARS['step7'])?$HTTP_POST_VARS['step7']:(isset($HTTP_GET_VARS['step7'])?$HTTP_GET_VARS['step7']:""));

  // Vérification de la provenance
  if (!(isset($step6) and $step6=="Suivant") and
      $step7=="" and
      !(isset($step8) and $step8=="Retour"))
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
  switch ($step7)
  {
    // On passe à l'étape suivante
    case "Suivant" : include("admparam.php");
                     exit;
                     break; 
    case "Retour"  : include("dbperms.php");
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
          Creation de la base de données
        </div>
        <hr />
      </div>
      <br />
      <br />
      <div class="categorie" style="text-align:center; padding-top: 2em;">
        <p>Résultats d'installation</p>
        <form action="dbinstall.php" method="post">
<?php  echo '<input type="hidden" name="install_type" value="'.$install_type.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbhost" value="'.$install_dbhost.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbname" value="'.$install_dbname.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbpass" value="'.$install_dbpass.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbprefix" value="'.$install_dbprefix.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbtype" value="'.$install_dbtype.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbuser" value="'.$install_dbuser.'" />'; ?>
         <p style="margin-left:35%; text-align: left;">
<?php
  include("sql_parse.php");
  $fichier="drkcms_".$install_type.'.sql';
  echo $fichier."<br/>";
  $sql_query = @fread(@fopen("sql/".$fichier, 'r'), @filesize("sql/".$fichier))."\n";
  
  $sql_query = preg_replace('/drkcms_/', $install_dbprefix, $sql_query);
  $sql_query = remove_remarks($sql_query);
  $sql_query = split_sql_file($sql_query, ";");

  $link=mysql_connect($install_dbhost,$install_dbuser,$install_dbpass);
  $id=mysql_select_db($install_dbname,$link);  
  
  $error=false;
  for ($i = 0; $i < sizeof($sql_query); $i++)
  {
    if (trim($sql_query[$i]) != '')
    {
      mysql_query($sql_query[$i]);
      @list($w1, $w2, $w3, $w4, $extra) = split(" ", $sql_query[$i], 5);
      @list($w1, $w2, $w3, $extra) = split(" ", $sql_query[$i], 4);
      if (trim($w4)=="RENAME") $w1=$w4;
      if ($extra!="") $extra="...";
      if (mysql_errno()!=0)
      {
        echo '<img src="no.gif" alt="*KO*" border="0"> '.$w1." ".$w2." ".$w3." ".$extra."<br>";
        if (trim($w1) != "DROP" && trim($w1) != "RENAME")
        { 
          $error = true;
          $err_msg="SQL ".mysql_errno()." : ".mysql_error();
        }  
      }
      else echo '<img src="yes.gif" alt="*OK*" border="0"> '.$w1." ".$w2." ".$w3." ".$extra."<BR>";
    }
  }
?>          
          </p>
          <p>(Les erreurs sur les opéreation DROP et RENAME peuvent être ignorées)</p>
<?php           
  if ($error) echo '<p>'.$err_msg.'</p>';
  else echo '<p>La base de données a été correctement créée.</p>';
?>                
          <p id="submitbutton3">
                        <input name="step7" value="Retour" type="submit">
<?php
  if  ($error) echo '<input name="step7" value="Refaire" type="submit">';
  else echo '<input name="step7" value="Suivant" type="submit">';
?>  
          </p>
        </form>
        <br>
      </div>
      <br />
      <br />
      <hr />
      <div class="footinst">
        Etape 7 - Creation de la base de données
      </div>     
    </div>
  </body>
</html>        

