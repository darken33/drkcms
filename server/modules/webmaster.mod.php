<?
/* webmaster.mod.php - Module Infos Webmaster pour drkCMS
 * par Philippe Bousquet <Darken33@free.fr> http://darken33.free.fr/
 * Distribué sous licence Gnu General Public License
 */
?>
          <div class="module">
            <h2 class="module">Webmaster</h2>
<?
  echo '            <strong>'.$CONFIG["webmaster"].'</strong><br />'."\n";
  if ($CONFIG["adresse"]!="")
  {
    echo '            '.$CONFIG["adresse"].'<br />'."\n";
  }  
  if ($CONFIG["telephone"]!="")
  {
    echo '            <strong>Tel:</strong> '.$CONFIG["telephone"].'<br />'."\n";
  }  
  echo '            <strong>Email:</strong> <a href="mailto:'.$CONFIG["email"].'">'.$CONFIG["email"].'</a>'."\n";
?>  
          </div>
