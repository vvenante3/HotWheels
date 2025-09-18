<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Carrinho</title>
</head>
<body>
    <h1>Cadastrar Carrinho</h1>

    <form action="index.php?controller=carrinho&action=cadastrar" method="POST">
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo"    id="modelo">
        <br>
        <label for="categoria">Categoria:</label>
        <input type="text" name="categoria" id="categoria">
        <br>
        <label for="numero">Numero: </label>
        <input type="text" name="numero"    id="numero"> 
        <br>
        <br>
        <button type="submit">Cadastrar</button>
    </form>

<?php
    if(isset($_SESSION['mensagem'])){
        echo $_SESSION['mensagem'];
        unset($_SESSION['mensagem']);
    };
?>

</body>
</html>