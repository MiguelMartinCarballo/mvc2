<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Detalle del producto <?php echo $product->id ?></h1>
<ul>
    <li><strong>Id: </strong><?php echo $product->id ?></li>
    <li><strong>Nombre: </strong><?php echo $product->name ?></li>
    <li><strong>Tipo: </strong><?php echo $product->type_id ?></li>
    <li><strong>Precio: </strong><?php echo $product->price ?></li>
    <li><strong>Fecha compra: </strong><?php echo $product->fecha_compra ?></li>
</ul>
</body>
</html>