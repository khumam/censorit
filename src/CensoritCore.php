<?php

namespace khumam\censorit;

use Exception;

abstract class CensoritCore
{
    protected static $replaceBy = '*';
    protected static $patternFull = '/[\w\s:]/';
    protected static $patternFullExceptSpacing = '/[\w\d:]/';
    
    /**
     * fullCensor
     *
     * @param  mixed $string
     * @param  mixed $withSpacing
     * @return string
     */
    public static function fullCensor(string $string, $withSpacing = true): string
    {
        return preg_replace(($withSpacing) ? self::$patternFull : self::$patternFullExceptSpacing, self::$replaceBy, $string);
    }
    
    /**
     * halfCensor
     *
     * @param  mixed $string
     * @param  mixed $offset
     * @return string
     */
    public static function halfCensor(string $string, int $offset = 2): string
    {

        if (strlen($string) < $offset) {
            return self::fullCensor($string, false);
        }

        $textFromBegining = substr($string, 0, strlen($string) - abs($offset));
        $textFromEnd = substr($string, -abs($offset));
        return ($offset < 0) ? self::fullCensor($textFromBegining, false) . $textFromEnd : $textFromBegining . self::fullCensor($textFromEnd, false);
    }
    
    /**
     * middleCensor
     *
     * @param  mixed $string
     * @param  mixed $offset
     * @return void
     */
    public static function middleCensor(string $string, int $offset = 2, bool $reverse = false)
    {
        if ((floor(strlen($string) / 2)) < $offset) {
            return self::fullCensor($string, false);
        }

        $dot = '';
        for ($index = 0; $index < $offset; $index++) {
            $dot .= '.';
        }

        preg_match("/($dot)(.*)($dot)/", $string, $matches);

        if ($reverse) {
            return self::fullCensor($matches[1], false) . $matches[2] . self::fullCensor($matches[3], false);
        }

        return $matches[1] . self::fullCensor($matches[2], false) . $matches[3];
    }
}
