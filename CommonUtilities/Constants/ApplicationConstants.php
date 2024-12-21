<?php
namespace CommonUtilities\Constants\ApplicationConstants;

use function CommonUtilities\File\FileUtilities\loadProperties;

class ApplicationConstants
{

    private const PROPERTIES_DIR = "properties";

    private const UTILITY_INI_FILE = "utilities.ini";

    private const LOG_DIR = "Logs";

    private const LOG_FILE = "log.log";

    private static $constants = array();

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

    private static function loadConstants()
    {
        self::$constants = loadProperties(getProjectDir() . DIRECTORY_SEPARATOR . self::getPropertiesDir() . DIRECTORY_SEPARATOR . self::getUtilityIniFile());
    }
}

?>