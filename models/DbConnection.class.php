<?php
require_once dirname(__DIR__) . '/configs/Config.class.php';
abstract class DbConnection
{
    private static $pdo;

    /**
     * Fonction de connexion à la base de donnée avec affichage d'éventuel erreur
     * @return void null
     */
    private static function getConnection() : void
    {
        $dsn  = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME;
        $user = Config::DB_USER;
        $pass = Config::DB_PASS;

        try 
        {
            self::$pdo = new PDO($dsn, $user, $pass);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        catch (PDOException $e) 
        {
            echo "erreur de pdo {$e->getMessage()}";
        }
    }

    /**
     * Fonction permettant d'avoir un instance de PDO s'il n'y en a pas encore
     * @return mixed renvoi une instance de $pdo
     */
    protected function getPdo() : mixed
    {
        if (self::$pdo === null) 
        {
            self::getConnection();
        }

        return self::$pdo;
    }
}