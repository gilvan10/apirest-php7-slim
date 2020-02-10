<?php


namespace App\DAO\MYSQL\Codeasy;

class LojasDAO extends Conexao {

    public function __construct(){

        parent::__construct();

    }

    public function teste() {

        $lojas = $this->pdo
            ->query('SELECT * FROM lojas;')
            ->fetchAll(\PDO::FETCH_ASSOC);

        echo "<prev>";
        foreach($lojas as $loja) {
            var_dump($loja);
        }
        die;
    }

}