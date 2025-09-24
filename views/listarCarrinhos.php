<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinhos HotWheels</title>
</head>
<body>
    <h1>Carrinhos Adquiridos</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Categoria</th>
                <th>Numero</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
             <?php foreach ($carrinhos as $c): ?>
                <tr>
                    <td><?= htmlspecialchars($c['modelo'])    ?></td>
                    <td><?= htmlspecialchars($c['categoria']) ?></td>
                    <td><?= htmlspecialchars($c['numero'])    ?></td>
                        <td>
                            <a href="index.php?controller=carrinho&action=editarCarrinho&id=<?= $c['id'] ?>">Editar</a>
                            <a href="index.php?controller=carrinho&action=deletarCarrinho&id=<?php echo $c['id']; ?>" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</a>
                        </td>
                        
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <a href="views/cadastroCarrinho.php">Cadastrar</a>

</body>
</html>