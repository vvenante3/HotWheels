<?php

use PHPUnit\Event\TestData\TestData;
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../models/Carrinho.php';

Class CarrinhoTest extends TestCase {

    private $carrinho;

    protected function setUp(): void
    {
        $pdo = new PDO('sqlite::memory');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $pdo->exec("
            CREATE TABLE carrinhos(
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                modelo TEXT,
                categoria TEXT,
                numero TEXT,
                criado_em DATETIME DEFAULT CURRENT_TIMESTAMP
        ");

        $this->carrinho = new Carrinho($pdo);
    }

    public function testAdicionarCarrinho ()
    {
        $resultado = $this->carrinho->adicionarCarrinho('Modelo Teste', 'Categoria Teste', '1/10');
        $this->assertTrue($resultado, "Carrinho deveria ser cadastrado");

        $stmt = $this->carrinho->conn->query("SELECT COUNT (*) FROM carrinhos");
        $this->assertEquals(1, $stmt->fetchColumn());
    }

    public function testNaoAdicionarCarrinhoDuplicado()
    {
        $this->carrinho->adicionarCarrinho('Duplicado', 'Categoria', '2/10');
        $resultado = $this->carrinho->testAdicionarCarrinho('Duplicado', 'Categoria', '2/10');
        $this->assertFalse($resultado, "Não deveria permitir carrinho duplicado");
    }
}

?>