<?
/*
 * 03/27/2004 - 13:14:21
 *
 * article.php - Page article pour drkCMS
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
   $rub=(isset($HTTP_POST_VARS["rub"])?$HTTP_POST_VARS["rub"]:(isset($HTTP_GET_VARS["rub"])?$HTTP_GET_VARS["rub"]:""));
   $art=(isset($HTTP_POST_VARS["art"])?$HTTP_POST_VARS["art"]:(isset($HTTP_GET_VARS["art"])?$HTTP_GET_VARS["art"]:""));

  // Retour sur la page d'index si sollicité à tort
  if ($art == "") 
  {
    header("Location: index.php");
  }
 
  require("inc/config.inc.php");
  require("inc/header.inc.php");
  require("inc/langage.inc.php");
?>
      <!-- Le DIV main -->
      <div class="main">
        <!-- Le DIV leftpanel -->
        <div class="leftpanel">
<?
  // Afficher le Menu
  if ($CONFIG["menu"]=="Oui")
  {
    echo '          <div class="module">'."\n";
    if ($cat=="") { $cat=1; }
    $requete="SELECT * FROM ".$CONFIG['dbprefix']."categorie WHERE id=$cat;";
    mysql_connect($CONFIG["dbhost"],$CONFIG["dbuser"],$CONFIG["dbpassword"]);
    mysql_select_db($CONFIG["dbdatabase"]);
    $result=mysql_query($requete);
    $row=mysql_fetch_array($result);
    $categorie_name=$row["name"];
    $categorie_desc=$row["description"];
    echo '            <h2 class="module">'.$row["name"].'</h2>'."\n";
    echo '            <ul class="module">'."\n";
    $requete="SELECT * FROM ".$CONFIG['dbprefix']."rubrique WHERE categorie=$cat ORDER BY numord, date DESC;";
    $result=mysql_query($requete);
    while ($row=mysql_fetch_array($result))
    {
      if (($row["link"]!=" ") and ($row["link"]!=""))
      {
        echo '              <li class="module"><a class="module" href="'.$row["link"].'">'.$row["name"].'</a></li>'."\n";
      }
      else
      {
        echo '              <li class="module"><a class="module" href="index.php?cat='.$cat.'&rub='.$row["id"].'">'.$row["name"].'</a></li>'."\n";
      }
    }
    echo '            </ul>'."\n";
    echo '          </div>'."\n";
  }     
?>
<?
  // Charger les modules
  require("inc/modules.inc.php");
?>          
        </div>  
        <hr />
        <!-- le DIV rightpanel -->
        <div class="rightpanel">
          <div class="box"> 
<?
  $requete="SELECT * FROM ".$CONFIG['dbprefix']."article WHERE id=$art;";
  $result=mysql_query($requete);
  $row=mysql_fetch_array($result);
  echo '            <h2 class="box">'.$row["titre"].'</h2>'."\n";
  echo '            <div class="article">'."\n";
  echo translate($row["texte"]);
  echo '            </div>'."\n";
?>            
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
