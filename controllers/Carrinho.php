<?php

        // 1. Carregar a model
require_once 'models/Carrinho.php';

Class CarrinhoController {
    public function listar() {
        // 2. Criar objeto model
        $carrinhoModel = new Carrinho();

        // 3. Buscar carrinhos com getCarrinhos e Guardar em $carrinhos
        $carrinhos = $carrinhoModel->getCarrinho();
        
        // 4. incluir na view listarCarrinho.php
        require 'views/listarCarrinhos.php';
    }
}

?>