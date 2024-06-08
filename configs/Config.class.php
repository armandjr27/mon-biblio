<?php
class Config 
{
    /**
     * Database information
     */
    public const DB_HOST = "localhost";
    public const DB_NAME = "biblio";
    public const DB_USER = "root";
    public const DB_PASS = "";
    private static $base_url = "http://localhost/mon-biblio/";

    /**
     * Function helpers for url
     */
    public static function base_url($url = null) : string
    {
        return self::$base_url . $url;
    }

    public static function site_url($url = null) : string
    {
        return self::$base_url . 'index.php' . $url;
    }
}