<?
/* footer.inc.php - pied de page pour drkCMS
 * par Philippe Bousquet <Darken33@free.fr> http://darken33.free.fr/
 * Distribu� sous licence Gnu General Public License
 */
?>
      <div class="foot">
<? 
  echo '         <img src="'.$CONFIG["theme"].'/powered.png" alt="Powered by drkCMS" /><br />'."\n";
?>
<?
         $end=utime();
         $run=$end-$start;
?>
         Page g�n�r�e par <strong>drkCMS <? echo "v".$CONFIG['version']; ?></strong> en <strong><? echo substr($run, 0, 5); ?></strong> secondes.<br />
         Copyright &copy; 2004-2005 Philippe Bousquet<br />
         drkCMS est distribu� selon les termes de la licence Gnu General Public License v2.
      </div>
