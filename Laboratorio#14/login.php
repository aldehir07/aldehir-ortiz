<?php 
session_start();

if(isset($_REQUEST['usuario']) && isset($_REQUEST['clave'])){
    $usuario = $_REQUEST['usuario'];
    $clave = $_REQUEST['clave'];

    $salt = substr($usuario, 0,2);
    $clave_crypt = crypt($clave, $salt);

    require_once("class/usuarios.php");

    $obj_usuarios = new usuarios();
    $usuario_validado = $obj_usuarios->validar_usuario($usuario,$clave_crypt);

    foreach($usuario_validado as $array_resp){
        foreach($array_resp as $value){
            $nfilas=$value;
        }
    }
    if($nfilas>0){
        $usuario_valido=$usuario;
        $_SESSION["usuario_valido"] = $usuario_valido;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 14 - Login al sitio de Noticias</title>
</head>
<body>
    <?php 
        //sesion iniciada
        if(isset($_SESSION["usuario:valido"])){
        
    ?>
    <h1>Gestion de noticias</h1>
    <hr>

    <ul>
        <li><a href="lab.142.php">Listar todas las noticias</a></li>
        <li><a href="lab.143.php">Listar noticias por pártes</a></li>
        <li><a href="lab.144.php">Buscar noticias</a></li>
    </ul>
    <hr>
    <p>[<a href="logout.php">Desconectar</a>]</p>
    <?php 
    }
    else if(isset($usuario)){
        print ("<br><br>\n");
        print ("<p align ='CENTER'>Acceso no autorizado</p>\n"); 
        print ("<p align ='CENTER'>[<a href='login.php'>Conectar</a>]</P>\n"); 
    }
    //sesion no iniciada
    else{
        print ("<br><br>\n");
        print ("<P class='parrafocentrado'>Esta zona tiene el acceso restringido.<br>".
                "Para entrar debe identificarse </P>\n");
        print ("<form class='entrada' name='login' action='login.php' method='POST'>\n");

        print ("<P><label class='etiqueta-entrada'>Usuario:<label>\n");
        print ("    <input type='text' name='usuario' size='15'></P>\n");
        print ("<P><label class='etiqueta-entrada'>Clave:<label>\n");
        print ("    <input type='password' name='clave' size='15'></P>\n");
        print ("<P><input type='submit' value'entrar'></P>\n");
        print ("</form>\n");

        print ("<P class='parrafocentrado'>NOTA: si no dispone de identificacion o tiene problemas".
            " para entrar<br>pongase en contacto con el ". "<a href='MAILTO:webmaster@localhost'>adiministrador</a> del sitio</P>\n");
    }
    ?>
</body>
</html>

