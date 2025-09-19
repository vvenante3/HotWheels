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
            </tr>
        </thead>
        <tbody>
             <?php foreach ($carrinhos as $c): ?>
                <tr>
                    <td><?= htmlspecialchars($c['modelo'])    ?></td>
                    <td><?= htmlspecialchars($c['categoria']) ?></td>
                    <td><?= htmlspecialchars($c['numero'])    ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <a href="views/cadastroCarrinho.php">Cadastrar</a>

</body>
</html>