<?
/* langage.inc.php - Langage spécifique des modules pour drkCMS
 * par Philippe Bousquet <Darken33@free.fr> http://darken33.free.fr/
 * Distribué sous licence Gnu General Public License
 */
 
// Remplacement simples
$TAG["[BR]"]='<br />';
$TAG["[B]"]='<strong>';
$TAG["[/B]"]='</strong>';
$TAG["[I]"]='<em>';
$TAG["[/I]"]='</em>';
$TAG["[U]"]='<span class="underline">';
$TAG["[/U]"]='</span>';

$TAG["[TITLE]"]='<h4 class="article">';
$TAG["[/TITLE]"]='</h4>';
$TAG["[BIG]"]='<big class="article">';
$TAG["[/BIG]"]='</big>';
$TAG["[SMALL]"]='<small class="article">';
$TAG["[/SMALL]"]='</small>';
$TAG["[CODE]"]='<code class="article">';
$TAG["[/CODE]"]='</code>';
$TAG["[LIST]"]='<ul class="article">';
$TAG["[/LIST]"]='</ul>';
$TAG["[ITEM]"]='<li class="article">';
$TAG["[/ITEM]"]='</li>';
$TAG["\r\n\r\n"]='<p class="article" />';

$TAG["[LEFT]"]='<div class="left">';
$TAG["[/LEFT]"]='</div>';
$TAG["[RIGHT]"]='<div class="right">';
$TAG["[/RIGHT]"]='</div>';
$TAG["[CENTER]"]='<div class="center">';
$TAG["[/CENTER]"]='</div>';

 function simple_replace ($text)
 {
   GLOBAL $TAG;
   reset($TAG);
   while (list($src,$dst)=each($TAG))
   {
     $text=str_replace($src,$dst,$text);
   }
   return $text;
 }

 // [LINK][/LINK]
 function replace_link ($line)
 {
    $find = "[LINK]";
    $n = strlen($find);
    $loop = 20;
    while (($loop--) && (($l = strpos($line, $find)) != false) && ($r = strpos($line, "[/LINK]", $l + $n)))
    {
      $txt = substr($line, $l + strlen($find), $r - $l - $n);
      $line = substr($line, 0, $l) . '<a href="'.$txt.'" class="article">'.$txt.'</a>'. substr($line, $r + $n +1);
    }
    return $line;    
 }

 // [MAIL][/MAIL]
 function replace_mail ($line)
 {
    $find = "[MAIL]";
    $n = strlen($find);
    $loop = 20;
    while (($loop--) && (($l = strpos($line, $find)) != false) && ($r = strpos($line, "[/MAIL]", $l + $n)))
    {
      $txt = substr($line, $l + strlen($find), $r - $l - $n);
      $line = substr($line, 0, $l) . '<a href="mailto:'.$txt.'" class="article">'.$txt.'</a>'. substr($line, $r + $n +1);
    }
    return $line;    
 }
 
 // [ICO][/ICO]
 function replace_ico ($line)
 {
    $find = "[ICO]";
    $n = strlen($find);
    $loop = 20;
    while (($loop--) && (($l = strpos($line, $find)) != false) && ($r = strpos($line, "[/ICO]", $l + $n)))
    {
      $txt = substr($line, $l + strlen($find), $r - $l - $n);
      $line = substr($line, 0, $l) . '<img src="'.$txt.'" class="icone" alt="icone" />'. substr($line, $r + $n +1);
    }
    return $line;    
 }
 // [ICO][/ICO]
 function replace_icov ($line)
 {
    $find = "[ICO]";
    $n = strlen($find);
    $loop = 20;
    while (($loop--) && (($l = strpos($line, $find)) != false) && ($r = strpos($line, "[/ICO]", $l + $n)))
    {
      $txt = substr($line, $l + strlen($find), $r - $l - $n);
      $line = substr($line, 0, $l) . '<img src="../'.$txt.'" class="icone" alt="icone" />'. substr($line, $r + $n +1);
    }
    return $line;    
 }
    
 // [IMG][/IMG]
 function replace_img ($line)
 {
    $find = "[IMG]";
    $n = strlen($find);
    $loop = 20;
    while (($loop--) && (($l = strpos($line, $find)) != false) && ($r = strpos($line, "[/IMG]", $l + $n)))
    {
      $txt = substr($line, $l + strlen($find), $r - $l - $n);
      $line = substr($line, 0, $l) . '<img src="'.$txt.'" alt="image" />'. substr($line, $r + $n +1);
    }
    return $line;    
 }

 // [IMG][/IMG]
 function replace_imgv ($line)
 {
    $find = "[IMG]";
    $n = strlen($find);
    $loop = 20;
    while (($loop--) && (($l = strpos($line, $find)) != false) && ($r = strpos($line, "[/IMG]", $l + $n)))
    {
      $txt = substr($line, $l + strlen($find), $r - $l - $n);
      $line = substr($line, 0, $l) . '<img src="../'.$txt.'" alt="image" />'. substr($line, $r + $n +1);
    }
    return $line;    
 }
 
 // Fonction de traduction
 function translate($text)
 {
   return replace_img(replace_ico(replace_mail(replace_link(simple_replace($text)))));
 }

 // Fonction de traduction pour visualisation
 function translate4visu($text)
 {
   return replace_imgv(replace_icov(replace_mail(replace_link(simple_replace($text)))));
 }
?>