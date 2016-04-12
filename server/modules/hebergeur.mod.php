<?
/* hebergeur.mod.php - Module Infos Hebergeur pour drkCMS
 * par Philippe Bousquet <Darken33@free.fr> http://darken33.free.fr/
 * Distribué sous licence Gnu General Public License
 */

// Indiquez ici l'URL de votre hebretgeur
$url_hebergeur=$CONFIG["host"];
// Indiquez ici l'image de votre hébergeur
$img_hebergeur=$CONFIG["host_logo"];
?>
          <div class="module">
            <h2 class="module">Hébergeur</h2>
            <div class="compteur">
<?
  echo '              <a href="'.$url_hebergeur.'">'.(($img_hebergeur!="")?'<img class="module" src="'.$img_hebergeur.'" alt="'.$url_hebergeur.'" />':"$url_hebergeur").'</a>'."\n";
?>
            </div>
          </div>
