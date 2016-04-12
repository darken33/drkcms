<?
/*
 * 03/27/2004 - 13:14:21
 *
 * admin_categories.php - Administration des Catégories pour drkCMS
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
  echo '          | <a class="navbar" href="'.$session->parseURL("index.php").'">Déconnecter</a> |'."\n";
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
          <h2 class="box">Les Catégories du site <a href="../help/drkCMS.html#mozTocId704616" target="Help"><? echo '<img class="help" src="../'.$theme_drkCMS.'/help.gif" alt="Aide" />'; ?></a></h2>
          <div class="admin">
<? echo '            <form action="'.$session->parseURL("edit_categorie.php").'" method="post">'."\n"; ?>
              <input class="bouton" type="submit" name="action" value="Nouvelle Catégorie" />
            </form>
            <table class="admin">
              <tbody>
<?
  $requete="SELECT * FROM ".$CONFIG['dbprefix']."categorie ORDER BY numord, date DESC;";
  mysql_connect($CONFIG["dbhost"],$CONFIG["dbuser"],$CONFIG["dbpassword"]);
  mysql_select_db($CONFIG["dbdatabase"]);
  $result=mysql_query($requete);
  while ($row=mysql_fetch_array($result))
  {
    echo '                <tr>'."\n";
    echo '                  <td><strong>'.$row["name"].'</strong> <em>('.$row["id"].')</em></td>'."\n";
    echo '                  <td><a class="article" href="'.$session->parseURL("edit_categorie.php","cat=".$row["id"]).'">Edition</a></td>'."\n";
    echo '                  <td><a class="article" href="'.$session->parseURL("delete_categorie.php","cat=".$row["id"]).'">Supprimer</a></td>'."\n";
    echo '                  <td><a class="article" href="'.$session->parseURL("admin_rubriques.php","cat=".$row["id"]).'"><em>Les Rubriques</em></a></td>'."\n";
    echo '                </tr>'."\n";
  }  
?>                
              </tbody>
            </table>
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
