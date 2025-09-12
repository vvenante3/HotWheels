<?php

        // 1. Carregar a model
require_once 'models/Carrinho.php';

Class CarrinhoController {
    public function listar() {
        $carrinhoModel = new Carrinho();
        $carrinhos = $carrinhoModel->getCarrinho();
        require 'views/listarCarrinhos.php';
    }
}

?>