<?
/* visiteurs.mod.php - Module Compteur de vistes pour drkCMS
 * par Philippe Bousquet <Darken33@free.fr> http://darken33.free.fr/
 * Distribué sous licence Gnu General Public License
 */

 // Indiquez ici l'image correspondant à votre compteur de visites
 $compteur="http://perso0.free.fr/cgi-bin/wwwcount.cgi?df=darken33.dat&amp;dd=j";
?>
          <div class="module">
            <h2 class="module">Visiteurs</h2>
            <div class="compteur">
<?
  echo '              <img class="module" src="'.$compteur.'" alt="compteur" />'."\n";
?>
            </div>
          </div>
