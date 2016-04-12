<?
/*
 * 01/16/2004 - 09:31:11
 *
 * user.inc.php - Fonction de gestion de l'utilisateur
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
class User 
{
  var $status;
  
  // Constructeur
  function User()
  {
    $session="";
  }
  
  // Verification de la session
  function isValid($session)
  {
    // La session est elle active
    $this->restoreData($session);
    if ($this->getStatus()!="actif")
    {
        return false;
    }
    else
    {
      // La session est active
      return true;
    }
  }

  
  function connect($pass,$adminpass,$session)
  {
    if (md5($pass)==$adminpass)
    {
      $this->status = "actif";
      $this->saveData($session);
      return true;
    }  
    else
    {
      return false;
    }
  }

  function saveData($session)
  {
      $session->save("status",$this->status);
      return true;
  }

  function restoreData($session)
  {
      $this->status=$session->load("status");
      return true;
  }
  
  function getStatus()
  {
    return $this->status;
  }
}  
?>
