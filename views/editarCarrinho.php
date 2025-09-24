<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carrinho</title>
</head>
<body>
    <h1>Editar Carrinho</h1>

    <?php
    if (isset($_SESSION['mensagem'])) {
        echo "<p>" . $_SESSION['mensagem'] . "</php>";
        unset($_SESSION['mensagem']);
    }
    ?>

    <form action="index.php?controller=carrinho&action=atualizarCarrinho" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($carrinho['id']); ?>">

        <label for="modelo">Modelo: </label>
        <input type="text" name="modelo" id="modelo" value="<?php echo htmlspecialchars($carrinho['modelo']); ?>" required>

        <label for="categoria">Categoria: </label>
        <input type="text" name="categoria" id="categoria" value="<?php echo htmlspecialchars($carrinho['categoria']); ?>" required>

        <label for="numero">Numero: </label>
        <input type="text" name="numero" id="numero" value="<?php echo htmlspecialchars($carrinho['numero']); ?>" required>
        <br><br>

        <button type="submit">Salvar alterações</button>
    </form>

    <br>
    <a href="index.php?controller=carrinho&action=listar">Voltar à lista</a>

</body>
</html>