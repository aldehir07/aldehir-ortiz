<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo DataTable JQuery</title>
    <script type="text/javascript" language="javascript" scr="jquery-3.1.1.js"></script>
    <script type="text/javascript" language="javascript" scr="jquery.dataTables.min.js"></script>
</head>
<body>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#grid').DataTable({
                "lengthMenu":[5,10,20,50],
                "order": [[o,"asc"]],
                "language":{
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "zeroRecords": "No existen resultados en su busqueda",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infroEmpty": "No hay registros disponibles",
                    "infoFilters": "(Buscado entre _MAX_ registros en total)",
                    "search": "Buscar: ",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }, 
                }
            });
            $("*").css("font-family", "arial").css('font-size','12px';)
        });
    </script>
    <h1>Consulta de noticias</h1>
    <?php 
    require_once("class/noticias.php");

    $obj_noticia = new noticias();
    $noticias = $obj_noticia->consultar_noticias();

    $nfilas = count($noticias);

    if($nfilas > 0 ){
        print("<TABLE id='grid' class='display' cellspacing='0'>\n");
        print ("<TR>\n");
        print("</THEAD>");
        print("<TBODY>");
        for($i=0; $i<$nfilas; $i++){
            print ("<TH>Titulo</TH>\n");
            print ("<TH>Texto</TH>\n");
            print ("<TH>Categoria</TH>\n");
            print ("<TH>Fecha</TH>\n");
            print ("<TH>Imagen</TH>\n");
            print ("</TR>\n");
            
        }
        foreach($noticias as $resultado){
            print ("<TR>\n");
            print ("<TD>" .$resultado['titulo'] . "</TD>\n");
            print ("<TD>" .$resultado['texto'] . "</TD>\n");
            print ("<TD>" .$resultado['categoria'] . "</TD>\n");
            print ("<TD>" . date("j/n/Y" ,strtotime($resultado['fecha'])) . "</TD>\n");

            if($resultado['imagen'] != ""){
                print ("<TD><A TARGET ='_blank' HREF='img/" .$resultado['imagen'] .
                "'><IMG BORDER='0' SRC='img/iconotexto.gif'></A></TD>\n");
            }else{
                print ("<TD>&nbsp; </TD>\n");
            }
            print ("</TR>\n");
            print("</TBODY>");
        }
        print ("</TABLE>\n");
    }
    else{
        print("No hay noticias disponibles");
    }
    ?>
</body>
</html>