<?
/*
 * 03/27/2004 - 13:14:21
 *
 * edit_categorie.php - Editer une Catégorie pour drkCMS
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

  /****************************************************
   * PATCH 20050209 : utilisations HTTP_POST_VARS     *
   * Par Philippe Bousquet <darken33@free.fr          *
   ****************************************************/
   $cat=(isset($HTTP_POST_VARS["cat"])?$HTTP_POST_VARS["cat"]:(isset($HTTP_GET_VARS["cat"])?$HTTP_GET_VARS["cat"]:""));

  require("../inc/config.inc.php");
  require("inc/admin_header.inc.php");
?>
        <!-- Le DIV navbar -->
        <div class="navbar">
<?
  echo '          | <a class="navbar" href="'.$session->parseURL("admin_categories.php").'">Catégories</a> | <a class="navbar" href="'.$session->parseURL("index.php").'">Déconnecter</a> |'."\n";
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
  if ($cat=="")
  {        
    echo '          <h2 class="box">Ajouter une Catégorie  <a href="../help/drkCMS.html#mozTocId848692" target="Help"><img class="help" src="../'.$theme_drkCMS.'/help.gif" alt="Aide" /></a></h2>'."\n";
    $nom="";
    $description="";
    $numord=1;
  }        
  else
  {
    echo '          <h2 class="box">Editer une Catégorie  <a href="../help/drkCMS.html#mozTocId848692" target="Help"><img class="help" src="../'.$CONFIG["theme"].'/help.gif" alt="Aide" /></a></h2>'."\n";
    $requete="SELECT * FROM ".$CONFIG['dbprefix']."categorie WHERE id=$cat;";
    mysql_connect($CONFIG["dbhost"],$CONFIG["dbuser"],$CONFIG["dbpassword"]);
    mysql_select_db($CONFIG["dbdatabase"]);
    $result=mysql_query($requete);
    $row=mysql_fetch_array($result);
    $nom=$row["name"];
    $description=$row["description"];
    $numord=$row["numord"];
  }  
?>          
          <div class="admin">
<? 
  echo '            <form action="'.$session->parseURL("save_categorie.php").'" method="post">'."\n";
  echo '              <input type="hidden" name="id" value="'.$cat.'" />'."\n";
  echo '              <strong>Nom de la Catégorie</strong><br />'."\n";
  echo '              <input type="text" name="nom" size="25" maxlength="25" value="'.$nom.'" /><br />'."\n";
  echo '              <br />'."\n";
  echo '              <strong>Description de la catégorie</strong><br />'."\n";
  echo '              <textarea cols="72" rows="10" name="description">'.$description.'</textarea><br />'."\n";
  echo '              <br />'."\n";
  echo '            <strong>Numero d\'ordre</strong><br />'."\n";
  echo '              <input type="text" name="numord" size="3" maxlength="3" value="'.$numord.'" /><br />'."\n";
?>              
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
