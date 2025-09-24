<?php

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

    public function editarCarrinho() {
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

        require 'views/editarCarrinho.php';

    }

    public function atualizarCarrinho() {
        if (isset($_POST['id'], $_POST['modelo'], $_POST['categoria'], $_POST['numero'])) {
            $id         = $_POST['id'];
            $modelo     = $_POST['modelo'];
            $categoria  = $_POST['categoria'];
            $numero     = $_POST['numero'];

            $carrinho   = new Carrinho();
            $sucesso    = $carrinho->atualizarCarrinho($id, $modelo, $categoria, $numero);

            if ($sucesso) {
                $_SESSION['mensagem'] = 'Carrinho atualizado com sucesso!';
                header('Location: /index.php?controller=carrinho&action=listar');
                exit;
            } else {
                $_SESSION['mensagem'] = "Erro ao atualizar o carrinho";
                header('Location: /index.php?controller=carrinho&action=listar' . $id);
                exit;
            } 
        } else {
            $_SESSION['mensagem'] = "Dados inválidos para atualização";
            header('Location: /index.php?controller=carrinho&action=listar');
            exit;
        }
    }

    public function deletarCarrinho() {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            $_SESSION['mensagem'] = 'Carrinho não encontrado';
            header('Location: /index.php?controller=carrinho$action=listar');
            exit;
        }

        $carrinhoModel = new Carrinho();
        $sucesso = $carrinhoModel->deletarCarrinho($id);

        if ($sucesso) {
            $_SESSION['mensagem'] = 'Carrinho deletado com sucesso';
        } else {
            $_SESSION['mensagem'] = 'Erro ao deletar carrinho';
        }

        header('Location /index.php?controller=carrinho&action=listar');
        exit;
    }
}
?>