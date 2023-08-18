<?php
//IMPORTAR CONEXION
require '../includes/config/database.php';
$db = conectarDB();

//ESCRIBIR EL QUERY
$query = "SELECT * FROM propiedades"; 

//CONSULTAR BASE DE DATOS
$consulta = mysqli_query($db,$query);

/* echo "<pre>";
var_dump(mysqli_fetch_all( $consulta));
echo "</pre>"; */

//incluir templates
require '../includes/funciones.php';
incluirtemplate('header');

//obtener resultado de la url que envia crear.php
$resultado = $_GET['resultado'] ?? null;


if($_SERVER["REQUEST_METHOD"]==='POST'){

    $id=$_POST['id'];
    $id = filter_var($id,FILTER_VALIDATE_INT);
    if($id){

        //Eliminar el archivo imagen.
        $query = "SELECT imagen FROM propiedades WHERE id=$id";

        $resultado = mysqli_query($db,$query);
        $propiedad = mysqli_fetch_assoc($resultado);
        
        unlink('../imagenes/'.$propiedad['imagen']);
        
        //Eliminar la propiedad
        $query = "DELETE FROM propiedades WHERE id=$id";
        
        $ConsultaEliminar = mysqli_query($db,$query);
        if($ConsultaEliminar){
            header('Location: /admin?resultado=3');
        }
        
    }


}


?>

    <main class="contenedor seccion">
        <h1>Administrador de bienes raices</h1>

        <?php
        if($resultado==1){ ?>
            <p class="alerta exito">Anuncio ingresado correctamente</p>
        <?php } elseif($resultado==2) { ?> 
            <p class="alerta exito">Anuncio actualizado correctamente</p>
        <?php } elseif($resultado==3) { ?> 
            <p class="alerta exito">Anuncio eliminado correctamente</p>
        <?php } ?>
        
        <a href="../admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>

        <table class="propiedades">
            <caption>Contenido de anuncios</caption>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Mostrar resultados de base de datos -->
                <?php while ($rows = mysqli_fetch_assoc($consulta)) { ?>
                    <tr>
                        <td><?php echo $rows['id'];?></td>
                        <td><?php echo $rows['titulo']?></td>
                        <td> <img src="/imagenes/<?php echo $rows['imagen']; ?>" class="imagen-tabla" alt="imagen de publicidad"></td>
                        <td>$ <?php echo $rows['precio'];?></td>
                        <td>
                            <form method="POST" class="w-100">
                                <input type="hidden" name="id" value="<?php echo $rows['id']?>">
                                <input type="submit" class="boton-rojo-block" value="Eliminar">
                            </form>
                            <a href="/admin/propiedades/actualizar.php?id=<?php echo $rows['id'] ?>" class="boton-amarillo-block">Actualizar</a>
                        </td>
                    </tr>
               <?php } ?>
            </tbody>
        </table>


    </main>

<?php 

//cerrar la conexion

mysqli_close($db);


incluirtemplate('footer');
?>