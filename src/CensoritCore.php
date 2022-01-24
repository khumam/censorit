<?php

namespace khumam\censorit;

use Exception;

abstract class CensoritCore
{
    protected static $replaceBy = '*';
    protected static $patternFull = '/[\w\s:]/';
    protected static $patternFullExceptSpacing = '/[\w\d:]/';

    public static function fullCensor(string $string, $withSpacing = true): string
    {
        return preg_replace(($withSpacing) ? self::$patternFull : self::$patternFullExceptSpacing, self::$replaceBy, $string);
    }

    public static function halfCensor(string $string, int $offset): string
    {

        if (strlen($string) < $offset) {
            return $string;
        }

        $textFromBegining = substr($string, 0, strlen($string) - abs($offset));
        $textFromEnd = substr($string, -abs($offset));
        return ($offset < 0) ? self::fullCensor($textFromBegining, false) . $textFromEnd : $textFromBegining . self::fullCensor($textFromEnd, false);
    }

    private static function reString(array $array): string
    {
        return join($array);
    }
}
