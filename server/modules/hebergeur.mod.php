<?
/* hebergeur.mod.php - Module Infos Hebergeur pour drkCMS
 * par Philippe Bousquet <Darken33@free.fr> http://darken33.free.fr/
 * Distribu� sous licence Gnu General Public License
 */

// Indiquez ici le nom de votre h�bergeur
$nom_hebergeur="Free.fr";
// Indiquez ici l'URL de votre hebretgeur
$url_hebergeur="http://www.free.fr/";
// Indiquez ici l'image de votre h�bergeur
$img_hebergeur=$CONFIG["theme"]."/logofree_120.gif";
?>
          <div class="module">
            <h2 class="module">H�bergeur</h2>
            <div class="compteur">
<?
  echo '              <a href="'.$url_hebergeur.'"><img class="module" src="'.$img_hebergeur.'" alt="Eberg� par '.$nom_hebergeur.'" /></a>'."\n";
?>
            </div>
          </div>
