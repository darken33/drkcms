<?
/*
 * 01/16/2004 - 09:31:11
 *
 * session.inc.php - Fonction de gestion de session
 * Copyright (C) 2004 Philippe Bousquet
 * Darken@tuxfamily.org
 * http://darken.tuxfamily.org
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
 class Session
 {
   // Constructeur
   function Session()
   {
     session_start();
   }
   
   // Support Session pour les urls
   function parseURL($url,$vars="")
   {
     return $url."?".session_name()."=".session_id()."&".$vars; 
   }
   
   // Sauvegarde d'une variable
   function save($name,$value)
   {
     /****************************************************
      * PATCH 20050215 : global $_SESSION                *
      * Par Philippe Bousquet <darken33@free.fr          *
      ****************************************************/
     global $HTTP_SESSION_VARS;
     session_register($name);
     $HTTP_SESSION_VARS[$name]=$value;
   }
   
   // Charger une variable sauvegardée
   function load($name)
   {
     /****************************************************
      * PATCH 20050215 : global $_SESSION                *
      * Par Philippe Bousquet <darken33@free.fr          *
      ****************************************************/
     global $HTTP_SESSION_VARS;
     return (isset($HTTP_SESSION_VARS[$name])?$HTTP_SESSION_VARS[$name]:"");
   }
   
   // Fermer la session
   function close()
   {
     session_destroy();
   }
 }
?>
