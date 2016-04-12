<?
/* hebergeur.mod.php - Module Infos Hebergeur pour drkCMS
 * par Philippe Bousquet <Darken33@free.fr> http://darken33.free.fr/
 * Distribué sous licence Gnu General Public License
 */

// Indiquez ici le nom de votre hébergeur
$nom_hebergeur="Free.fr";
// Indiquez ici l'URL de votre hebretgeur
$url_hebergeur="http://www.free.fr/";
// Indiquez ici l'image de votre hébergeur
$img_hebergeur=$CONFIG["theme"]."/logofree_120.gif";
?>
          <div class="module">
            <h2 class="module">Hébergeur</h2>
            <div class="compteur">
<?
  echo '              <a href="'.$url_hebergeur.'"><img class="module" src="'.$img_hebergeur.'" alt="Ebergé par '.$nom_hebergeur.'" /></a>'."\n";
?>
            </div>
          </div>
