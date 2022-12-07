<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/login/verify" method="post">
        <label>Usuario</label>
        <input type="text" name="nombre" required>
        <label>Contraseña</label>
        <input type="password" name="password" required>
        <input type="submit" name="login" value="Entrar">
    </form>
</body>
</html>