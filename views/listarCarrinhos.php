<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinhos HotWheels</title>
</head>
<body>
    <h1>Carrinhos Adquiridos</h1>

    <!-- CORRIGIR LISTAR -->
    <?php foreach ($carrinhos as $e): ?>
        <tr>
            <td><?php htmlspecialchars($c['modelo'])    ?></td>
            <td><?php htmlspecialchars($c['categoria']) ?></td>
            <td><?php htmlspecialchars($c['numero'])    ?></td>
            <td><?php $c['criado_em']                   ?></td>
        </tr>
    <?php endforeach ?>

</body>
</html>