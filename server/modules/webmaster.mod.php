<?
/* webmaster.mod.php - Module Infos Webmaster pour drkCMS
 * par Philippe Bousquet <Darken33@free.fr> http://darken33.free.fr/
 * Distribué sous licence Gnu General Public License
 */
?>
          <div class="module">
            <h2 class="module">Webmaster</h2>
            <div style="padding-left:10px;">
<?
  echo '            <strong>'.$CONFIG["webmaster"].'</strong><br />'."\n";
  if (isset($CONFIG["adresse"]) && $CONFIG["adresse"]!="")
  {
    echo '            '.$CONFIG["adresse"].'<br />'."\n";
  }  
  if (isset($CONFIG["telephone"]) && $CONFIG["telephone"]!="")
  {
    echo '            <strong>Tel:</strong> '.$CONFIG["telephone"].'<br />'."\n";
  }  
  if (isset($CONFIG["ICQ"]) && $CONFIG["ICQ"]!="")
  {
    echo '            <strong>ICQ:</strong> '.$CONFIG["ICQ"].'<br />'."\n";
  }  
  echo '            <strong>Email:</strong> <a href="mailto:'.$CONFIG["email"].'">'.$CONFIG["email"].'</a>'."\n";
?>  
            </div>
          </div>
