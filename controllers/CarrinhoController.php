<?php

        // 1. Carregar a model
require_once 'models/Carrinho.php';

Class CarrinhoController {
    public function listar() {
        $carrinhoModel = new Carrinho();
        $carrinhos = $carrinhoModel->getCarrinho();
        require 'views/listarCarrinhos.php';
    }

    public function cadastrar() {
        if(isset($_POST['modelo'], $_POST['categoria'], $_POST['numero'])) {
        
            $modelo     = $_POST['modelo'];
            $categoria  = $_POST['categoria'];
            $numero     = $_POST['numero'];

            $carrinhoModel = new Carrinho();
            $existe        = $carrinhoModel->carrinhoExiste($modelo, $categoria, $numero);
        }

        require 'views/cadastroCarrinho.php';

    }
}

?>