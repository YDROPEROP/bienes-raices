<?php 
require __DIR__.'/../config/database.php';
$db = conectarDB();

$query = "SELECT * FROM propiedades LIMIT $limite";

$consulta = mysqli_query($db,$query);

 /* mysqli_data_seek($consulta, 0); */ //FORMA DE REINICAR UN FETCH_ASSOC

?>

<div class="contenedor-anuncios"> 

<?php while($resultado = mysqli_fetch_assoc($consulta)){ ?>           
    <div class="anuncio">
        
        <img width="30rem" height="300rem" loading="lazy" src="/imagenes/<?php echo $resultado['imagen']?>" alt="anuncio">
        
        <div class="contenido-anuncio">
            <h3><?php echo $resultado['titulo'] ;?></h3>
            <p><?php echo $resultado['descripcion']; ?></p>
            <p class="precio">$ <?php echo $resultado['precio']; ?></p>
            <ul class="iconos-caractaristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $resultado['wc']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono icono estacionamiento">
                    <p><?php echo $resultado['estacionamiento'] ;?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p><?php echo $resultado['habitaciones']; ?></p>
                </li>
            </ul>

            <a href="/anuncio.php?id=<?php echo $resultado['id'] ;?>" class="boton boton-amarillo">Ver Propiedad</a>
        </div>
    </div>
    <?php } ?>
</div>
