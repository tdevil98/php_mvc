<?php
namespace App\Config;
use PDO;
class Database
{
    private static $bdd = null;

    private function __construct() {
    }

    public static function getBdd() {
        if(is_null(self::$bdd)) {
            self::$bdd = new PDO("mysql:host=localhost;dbname=php_training", 'root', '');
        }
        return self::$bdd;
    }
}
?>