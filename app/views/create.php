<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Alta de producto</h1>

    <form method="post" action="/product/store">

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
        <select>
        <?php
            foreach($types as $type) {
                echo "<option value=\" $type->id \">$type->name</option>";
            }
        ?>
        </select>
        </div>
        <div class="form-group">
            <label>Tipo id</label>
            <input type="text" name="type_id" class="form-control">
        </div>
        <div class="form-group">
            <label>Precio</label>
            <input type="text" name="price" class="form-control">
        </div>
        <div class="form-group">
            <label>Fecha compra</label>
            <input type="text" name="fecha_compra" class="form-control">
        </div>
        <button type="submit" class="btn btn-default">Enviar</button>
    </form>
</body>

</html>