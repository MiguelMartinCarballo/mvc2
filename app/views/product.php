<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Lista de productos</h1>

    <table class="table table-striped table-hover">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Precio</th>
            <th>Fecha compra</th>
            <th></th>
        </tr>

        <?php foreach ($products as $key => $product) { ?>
            <tr>
            <td><?php echo $product->name ?></td>
            <td><?php echo $product->surname ?></td>
            <td><?php echo $product->email ?></td>
            <td><?php echo $product->birthdate ?></td>
            <td>
            <a href="/product/show/<?php echo $product->id ?>" class="btn btn-primary">Ver </a>
            </td>
            </tr>
    <?php } ?>
    </table>
</body>

</html>