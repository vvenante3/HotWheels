<?php

Class Carrinho
{
    private $conn; //guardar dados no Db

    public function __construct() {
        $this->conectar();
    }

    public function conectar() {
        $host       =   'db';
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

    public function adicionarCarrinho($modelo, $categoria, $numero) {
        if($this->carrinhoExiste($modelo, $categoria, $numero)){
            return false;
        } else{
            $stmt = $this->conn->prepare("INSERT INTO carrinhos (modelo, categoria, numero) VALUES (:modelo, :categoria, :numero)");

            $stmt->execute([
                ':modelo'       => $modelo,
                ':categoria'    => $categoria,
                ':numero'       => $numero
            ]);

            return true;
        }
    }

    public function getCarrinho() {
        $stmt = $this->conn->prepare("SELECT * FROM carrinhos ORDER BY criado_em DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function carrinhoExiste($modelo, $categoria, $numero) {
        $stmt = $this->conn->prepare("SELECT * FROM carrinhos WHERE modelo = :modelo AND categoria = :categoria AND numero = :numero");
        $stmt->execute([
            ':modelo'       => $modelo,
            ':categoria'    => $categoria,
            ':numero'       => $numero,
        ]);

        return $stmt->rowCount() > 0;

    }

    public function getCarrinhoById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM carrinhos WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $carrinho = $stmt->fetch(PDO::FETCH_ASSOC);
        return $carrinho ?? null;
    }

    public function atualizarCarrinho($id, $modelo, $categoria, $numero){
        $stmt = $this->conn->prepare("UPDATE carrinhos SET modelo = :modelo , categoria = :categoria, numero = :numero WHERE id = :id");
        $resultado= $stmt->execute([
            ':modelo'    => $modelo,
            ':categoria' => $categoria,
            ':numero'    => $numero,
        ]);

        return $resultado;
    }

    // função deletarCarrinho

}
?>