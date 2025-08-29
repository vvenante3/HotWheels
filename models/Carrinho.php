<?php

Class Carrinho
{
    private $conn; //guardar dados no Db

    private function conectar() {
        $host       =   'mysql';
        $dbname     =   'db_hotwheels';
        $user       =   'admin';
        $pass       =   'admin';

        try{
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
            $this->conn = new PDO($dsn, $user, $pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Falha na conexão com o banco de dados" . $e->getMessage();
        }
    }

    private function carrinhoExiste($modelo, $categoria, $numero) {
        $stmt = $this->conn->prepare("SELECT * FROM carrinhos WHERE modelo = :modelo AND categoria = :categoria AND numero = :numero");
        $stmt->execute([
            ':modelo'       => $modelo,
            ':categoria'    => $categoria,
            ':numero'       => $numero,
        ]);
    }   
}
?>