<?php
namespace TestComposerFunctions\Constants;

class AppConstants
{

    private const PROPERTIES_DIR = "properties";

    private const UTILITY_INI_FILE = "utilities.ini";

    private static $constants = [

        'CONST_ONE' => 4536562,
        'CONST_TWO' => 'Humming'

    ];

    public static function getPropertiesDir()
    {
        return self::PROPERTIES_DIR;
    }

    public static function getUtilityIniFile()
    {
        return self::UTILITY_INI_FILE;
    }

    public static function getConstants()
    {
        return self::$constants;
    }

    public static function setConstant(string $propName, string | int | bool | array | float $propValue)
    {
        self::$constants[$propName] = $propValue;
    }
}

?>