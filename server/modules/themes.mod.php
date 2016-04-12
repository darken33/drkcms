<?
/* themes.mod.php - Module Themes pour drkCMS
 * par Philippe Bousquet <Darken33@free.fr> http://darken33.free.fr/
 * Distribué sous licence Gnu General Public License
 */
?>
          <div class="module">
            <h2 class="module">Changer de theme</h2>
            <ul class="module">
              <div style="text-align: center">
              <form action="index.php" method="post">
                <select name="seltheme" style="width: 150px">
<?                
  $dir=dir('./themes');
  while ($file = $dir->read()) 
  {
    if (($file !='.' && $file!="..") && is_dir('./themes/'.$file)  && is_file('./themes/'.$file.'/style.css'))
    { 
      echo '                  <option value="themes/'.$file.'"'.(($theme_drkCMS=="themes/".$file)?"selected":"").'>'.$file.'</option>';
    }
  }   
?>                  
                </select> <br /><br />
                <input class="bouton" type="submit" name="settheme" value="Valider" />
              </form>
              </div>
            </ul>
          </div>
