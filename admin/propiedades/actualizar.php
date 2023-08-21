<?php

//incluir funcion inicio de la super global session_start();
//conectar con funciones
require '../../includes/funciones.php';
incluirtemplate('header');
$auth = estAutenticado();
 if(!$auth){
    header('Location: /');
    }

//VALIDAR URL POR ID VALIDO.
$id = $_GET['id'];
$id = filter_var($id,FILTER_VALIDATE_INT);
if(!$id){
    header('Location: /admin');
}

//conectar a base de datos
require '../../includes/config/database.php';

$db = conectarDB();

//query a la base de datos, tabla propiedad
$consultaPropiedad = "SELECT * FROM propiedades WHERE id = $id";
//consulta a la base de datos por pripiedad
$resultadoPropiedad = mysqli_query($db,$consultaPropiedad);

$RowPropiedad= mysqli_fetch_assoc($resultadoPropiedad);


//query de vendedores
$consulta = "SELECT * FROM vendedores"; 
//consulta a base de datos de vendedores en general
$resultado = mysqli_query($db,$consulta);

//arreglo con mensaJes de errores
$errores=[];

$titulo =$RowPropiedad['titulo'];
$precio = $RowPropiedad['precio'];
$descripcion = $RowPropiedad['descripcion'];
$habitaciones = $RowPropiedad['habitaciones'];
$wc = $RowPropiedad['wc'];
$estacionamiento = $RowPropiedad['estacionamiento'];
$vendedorId = $RowPropiedad['vendedores_id'];


if($_SERVER["REQUEST_METHOD"]=="POST"){

   /*  echo "<pre>";
        var_dump($_POST);
    echo "</pre>";
 */
    
    
    $titulo = mysqli_real_escape_string($db,$_POST['titulo']);
    $precio = mysqli_real_escape_string($db,$_POST['precio']);
    $descripcion = mysqli_real_escape_string($db,$_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db,$_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db,$_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db,$_POST['estacionamiento']);
    $vendedorId = mysqli_real_escape_string($db,$_POST['vendedor']);
    $creado = date('Y-m-d');

    //ASIGNAR FILES A UNA VARIABLE
    $imagen = $_FILES['imagen'];

    //validar datos vacios
    if(!$titulo){
        $errores[]='Debes ingresar un titulo';
    }

    if(!$precio){
        $errores[]='Debes ingresar un precio';
    }

    /* if(!$imagen['name']){
        $errores[]='La imagen es obligatoria';
    } */
    //validar por tamaño
    /* if($imagen['size']>100000){
        $errores[]= 'La imagen es muy grande, supera los 100KB';
    }
 */
    if(!$descripcion){
        $errores[]='Debes ingresar una descripcion';
    }

    if(!$habitaciones){
        $errores[]='Debes ingresar numero de habitaciones';
    }

    if(!$wc){
        $errores[]='Debes ingresar la cantidad de wc';
    }

    if(!$estacionamiento){
        $errores[]='Debes ingresar numero de estacionamientos';
    }

    if(!$vendedorId){
        $errores[]='Debes ingresar un vendedor';
    }

   


    /* echo "<pre>";
        echo var_dump($errores);
    echo "</pre>"; */

    //revisar que no hayan errores
    if(empty($errores)){
        /* Subida de archivos */


        //crear carpeta
        $carpetaImagenes = '../../imagenes';
        if(!is_dir($carpetaImagenes)){
            mkdir($carpetaImagenes);
        }

        //Eliminar imagen de la carpeta imagenes

        if($imagen['name']){
            unlink($carpetaImagenes.'/'.$RowPropiedad['imagen']);

            //generar un nombre unico
            $nombreUnicoImagen = md5(uniqid(rand(),true)).".jpg";

            //subir la imagen a la carpeta creada
            move_uploaded_file($imagen['tmp_name'],$carpetaImagenes."/".$nombreUnicoImagen);
        }else{
            $nombreUnicoImagen = $RowPropiedad['imagen'];

        }

        


        //insertar a la base de datos
        $query = " UPDATE propiedades  SET titulo= '$titulo', precio= $precio, imagen='$nombreUnicoImagen', descripcion= '$descripcion',habitaciones= $habitaciones, wc= $wc, estacionamiento= $estacionamiento, vendedores_id= $vendedorId  WHERE id = $id ";

    
        $resultado = mysqli_query($db,$query);
    
        if($resultado){
            header('location: /admin?resultado=2');
        }

    }


}

?>

    <main class="contenedor seccion">
        <h1>Actualizar propiedad</h1>

        <a href="../index.php" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error){?>
                <div class="alerta error"><?php echo $error; ?></div>
            <?php } ?>


        <form class="formulario" method="POST"  enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion general</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" placeholder="Titulo propiedad" name="titulo" value="<?php echo $titulo ?>">

                <label for="precio">Precio:</label>
                <input type="text" id="precio" placeholder="Precio propiedad" name="precio" value="<?php echo $precio ?>">

                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" accept="image/jpeg,images/png" name="imagen">

                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" ><?php echo $descripcion ?></textarea>

            </fieldset>
            <fieldset>
                <legend>Informacion de la propiedad</legend>

                <label for="habitaciones">Habitaciones</label>
                <input type="number" id="habitaciones" placeholder="Ej: 3" min="1" max="9" name="habitaciones" value="<?php echo $habitaciones ?>">

                <label for="wc">Baños</label>
                <input type="number" id="wc" placeholder="Ej: 3" min="1" max="9" name="wc" value="<?php echo $wc ?>">

                <label for="estacionamiento">Estacionamiento</label>
                <input type="number" id="estacionamiento" placeholder="Ej: 3" min="1" max="9" name="estacionamiento" value="<?php echo $estacionamiento ?>">

            </fieldset>
            <fieldset>
                <legend>Vendedor</legend>
                    <select name="vendedor" value="<?php echo $vendedorId ?>">
                        <option value="" disabled selected>--Seleccione--</option>
                        <?php 
                            while($rows = mysqli_fetch_assoc($resultado)){ ?>
                                <option <?php echo $vendedorId===$rows['id'] ? 'selected' : ''; ?> value="<?php echo $rows['id']; ?>"><?php echo $rows['nombre'].' '.$rows['apellido']; ?></option><?php } ?>
                    </select>
            </fieldset>
            <input type="submit" value="Actualizar propiedad" class="boton boton-verde">
        </form>

    </main>

    <?php 
    incluirtemplate('footer');
?>