<?php
  global $HTTP_POST_VARS;
  global $HTTP_GET_VARS;
  global $HTTP_SERVER_VARS;

  // On récupère l'action sur la page
  $step6=(isset($HTTP_POST_VARS['step6'])?$HTTP_POST_VARS['step6']:(isset($HTTP_GET_VARS['step6'])?$HTTP_GET_VARS['step6']:""));

  // Vérification de la provenance
  if (!(isset($step5) and $step5=="Suivant") and
      $step6=="" and
      !(isset($step7) and $step7=="Retour"))
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
  switch ($step6)
  {
    // On passe à l'étape suivante
    case "Suivant" : include("dbinstall.php");
                     exit;
                     break; 
    case "Retour"  : include("dbaccess.php");
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
          Permissions sur la base de données
        </div>
        <hr />
      </div>
      <br />
      <br />
      <div class="categorie" style="text-align:center; padding-top: 2em;">         
        <p>
          Pour fonctionner, drkCMS doit posséder les droits suivants sur la base de données : CREATE, DROP, DELETE, UPDATE, SELECT et INSERT      
        </p>
         <form action="dbperms.php" method="post">
          <p style="margin-left: 40%; text-align: left">
<?php  echo '<input type="hidden" name="install_type" value="'.$install_type.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbhost" value="'.$install_dbhost.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbname" value="'.$install_dbname.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbpass" value="'.$install_dbpass.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbprefix" value="'.$install_dbprefix.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbtype" value="'.$install_dbtype.'" />'; ?>
<?php  echo '<input type="hidden" name="install_dbuser" value="'.$install_dbuser.'" />'; ?>
<?php
  $link=mysql_connect($install_dbhost,$install_dbuser,$install_dbpass);
  $id=mysql_select_db($install_dbname,$link);  
  
  mysql_query("CREATE TABLE `drkcms_test` (
                `id` TINYINT NOT NULL AUTO_INCREMENT ,
                `libelle` VARCHAR( 255 ) NOT NULL ,
                PRIMARY KEY ( `id` ));");
  if (mysql_errno()!=0) echo '<img src="no.gif" alt="*KO*" border="0"> CREATE operation interdite<br>';
  else 
  {
    echo '<img src="yes.gif" alt="*OK*" border="0"> CREATE operation permise<br>';        
    mysql_query("INSERT INTO `drkcms_test` ( `id` , `libelle` )
                 VALUES ('1', 'test');");
    if (mysql_errno()!=0) echo '<img src="no.gif" alt="*KO*" border="0"> INSERT operation interdite<br>';
    else
    {
      echo '<img src="yes.gif" alt="*OK*" border="0"> INSERT operation permise<br>';        
      mysql_query("SELECT * FROM `drkcms_test` WHERE `id` = '1' LIMIT 1 ;");
      if (mysql_errno()!=0) echo '<img src="no.gif" alt="*KO*" border="0"> SELECT operation interdite<br>';
      else 
      {
        echo '<img src="yes.gif" alt="*OK*" border="0"> SELECT operation permise<br>';
        mysql_query("UPDATE `drkcms_test` SET `libelle` = 'test2' WHERE `id` = '1' LIMIT 1 ;");
        if (mysql_errno()!=0) echo '<img src="no.gif" alt="*KO*" border="0"> UPDATE operation interdite<br>';
        else 
        { 
          echo '<img src="yes.gif" alt="*OK*" border="0"> UPDATE operation permise<br>';
          mysql_query("DELETE FROM `drkcms_test` WHERE `id` = '1' LIMIT 1 ;");
          if (mysql_errno()!=0) echo '<img src="no.gif" alt="*KO*" border="0"> DELETE operation interdite<br>';
          else
          {
            echo '<img src="yes.gif" alt="*OK*" border="0"> DELETE operation permise<br>';      
            mysql_query("DROP TABLE `drkcms_test`;");
            if (mysql_errno()!=0) echo '<img src="no.gif" alt="*KO*" border="0"> DROP operation interdite<br>';
            else echo '<img src="yes.gif" alt="*OK*" border="0"> DROP operation permise<br>';      
          }
        }
      }  
    }
  }
?>          
          </p>  
          <p>
<?php
  if (mysql_errno()!=0) echo "erreur, ".mysql_errno()." ".mysql_error()."<br />Vérifiez vos paramêtres et réessayez.<br />";
  else echo "Les permissions sur la base de données sont correctes."
?>          
          </p>
          <p id="submitbutton3">
            <input name="step6" value="Retour" type="submit">
<?php
  if  (mysql_errno()!=0) echo '<input name="step6" value="Refaire" type="submit">';
  else echo '<input name="step6" value="Suivant" type="submit">';
?>  
          </p>
        </form>
        <br>
      </div>
      <br />
      <br />
      <hr />
      <div class="footinst">
        Etape 6 - Permissions sur la bases de données
      </div>     
    </div>
  </body>
</html>        

