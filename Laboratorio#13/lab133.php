<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 13</title>
</head>
<body>
    <h1>Recuperar valor de una Cookie</h1>
    <?php 
    if(isset($_COOKIE["user"]))
        echo "<h2>Bienvenido ".$_COOKIE["user"]."!</h2><br/>";
    else
    echo
    "<h2>Bienvenido invitado! <h2><br/>";
    ?>
    <a href="lab131.php">...Regresar</a>&nbsp;
    <a href="lab134.php">Continuar...</a>
</body>
</html>