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

            if($carrinhoModel->carrinhoExiste($modelo, $categoria, $numero)){
                $_SESSION['mensagem'] = "Carrinho já cadastrado!";
                header('Location: index.php?controller=carrinho&action=cadastrar');
                exit;
            } else {
                $carrinhoModel->adicionarCarrinho($modelo, $categoria, $numero);
                $_SESSION['mensagem'] = "Carrinho cadastrado com sucesso!";
                header('Location: /index.php?controller=carrinho&action=cadastrar');
                exit;
            }
        }

        require 'views/cadastroCarrinho.php';

    }

    public function editar() {
        $id = $_GET['id'] ?? null;

        if (!$id){
            $_SESSION['mensagem'] = "carrinho não encontrado";
            header('Location: /index.php?controller=carrinho&action=listar');
            exit;
        }

        $carrinho = new Carrinho();
        $carrinho = $carrinho->getCarrinhoById($id);

        if(!$carrinho){
            $_SESSION['mensagem'] = "Carrinho não encontrado";
            header('Location: /index.php?controller=carrinho&action=listar');
            exit;
        }

        if (isset($_POST['modelo'], $_POST['categoria'], $_POST['numero'])){
            $modelo     = $_POST['modelo'];
            $categoria  = $_POST['categoria'];
            $numero     = $_POST['numero'];
        }

        require 'views/editarCarrinho.php';

    }

    public function atualizarCarrinho($id, $modelo, $categoria, $numero) {
        $carrinho = new Carrinho();
        $sucesso = $carrinho->atualizarCarrinho($id, $modelo, $categoria, $numero);

        if ($sucesso){
            $_SESSION['mensagem'] = 'Carrinho atualizado com sucesso!';
        } else {
            $_SESSION['mensagem'] = 'Erro ao atualizar carrinho';
        }

        header('Location: /index.php?controller=carrinho&action=editar&id=' . $id);
        exit;
    }

}

?>