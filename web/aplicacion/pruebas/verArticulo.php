<?php

$id = 0;

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ver artículo</title>
</head>
<body>

<h1>Artículo creado correctamente</h1>

<p>Código del artículo: <?php echo $id; ?></p>

<a href="crearArticulo.php">
    Volver
</a>

</body>
</html>