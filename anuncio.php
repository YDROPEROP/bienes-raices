<?php
require './includes/funciones.php';
incluirtemplate('header'); 

//TOMAR EL ID ENVIADO DESDE LA URL DE INDEX.PHP
$id=$_GET['id'];
$id = filter_var($id,FILTER_VALIDATE_INT);

if(!$id){
    header('location: /');

}

//CONEXION CON BASE DE DATOS
include './includes/config/database.php';
$db = conectarDB();

//QUERY PARA LA CONSULTA
$query = "SELECT * FROM propiedades WHERE id=$id";

//CONSULTA
$consulta = mysqli_query($db,$query);
$resultado = mysqli_fetch_assoc($consulta);
?>
    <main class="contenedor seccion contenido-centrado boder-anuncio">
        <h1><?php echo $resultado['titulo'];?></h1>
        
        <img loading="lazy" src="./imagenes/<?php echo $resultado['imagen']; ?>" alt="anuncio">
        
        <div class="resumen-propiedad">
            <p class="precio">$ <?php echo $resultado['precio'];?></p>
            <ul class="iconos-caractaristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $resultado['wc'];?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono icono estacionamiento">
                    <p><?php echo $resultado['estacionamiento'];?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p><?php echo $resultado['habitaciones'];?></p>
                </li>
            </ul>
            <p> <strong><?php echo $resultado['titulo'];?></strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat aliquid quia dolor omnis repellendus, quo quam voluptates sed aperiam qui nobis. Officia illo vel nostrum sunt ea soluta eius fugiat?</p>
            
        </div>
    </main>

    <?php 
    incluirtemplate('footer');
?>