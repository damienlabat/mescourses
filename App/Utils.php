<?php
namespace App;

class Utils
{

  public static function genRandomString($length=10,$characters = '0123456789abcdefghijklmnopqrstuvwxyz',$string = '')
    {
        for ($p = 0; $p < $length; $p++) {
            $string .= $characters[mt_rand(0, strlen($characters)-1)];
        }

        return $string;
    }



public static function gaxuxa($length=10,$consonnes = 'bdfgjklmnprstvxz',$voyelles ='aeiou',$string = '')
    {
        if ($length%2) {
          $string .= $voyelles[mt_rand(0, strlen($voyelles)-1)];
          $length--;
        }
        for ($p = 0; $p < $length; $p=$p+2) {
            $string .= $consonnes[mt_rand(0, strlen($consonnes)-1)];
            $string .= $voyelles[mt_rand(0, strlen($voyelles)-1)];
        }

        return $string;
    }


}
