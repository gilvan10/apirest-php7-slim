<?php



namespace App\DAO\MYSQL\Codeasy;

abstract class Conexao {

    /**
     * @var  \PDO
     */

    protected $pdo;

    public function __construct(){
        $host = putenv('codeeasy_MYSQL_HOST');
        $port = putenv('codeeasy_MYSQL_PORT');
        $user = putenv('codeeasy_MYSQL_USER');
        $pass = putenv('codeeasy_MYSQL_PASSWORD');
        $dbname = putenv('codeeasy_MYSQL_DBANE');


        $dsn = "mysql:host={$host};dbname{$dbname};portr{$port}";

        $this->pdo = new \PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }

}
