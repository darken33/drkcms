<?
/*
 * 03/27/2004 - 13:14:21
 *
 * index.php - Login administration pour drkCMS
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
  require("inc/header.inc.php");
?>
      <!-- Le DIV main -->
      <div class="main">
        <div class="box2"> 
          <h2 class="box">Panneau d'Administration</h2>
          <div class="admin">
            <form action="admin_categories.php" method="post">
              <strong>Mode de passe Administrateur</strong><br />
              <input type="password" name="passwd" value="" /><br />
              <br />
              <input class="bouton" type="submit" name="action" value="Connecter" />
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
