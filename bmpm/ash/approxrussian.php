<?php

  /*
   *
   * Copyright Alexander Beider and Stephen P. Morse, 2008
   *
   * This file is part of the Beider-Morse Phonetic Matching (BMPM) System. 

   * BMPM is free software: you can redistribute it and/or modify
   * it under the terms of the GNU General Public License as published by
   * the Free Software Foundation, either version 3 of the License, or
   * (at your option) any later version.
   *
   * BMPM is distributed in the hope that it will be useful,
   * but WITHOUT ANY WARRANTY; without even the implied warranty of
   * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   * GNU General Public License for more details.
   *
   * You should have received a copy of the GNU General Public License
   * along with BMPM.  If not, see <http://www.gnu.org/licenses/>.
   *
   */

 $approxRussian = array(

     
// VOWELS
    array ("I", "", "$", "i"),
    array ("I", "", "[^k]$", "i"),
    array ("Ik", "[lr]", "$", "(ik|Qk)"),
    array ("Ik", "", "$", "ik"),
    array ("sIts", "", "$", "(sits|sQts)"),
    array ("Its", "", "$", "its"),
    array ("I", "[aeiEIou]", "", "i"),
    array ("I", "", "", "(i|Q)"), 
        
    array("au","","","(D|a|u)"),
    array("ou","","","(D|o|u)"),
    array("ai","","","(D|a|i)"),
    array("oi","","","(D|o|i)"),
    array("ui","","","(D|u|i)"),

    array("om","","[bp]","(om|im)"), 
    array("on","","[dgkstvz]","(on|in)"), 
    array("em","","[bp]","(im|om)"), 
    array("en","","[dgkstvz]","(in|on)"), 
    array("Em","","[bp]","(im|Ym|om)"), 
    array("En","","[dgkstvz]","(in|Yn|on)"), 
                    
    array ("a", "", "", "(a|o)"), 
    array ("e", "", "", "i"), 
    
    array ("E", "", "[fklmnprsStv]$", "i"),
    array ("E", "", "ts$", "i"),
    array ("E", "[DaoiuQ]", "", "i"),
    array ("E", "", "[aoQ]", "i"),
    array ("E", "", "", "(Y|i)"), 

    array("approxrussian")
           
  );

  $approx[LanguageIndex("russian", $languages)] = $approxRussian;

