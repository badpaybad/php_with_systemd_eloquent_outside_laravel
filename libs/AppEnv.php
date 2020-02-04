<?php

namespace libs;

use Dotenv\Loader\Parser;

class AppEnv
{

    private static $_my_env;

    public static function get_env($name, $defaultValue = "")
    {
        if (array_key_exists($name, self::$_my_env)) return self::$_my_env[$name];
        return $defaultValue;
    }
    public static function load_env($filePath)
    {
        $autodetect = ini_get('auto_detect_line_endings');
        ini_set('auto_detect_line_endings', '1');
        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        ini_set('auto_detect_line_endings', $autodetect);
        foreach ($lines as $name) {
            
            list($name, $value) = Parser::parse($name);

            self::$_my_env[$name] = $value==null?null: $value->getChars();
        }
        return self::$_my_env;
    }
}
