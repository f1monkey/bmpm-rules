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

// GENERAL
  $rulesSpanish = array(

// Includes both Spanish (Castillian) & Catalan

// CONSONANTS
    array("ñ","","","(n|nj)"),
    array("ny","","","nj"), // Catalan
    array("ç","","","s"), // Catalan
    
    array("ig","[aeiou]","","(tS|ig)"), // tS is Catalan
    array("ix","[aeiou]","","S"), // Catalan
    array("tx","","","tS"), // Catalan
    array("tj","","$","tS"), // Catalan
    array("tj","","","dZ"), // Catalan
    array("tg","","","(tg|dZ)"), // dZ is Catalan
    array("ch","","","(tS|dZ)"), // dZ is typical for Argentina
    array("bh","","","b"), // translit. from Arabic
    array("h","[dgt]","",""), // translit. from Arabic
    array("h","","$",""), // foreign
  //array("ll","","","(l|Z)"), // Z is typical for Argentina, only Ashkenazic
    array("m","","[bpvf]","(m|n)"),
    array("c","","[ei]","s"), 
//  array("c","","[aou]","(k|C)"),
    array("gu","","[ei]","(g|gv)"), // "gv" because "u" can actually be "ü"
    array("g","","[ei]","(x|g|dZ)"),  // "g" only for foreign words; dZ is Catalan
    array("qu","","","k"),
    
    array("uo","","","(vo|o)"),    
    array("u","","[aei]","v"),
           
 // SPECIAL VOWELS
    array("ü","","","v"),
    array("á","","","a"),
    array("é","","","e"),
    array("í","","","i"),
    array("ó","","","o"),
    array("ú","","","u"),
    array("à","","","a"),  // Catalan
    array("è","","","e"), // Catalan
    array("ò","","","o"),  // Catalan
               
  // LATIN ALPHABET      
    array("a","","","a"),
    array("b","","","B"),
    array("c","","","k"),
    array("d","","","d"),
    array("e","","","e"),
    array("f","","","f"),
    array("g","","","g"), 
    array("h","","","h"),
    array("i","","","i"),
    array("j","","","(x|Z)"), // Z is Catalan
    array("k","","","k"),
    array("l","","","l"),
    array("m","","","m"),
    array("n","","","n"),
    array("o","","","o"),
    array("p","","","p"),
    array("q","","","k"),
    array("r","","","r"),
    array("s","","","s"),
    array("t","","","t"),
    array("u","","","u"),
    array("v","","","V"),
    array("w","","","v"), // foreign words
    array("x","","","(ks|gz|S)"), // ks is Spanish, all are Catalan
    array("y","","","(i|j)"),
    array("z","","","(z|s)"), // as "c" befoire "e" or "i", in Spain it is like unvoiced English "th"
        
    array("rulesspanish")    
  );

  $rules[LanguageIndex("spanish", $languages)] = $rulesSpanish;

