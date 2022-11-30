<!doctype html>
<html lang="es">

<head>
  <?php require "../app/views/parts/head.php" ?>
</head>

<body>

  <!-- !! COMPLETAR !! -->

  <?php require "../app/views/parts/header.php" ?>

  <main role="main" class="container">
    <div class="starter-template">

      <h1>Datos del jugador</h1>

      <form action="/jugador/store" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php echo $jugador->id ?>">

        <div class="form-group">
          <label>Nombre</label>
          <input type="text" name="nombre" class="form-control" value="<?php echo $jugador->nombre ?>" required>
        </div>
        <div class="form-group">
          <label>Fecha de nacimiento (año-mes-dia)</label>
          <input type="text" name="nacimiento" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Puesto</label>
          <select name="puesto">
            <option value="Portero">Portero</option>
            <option value="Defensa">Defensa</option>
            <option value="Centrocampista">Centrocampista</option>
            <option value="Delantero">Delantero</option>
          </select>
        </div>
        <label for="mifich">Selecciona un fichero</label>
        <input type="file" name="myfile" id="mifich">
        <br>
        <button type="submit" class="btn btn-default">Enviar</button>
      </form>
    </div>

  </main><!-- /.container -->
  <?php require "../app/views/parts/footer.php" ?>

</body>
<?php require "../app/views/parts/scripts.php" ?>

</html>