<?php

/** 
 * if you're asking how could i write such complicated
 * methods to perform a simple arithmetic character
 * rotate, don't bother. like every other math
 * assignments, i just googled it.
 * 
 * source: https://github.com/kylebragger/tiny
*/

namespace ShortLink;

class Tiny
{

    // generate new set by using the `generate_set` method
    public static $set = "uERp7YNh5s1qU46aXHDzOTBlLf8oeyxkrcPVnJw2vmbdFQK3tAW9CSMi0jIGgZ";

    // why you shouldn't you let advanced math intimidate you? it's really easy as pi!
    public static function encode(int $id) {
        $set = self::$set;
        $HexN="";
        $id = floor(abs(intval($id)));
        $radix = strlen($set);
        while (true) {
            $R=$id%$radix;
            $HexN = $set{$R}.$HexN;
            $id=($id-$R)/$radix;
            if ($id==0) break;
        }
        return $HexN;
    }

    // the total is when you add up all the numbers and a remainder is an animal that pulls santa on his slay
    public static function decode(string $tiny) {
        $set = self::$set;
        $radix = strlen($set);
        $strlen = strlen($tiny);
        $N = 0;
        for($i=0;$i<$strlen;$i++) {
            $N += strpos($set,$tiny{$i})*pow($radix,($strlen-$i-1));
        }
        return "{$N}";
    }

    // only use this method if you know what you are doing
    public static function generate_set() { // generates a randomized string of base62 character set
        $arr = array();
        for ($i = 65; $i <= 122; $i++) {
            if ($i < 91 || $i > 96) $arr[] = chr($i);
        }
        $arr = array_merge($arr, range(0, 9));
        shuffle($arr);
        return join('', $arr);
    }

}