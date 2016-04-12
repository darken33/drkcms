<?
/*
 * 03/27/2004 - 13:14:21
 *
 * edit_rubrique.php - Editer une Rubrique pour drkCMS
 * Copyright (C) 2004 Philippe Bousquet
 * <Darken33@free.fr>
 * http://darken33.free.fr/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */
  require("../inc/config.inc.php");
  require("inc/admin_header.inc.php");
?>
        <!-- Le DIV navbar -->
        <div class="navbar">
<?
  if ($cat=="") { $cat=1; }
  if ($rub=="")
  {
    $requete="SELECT id, name FROM rubrique WHERE categorie=$cat ORDER BY numord, date DESC;";
    mysql_connect($CONFIG["dbhost"],$CONFIG["dbuser"],$CONFIG["dbpassword"]);
    mysql_select_db($CONFIG["dbdatabase"]);
    $result=mysql_query($requete);
    $row=mysql_fetch_array($result);
    $rub=$row["id"];
  }
  echo '          | <a class="navbar" href="'.$session->parseURL("admin_articles.php","cat=$cat&rub=$rub").'">Articles</a> | <a class="navbar" href="'.$session->parseURL("index.php").'">Déconnecter</a> |'."\n";
?>          
        </div>
      </div>
      <hr />
<?
  if ($error!="")
  {
    echo '      <div class="error">'.$error.'</div>';
    echo '      <hr />'."\n";
  }
?>      
      <!-- Le DIV main -->
      <div class="main">
        <div class="box2"> 
<?        
  if ($art=="")
  {        
    echo '          <h2 class="box">Ajouter un Article  <a href="../help/drkCMS.html#mozTocId848692" target="Help"><img class="help" src="../'.$CONFIG["theme"].'/help.gif" alt="Aide" /></a></h2>'."\n";
    $titre="";
    $intro="";
    $texte="";
    $visible="";
    $numord=1;
  }        
  else
  {
    echo '          <h2 class="box">Editer un Article  <a href="../help/drkCMS.html#mozTocId848692" target="Help"><img class="help" src="../'.$CONFIG["theme"].'/help.gif" alt="Aide" /></a></h2>'."\n";
    $requete="SELECT * FROM article WHERE id=$art;";
    mysql_connect($CONFIG["dbhost"],$CONFIG["dbuser"],$CONFIG["dbpassword"]);
    mysql_select_db($CONFIG["dbdatabase"]);
    $result=mysql_query($requete);
    $row=mysql_fetch_array($result);
    $titre=$row["titre"];
    $intro=$row["intro"];
    $texte=$row["texte"];
    $numord=$row["numord"];
    $visible=$row["visible"];
  }  
?>          
          <div class="admin">
<?          
  echo '            <form action="'.$session->parseURL("save_article.php").'" method="post">'."\n";
  echo '              <input type="hidden" name="cat" value="'.$cat.'" />'."\n";
  echo '              <input type="hidden" name="rub" value="'.$rub.'" />'."\n";
  echo '              <input type="hidden" name="id" value="'.$art.'" />'."\n";
  echo '              <strong>Titre de l\'article</strong><br />'."\n";
  echo '              <input type="text" name="titre" size="50" maxlength="255" value="'.$titre.'" /><br />'."\n";
  echo '              <br />'."\n";
  echo '              <strong>Introduction</strong><br />'."\n";
  echo '              <textarea cols="72" rows="5" name="intro">'.$intro.'</textarea><br />'."\n";
  echo '              <br />'."\n";
  echo '              <strong>Contenu de l\'article</strong><br />'."\n";
  echo '              <textarea cols="72" rows="40" name="texte">'.$texte.'</textarea><br />'."\n";
  echo '              <br />'."\n";
  echo '              <strong>Numero d\'ordre</strong><br />'."\n";
  echo '              <input type="text" name="numord" size="3" maxlength="3" value="'.$numord.'" /><br />'."\n";  
  echo '              <br />'."\n";
  echo '              <strong>Visible</strong><br />'."\n";
  echo '              <select name="visible">'."\n";
  echo '                <option value="Non">Non</option>'."\n";
  if ($visible=="Oui")
  {
    echo '                <option value="Oui" selected>Oui</option>'."\n";
  }
  else
  {  
    echo '                <option value="Oui">Oui</option>'."\n";
  }
?>  
              </select><br />
              <br />
              <input class="bouton" type="submit" name="action" value="Valider" />
            </form>
          </div>
        </div> 
      </div>
      <hr />
      <!-- Le DIV foot -->
<?
  require("inc/footer.inc.php");
?>      
    </div>
  </body>
</html>
